<div>
    <div class="grid grid-cols-4 gap-8">
        <div class="col-span-4 sm:col-span-1">
            <img @if ( $banner )
                    src="{{ $banner->temporaryUrl() }}"
                @else
                    src="{{asset('storage/banners/'.$image)}}"
                @endif
                alt=""
                class="w-full rounded-lg shadow">

            <div class="my-4">
                <input type="file" id="banner" class="w-full text-sm dark:text-white" wire:model.defer="banner">
                @error('banner')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-span-4 sm:col-span-3">
            <div class="mb-4">
                <label for="name" >Orientation Name</label>
                <input type="text" id="name" wire:model.defer="name">
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" >Orientation Description</label>
                <textarea id="description" cols="30" rows="10" wire:model.defer="description"></textarea>
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="active"  title="If checked, this orientation will be available to all enrolled participants.">
                    <input type="checkbox" id="active" wire:model.defer="active" class="mr-2">
                    {{__("Show to participants")}}
                </label>
                @error('active')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-jet-button wire:click="save">Save</x-jet-button>
            </div>
        </div>
    </div>
</div>
