@extends('layouts.player')

@section('content')
    @livewire('orientation.player', ['orientation' => $orientation])
@endsection
