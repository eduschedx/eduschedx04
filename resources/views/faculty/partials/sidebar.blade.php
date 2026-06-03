<div class="sidebar">

    <div class="logo">

        <i class="fas fa-graduation-cap"></i>

        <h2>EduSchedX</h2>

    </div>

    <div class="faculty-card">

        <div class="profile-avatar">

            {{ strtoupper(substr(session('faculty_name') ?? 'F',0,1)) }}

        </div>

        <h4>

            {{ session('faculty_name') }}

        </h4>

        <p>

            Faculty Member

        </p>

    </div>

    <ul class="menu">

        <li class="active">

            <i class="fas fa-home"></i>

            Dashboard

        </li>

        <li>

            <i class="fas fa-book"></i>

            My Subjects

        </li>

        <li>

            <i class="fas fa-calendar-alt"></i>

            My Schedule

        </li>

        <li>

            <i class="fas fa-user"></i>

            My Profile

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
