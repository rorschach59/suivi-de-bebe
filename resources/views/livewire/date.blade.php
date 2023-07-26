<div class="flex justify-center items-center gap-8">
    <p class="font-bold text-xl" wire:click="setCriteria('previous', '{{ $date }}')"><</p>
    <p>{{ ucfirst($date) }}</p>
    <p class="font-bold text-xl" wire:click="setCriteria('next', '{{ $date }}')">></p>
</div>
