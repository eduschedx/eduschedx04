<div class="table-container">

  <div class="table-header">

    <h2>
        BSIT Curriculum Subjects
    </h2>

    <div class="header-actions">

      <button
    class="add-subject-btn import-btn"
    onclick="openImportModal()">

    <i class="fas fa-file-import"></i>

    Import Curriculum

</button>

        <button
            class="btn add-subject-btn"
            onclick="openAddSubjectModal()">

            <i class="fas fa-plus"></i>

            Add Subject

        </button>

    </div>

</div>

    <div class="search-wrapper">

    <i class="fas fa-search"></i>

    <input
        type="text"
        id="subjectSearch"
        placeholder="Search Subject">

</div>
    <table id="subjectTable">

        <thead>

            <tr>

                <th>Code</th>

                <th>Subject Title</th>

                <th>Lec</th>

                <th>Lab</th>

                <th>Units</th>

                <th>Year</th>

                <th>Semester</th>

                <th>Prerequisite</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($subjects as $subject)

            <tr
                data-year="{{ $subject->year_level }}">

                <td>
                    {{ $subject->subject_code }}
                </td>

                <td>
                    {{ $subject->subject_title }}
                </td>

                <td>
                    {{ $subject->lec_hours }}
                </td>

                <td>
                    {{ $subject->lab_hours }}
                </td>

                <td>
                    {{ $subject->units }}
                </td>

                <td>
                    {{ $subject->year_level }}
                </td>

                <td>
                    {{ $subject->semester }}
                </td>

                <td>
                    {{ $subject->prerequisite ?? 'None' }}
                </td>

                <td>

                    <button
    class="btn edit-btn"

    onclick="openEditSubjectModal(

        '{{ $subject->id }}',

        '{{ $subject->subject_code }}',

        '{{ $subject->subject_title }}',

        '{{ $subject->lec_hours }}',

        '{{ $subject->lab_hours }}',

        '{{ $subject->units }}',

        '{{ $subject->year_level }}',

        '{{ $subject->semester }}',

        '{{ $subject->prerequisite }}'

    )">

    Edit

</button>

            <button
                class="btn delete-btn"
                onclick="openDeleteSubjectModal(
                    '{{ $subject->id }}',
                    '{{ $subject->subject_title }}'
                )">

                Delete

            </button>
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>
