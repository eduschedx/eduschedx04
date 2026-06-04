@extends('layouts.admin-layout')

@section('title','Admin Dashboard')

@section('content')

@if(session('success'))

<div class="alert-success">

    <i class="fas fa-check-circle"></i>

    {{ session('success') }}

</div>

@endif

<div class="header">

    <h1>Admin Dashboard</h1>

    <p>Faculty Approval Management</p>

</div>

@include('admin.partials.dashboard-cards')

@include('admin.partials.faculty-table')

@include('admin.modals.reject-modal')


@endsection

