@inject('dateService', 'App\Services\DateService')

<div>

    <div class="flex justify-center items-center gap-8">
        <p class="font-bold text-xl" wire:click="setMonth('{{ $month['previousMonth'] }}')"><</p>
        <p>{{ $month['formatted'] }}</p>
        <p class="font-bold text-xl" wire:click="setMonth('{{ $month['nextMonth'] }}')">></p>
    </div>

    <div class="flex items-center justify-center py-8">
        <div class="max-w-sm w-full shadow-lg">
            <div class="p-5 rounded-t bg-white/25">
                <div class="flex items-center justify-between overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr>
                            @foreach($dateService->getDays() as $days)
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="font-medium">{{ $days }}</p>
                                    </div>
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($month['dates'] as $date => $w)
                            <td class="pt-6" {{ $date == 1 ? 'colspan='.$month['weekNumberOfFirstDayOfMonth'] : '' }} wire:click="setDay({{ $date }})">
                                @if(now()->format('d') == $date && now()->format('m') == $month['currentMonth'])
                                    <div class="w-full h-full">
                                        <div
                                            class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                            <a role="link" tabindex="0"
                                               class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-myPink-800 focus:bg-myPink-800 hover:bg-myPink-800 w-8 h-8 flex items-center justify-center font-medium text-white bg-myPink-600 rounded-full">{{ $date }}</a>
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="py-2 cursor-pointer flex w-full {{ $date == 1 ? 'justify-end px-5' : 'justify-center px-2' }}">
                                        <p class="{{ $date == $day ? 'text-myPink-600 font-bold' : 'text-gray-500' }} hover:text-myPink-600 focus:text-myPink-600">{{ $date }}</p>
                                    </div>
                                @endif
                                @if($w == 7)
                        </tr><tr>
                            @endif
                            </td>
                        @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                        {{ date('H:i', strtotime($activity->date)) }}
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

</div>
