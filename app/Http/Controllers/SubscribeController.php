<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|Application|Factory|View
     */
    public function index()
    {
        if (auth()->user()->can('can:subscribe')) {
            return redirect()->route('checkout');
        }

        $order = auth()->user()->orders()->first();
        $product = auth()->user()->orders()->first()->product()->first();

        return view('pages.subscribe.index', compact('order', 'product'));
    }

    public function checkout(Request $request)
    {
        $product = Product::where('type', 'subscription')->where('quantity', 3)->firstOrFail();
        $totalPrice = $product->price;

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $product->name,
//                        'images' => [$product->image_url],
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $totalPrice;
        $order->session_id = $checkout_session->id;
        $order->user_id = auth()->user()->id;
        $order->product_id = $product->id;
        $order->quantity_remaining = $product->quantity;
        $order->save();

        return redirect($checkout_session->url);
    }

    /**
     * @throws ApiErrorException
     * @throws \Exception
     */
    public function success(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $session_id = $request->get('session_id');
        try {
            $session = $stripe->checkout->sessions->retrieve($session_id);

            $order = Order::where('session_id', $session_id)->where('status', 'unpaid')->first();

            if (!$order) {
                throw new \Exception('Session not found');
            }

            if ($order->status == 'unpaid') {
                $order->status = 'paid';
                $order->save();

                auth()->user()->assignRole('subscriber');
                auth()->user()->removeRole('client');
            }

            return redirect()->route('home')->with('success', 'Assinatura realizada com sucesso!');
        } catch (ApiErrorException $e) {
            throw new \Exception('Session not found');
        }
    }

    public function cancel(Request $request)
    {
        return view('pages.checkout.cancel');
    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $order = Order::where('session_id', $session->id)->first();

                if ($order && $order->status == 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                }
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request): Application|Factory|View
    {
        return $request->user()->redirectToBillingPortal();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSubscribeRequest $request
     * @return Response
     */
    public function store(StoreSubscribeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subscribe $subscribe
     * @return Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subscribe $subscribe
     * @return Response
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSubscribeRequest $request
     * @param \App\Models\Subscribe $subscribe
     * @return Response
     */
    public function update(UpdateSubscribeRequest $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subscribe $subscribe
     * @return Response
     */
    public function destroy(Subscribe $subscribe)
    {
        //
    }
}
