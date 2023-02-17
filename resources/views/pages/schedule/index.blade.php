<x-app-layout>
    <div class="flex grid grid-cols-12 mt-10">
        <div class="col-span-12 lg:md:col-span-4 p-2">
            <livewire:schedule-component/>
        </div>

        <div class="col-span-12 lg:col-span-8 bg-lightGold p-2 rounded-lg">
            @if(!empty($schedules))
                <div class="flex flex-col">
                    @foreach($schedules as $schedule)
                        <div class="w-full my-2">
                            <div class="flex flex-row justify-between bg-lightBlack rounded-lg py-2 px-5 items-center">
                                <div class="w-3/6">
                                    <div class="">
                                        <p class="font-bold">Serviço: </p>
                                        <p class="font-thin italic">{{$schedule->date}}</p>
                                    </div>
                                    {{--                                @can('super-admin')--}}
                                    <div class="mt-2">
                                        <p class="font-bold">Usuário: </p>
                                        <p class="font-thin italic">{{$schedule->user->name}}</p>
                                    </div>
                                    {{--                                @endcan--}}
                                </div>

                                <div class="w-2/6">
                                    <div class="">
                                        <p class="font-bold">Tempo estimado: </p>
                                        <p class="font-thin italic">{{$schedule->date}}</p>
                                    </div>
                                    <div class="mt-2">
                                        <p class="font-bold">data: </p>
                                        <p class="font-thin italic">{{$schedule->date}}</p>
                                    </div>
                                </div>

                                <div class="flex flex-col w-1/6">
                                    @role('Super-Admin')
                                    <x-button class="bg-green-500 hover:bg-green-400 my-1">Concluido</x-button>
                                    @endcan
                                    @if ($schedule->user_id == Auth::user()->id && $schedule->date > now())
                                        <x-button class="bg-blue-500 hover:bg-blue-400 my-1">Editar</x-button>
                                        <x-button class="bg-red-500 hover:bg-red-400 my-1">Remover</x-button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center h-full">
                    <h1 class="text-2xl font-bold text-center">Tudo certo</h1>
                    <p class="text-center">Todos os horários estão disponivel esse dia!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
