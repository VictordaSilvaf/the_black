<x-guest-layout>
    <div class="-mt-32">
        <div class="min-h-screen w-full relative flex justify-center items-center overflow-hidden">
            <img src="{{ asset('images/banner.jpg') }}" alt="Imagem do banner"
                 class="z-0 absolute h-full w-screen object-cover overflow-hidden grayscale">
            <div class="container relative flex justify-center lg:justify-start items-center h-full w-screen mt-32 pl-0 lg:pl-16">
                <div class="lg:w-1/3 py-6 px-8 rounded-lg bg-black bg-opacity-40">
                    <x-bar class="bg-darkGold"/>
                    <p class="text-lg my-8 text-white text-justify">
                        Venha experimentar um serviço de qualidade e profissionalismo que você
                        não encontrará em nenhum outro lugar.</p>
                    <x-bar class="bg-darkGold"/>
                    <div class="flex justify-center mt-4">
                        <x-button class="bg-lightGold hover:bg-darkGold duration-150 text-white">Agendar agora!
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
