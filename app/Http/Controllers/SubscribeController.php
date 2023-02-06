<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if (!auth()->user()->can('can:subscribe')) {
            return $this->create($request);
        }
        return view('pages.subscribe.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request): Application|Factory|View
    {
        $payLink = $request->user()
            ->newSubscription('default', $premium = 34567)
            ->create();

        return view('pages.subscribe.create', ['payLink' => $payLink]);
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
