<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            @if (auth()->user()->role == 'admin')
                <a href="{{ route('orientation.create') }}" class="text-xs uppercase font-semibold text-gray-800 dark:text-white">New Orientation</a>
            @endif

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-8">
                @forelse ($orientations as $orientation)
                    <a class="col-span-3 sm:col-span-1 bg-white dark:bg-gray-700 shadow-xl sm:rounded-lg" href="{{ route('orientation.show', ['orientation' => $orientation->id]) }}">
                        <img src="{{ asset('storage/banners/'.$orientation->banner) }}" alt="" class="sm:rounded-t-lg max-h-64 w-full object-cover object-center">
                        <div class="px-4 py-2 dark:text-white">
                            {{ $orientation->name }}
                        </div>
                    </a>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
