<div
    id="addSubjectModal"
    class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>
                Add Subject
            </h2>

            <span
                class="close-btn"
                onclick="closeAddSubjectModal()">

                &times;

            </span>

        </div>

        <form
            action="{{ route('subjects.store') }}"
            method="POST">

            @csrf

            <input
                type="text"
                name="subject_code"
                placeholder="Subject Code"
                required>

            <input
                type="text"
                name="subject_title"
                placeholder="Subject Title"
                required>

            <input
                type="number"
                name="lec_hours"
                placeholder="Lecture Hours"
                required>

            <input
                type="number"
                name="lab_hours"
                placeholder="Laboratory Hours"
                required>

            <input
                type="number"
                name="units"
                placeholder="Units"
                required>

            <select
                name="year_level">

                <option value="1">First Year</option>

                <option value="2">Second Year</option>

                <option value="3">Third Year</option>

                <option value="4">Fourth Year</option>

            </select>

            <select
                name="semester">

                <option value="1">First Semester</option>

                <option value="2">Second Semester</option>

            </select>

            <input
                type="text"
                name="prerequisite"
                placeholder="Prerequisite (Example: CSIT102)"
                value="None">

            <button
                type="submit"
                class="btn approve">

                Save Subject

            </button>

        </form>

    </div>

</div>
