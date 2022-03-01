<x-app-layout>
    <div class="pt-40">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 items-center gap-8">
                <div class="col-span-2 sm:col-span-1">
                    <div class="text-5xl font-black">
                        {{__("Congratulations!")}}
                    </div>
                    <div class="text-2xl mt-4">
                        {{__("You have completed the orientation.")}}
                    </div>
                    <div class="mt-8">
                        <a href="{{route('orientation.certificate', ['user' => Auth::user()->id, 'orientation' => $orientation->id])}}" target="_blank" class="flex gap-2 items-center text-blue-600  hover:text-blue-800  transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" />
                            </svg>
                            <span>{{__("Download certificate")}}</span>
                        </a>
                    </div>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <img src="{{asset('storage/109-map-location.svg')}}">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
