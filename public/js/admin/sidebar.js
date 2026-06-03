function toggleSidebar()
{
    const sidebar =
        document.querySelector('.sidebar');

    const overlay =
        document.querySelector('.sidebar-overlay');

    const menuIcon =
        document.getElementById('menuIcon');

    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');

    if(
        sidebar.classList.contains(
            'active'
        )
    )
    {
        menuIcon.classList.remove(
            'fa-bars'
        );

        menuIcon.classList.add(
            'fa-times'
        );
    }
    else
    {
        menuIcon.classList.remove(
            'fa-times'
        );

        menuIcon.classList.add(
            'fa-bars'
        );
    }
}

document
    .querySelector(
        '.sidebar-overlay'
    )
    ?.addEventListener(
        'click',
        function ()
        {
            const sidebar =
                document.querySelector(
                    '.sidebar'
                );

            sidebar.classList.remove(
                'active'
            );

            this.classList.remove(
                'active'
            );

            document
                .getElementById(
                    'menuIcon'
                )
                ?.classList.replace(
                    'fa-times',
                    'fa-bars'
                );
        }
    );
