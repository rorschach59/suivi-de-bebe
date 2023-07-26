@inject('dateService', 'App\Services\DateService')

<div>
    <div class="flex justify-center items-center gap-8">
        <p class="font-bold text-xl" wire:click="setCriteria('{{ $dateService::PREVIOUS  }}', '{{ $date }}')"><</p>
        <p>{{ ucfirst($date) }}</p>
        <p class="font-bold text-xl" wire:click="setCriteria('{{ $dateService::NEXT  }}', '{{ $date }}')">></p>
    </div>

    @if(session('newActivity'))
        <div id="toast-success" class="flex items-center w-full p-4 my-12 text-gray-500 bg-white rounded-lg shadow" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Activité ajoutée</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="relative overflow-x-auto mt-12 h-[300px] shadow-xl">
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
            <tbody class="overflow-y-auto">
                @foreach($activities as $activity)
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ date('H:i', strtotime($activity->date)) }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $activity->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $activity->notes }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex items-center mt-12">
        <img src="{{ Vite::asset('resources/images/marguerite.png') }}" alt="Marguerite">
        <h2 id="reminder" class="font-bold ml-4 w-full">Pense-bête</h2>
        <div class="flex justify-end pr-2 w-full">

            <button data-modal-target="updateReminderModal" data-modal-toggle="updateReminderModal" class="" type="button">
                <img src="{{ Vite::asset('resources/images/stylo.svg') }}" alt="Stylo">
            </button>

            <div id="updateReminderModal" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                 wire:ignore.self
            >
                <div class="relative w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="font-semibold text-gray-900">
                                Modifier le pense-bête
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                    data-modal-hide="updateReminderModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <form action="{{ route('post-reminder') }}#reminder" method="post">
                            @csrf
                            <input type="hidden" name="date" value="{{ $date }}">
                            <div class="p-2 space-y-6 text-center">
                        <textarea name="reminder"
                                  id="reminder"
                                  rows="10"
                                  class="input"
                                  >{!! $reminder !!}</textarea>
                            </div>
                            <div class="flex justify-between p-2 space-x-2">
                                <button data-modal-hide="updateReminderModal" type="submit" class="primary-button">Modifier</button>
                                <button data-modal-hide="updateReminderModal" type="button" class="secondary-button">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="p-2 mt-2 bg-myGreen-400 rounded-lg mb-14">
        @if( !empty($reminder) )
            {!! nl2br($reminder) !!}
        @else
            R.A.S. 😎
        @endif
    </div>



</div>


