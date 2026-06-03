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
        ).value +
        " " +
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
