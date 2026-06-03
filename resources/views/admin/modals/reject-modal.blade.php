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
