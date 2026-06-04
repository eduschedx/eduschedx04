@extends('layouts.admin-layout')

@section('title','Faculty Subject Assignment')

@section('styles')

<link
    rel="stylesheet"
    href="{{ asset('css/admin/faculty-subjects.css') }}">

@endsection

@section('content')
@if(session('success'))

<div class="alert alert-success mb-4">

    {{ session('success') }}

</div>

@endif
<div class="dashboard-header">

    <h1>
        Faculty Subject Assignment
    </h1>

    <p>
        Assign subjects to faculty members
    </p>

</div>

<form
    action="{{ route('faculty-subjects.store') }}"
    method="POST">

    @csrf

    <!-- FACULTY CARD -->

    <div class="card shadow-sm border-0 mb-4">

        <div
            class="card-header text-white"
            style="
                background:linear-gradient(
                    90deg,
                    #17321A,
                    #146939
                );
            ">

            <h5 class="mb-0">

                <i class="fas fa-user-tie me-2"></i>

                Select Faculty

            </h5>

        </div>

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <label class="form-label fw-bold">

                        Faculty Member

                    </label>

                    <select
                        name="faculty_id"
                        class="form-select"
                        required>

                        <option value="">

                            Select Faculty

                        </option>

                        @foreach($faculties as $faculty)

                        <option value="{{ $faculty->id }}">

                            {{ $faculty->first_name }}
                            {{ $faculty->last_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-4">

                    <div
                        class="alert alert-success mt-4 mb-0">

                        <i class="fas fa-info-circle me-2"></i>

                        Select a faculty member
                        to assign subjects.

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- SUBJECTS CARD -->

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5
                class="mb-0 fw-bold"
                style="color:#146939;">

                <i class="fas fa-book-open me-2"></i>

                Available Subjects

            </h5>

        </div>

        <div class="card-body p-0">

            @foreach($subjects as $subject)

            <div
                class="
                subject-row
                d-flex
                justify-content-between
                align-items-center
                p-3
                border-bottom">

                <div>

                    <input
                        type="checkbox"
                        name="subjects[]"
                        value="{{ $subject->id }}"
                        class="form-check-input me-3">

                    <span class="subject-code">

                        {{ $subject->subject_code }}

                    </span>

                    {{ $subject->subject_title }}

                </div>

                <span class="subject-units">

                    {{ $subject->units }}
                    Units

                </span>

            </div>

            @endforeach

        </div>

        <div class="card-footer bg-white">

            <button
                type="submit"
                class="assign-btn">

                <i class="fas fa-paper-plane me-2"></i>

                Assign Subjects

            </button>

        </div>

    </div>

</form>

@endsection
