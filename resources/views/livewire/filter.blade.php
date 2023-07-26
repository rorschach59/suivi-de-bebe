@inject('dateService', 'App\Services\DateService')

<div>
    <div class="grid grid-cols-5 gap-6 place-items-center">
        <div>
            <img src="{{ Vite::asset('resources/images/marguerite.png') }}" alt="Marguerite">
        </div>
        <div class="flex col-span-3 filters italic">
            <p class="{{$filter === $dateService::DAY ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::DAY }}')">Jour</p>
            <p class="{{$filter === $dateService::WEEK ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::WEEK }}')">Semaine</p>
            <p class="{{$filter === $dateService::MONTH ? 'active-filter' : '' }}" wire:click="setFilter('{{ $dateService::MONTH }}')">Mois</p>
        </div>
        <div>
            <img src="{{ Vite::asset('resources/images/recherche.svg') }}" alt="Recherche">
        </div>
    </div>

    <div class="flex justify-end my-12 mr-6">
        <img src="{{ Vite::asset('resources/images/marguerites.png') }}" alt="Marguerites">
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
