@inject('dateService', 'App\Services\DateService')

<div>
    <div class="flex items-center justify-center py-8 px-4">
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
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">1</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">2</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">3</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">4</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">5</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">6</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">7</p>
                                </div>
                            </td>
                            <td>
                                <div class="w-full h-full">
                                    <div class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                        <a role="link" tabindex="0"
                                           class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500  w-8 h-8 flex items-center justify-center font-medium text-white bg-myPink-600 rounded-full">8</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">9</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">10</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">11</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">12</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">13</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">14</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">15</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">16</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">17</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">18</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">19</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">20</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">21</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">22</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">23</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">24</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500">25</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">26</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">27</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">28</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">29</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class=" text-gray-500 font-medium">30</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
