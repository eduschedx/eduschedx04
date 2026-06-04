/* =========================
   ADD SUBJECT MODAL
========================= */

function openAddSubjectModal()
{
    document
        .getElementById(
            'addSubjectModal'
        )
        .style.display =
            'flex';
}

function closeAddSubjectModal()
{
    document
        .getElementById(
            'addSubjectModal'
        )
        .style.display =
            'none';
}

/* =========================
   SEARCH SUBJECT
========================= */

document.addEventListener(
    "DOMContentLoaded",
    function ()
    {
        const searchInput =
            document.getElementById(
                "subjectSearch"
            );

        if(searchInput)
        {
            searchInput.addEventListener(
                "keyup",
                searchSubjects
            );
        }
    }
);

function searchSubjects()
{
    const search =
        document
            .getElementById(
                "subjectSearch"
            )
            .value
            .toLowerCase();

    const rows =
        document.querySelectorAll(
            "#subjectTable tbody tr"
        );

    rows.forEach(row =>
    {
        const text =
            row.textContent
                .toLowerCase();

        row.style.display =
            text.includes(search)
            ? ""
            : "none";
    });
}

/* =========================
   YEAR FILTER
========================= */

function filterYear(year)
{
    const rows =
        document.querySelectorAll(
            "#subjectTable tbody tr"
        );

    rows.forEach(row =>
    {
        if(
            year === "all" ||
            row.dataset.year === year
        )
        {
            row.style.display = "";
        }
        else
        {
            row.style.display = "none";
        }
    });
}

function openEditSubjectModal(
    id,
    code,
    title,
    lec,
    lab,
    units,
    year,
    semester,
    prerequisite
)
{
    document
        .getElementById(
            'editSubjectModal'
        )
        .style.display = 'flex';

    document
        .getElementById(
            'edit_subject_code'
        )
        .value = code;

    document
        .getElementById(
            'edit_subject_title'
        )
        .value = title;

    document
        .getElementById(
            'edit_lec_hours'
        )
        .value = lec;

    document
        .getElementById(
            'edit_lab_hours'
        )
        .value = lab;

    document
        .getElementById(
            'edit_units'
        )
        .value = units;

    document
        .getElementById(
            'editSubjectForm'
        )
        .action =
        '/admin/subjects/update/' + id;
    document
    .getElementById('edit_prerequisite')
    .value = prerequisite;
}

function closeEditSubjectModal()
{
    document
        .getElementById(
            'editSubjectModal'
        )
        .style.display = 'none';
}

function openDeleteSubjectModal(
    id,
    title
)
{
    document
        .getElementById(
            'deleteSubjectModal'
        )
        .style.display =
            'flex';

    document
        .getElementById(
            'deleteSubjectText'
        )
        .innerHTML =
        'Are you sure you want to delete <b>' +
        title +
        '</b>?';

    document
        .getElementById(
            'deleteSubjectForm'
        )
        .action =
        '/admin/subjects/delete/' + id;
}

function closeDeleteSubjectModal()
{
    document
        .getElementById(
            'deleteSubjectModal'
        )
        .style.display =
            'none';
}

function filterYear(year)
{
    const rows =
        document.querySelectorAll(
            "#subjectTable tbody tr"
        );

    rows.forEach(row =>
    {
        if(
            row.dataset.year === year
        )
        {
            row.style.display = "";
        }
        else
        {
            row.style.display = "none";
        }
    });
}

function showAllSubjects()
{
    const rows =
        document.querySelectorAll(
            "#subjectTable tbody tr"
        );

    rows.forEach(row =>
    {
        row.style.display = "";
    });
}

function openCurriculumModal()
{
    document
        .getElementById('curriculumModal')
        .style.display = 'flex';
}

function closeCurriculumModal()
{
    document
        .getElementById('curriculumModal')
        .style.display = 'none';
}

let selectedYear = null;

function showSemesterCards(year)
{
    selectedYear = year;

    document
        .getElementById('yearCards')
        .style.display = 'none';

    document
        .getElementById('semesterCards')
        .style.display = 'block';

    document
        .getElementById('sem1Card')
        .setAttribute(
            'onclick',
            `filterYearSemester(${year},1)`
        );

    document
        .getElementById('sem2Card')
        .setAttribute(
            'onclick',
            `filterYearSemester(${year},2)`
        );
}

function backToYears()
{
    document
        .getElementById('semesterCards')
        .style.display = 'none';

    document
        .getElementById('yearCards')
        .style.display = 'flex';
}

function filterYearSemester(
    year,
    semester
)
{
    const rows =
        document.querySelectorAll(
            '#subjectTable tbody tr'
        );

    rows.forEach(row =>
    {
        const rowYear =
            row.children[5]
            .textContent.trim();

        const rowSemester =
            row.children[6]
            .textContent.trim();

        if(
            rowYear == year &&
            rowSemester == semester
        )
        {
            row.style.display = '';
        }
        else
        {
            row.style.display = 'none';
        }
    });

    closeCurriculumModal();
}

function openImportModal()
{
    document
        .getElementById('importModal')
        .style.display = 'flex';
}

function closeImportModal()
{
    document
        .getElementById('importModal')
        .style.display = 'none';
}

