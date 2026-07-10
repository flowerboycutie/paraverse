<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .pv-admin-section,
    .pv-admin-section * {
        box-sizing: border-box;
    }

    .pv-admin-section {
        --pv-primary: #4F46E5;
        --pv-primary-light: rgba(79, 70, 229, 0.12);
        --pv-text: #1A1A2E;
        --pv-muted: #888888;
        --pv-border: #DDE1E7;
        --pv-open-bg: #FFF3CD;
        --pv-open-text: #856404;
        --pv-done-bg: #D1E7DD;
        --pv-done-text: #0A3622;
        --pv-cancel-bg: #F8D7DA;
        --pv-cancel-text: #842029;

        font-family: 'Inter', Helvetica, Arial, sans-serif;
        color: var(--pv-text);
        padding: 32px 16px;
        width: 100%;
    }

    .pv-admin-wrap {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }

    /* Page heading */
    .pv-page-heading {
        margin-bottom: 24px;
    }

    .pv-page-heading h2 {
        font-weight: 700;
        font-size: 1.35rem;
        letter-spacing: -0.3px;
        margin: 0 0 4px 0;
    }

    .pv-page-heading p {
        color: var(--pv-muted);
        font-size: 0.9rem;
        margin: 0;
    }

    /* Summary cards */
    .pv-summary-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-bottom: 24px;
    }

    .pv-summary-card {
        border: none;
        border-radius: 10px;
        padding: 16px 20px;
        cursor: pointer;
        text-align: left;
        font-family: inherit;
        outline-offset: -2px;
    }

    .pv-summary-card:hover {
        opacity: 0.9;
    }

    .pv-summary-card.pv-active {
        outline: 2px solid currentColor;
    }

    .pv-summary-card .pv-sc-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0 0 4px 0;
    }

    .pv-summary-card .pv-sc-count {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
    }

    /* Filter bar */
    .pv-filter-card {
        background: #ffffff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
        padding: 12px 16px;
        margin-bottom: 24px;
    }

    .pv-filter-row {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    .pv-filter-search {
        flex: 1 1 240px;
    }

    .pv-filter-select {
        flex: 0 1 180px;
    }

    .pv-input {
        display: block;
        width: 100%;
        border: 1px solid var(--pv-border);
        border-radius: 7px;
        padding: 7px 12px;
        font-size: 0.8125rem;
        font-family: inherit;
        color: var(--pv-text);
        background-color: #ffffff;
    }

    .pv-input:focus {
        outline: none;
        border-color: var(--pv-primary);
        box-shadow: 0 0 0 3px var(--pv-primary-light);
    }

    .pv-reset-btn {
        flex: 0 0 auto;
        border: 1px solid var(--pv-border);
        background: #ffffff;
        color: var(--pv-text);
        border-radius: 7px;
        font-size: 0.75rem;
        font-weight: 500;
        padding: 7px 16px;
        cursor: pointer;
        font-family: inherit;
    }

    .pv-reset-btn:hover {
        background: #F8F9FB;
    }

    /* Table card */
    .pv-tickets-card {
        background: #ffffff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
        overflow: hidden;
    }

    .pv-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .pv-table {
        width: 100%;
        min-width: 760px;
        border-collapse: collapse;
        font-size: 0.875rem;
    }

    .pv-table thead tr {
        background: #F8F9FB;
    }

    .pv-table th {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--pv-muted);
        text-align: left;
        padding: 12px 16px;
        white-space: nowrap;
    }

    .pv-table th:first-child {
        padding-left: 24px;
    }

    .pv-table th:last-child {
        padding-right: 24px;
        text-align: right;
    }

    .pv-table td {
        padding: 14px 16px;
        border-top: 1px solid #F0F0F5;
        vertical-align: middle;
    }

    .pv-table td:first-child {
        padding-left: 24px;
    }

    .pv-table td:last-child {
        padding-right: 24px;
    }

    .pv-table tbody tr:hover {
        background: #FAFBFF;
    }

    .pv-id-cell {
        color: var(--pv-muted);
        font-size: 0.75rem;
        white-space: nowrap;
    }

    .pv-app-badge {
        display: inline-block;
        background: #EEF2FF;
        color: var(--pv-primary);
        font-size: 0.75rem;
        font-weight: 500;
        border-radius: 6px;
        padding: 4px 10px;
        white-space: nowrap;
    }

    .pv-submitted-cell {
        color: #3D3D5C;
        white-space: nowrap;
    }

    .pv-desc-cell {
        max-width: 320px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #555555;
    }

    .pv-status-badge {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 20px;
        padding: 3px 10px;
        white-space: nowrap;
    }

    .pv-action-cell {
        text-align: right;
        white-space: nowrap;
    }

    .pv-action-btn {
        display: inline-block;
        border: none;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 500;
        padding: 4px 12px;
        margin-left: 6px;
        cursor: pointer;
        font-family: inherit;
    }

    .pv-action-btn:hover {
        opacity: 0.8;
    }

    .pv-complete-btn {
        background: var(--pv-done-bg);
        color: var(--pv-done-text);
    }

    .pv-cancel-btn {
        background: var(--pv-cancel-bg);
        color: var(--pv-cancel-text);
    }

    .pv-reopen-btn {
        background: #F0F0F5;
        color: #888888;
    }

    .pv-empty-row td {
        text-align: center;
        padding: 48px 20px;
        color: var(--pv-muted);
        font-size: 0.875rem;
    }

    .pv-table-footer {
        padding: 12px 24px;
        font-size: 0.8125rem;
        color: var(--pv-muted);
        border-top: 1px solid #F0F0F5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
    }

    @media (max-width: 640px) {
        .pv-summary-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="pv-admin-section">
    <div class="pv-admin-wrap">

        <div class="pv-page-heading">
            <h2>Ticket management</h2>
            <p>Review and resolve submitted tickets across all Paraverse apps.</p>
        </div>

        <!-- Summary cards: click to filter by status -->
        <div class="pv-summary-row">
            <button type="button" class="pv-summary-card" data-status="Open" style="background: var(--pv-open-bg); color: var(--pv-open-text);">
                <p class="pv-sc-label">Open</p>
                <p class="pv-sc-count" id="pvCountOpen">0</p>
            </button>
            <button type="button" class="pv-summary-card" data-status="Completed" style="background: var(--pv-done-bg); color: var(--pv-done-text);">
                <p class="pv-sc-label">Completed</p>
                <p class="pv-sc-count" id="pvCountCompleted">0</p>
            </button>
            <button type="button" class="pv-summary-card" data-status="Cancelled" style="background: var(--pv-cancel-bg); color: var(--pv-cancel-text);">
                <p class="pv-sc-label">Cancelled</p>
                <p class="pv-sc-count" id="pvCountCancelled">0</p>
            </button>
        </div>

        <!-- Filters -->
        <div class="pv-filter-card">
            <div class="pv-filter-row">
                <div class="pv-filter-search">
                    <input type="text" id="pvSearchInput" class="pv-input" placeholder="Search by app, person, or description...">
                </div>
                <div class="pv-filter-select">
                    <select id="pvAppFilter" class="pv-input">
                        <option value="All Apps">All apps</option>
                        <!-- Options injected by ticket-admin.js from PARAVERSE_APPS -->
                    </select>
                </div>
                <div class="pv-filter-select">
                    <select id="pvStatusFilter" class="pv-input">
                        <option value="All">All statuses</option>
                        <option value="Open">Open</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="button" id="pvResetFilters" class="pv-reset-btn">Reset</button>
            </div>
        </div>

        <!-- Table -->
        <div class="pv-tickets-card">
            <div class="pv-table-wrap">
                <table class="pv-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Paraverse app</th>
                            <th>Submitted by</th>
                            <th>Description</th>
                            <th style="width: 110px;">Status</th>
                            <th style="width: 220px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pvTicketTableBody">
                        <!-- Rows injected by ticket-admin.js -->
                    </tbody>
                </table>
            </div>
            <div class="pv-table-footer">
                <span>Showing <strong id="pvVisibleCount">0</strong> of <strong id="pvTotalCount">0</strong> tickets</span>
                <span id="pvLastUpdated"></span>
            </div>
        </div>

    </div>
</section>

<script src="ticket-data.js"></script>
<script src="ticket-admin.js"></script>