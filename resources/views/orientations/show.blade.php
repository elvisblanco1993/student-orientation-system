<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-2 border-b ">
            @include('orientations.menu')
        </div>
    </div>

    <div class="my-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="font-extrabold text-2xl mb-4 ">
                {{__("Sections")}}
            </div>

            @livewire('section.index', ['orientation' => $orientation])
            <div class="mt-8">
                @livewire('section.create', ['orientation' => $orientation])
            </div>
        </div>
    </div>
</x-app-layout>
