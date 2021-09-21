<div>
    {{-- Graphs --}}
    <div class="grid grid-cols-3 gap-8 mb-8">
        <div class="col-span-3 sm:col-span-1">
            <div class="w-full p-6 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-700 flex items-center justify-between">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <div class="text-sm dark:text-gray-100">
                        Participants
                    </div>
                </div>
                <div class="text-4xl font-black dark:text-white">
                    {{$total_participants}}
                </div>
            </div>
        </div>
        <div class="col-span-3 sm:col-span-1">
            <div class="w-full p-6 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-700 flex items-center justify-between">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div class="text-sm dark:text-gray-100">
                        Completed
                    </div>
                </div>
                <div class="text-4xl font-black dark:text-white">
                    {{$total_completed}}
                </div>
            </div>
        </div>
        <div class="col-span-3 sm:col-span-1">
            <div class="w-full p-6 rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-700 flex items-center justify-between">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                    </svg>
                    <div class="text-sm dark:text-gray-100">
                        Pending
                    </div>
                </div>
                <div class="text-4xl font-black dark:text-white">
                    {{$total_participants - $total_completed}}
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide:gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900 dark:bg-opacity-60">
                            <tr class="border-b dark:border-b-gray-700">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{__("Name")}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{__("Email")}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{__("Progress")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($participants as $participant)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                    {{$participant->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                    {{$participant->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                    <div class="w-full">
                                        <div class="shadow w-full bg-gray-100 dark:bg-gray-600 rounded-xl">
                                            <div class="bg-blue-500 text-xs leading-none py-1 text-center text-white rounded-xl" style="width: {{ ($participant->progress($this->orientation->id)->section_id / $this->orientation->sections->count()) * 100 ?? 0 }}%">{{ ($participant->progress($this->orientation->id)->section_id / $this->orientation->sections->count()) * 100 ?? 0 }}%</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $participants->links() }}
        </div>
    </div>
</div>
