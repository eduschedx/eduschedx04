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
