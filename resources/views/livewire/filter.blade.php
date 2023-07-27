@inject('dateService', 'App\Services\DateService')

<div>
    <div class="grid grid-cols-4 gap-6">
        <div class="place-self-center">
            <img src="{{ Vite::asset('resources/images/marguerite.png') }}"
                 alt="Marguerite"
                 class="w-10">
        </div>
        <div class="flex self-center col-span-3 filters italic">
            <p class="{{$filter === $dateService::DAY ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::DAY }}')">Jour</p>
            <p class="{{$filter === $dateService::WEEK ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::WEEK }}')">Semaine</p>
            <p class="{{$filter === $dateService::MONTH ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::MONTH }}')">Mois</p>
        </div>
    </div>

    <div class="relative my-12">
        <input type="text" id="search" name="search"
               class="input-search"
               placeholder="biberon le 14 juillet"
               required>
        <img src="{{ Vite::asset('resources/images/recherche.svg') }}"
             alt="Search"
             class="absolute right-2.5 bottom-2">
    </div>

    @if($filter === $dateService::DAY)
        <livewire:view.day/>
    @elseif($filter === $dateService::WEEK)
        <p>A venir</p>
{{--        <livewire:view.week/>--}}
    @elseif($filter === $dateService::MONTH)
        <p>A venir</p>
    @else
        <livewire:view.day/>
    @endif

    <script>
        window.addEventListener("initFlowbite", event => {
            initFlowbite();
        })
    </script>

</div>
