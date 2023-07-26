<div class="flex justify-center items-center gap-8">
    <p class="font-bold text-xl" wire:click="setWeek('{{ $week['previousWeek'] }}')"><</p>
    <p>{{ $week['formatted'] }}</p>
    <p class="font-bold text-xl" wire:click="setWeek('{{ $week['nextWeek'] }}')">></p>
</div>
