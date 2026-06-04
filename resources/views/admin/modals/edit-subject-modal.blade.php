<div
    id="editSubjectModal"
    class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>
                Edit Subject
            </h2>

            <span
                class="close-btn"
                onclick="closeEditSubjectModal()">

                &times;

            </span>

        </div>

        <form
            id="editSubjectForm"
            method="POST">

            @csrf

            @method('PUT')

            <input
                type="text"
                id="edit_subject_code"
                name="subject_code">

            <input
                type="text"
                id="edit_subject_title"
                name="subject_title">

            <input
                type="number"
                id="edit_lec_hours"
                name="lec_hours">

            <input
                type="number"
                id="edit_lab_hours"
                name="lab_hours">

            <input
                type="number"
                id="edit_units"
                name="units">

            <select
                id="edit_year_level"
                name="year_level">

                <option value="1">First Year</option>

                <option value="2">Second Year</option>

                <option value="3">Third Year</option>

                <option value="4">Fourth Year</option>

            </select>

            <select
                id="edit_semester"
                name="semester">

                <option value="1">First Semester</option>

                <option value="2">Second Semester</option>

            </select>

            <input
                type="text"
                id="edit_prerequisite"
                name="prerequisite"
                placeholder="Prerequisite">

            <button
                type="submit"
                class="btn add-subject-btn">

                Update Subject

            </button>

        </form>

    </div>

</div>
