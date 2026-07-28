<!-- ticket-admin.php -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

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

    /* App logo column — fixed size so every logo displays uniformly,
       regardless of the source image's actual dimensions. Logos are
       landscape (icon + text side by side), so the box is wide and
       short rather than square. */
    .pv-app-cell {
        text-align: left;
        white-space: nowrap;
    }

    .pv-app-logo {
        width: 140px;
        height: 36px;
        object-fit: contain;
        object-position: left center;
        display: inline-block;
        vertical-align: middle;
    }

    /* Submitted By column — avatar on the left, name + role badge
       stacked on the right. */
    .pv-submitted-cell {
        white-space: nowrap;
    }

    .pv-user-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pv-user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        background: #F8F9FB;
        border: 1px solid var(--pv-border);
    }

    .pv-user-info {
        display: flex;
        flex-direction: column;
        gap: 3px;
        min-width: 0;
    }

    .pv-user-name {
        font-size: 0.8125rem;
        font-weight: 600;
        color: var(--pv-text);
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .pv-user-role-badge {
        display: inline-block;
        width: fit-content;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        padding: 1px 8px;
        border-radius: 10px;
        line-height: 1.5;
    }

    .pv-role-student {
        background: #E0E7FF;
        color: #4338CA;
    }

    .pv-role-associate {
        background: #FEF3C7;
        color: #92400E;
    }

    .pv-desc-cell {
        max-width: 320px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #555555;
    }

    /* Details column — far right, opens the description popup. */
    .pv-details-cell {
        text-align: left;
        white-space: nowrap;
    }

    .pv-details-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        border: none;
        background: transparent;
        color: var(--pv-primary);
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        padding: 4px 10px;
        border-radius: 6px;
        font-family: inherit;
        white-space: nowrap;
    }

    .pv-details-btn:hover {
        background: var(--pv-primary-light);
    }

    /* Ticket details modal */
    .pv-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(26, 26, 46, 0.55);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    .pv-modal-overlay.pv-modal-open {
        display: flex;
    }

    .pv-modal {
        background: #ffffff;
        border-radius: 12px;
        max-width: 480px;
        width: 100%;
        max-height: 85vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        font-family: 'Inter', Helvetica, Arial, sans-serif;
    }

    .pv-modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #F0F0F5;
    }

    .pv-modal-header h5 {
        display: flex;
        align-items: center;
        margin: 0;
        min-width: 0;
    }

    .pv-modal-close {
        border: none;
        background: transparent;
        color: var(--pv-muted);
        font-size: 1.25rem;
        line-height: 1;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 6px;
        flex-shrink: 0;
        margin-left: 12px;
    }

    .pv-modal-close:hover {
        background: #F8F9FB;
    }

    .pv-modal-body {
        padding: 20px;
        overflow-y: auto;
    }

    .pv-modal-row {
        margin-bottom: 18px;
    }

    .pv-modal-row:last-child {
        margin-bottom: 0;
    }

    .pv-modal-label {
        display: block;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--pv-muted);
        margin-bottom: 8px;
    }

    .pv-modal-description {
        font-size: 0.875rem;
        color: var(--pv-text);
        line-height: 1.6;
        margin: 0;
        white-space: pre-wrap;
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
        text-align: left;
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

    /* Header cells have Bootstrap's p-0 utility class in the markup
       (zero padding), while body cells get their spacing from
       Metronic's gs-0/gy-3 table classes — this overrides both so
       header and body cells match exactly. */
    #pvTicketTable thead th {
        padding: 12px 16px !important;
    }

    #pvTicketTable tbody td {
        padding: 14px 16px;
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
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Ticket list</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">All submitted Paraverse tickets</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="pvTicketTable" class="table align-middle gs-0 gy-3">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="p-0 w-50px">#</th>
                                <th class="p-0 min-w-175px">Paraverse app</th>
                                <th class="p-0 min-w-200px">Submitted by</th>
                                <th class="p-0 min-w-190px">Status</th>
                                <th class="p-0 min-w-220px">Action</th>
                                <th class="p-0 min-w-140px">Details</th>
                            </tr>
                        </thead>
                        <tbody id="pvTicketTableBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="pv-table-footer">
                <span>Showing <strong id="pvVisibleCount">0</strong> of <strong id="pvTotalCount">0</strong> tickets</span>
                <span id="pvLastUpdated"></span>
            </div>
        </div>

    </div>
</section>

<!-- Ticket details modal, shared across all rows -->
<div class="pv-modal-overlay" id="pvDetailsModalOverlay">
    <div class="pv-modal">
        <div class="pv-modal-header">
            <h5 id="pvModalTicketApp">Ticket details</h5>
            <button type="button" class="pv-modal-close" id="pvModalCloseBtn" aria-label="Close">&times;</button>
        </div>
        <div class="pv-modal-body">
            <div class="pv-modal-row">
                <span class="pv-modal-label">Submitted by</span>
                <div id="pvModalSubmittedBy"></div>
            </div>
            <div class="pv-modal-row">
                <span class="pv-modal-label">Status</span>
                <div id="pvModalStatus"></div>
            </div>
            <div class="pv-modal-row">
                <span class="pv-modal-label">Description</span>
                <p class="pv-modal-description" id="pvModalDescription"></p>
            </div>
        </div>
    </div>
</div>

<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="ticket-data.js?v=<?= time() ?>"></script>
<script src="ticket-admin.js?v=<?= time() ?>"></script>