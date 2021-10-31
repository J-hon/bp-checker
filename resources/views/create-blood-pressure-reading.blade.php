@extends('layouts.base')

@section('main')
    @livewire('create-blood-pressure-reading', compact('patient_id'))
@endsection
