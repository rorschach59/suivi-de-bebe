@inject('dateService', 'App\Services\DateService')

<div>
    <div class="grid grid-cols-4 gap-6">
        <div class="place-self-center">
            <img src="{{ Vite::asset('resources/images/marguerite.png') }}"
                 alt="Marguerite"
                 class="w-10">
        </div>
        <div class="flex self-center col-span-3 filters italic">
            <p class="{{$filter === $dateService::DAY ? 'active-filter' : '' }}"
               wire:click="setFilter('{{ $dateService::DAY }}')">Jour</p>
            <p class="{{$filter === $dateService::WEEK ? 'active-filter' : '' }}"
               wire:click="setFilter('{{ $dateService::WEEK }}')">Semaine</p>
            <p class="{{$filter === $dateService::MONTH ? 'active-filter' : '' }}"
               wire:click="setFilter('{{ $dateService::MONTH }}')">Mois</p>
        </div>
    </div>

    <div class="relative my-12">
        <input type="text" id="search" name="search"
               class="input-search"
               placeholder="Recherche"
               required
               wire:model="query"
        >
        <img src="{{ Vite::asset('resources/images/recherche.svg') }}"
             alt="Search"
             class="absolute right-2.5 bottom-2"
        >

        @if(!empty($activities))
            <div class="relative overflow-x-auto mt-12 h-[300px] shadow-xl bg-myGreen-400">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Heure
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Activité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Notes
                        </th>
                    </tr>
                    </thead>
                    <tbody class="overflow-y-auto mx-1">
                    @foreach($activities as $activity)
                        <tr class="border-b border-gray-300"
                            onclick="document.location = '{{ route('activities.update', ['activity' => $activity->id]) }}';">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ date('d/m/Y H:i', strtotime($activity->date)) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $activity->name }}
                            </td>
                            <td class="px-6 py-4">
                                {!! nl2br($activity->notes) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @if(empty($activities))

        @if($filter === $dateService::DAY)
            <livewire:view.day/>
        @elseif($filter === $dateService::WEEK)
            <livewire:view.week/>
        @elseif($filter === $dateService::MONTH)
            <livewire:view.month/>
        @else
            <livewire:view.day/>
        @endif

        <script>
            window.addEventListener("initFlowbite", event => {
                initFlowbite();
            })
        </script>

    @endif
</div>
