function filterStatus(status)
{
    document.getElementById(
        "statusFilter"
    ).value = status;

    const tableTitle =
        document.getElementById(
            "tableTitle"
        );

    if(status === "pending")
    {
        tableTitle.textContent =
            "Pending Applications";
    }
    else if(status === "approved")
    {
        tableTitle.textContent =
            "Approved Faculty";
    }
    else if(status === "rejected")
    {
        tableTitle.textContent =
            "Rejected Applications";
    }
    else
    {
        tableTitle.textContent =
            "Faculty Applications";
    }

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

        row.style.display =
            (
                matchStatus &&
                matchDepartment &&
                matchSearch
            )
            ? ""
            : "none";
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
