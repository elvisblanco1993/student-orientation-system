<div>
    <div x-data="{popup: false}">
        <div class="max-w-full flex justify-center gap-8">
            <x-jet-secondary-button @click="popup = ! popup">
                {{__("Add section")}}
            </x-jet-secondary-button>

            <x-jet-button x-on:click="window.location.href='{{route('orientation.close', ['orientation' => $orientation->id])}}'">
                {{__("Save changes")}}
            </x-jet-button>
        </div>

        {{-- Section types --}}
        <div class="mt-4 p-4 grid grid-cols-4 gap-4 bg-white dark:bg-gray-900 rounded-lg shadow max-w-lg mx-auto" x-show="popup" x-cloak>
            <button wire:click="$toggle('videoSectionModal')" class="section-button" @click="popup = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <span class="text-sm text-gray-800 dark:text-white font-semibold">{{ __("Video") }}</span>
            </button>

            <button wire:click="$toggle('imageSectionModal')" class="section-button" @click="popup = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-sm text-gray-800 dark:text-white font-semibold">{{ __("Image") }}</span>
            </button>

            <button wire:click="$toggle('fileSectionModal')" class="section-button" @click="popup = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <span class="text-sm text-gray-800 dark:text-white font-semibold">{{ __("File") }}</span>
            </button>

            <button wire:click="$toggle('websiteSectionModal')" class="section-button" @click="popup = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <span class="text-sm text-gray-800 dark:text-white font-semibold">{{ __("Website") }}</span>
            </button>

            <button wire:click="$toggle('textSectionModal')" class="section-button" @click="popup = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <span class="text-sm text-gray-800 dark:text-white font-semibold">{{ __("Text") }}</span>
            </button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="videoSectionModal">
        <x-slot name="title">
            {{ __("New video section") }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <label for="url" class="block font-medium text-sm text-gray-700">{{__("Video URL")}}</label>
                <input type="text" id="url" wire:model="url">
                @error("url")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model="title">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <label for="content" class="block font-medium text-sm text-gray-700">{{__("Description")}}</label>
                <textarea id="content" cols="30" rows="6" wire:model="content"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('videoSectionModal')" wire:loading.attr="disabled">
                {{__("Nevermind")}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addVideoSection" wire:loading.attr="disabled">
                {{__("Add section")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="imageSectionModal">
        <x-slot name="title">
            {{ __("New image section") }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <input type="file" id="file" wire:model="file">
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Subtitle")}}</label>
                <input type="text" id="title" wire:model="title">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('imageSectionModal')" wire:loading.attr="disabled">
                {{__("Nevermind")}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addImageSection" wire:loading.attr="disabled">
                {{__("Add section")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="fileSectionModal">
        <x-slot name="title">
            {{ __("New file section") }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <input type="file" id="file" wire:model="file">
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Subtitle")}}</label>
                <input type="text" id="title" wire:model="title">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('fileSectionModal')" wire:loading.attr="disabled">
                {{__("Nevermind")}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addFileSection" wire:loading.attr="disabled">
                {{__("Add section")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="websiteSectionModal">
        <x-slot name="title">
            {{ __("New website section") }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <label for="url" class="block font-medium text-sm text-gray-700">{{__("Website URL")}}</label>
                <input type="text" id="url" wire:model="url">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('websiteSectionModal')" wire:loading.attr="disabled">
                {{__("Nevermind")}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addWebsiteSection" wire:loading.attr="disabled">
                {{__("Add section")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="textSectionModal">
        <x-slot name="title">
            {{ __("New video section") }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model="title">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <label for="content" class="block font-medium text-sm text-gray-700">{{__("Description")}}</label>
                <textarea id="content" cols="30" rows="6" wire:model="content"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('textSectionModal')" wire:loading.attr="disabled">
                {{__("Nevermind")}}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addTextSection" wire:loading.attr="disabled">
                {{__("Add section")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
