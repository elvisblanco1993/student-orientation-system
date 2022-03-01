<div>
    {{-- <div class="mb-4">
        <label for="name" >Orientation Name</label>
        <x-jet-input type="text" id="name" wire:model="name" />
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Orientation Description</label>
        <textarea id="description" cols="30" rows="6" wire:model="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
        @error('description')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="banner">Banner</label>
        <input type="file" id="banner" wire:model="banner">
        @error('banner')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end">
        <x-jet-button wire:click="create">Save</x-jet-button>
    </div> --}}

    <x-jet-form-section submit="create">
        <x-slot name="title">
            {{__("Create Orientation")}}
        </x-slot>
        <x-slot name="description">
            {{__("Please fill out this form to get started.")}}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Orientation name') }}" />
                <x-jet-input class="mt-1 block w-full" type="text" id="name" wire:model="name"/>
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="mt-6 col-span-6 sm:col-span-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <textarea name="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="description" cols="30" rows="6" wire:model="description"></textarea>
                <x-jet-input-error for="description" class="mt-2" />
            </div>
            <div class="mt-6 col-span-6 sm:col-span-4">
                <x-jet-label for="banner" value="{{ __('Banner') }}" />
                <x-jet-input class="mt-1 block w-full" type="file" id="banner" wire:model="banner"/>
                <x-jet-input-error for="banner" class="mt-2" />
            </div>
            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-slot>

    </x-jet-form-section>
</div>
