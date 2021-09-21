<div>
    <div class="mb-4">
        <label for="name">Orientation Name</label>
        <input type="text" id="name" wire:model="name">
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Orientation Description</label>
        <textarea id="description" cols="30" rows="10" wire:model="description"></textarea>
        @error('description')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="banner">Banner</label>
        <input type="file" id="banner" class="block" wire:model="banner">
        @error('banner')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end">
        <x-jet-button wire:click="create">Save</x-jet-button>
    </div>
</div>
