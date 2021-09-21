<div>
    <div class="mb-4">
        <label for="name" class="block font-medium text-sm text-gray-700">Orientation Name</label>
        <input type="text" id="name" wire:model="name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description" class="block font-medium text-sm text-gray-700">Orientation Description</label>
        <textarea id="description" cols="30" rows="10" wire:model="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"></textarea>
        @error('description')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="banner" class="block font-medium text-sm text-gray-700">Banner</label>
        <input type="file" id="banner" class="block" wire:model="banner">
        @error('banner')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end">
        <x-jet-button wire:click="create">Save</x-jet-button>
    </div>
</div>
