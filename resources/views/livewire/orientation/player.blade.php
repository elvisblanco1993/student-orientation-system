<div>
    <div class="max-w-5xl mx-auto py-8">
        <div class="px-4">
            {{-- Content --}}
            @if ($section->type == 'video')
                <video
                    controls
                    class="w-full rounded-xl bg-black"
                    allowfullscreen>
                    <source src="{{$section->url}}" type="video/mp4">
                    {{__("Your browser does not support the video tag.")}}
                </video>
            @endif

            @if ($section->type == 'image')
                <img src="{{ asset('storage/sections/'.$section->file)}}" alt="" class="rounded-xl w-full object-cover" style="height: 700px">
            @endif

            @if ($section->type == 'file')
                <iframe src="{{ asset('storage/sections/pdf/'.$section->file) }}" frameborder="0" class="rounded-xl w-full" height="700"></iframe>
            @endif

            @if ($section->type == 'website')
                <embed src="{{$section->url}}" type="text/html" class="w-full border rounded-xl" height="700">
            @endif

            @if ($section->type == 'text')
                <div class="max-w-full prose prose-blue">
                    {!! Str::of($section->content)->markdown() !!}
                </div>
            @endif

            @if ($section->type == 'question')
                <div class="">
                    <div class="text-2xl font-bold text-slate-600">
                        {{$section->question->question}}
                    </div>

                    <div class="">
                        @forelse ($section->question->answers as $answer)
                            <button class="w-full p-4 border rounded-lg mt-4 text-md font-semibold text-slate-500 cursor-pointer hover:bg-sky-100 hover:border-sky-200" onclick="checkAnswer({{$answer->id}})">{{$answer->content}}</button>
                        @empty

                        @endforelse
                    </div>

                    <script>
                        function checkAnswer($id) {
                            Livewire.emit('check_correct_answer');
                        }
                    </script>
                </div>
            @endif

            {{-- Controls --}}
            <div class="w-full rounded-2xl p-4 bg-gradient-to-t from-blue-600 to-blue-500 flex items-center justify-between my-8">
                <button wire:click="prev({{$section->position}})" class="flex-none h-12 w-12 rounded-full border bg-white bg-opacity-20 hover:bg-opacity-50 text-white transition">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                </button>

                <div class="sm:text-xl text-white tracking-wider font-bold flex-grow text-center">
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

            @if(!empty($section->content) && ($section->type !== 'text' && $section->type !== 'question'))
                <div class="w-full p-4">
                    <div class="max-w-full prose prose-sm prose-blue">
                        {!! Str::of($section->content)->markdown() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
