<div
    id="deleteSubjectModal"
    class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>

                Delete Subject

            </h2>

            <span
                class="close-btn"
                onclick="closeDeleteSubjectModal()">

                &times;

            </span>

        </div>

        <p id="deleteSubjectText">

        </p>

        <form
            id="deleteSubjectForm"
            method="POST">

            @csrf

            @method('DELETE')

            <button
                type="submit"
                class="delete-btn">

                Delete Subject

            </button>

        </form>

    </div>

</div>
