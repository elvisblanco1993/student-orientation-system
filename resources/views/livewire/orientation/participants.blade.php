<div>
    <div class="flex items-center justify-between mb-4">
        <input type="search" placeholder="Search by name" accesskey="/" class="max-w-xs sm:max-w-sm" wire:model="search">

        <x-jet-secondary-button title="Invite attendees to the orientation." wire:click="$toggle('invite')">
            {{__("Invite")}}
        </x-jet-secondary-button>

        <x-jet-dialog-modal wire:model="invite">
            <x-slot name="title">
                {{__("Invite user")}}
            </x-slot>
            <x-slot name="content">
                <input type="email" wire:model="email" placeholder="email@domain.com">
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('invite')">
                    {{__("Nevermind")}}
                </x-jet-secondary-button>
                <x-jet-button wire:click="attach">
                    {{__("Invite")}}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
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
                                    {{__("Status")}}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{__("Edit")}}</span>
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
                                    @if ($participant->checkOrientationCompleted($orientation->id) == true)
                                        <span class="text-xs uppercase px-2 rounded border border-green-200 bg-green-50 text-green-600">{{__("Finished")}}</span>
                                    @else
                                        <span class="text-xs uppercase px-2 rounded border border-yellow-200 bg-yellow-50 text-yellow-600">{{__("In progress")}}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-4">
                                        @if ($participant->checkOrientationCompleted($orientation->id) == false)
                                            <button wire:click="detach({{$participant->id}})" class="text-red-600 hover:text-red-800 dark:hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse

                            @forelse ($invitations as $invitation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    -
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$invitation->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-4">
                                        <button wire:click="notify('{{$invitation->email}}')" class="text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-400 filter rotate-90">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                            </svg>
                                        </button>
                                        <button wire:click="cancelInvite({{$invitation->id}})" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
