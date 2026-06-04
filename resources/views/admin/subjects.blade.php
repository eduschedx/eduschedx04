@extends('layouts.admin-layout')

@section('title','Subject Management')

@section('content')

<div class="dashboard-header">

    <h1>
        Subject Management
    </h1>

    <p>
        Manage BSIT curriculum subjects
    </p>

</div>

@include(
    'admin.partials.subject-cards'
)

@include(
    'admin.partials.subject-table'
)

@include('admin.modals.curriculum-modal')

@include(
    'admin.modals.add-subject-modal'
)

@include(
    'admin.modals.edit-subject-modal'
)

@include(
    'admin.modals.import-curriculum-modal'
)

@include(
    'admin.modals.delete-subject-modal'
)
@endsection
