<x-app-layout>
    <div class="w-full bg-darkBlack rounded-2xl mt-20 p-5">
        {{--        {{dd($product)}}--}}
        <h2 class="text-2xl text-white">Status da assinatura</h2>
        <div class="flex p-4">
            <div class="p-3 w-2/3">
                <h2 class="text-lg text-darkGold">Assinatura atual</h2>
                <div class="flex gap-6 items-center h-full">
                    @if(!empty($product->image))
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ $product->image }}" alt="Imagem da assinatura">
                        </div>
                    @endif
                    <ul class="">
                        <li class="my-2"><span class="text-lightGold">Assinatura:</span> {{ $product->name }}</li>
                        <li class="my-2"><span class="text-lightGold">Descrição:</span> {{ $product->description }}</li>
                        <li class="my-2"><span class="text-lightGold">Preço:</span> {{ $product->price }}</li>
                    </ul>
                </div>
            </div>
            <div class="p-3 w-1/3 w-full">
{{--                {{dd($order)}}--}}
                <h2 class="text-lg text-darkGold text-center">Dados pagamento</h2>
                <div class="flex h-full items-center text-center justify-center">
                    <ul class="">
                        <li class="my-2">
                            <span class="text-lightGold flex flex-col ">Status:</span> {{ $order->status }}
                        </li>
                        <li class="my-2">
                            <span class="text-lightGold flex flex-col ">Quantidade restante:</span> {{ $order->quantity_remaining }}
                        </li>
                        <li class="my-2">
                            <span class="text-lightGold flex flex-col ">Data de inicio:</span> {{ $order->updated_at }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-end">
            <a href="#" class="bg-darkGold hover:bg-lightGold duration-150 text-white p-2 rounded-lg">Cancelar assinatura</a>
        </div>
    </div>
</x-app-layout>
