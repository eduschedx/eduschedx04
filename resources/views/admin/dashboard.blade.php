<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduSchedX Admin Dashboard</title>

    <link rel="stylesheet"
    href="{{ asset('css/admin.css') }}">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <div
    class="sidebar-overlay"
    onclick="toggleSidebar()">
</div>
<div class="mobile-header">

    <button
        class="menu-toggle"
        onclick="toggleSidebar()">

        <i class="fas fa-bars"></i>

    </button>

    <span>EduSchedX</span>

</div>
<div class="sidebar">

    <div class="logo">

        <i class="fas fa-graduation-cap"></i>

        <h2>EduSchedX</h2>

    </div>

    <div class="admin-card">

        <div class="avatar">

            <i class="fas fa-user-shield"></i>

        </div>

        <h4>

            {{ session('admin_name') }}

        </h4>

        <p>

            {{ session('admin_id') }}

        </p>

    </div>

    <ul class="menu">

        <li class="active">

            <i class="fas fa-chart-line"></i>

            Dashboard

        </li>


       <li>

            <a
                href="{{ route('logout') }}"
                class="logout-link">

                <i class="fas fa-sign-out-alt"></i>

                Logout

            </a>

        </li>

    </ul>

</div>

<div class="main">

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

    <div class="cards">

        <div
            class="card pending clickable-card"
            onclick="filterStatus('pending')">

            <i class="fas fa-user-clock"></i>

            <h2>{{ $pendingCount }}</h2>

            <p>Pending Applications</p>

        </div>

        <div
            class="card approved clickable-card"
            onclick="filterStatus('approved')">

            <i class="fas fa-user-check"></i>

            <h2>{{ $approvedCount }}</h2>

            <p>Approved Faculty</p>

        </div>

    </div>

    <div class="table-container">

        <div class="table-header">

            <h2>Faculty Applications</h2>

            <div class="table-filters">

                <select id="statusFilter">

                    <option value="">
                        All Status
                    </option>

                    <option value="pending">
                        Pending
                    </option>

                    <option value="approved">
                        Approved
                    </option>

                </select>

                <select id="departmentFilter">

                    <option value="">
                        All Departments
                    </option>

                    <option value="DIT">
                        DIT
                    </option>

                    <option value="DTE">
                        DTE
                    </option>

                    <option value="DAES">
                        DAES
                    </option>

                    <option value="DOA">
                        DOA
                    </option>

                </select>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search faculty...">

            </div>

        </div>

        <table id="facultyTable">

            <thead>

                <tr>

                    <th>Faculty ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Specialization</th>
                    <th id="dateSubmittedHeader">
                        Date Submitted
                    </th>

                    <th class="status-column">
                        Status
                    </th>

                    <th>
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

            @foreach($faculties as $faculty)

            <tr

                data-status="{{ strtolower($faculty->status) }}"

                data-department="{{ strtolower($faculty->department) }}"

            >

                <td>{{ $faculty->faculty_id }}</td>
                <td>

                    {{ $faculty->first_name }}

                    @if($faculty->middle_name)
                        {{ $faculty->middle_name }}
                    @endif

                    {{ $faculty->last_name }}

                </td>

                <td>

                    {{ $faculty->email }}

                </td>

                <td>{{ $faculty->department }}</td>

                <td>{{ $faculty->specialization }}</td>



                    <td class="date-submitted-cell">
                        {{ $faculty->created_at->format('M d, Y h:i A') }}
                    </td>



                <td>

                    <span
                        class="status {{ strtolower($faculty->status) }}">

                                                @if(
                            $faculty->status == 'approved'
                        )

                            @if(
                                $faculty->last_seen &&
                                $faculty->last_seen->diffInMinutes(now()) < 5
                            )

                           <span class="online">
                                <span class="online-dot"></span>
                                Offline
                            </span>

                            @else

                            <span class="offline">
                                <span class="offline-dot"></span>
                                Offline
                            </span>

                            @endif

                        @else

                            <span
                                class="status pending">

                                Pending

                            </span>

                        @endif

                    </span>

                </td>

                <td>

                    @if($faculty->status == 'pending')

                        <a
                            href="/admin/approve/{{ $faculty->id }}"
                            class="btn approve">

                            Approve

                        </a>

                        <a
                            href="#"
                            class="btn reject"
                            onclick="openRejectModal(
                                '/admin/reject/{{ $faculty->id }}'
                            )">

                            Reject

                        </a>

                    @elseif($faculty->status == 'approved')

               <button
                    class="btn edit-btn"
                    onclick="openEditModal(
                        '{{ $faculty->id }}',
                        '{{ $faculty->faculty_id }}',
                        '{{ $faculty->first_name }}',
                        '{{ $faculty->middle_name }}',
                        '{{ $faculty->last_name }}',
                        '{{ $faculty->email }}',
                        '{{ $faculty->department }}',
                        '{{ $faculty->specialization }}'
                    )">

                    Edit

                </button>

                    @endif

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- REJECT MODAL -->
<div id="rejectModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <i class="fas fa-exclamation-triangle"></i>

            <h3>Reject Faculty Application</h3>

        </div>

        <div class="faculty-details">

            <p>

                <strong>Faculty ID:</strong>

                <span id="modalFacultyId"></span>

            </p>

            <p>

                <strong>Name:</strong>

                <span id="modalFacultyName"></span>

            </p>

            <p>

                <strong>Email:</strong>

                <span id="modalFacultyEmail"></span>

            </p>

        </div>

        <p class="warning-text">

            This action will permanently remove the application.

        </p>

        <div class="modal-actions">

            <button
                class="cancel-btn"
                onclick="closeRejectModal()">

                Cancel

            </button>

            <a
                id="confirmRejectBtn"
                href="#"
                class="confirm-btn">

                Reject Application

            </a>

        </div>

    </div>

</div>

<div
    id="editModal"
    class="modal-overlay">

    <div class="modal-content">

        <h2>Edit Faculty Information</h2>

        <form
            id="editFacultyForm"
            method="POST">

            @csrf

            @method('PUT')

            <div class="form-group">

                <label>Faculty ID</label>

                <input
                    type="text"
                    id="editFacultyId"
                    readonly>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    id="editEmail"
                    readonly>

            </div>

            <div class="form-group">

                <label>First Name</label>

                <input
                    type="text"
                    name="first_name"
                    id="editFirstName"
                    required>

            </div>

            <div class="form-group">

                <label>Middle Name</label>

                <input
                    type="text"
                    name="middle_name"
                    id="editMiddleName">

            </div>

            <div class="form-group">

                <label>Last Name</label>

                <input
                    type="text"
                    name="last_name"
                    id="editLastName"
                    required>

            </div>

            <div class="form-group">

                <label>Department</label>

                <select
                    name="department"
                    id="editDepartment">

                    <option value="DIT">DIT</option>
                    <option value="DTE">DTE</option>
                    <option value="DAES">DAES</option>
                    <option value="DOA">DOA</option>

                </select>

            </div>

            <div class="form-group">

                <label>Specialization</label>

                <input
                    type="text"
                    name="specialization"
                    id="editSpecialization">

            </div>

            <div class="modal-buttons">

                <button
                    type="button"
                    class="btn cancel-btn"
                    onclick="closeEditModal()">

                    Cancel

                </button>

                <button
                    type="button"
                    class="btn save-btn"
                    onclick="openConfirmModal()">

                    Save Changes

                </button>

            </div>

        </form>

    </div>

</div>

<div id="confirmEditModal" class="modal-overlay">

    <div class="confirm-modal">

        <div class="confirm-header">

            <i class="fas fa-user-edit"></i>

            <h3>Confirm Faculty Update</h3>

        </div>

        <p class="confirm-text">

            You are about to update the following faculty profile:

        </p>

        <div class="confirm-info">

            <div class="info-item">

                <label>Faculty ID</label>

                <span id="confirmFacultyId"></span>

            </div>

            <div class="info-item">

                <label>Faculty Name</label>

                <span id="confirmFacultyName"></span>

            </div>

        </div>

        <p class="confirm-warning">

            Do you want to save these changes?

        </p>

        <div class="modal-buttons">

            <button
                type="button"
                class="btn cancel-btn"
                onclick="closeConfirmModal()">

                Cancel

            </button>

            <button
                type="button"
                class="btn save-btn"
                onclick="submitEditForm()">

                Save Changes

            </button>

        </div>

    </div>

</div>

<script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>

