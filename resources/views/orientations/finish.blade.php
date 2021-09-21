<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ $orientation->name }}
            </h2>

            <a href="{{ route('dashboard') }}" class="text-gray-800 dark:text-gray-100 rounded -m-2 p-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="pt-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 md:flex items-center">
            <div class="w-full md:w-1/2 text-black dark:text-white">
                <div class="text-6xl font-black">
                    {{__("Congratulations!")}}
                </div>
                <div class="text-2xl mt-4">
                    {{__("You have completed the orientation.")}}
                </div>
                <div class="mt-8">
                    <a href="{{route('orientation.certificate', ['user' => Auth::user()->id, 'orientation' => $orientation->id])}}" target="_blank" class="flex gap-2 items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" />
                        </svg>
                        <span>{{__("Download certificate")}}</span>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img src="{{asset('storage/109-map-location.svg')}}" alt="" class="w-2/3">
            </div>
        </div>
    </div>
</x-app-layout>
