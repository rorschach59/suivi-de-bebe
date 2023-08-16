@inject('dateService', 'App\Services\DateService')

<div>
    <div class="flex justify-center items-center gap-8">
        <p class="font-bold text-xl" wire:click="setWeek('{{ $week['previousWeek'] }}')"><</p>
        <p>{{ $week['formatted'] }}</p>
        <p class="font-bold text-xl" wire:click="setWeek('{{ $week['nextWeek'] }}')">></p>
    </div>
    <div class="relative overflow-x-auto mt-12 h-[300px] shadow-xl bg-myGreen-400">
        <table class="w-full text-sm text-left text-gray-500">
            <tbody class="overflow-y-auto mx-1">
            @foreach($activities as $date => $activity)
                <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ $dateService->getFrenchDate(date('l j', strtotime($date))) }}
                    </th>
                </tr>
                </thead>
                @foreach($activity as $act)
                    <tr class="border-b border-gray-300"
                        onclick="document.location = '{{ route('activities.update', ['activity' => $act['id']]) }}';">
                        <td class="px-6 py-4">
                            {{ $act['name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {!! nl2br($act['date']) !!}
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
