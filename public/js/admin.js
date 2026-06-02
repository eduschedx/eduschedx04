document.addEventListener("DOMContentLoaded", function () {

    document
        .getElementById("statusFilter")
        .addEventListener("change", function () {

            applyFilters();
            toggleApprovedView();

        });

    document
        .getElementById("departmentFilter")
        .addEventListener("change", applyFilters);

    document
        .getElementById("searchInput")
        .addEventListener("keyup", applyFilters);

    applyFilters();
    toggleApprovedView();

});

function filterStatus(status)
{
    document.getElementById(
        "statusFilter"
    ).value = status;

    applyFilters();
    toggleApprovedView();
}

function applyFilters()
{
    const status =
        document.getElementById(
            "statusFilter"
        ).value.toLowerCase();

    const department =
        document.getElementById(
            "departmentFilter"
        ).value.toLowerCase();

    const search =
        document.getElementById(
            "searchInput"
        ).value.toLowerCase();

    const rows =
        document.querySelectorAll(
            "#facultyTable tbody tr"
        );

    rows.forEach(row => {

        const rowStatus =
            row.dataset.status;

        const rowDepartment =
            row.dataset.department;

        const rowText =
            row.textContent.toLowerCase();

        const matchStatus =
            !status ||
            rowStatus === status;

        const matchDepartment =
            !department ||
            rowDepartment === department;

        const matchSearch =
            rowText.includes(search);

        if (
            matchStatus &&
            matchDepartment &&
            matchSearch
        ) {

            row.style.display = "";

        }
        else {

            row.style.display = "none";

        }

    });
}

function toggleApprovedView()
{
    const status =
        document.getElementById(
            "statusFilter"
        ).value.toLowerCase();

    const dateHeader =
        document.getElementById(
            "dateSubmittedHeader"
        );

    const dateCells =
        document.querySelectorAll(
            ".date-submitted-cell"
        );

    if (!dateHeader) return;

    if (status === "approved")
    {
        dateHeader.style.display = "none";

        dateCells.forEach(cell => {

            cell.style.display = "none";

        });
    }
    else
    {
        dateHeader.style.display = "";

        dateCells.forEach(cell => {

            cell.style.display = "";

        });
    }
}

function openRejectModal(
    url,
    facultyId,
    facultyName,
    facultyEmail
)
{
    document.getElementById(
        "rejectModal"
    ).style.display = "flex";

    document.getElementById(
        "confirmRejectBtn"
    ).href = url;

    document.getElementById(
        "modalFacultyId"
    ).textContent = facultyId;

    document.getElementById(
        "modalFacultyName"
    ).textContent = facultyName;

    document.getElementById(
        "modalFacultyEmail"
    ).textContent = facultyEmail;
}

function closeRejectModal()
{
    document.getElementById(
        "rejectModal"
    ).style.display = "none";
}

window.onclick = function(event)
{
    const modal =
        document.getElementById(
            "rejectModal"
        );

    if (
        modal &&
        event.target === modal
    ) {
        closeRejectModal();
    }
};

function openEditModal(
    id,
    facultyId,
    firstName,
    middleName,
    lastName,
    email,
    department,
    specialization
)
{
    document.getElementById(
        "editModal"
    ).style.display = "flex";

    document.getElementById(
        "editFacultyForm"
    ).action =
        "/admin/faculty/update/" + id;

    document.getElementById(
        "editFacultyId"
    ).value = facultyId;

    document.getElementById(
        "editEmail"
    ).value = email;

    document.getElementById(
        "editFirstName"
    ).value = firstName;

    document.getElementById(
        "editMiddleName"
    ).value = middleName;

    document.getElementById(
        "editLastName"
    ).value = lastName;

    document.getElementById(
        "editDepartment"
    ).value = department;

    document.getElementById(
        "editSpecialization"
    ).value = specialization;
}

function closeEditModal()
{
    document.getElementById(
        "editModal"
    ).style.display = "none";
}

function openConfirmModal()
{
    document.getElementById(
        "confirmEditModal"
    ).style.display = "flex";

    document.getElementById(
        "confirmFacultyId"
    ).textContent =
        document.getElementById(
            "editFacultyId"
        ).value;

    document.getElementById(
        "confirmFacultyName"
    ).textContent =
        document.getElementById(
            "editFirstName"
        ).value + " " +

        document.getElementById(
            "editLastName"
        ).value;
}

function closeConfirmModal()
{
    document.getElementById(
        "confirmEditModal"
    ).style.display = "none";
}

function submitEditForm()
{
    document.getElementById(
        "editFacultyForm"
    ).submit();
}
function toggleSidebar()
{
    document
        .querySelector('.sidebar')
        .classList
        .toggle('active');

    document
        .querySelector('.sidebar-overlay')
        .classList
        .toggle('active');
}
