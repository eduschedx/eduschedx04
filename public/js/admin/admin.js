/* =========================
   SIDEBAR
========================= */

function toggleSidebar()
{
    const sidebar =
        document.querySelector('.sidebar');

    const overlay =
        document.querySelector('.sidebar-overlay');

    if(sidebar)
    {
        sidebar.classList.toggle('active');
    }

    if(overlay)
    {
        overlay.classList.toggle('active');
    }
}

/* =========================
   PAGE LOAD
========================= */

document.addEventListener(
    "DOMContentLoaded",
    function ()
    {
        const statusFilter =
            document.getElementById(
                "statusFilter"
            );

        const departmentFilter =
            document.getElementById(
                "departmentFilter"
            );

        const searchInput =
            document.getElementById(
                "searchInput"
            );

        /* Default View = Pending */

        if(statusFilter)
        {
            statusFilter.value =
                "pending";
        }

        /* Events */

        if(statusFilter)
        {
            statusFilter.addEventListener(
                "change",
                function ()
                {
                    applyFilters();
                    updateTableTitle();
                    toggleApprovedView();
                }
            );
        }

        if(departmentFilter)
        {
            departmentFilter.addEventListener(
                "change",
                applyFilters
            );
        }

        if(searchInput)
        {
            searchInput.addEventListener(
                "keyup",
                applyFilters
            );
        }

        updateTableTitle();
        applyFilters();
        toggleApprovedView();
    }
);

/* =========================
   CARD FILTER
========================= */

function filterStatus(status)
{
    const statusFilter =
        document.getElementById(
            "statusFilter"
        );

    if(statusFilter)
    {
        statusFilter.value = status;
    }

    updateTableTitle();
    applyFilters();
    toggleApprovedView();
}

/* =========================
   TABLE TITLE
========================= */

function updateTableTitle()
{
    const title =
        document.getElementById(
            "tableTitle"
        );

    const statusFilter =
        document.getElementById(
            "statusFilter"
        );

    if(!title || !statusFilter)
    {
        return;
    }

    const status =
        statusFilter.value
        .toLowerCase();

    if(status === "pending")
    {
        title.textContent =
            "Pending Applications";
    }
    else if(
        status === "approved"
    )
    {
        title.textContent =
            "Approved Faculty";
    }
    else
    {
        title.textContent =
            "Faculty Applications";
    }
}

/* =========================
   FILTER TABLE
========================= */

function applyFilters()
{
    const status =
        document
            .getElementById(
                "statusFilter"
            )
            ?.value
            .toLowerCase();

    const department =
        document
            .getElementById(
                "departmentFilter"
            )
            ?.value
            .toLowerCase();

    const search =
        document
            .getElementById(
                "searchInput"
            )
            ?.value
            .toLowerCase();

    const rows =
        document.querySelectorAll(
            "#facultyTable tbody tr"
        );

    rows.forEach(row =>
    {
        const rowStatus =
            row.dataset.status;

        const rowDepartment =
            row.dataset.department;

        const rowText =
            row.textContent
                .toLowerCase();

        const matchStatus =
            !status ||
            rowStatus === status;

        const matchDepartment =
            !department ||
            rowDepartment ===
                department;

        const matchSearch =
            !search ||
            rowText.includes(search);

        if(
            matchStatus &&
            matchDepartment &&
            matchSearch
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

/* =========================
   APPROVED VIEW
========================= */

function toggleApprovedView()
{
    const status =
        document
            .getElementById(
                "statusFilter"
            )
            ?.value
            .toLowerCase();

    const dateHeader =
        document.getElementById(
            "dateSubmittedHeader"
        );

    const dateCells =
        document.querySelectorAll(
            ".date-submitted-cell"
        );

    if(status === "approved")
    {
        if(dateHeader)
        {
            dateHeader.style.display =
                "none";
        }

        dateCells.forEach(cell =>
        {
            cell.style.display =
                "none";
        });
    }
    else
    {
        if(dateHeader)
        {
            dateHeader.style.display =
                "";
        }

        dateCells.forEach(cell =>
        {
            cell.style.display =
                "";
        });
    }
}
