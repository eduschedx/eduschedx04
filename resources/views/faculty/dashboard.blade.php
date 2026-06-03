@extends('faculty.layouts.faculty-layout')

@section('title','Faculty Dashboard')

@section('content')

    @include(
        'faculty.partials.dashboard-cards'
    )

    @include(
    'faculty.partials.schedule-grid'
)

@endsection
