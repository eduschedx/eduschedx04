<div class="header">

    <h1>
        Faculty Dashboard
    </h1>

    <p>
        Welcome back,
        {{ session('faculty_name') }}
    </p>

</div>

<div class="cards">

    <div class="card">

        <i class="fas fa-book"></i>

        <h2>
            {{ $subjectCount ?? 0 }}
        </h2>

        <p>
            Assigned Subjects
        </p>

    </div>

    <div class="card">

        <i class="fas fa-clock"></i>

        <h2>
            {{ $weeklyHours ?? 0 }}
        </h2>

        <p>
            Weekly Hours
        </p>

    </div>

    <div class="card">

        <i class="fas fa-calendar-week"></i>

        <h2>
            {{ $scheduleCount ?? 0 }}
        </h2>

        <p>
            Schedule Entries
        </p>

    </div>

</div>
