<div class="sidebar">

    <div class="logo">

        <i class="fas fa-graduation-cap"></i>

        <h2>EduSchedX</h2>

    </div>

    <div class="admin-card">

        <div class="profile-avatar">

            {{ strtoupper(substr(session('admin_name'),0,1)) }}

        </div>

        <h4>
            {{ session('admin_name') }}
        </h4>

        <p>
            Administrator
        </p>

    </div>

    <ul class="menu">

        <li class="active">

            <i class="fas fa-chart-line"></i>

            Dashboard

        </li>

        <li>

            <a
                href="{{ route('logout') }}"
                class="logout-link">

                <i class="fas fa-sign-out-alt"></i>

                Logout

            </a>

        </li>

    </ul>

</div>
