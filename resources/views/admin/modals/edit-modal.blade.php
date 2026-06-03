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
