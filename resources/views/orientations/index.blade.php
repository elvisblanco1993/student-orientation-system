<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                {{ __('Dashboard') }}
            </h2>

            @if (auth()->user()->role == 'admin')
                <a href="{{ route('orientation.create') }}" class="text-xs uppercase font-semibold text-gray-800 ">New Orientation</a>
            @endif

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-8">
                @forelse ($orientations as $orientation)
                    <a class="col-span-3 sm:col-span-1 bg-white  shadow sm:rounded-lg hover:shadow-xl" href="{{ route('orientation.show', ['orientation' => $orientation->id]) }}">
                        <img src="{{ asset('storage/banners/'.$orientation->banner) }}" alt="" class="sm:rounded-t-lg max-h-64 w-full object-cover object-center">
                        <div class="px-4 py-2 ">
                            {{ $orientation->name }}
                        </div>
                    </a>
                @empty
                    @if (auth()->user()->role === 'admin')
                    <div class="col-span-3 sm:col-span-1 bg-white  shadow sm:rounded-lg h-64 hover:shadow-xl">
                        <a href="{{ route('orientation.create') }}" class="w-full h-full flex items-center justify-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <div class="mt-2 mx-auto tracking-wider antialiased text-xs font-semibold text-slate-800 uppercase">
                                    {{__("New Orientation")}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
