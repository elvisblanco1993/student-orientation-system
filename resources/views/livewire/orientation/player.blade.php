<div>
    <div class="w-full md:min-h-screen p-0 m-0">
        <div class="md:flex md:h-screen">
            <div class="w-full h-full md:w-1/6 bg-gray-100 dark:bg-gray-900 p-4">
                <a href="{{route('dashboard')}}"
                    class="text-xs font-medium flex items-center justify-between gap-2 dark:text-white">
                    {{__("Back to Dashboard")}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-indigo-500 transition" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <div class="border-t dark:border-gray-800 my-4"></div>
                <div class="flex items-center space-x-2 dark:text-white">
                    <img src="{{asset('storage/banners/'.$orientation->banner)}}" alt="{{$orientation->name}}" class="w-10 h-10 rounded-full">
                    <div class="text-sm font-semibold">{{$orientation->name}}</div>
                </div>
                <div class="border-t dark:border-gray-800 my-4"></div>
                {{-- Progress --}}
                <ul class="overflow-y-auto">
                    @forelse ($sections as $item)
                        <li class="flex items-center gap-4 py-2 bg-gray-200 dark:bg-gray-800 dark:text-gray-200 text-xs mb-2 px-3 rounded-lg font-semibold">
                            <div class="w-full @if($item->position == $section->position) text-blue-600 dark:text-blue-400 @endif">{{$item->title}}</div>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @if($item->position < $section->position) text-green-500 @else text-gray-300 @endif" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </li>
                    @empty

                    @endforelse
                </ul>
            </div>
            {{-- Content Section --}}
            <div class="w-full md:w-5/6 bg-white dark:bg-gray-800 flex flex-col px-4 md:px-0">
                <div class="w-full md:h-2/3 block">
                    <div class="w-full md:w-2/3 mx-auto h-full md:flex items-center justify-center py-4 md:py-0">
                        @if ($section->type == 'video')
                            @if(!empty($section->content))
                            <div class="w-full md:w-1/2 mr-8 mb-8">
                                <div class="prose dark:prose-dark">
                                    {!! Str::of($section->content)->markdown() !!}
                                </div>
                            </div>
                            @endif
                            <video
                                controls
                                class="@if(!empty($section->content)) w-full md:w-1/2 @else w-full @endif rounded-xl bg-black"
                                allowfullscreen>
                                <source src="http://media.urbe.university/_cdn/accounts-setup.mp4" type="video/mp4">
                                {{__("Your browser does not support the video tag.")}}
                            </video>
                        @endif

                        @if ($section->type == 'image')
                            <img src="{{ asset('storage/sections/'.$section->file)}}" alt="" class="rounded-xl w-full" style="height: 700px">
                        @endif

                        @if ($section->type == 'file')
                            <iframe src="{{ asset('storage/sections/pdf/'.$section->file) }}" frameborder="0" class="rounded-xl w-full" height="700"></iframe>
                        @endif

                        @if ($section->type == 'website')
                            <embed src="{{$section->url}}" type="text/html" class="w-full border rounded-xl" height="700">
                        @endif

                        @if ($section->type == 'text')
                            <div class="p-8 max-w-prose">
                                <div class="prose dark:prose-dark">
                                    {!! Str::of($section->content)->markdown() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Controls --}}
                <div class="w-full md:h-1/3 block mb-12">
                    <div class="w-full md:w-2/3 mx-auto rounded-xl p-8 bg-gradient-to-r from-blue-500 to-green-500 flex items-center justify-between mt-8">
                        <button wire:click="prev({{$section->position}})" class="flex-none h-12 w-12 rounded-full border bg-white bg-opacity-20 hover:bg-opacity-50 text-white transition">
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </div>
                        </button>

                        <div class="text-xl text-white tracking-wider font-bold flex-grow text-center">
                            {{$section->title}}
                        </div>

                        <button wire:click="next({{$section->position}})" class="flex-none h-12 w-12 rounded-full border bg-white bg-opacity-20 hover:bg-opacity-50 text-white transition">
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
