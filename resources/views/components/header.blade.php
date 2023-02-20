<div {{ $attributes->class('z-10 h-32 w-full flex justify-center items-center sticky top-0 bg-darkBlack') }}>
    <div class="flex w-3/4 justify-evenly">
        <div class="flex h-auto items-center space-x-8 lg:space-x-16 ">
            <x-nav-button href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-button>
            <x-nav-button href="{{ route('portfolio.index') }}" :active="request()->routeIs('portfolio*')">Portfolio
            </x-nav-button>
            <x-nav-button href="{{ route('schedule.index') }}" :active="request()->routeIs('schedule*')">Agenda
            </x-nav-button>
        </div>

        <a href="{{route('home')}}" class="py-2 text-white">
            <x-logo/>
        </a>

        <div class="flex h-auto items-center space-x-8 lg:space-x-16 ">
            @role('client')
            <form class="flex h-full items-center" action="{{  route('checkout') }}" method="POST">
                @csrf
                <button>
                    <x-nav-button class="cursor-pointer" :active="request()->routeIs('subscribe*')">
                        Assinar
                    </x-nav-button>
                </button>
            </form>
            @endrole

            @role('subscriber')
            <x-nav-button href="{{ route('signature.index') }}" :active="request()->routeIs('signature*')">
                Assinatura
            </x-nav-button>
            @endrole
            <x-nav-button href="{{ route('about.index') }}" :active="request()->routeIs('about*')">Sobre Nós
            </x-nav-button>
            @auth()
                <form class="flex h-full items-center" method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-button href="{{ route('logout') }}"
                                  @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-nav-button>
                </form>
            @else
                <x-nav-button href="{{ route('login') }}" :active="request()->routeIs(['login', 'register'])">
                    Entrar
                </x-nav-button>
            @endauth
        </div>
    </div>
</div>
