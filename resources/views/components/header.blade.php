<div {{ $attributes->class('z-10 h-32 w-full bg-darkBlack flex justify-center items-center sticky top-0 ') }}>
    <div class="flex w-3/4 justify-evenly">
        <div class="flex h-auto items-center space-x-8 lg:space-x-16 ">
            <x-nav-button href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-button>
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('portfolio*')">Portfolio</x-nav-button>
            <x-nav-button href="{{ route('schedule.index') }}" :active="request()->routeIs('schedule*')">Agenda</x-nav-button>
        </div>
        <div class="py-2 text-white">
{{--            <x-logo/>--}}
        </div>
        <div class="flex h-auto items-center space-x-8 lg:space-x-16 ">
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('signature*')">Assinatura
            </x-nav-button>
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('about*')">Sobre Nós</x-nav-button>
            @auth()
                <form class="flex h-full items-center" method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-button href="{{ route('logout') }}"
                                  @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-nav-button>
                </form>
            @else
                <x-nav-button href="{{ route('login') }}" :active="request()->routeIs(['login', 'register'])">Entrar</x-nav-button>
            @endauth
        </div>
    </div>
</div>
