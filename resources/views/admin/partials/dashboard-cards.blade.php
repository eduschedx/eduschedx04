<div class="cards">

    <div
        class="card pending clickable-card"
        onclick="filterStatus('pending')">

        <i class="fas fa-user-clock"></i>

        <h2>{{ $pendingCount }}</h2>

        <p>Pending Applications</p>

    </div>

    <div
        class="card approved clickable-card"
        onclick="filterStatus('approved')">

        <i class="fas fa-user-check"></i>

        <h2>{{ $approvedCount }}</h2>

        <p>Approved Faculty</p>

    </div>

</div>
