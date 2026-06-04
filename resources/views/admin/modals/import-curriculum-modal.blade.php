<div
    id="importModal"
    class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>

                Import Curriculum

            </h2>

            <span
                class="close-btn"
                onclick="closeImportModal()">

                &times;

            </span>

        </div>

        <form
    action="{{ route('subjects.import') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="form-group">

        <label>
            Upload Curriculum Excel
        </label>

        <input
            type="file"
            name="curriculum_file"
            accept=".xlsx,.csv"
            required>

    </div>

    <button
        type="submit"
        class="btn add-subject-btn">

        Import Curriculum

    </button>

</form>

    </div>

</div>
