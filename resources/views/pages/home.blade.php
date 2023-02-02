<x-guest-layout>
    <div class="pt-4 ">
        <div class="absolute min-h-screen -mt-36 relative flex justify-center">
            {{--                        <img src="{{ asset('images/banner.png') }}" alt="Imagem do banner"--}}
            {{--                             class="z-0 absolute w-full h-full object-cover overflow-hidden">--}}
            <div class="container relative flex sm:justify-center lg:justify-end items-center h-screen w-screen">
                <div class="w-full lg:w-1/3">
                    <x-bar class="bg-darkGold"/>
                    <p class="text-2xl my-8 text-white text-justify">
                        Venha experimentar um serviço de qualidade e profissionalismo que você
                        não encontrará em nenhum outro lugar.</p>
                    <x-bar class="bg-darkGold"/>
                    <div class="flex justify-center mt-8">
                        <x-button class="bg-lightGold hover:bg-darkGold duration-150 text-white">Agendar agora!
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
