<div>
    <ul wire:sortable="updateSectionOrder">
        @forelse ($sections as $section)
            <li class="w-full max-w-5xl border  rounded-lg py-2 px-4 my-2 bg-white " wire:sortable.item="{{ $section->id }}" wire:key="section-{{ $section->id }}" x-data="{ open: false }">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button wire:sortable.handle>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-900  active:text-gray-900 focus:text-gray-900 transition" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </button>
                        <div>
                            <div class="font-semibold ">
                                {{ $section->title }}
                            </div>
                            <div class="inline-block text-xs font-semibold uppercase tracking-wider px-2 text-gray-600  bg-gray-200  rounded">
                                {{$section->type}}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button @click="open = !open">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </button>
                        <button wire:click="deleteSection({{$section->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400 hover:text-red-600 transition" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div x-show="open" class="block" x-cloak>
                    @livewire('section.edit', ['section' => $section])
                </div>
            </li>
        @empty

        @endforelse
    </ul>
</div>
