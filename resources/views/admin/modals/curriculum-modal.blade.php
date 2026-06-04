<div
    id="curriculumModal"
    class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>
                BSIT Curriculum
            </h2>

            <span
                class="close-btn"
                onclick="closeCurriculumModal()">

                &times;

            </span>

        </div>

        <div
            id="yearCards"
            class="row g-4">

            <div class="col-md-6">

                <div
                    class="curriculum-year-card"
                    onclick="showSemesterCards(1)">

                    <i class="fas fa-book-open"></i>

                    <h4>First Year</h4>

                    <p>Foundation Courses</p>

                </div>

            </div>

            <div class="col-md-6">

                <div
                    class="curriculum-year-card"
                    onclick="showSemesterCards(2)">

                    <i class="fas fa-laptop-code"></i>

                    <h4>Second Year</h4>

                    <p>Core IT Courses</p>

                </div>

            </div>

            <div class="col-md-6">

                <div
                    class="curriculum-year-card"
                    onclick="showSemesterCards(3)">

                    <i class="fas fa-network-wired"></i>

                    <h4>Third Year</h4>

                    <p>Advanced IT Courses</p>

                </div>

            </div>

            <div class="col-md-6">

                <div
                    class="curriculum-year-card"
                    onclick="showSemesterCards(4)">

                    <i class="fas fa-user-graduate"></i>

                    <h4>Fourth Year</h4>

                    <p>Capstone & Practicum</p>

                </div>

            </div>

        </div>

        <div
            id="semesterCards"
            style="display:none;">

            <button
                type="button"
                class="btn btn-success mb-4"
                onclick="backToYears()">

                ← Back

            </button>

            <div class="row g-4">

                <div class="col-md-6">

                    <div
                        class="curriculum-sem-card"
                        id="sem1Card">

                        <i class="fas fa-calendar"></i>

                        <h4>1st Semester</h4>

                    </div>

                </div>

                <div class="col-md-6">

                    <div
                        class="curriculum-sem-card"
                        id="sem2Card">

                        <i class="fas fa-calendar-alt"></i>

                        <h4>2nd Semester</h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
