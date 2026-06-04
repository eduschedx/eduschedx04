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

    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

        <a href="{{ route('dashboard') }}" class="logout-link">

            <i class="fas fa-chart-line"></i>

            Dashboard

        </a>

    </li>

    <li class="{{ request()->routeIs('subjects.*') ? 'active' : '' }}">

        <a href="{{ route('subjects.index') }}" class="logout-link">

            <i class="fas fa-book"></i>

            Subject Management

        </a>

    </li>

    <li class="{{ request()->routeIs('faculty-subjects.*') ? 'active' : '' }}">

    <a href="{{ route('faculty-subjects.index') }}">

        <i class="fas fa-link"></i>

        Faculty Subject Assignment

    </a>

</li>

    <li>

        <a href="{{ route('logout') }}" class="logout-link">

            <i class="fas fa-sign-out-alt"></i>

            Logout

        </a>

    </li>

</ul>
</div>
