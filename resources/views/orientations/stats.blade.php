<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-2 border-b dark:border-b-gray-700">
            @include('orientations.menu')
        </div>
    </div>

    <div class="my-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="font-extrabold text-2xl mb-4 dark:text-white">
                {{__("Statistics")}}
            </div>
            @livewire('orientation.stats', ['orientation' => $orientation])
        </div>
    </div>
</x-app-layout>
