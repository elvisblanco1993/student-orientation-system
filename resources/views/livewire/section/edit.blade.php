<div>
    <div class="border border-gray-200 dark:border-gray-700 rounded-lg px-4 pt-2 my-2 bg-gray-50 dark:bg-gray-800">
        {{-- Edit Video Section --}}
        @if ($section->type == 'video')
            <div class="mb-4">
                <label for="url" class="block font-medium text-sm text-gray-700">{{__("Video URL")}}</label>
                <input type="text" id="url" wire:model.defer="url">
                @error("url")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model.defer="title" value="{{$section->title}}">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium text-sm text-gray-700">{{__("Description")}}</label>
                <textarea id="content" cols="30" rows="6" wire:model.defer="content"></textarea>
            </div>
        @endif

        {{-- Edit Image/File Section --}}
        @if ($section->type == 'image' || $section->type == 'file')
            <div class="mb-4">
                <input type="file" id="file" wire:model.defer="file">
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model.defer="title" value="{{$section->title}}">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
        @endif

        {{-- Edit Website Section --}}
        @if ($section->type == 'website')
            <div class="mb-4">
                <label for="url" class="block font-medium text-sm text-gray-700">{{__("Video URL")}}</label>
                <input type="text" id="url" wire:model.defer="url">
                @error("url")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model.defer="title" value="{{$section->title}}">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
        @endif

        {{-- Edit Tet Section --}}
        @if ($section->type == 'text')
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{__("Title")}}</label>
                <input type="text" id="title" wire:model.defer="title" value="{{$section->title}}">
                @error("title")
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium text-sm text-gray-700">{{__("Description")}}</label>
                <textarea id="content" cols="30" rows="6" wire:model.defer="content">{{$section->content}}</textarea>
            </div>
        @endif

        <x-jet-button wire:click="save" class="my-4">
            {{__("Update")}}
        </x-jet-button>
    </div>
</div>
