<div class="table-container">

    <div class="table-header">

        <h2 id="tableTitle">
            Pending Applications
        </h2>

        <div class="table-filters">

            <select id="statusFilter">

                <option value="">
                    All Status
                </option>

                <option value="pending" selected>
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
            data-department="{{ strtolower($faculty->department) }}">

            <td>{{ $faculty->faculty_id }}</td>

            <td>

                {{ $faculty->first_name }}

                @if($faculty->middle_name)
                    {{ $faculty->middle_name }}
                @endif

                {{ $faculty->last_name }}

            </td>

            <td>{{ $faculty->email }}</td>

            <td>{{ $faculty->department }}</td>

            <td>{{ $faculty->specialization }}</td>

            <td class="date-submitted-cell">
                {{ $faculty->created_at->timezone('Asia/Manila')->format('F d, Y • h:i A') }}
            </td>

            <td>

                @if($faculty->status == 'approved')

                    @if(
                        $faculty->last_seen &&
                        $faculty->last_seen->diffInMinutes(now()) < 5
                    )

                        <span class="online">
                            <span class="online-dot"></span>
                            Online
                        </span>

                    @else

                        <span class="offline">
                            <span class="offline-dot"></span>
                            Offline
                        </span>

                    @endif

                @else

                    <span class="status pending">
                        Pending
                    </span>

                @endif

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
                            '/admin/reject/{{ $faculty->id }}',
                            '{{ $faculty->faculty_id }}',
                            '{{ $faculty->first_name }} {{ $faculty->last_name }}',
                            '{{ $faculty->email }}'
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


