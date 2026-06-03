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
