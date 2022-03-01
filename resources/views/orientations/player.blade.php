@extends('layouts.player')

@section('content')
    <div class="max-w-full px-4 py-2 border-b">
        <div class="flex items-center justify-between">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4">
                    <x-jet-application-mark class="block h-9 w-auto"/>
                    <span class="hidden sm:block font-semibold text-slate-600">{{$orientation->name}}</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('dashboard') }}" title="{{__('Exit orientation and contniue later.')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-indigo-500 transition" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @livewire('orientation.player', ['orientation' => $orientation])
@endsection
