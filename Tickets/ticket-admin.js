// ticket-admin.js

$(function () {
    PARAVERSE_TICKETS.seedIfEmpty(); // remove this once real data comes from backend

    // --- Element refs -----------------------------------------------------
    const $searchInput = $("#pvSearchInput");
    const $appFilter = $("#pvAppFilter");
    const $statusFilter = $("#pvStatusFilter");
    const $resetBtn = $("#pvResetFilters");
    const $ticketTable = $("#pvTicketTable");
    const $tableBody = $("#pvTicketTableBody");
    const $visibleCountEl = $("#pvVisibleCount");
    const $totalCountEl = $("#pvTotalCount");
    const $lastUpdatedEl = $("#pvLastUpdated");
    const $countOpenEl = $("#pvCountOpen");
    const $countCompletedEl = $("#pvCountCompleted");
    const $countCancelledEl = $("#pvCountCancelled");
    const $summaryCards = $(".pv-summary-card");

    let filterApp = "All Apps";
    let filterStatus = "All";
    let searchText = "";
    let ticketDataTable = null;

    function initializeTicketTable() {
        if (ticketDataTable || typeof $.fn.DataTable !== "function") {
            return;
        }

        ticketDataTable = $ticketTable.DataTable({
            ordering: true,
            order: [[0, "asc"]],
            pageLength: 10,
            lengthChange: false,
            searching: false,
            info: false,
            autoWidth: false,
            dom: "t",
            language: {
                emptyTable: "No tickets match your filters."
            },
            columns: [
                { data: "index", className: "pv-id-cell" },
                { data: "app", className: "pv-app-cell" },
                { data: "submittedByHtml", className: "pv-submitted-cell" },
                { data: "description", className: "pv-desc-cell" },
                { data: "statusHtml", className: "pv-status-badge-cell" },
                { data: "actions", className: "pv-action-cell text-end", orderable: false, searchable: false }
            ]
        });
    }

    PARAVERSE_APPS.forEach((app) => {
        const $option = $("<option></option>");
        $option.val(app.name).text(app.name);
        $appFilter.append($option);
    });

    // Looks up an app's logo path by name. Falls back to a generic
    // placeholder icon if the app isn't found or has no logo set, so a
    // missing/renamed app never breaks the table layout.
    function getAppLogo(appName) {
        const app = PARAVERSE_APPS.find((a) => a.name === appName);
        return (app && app.logo) || "/assets/media/apps/default.png";
    }

    // Renders the App column as a fixed-size logo image (not text) —
    // filtering/search still matches against the underlying ticket.app
    // string via getVisibleTickets(), so this is purely visual.
    function appLogoHtml(appName) {
        const logoPath = getAppLogo(appName);
        return `<img src="${logoPath}" alt="${appName}" title="${appName}" class="pv-app-logo">`;
    }

    // Maps a role string to the CSS modifier class for its badge color.
    function roleBadgeClass(role) {
        if (role === USER_ROLE.ASSOCIATE) return "pv-role-associate";
        return "pv-role-student";
    }

    // Renders the Submitted By column: avatar on the left, name (top)
    // and role badge (bottom) stacked on the right. Search/filter still
    // matches against the plain ticket.submittedBy string, unaffected
    // by this markup.
    function userCellHtml(ticket) {
        const avatar = ticket.submittedByAvatar || DEFAULT_AVATAR;
        const role = ticket.submittedByRole || USER_ROLE.STUDENT;
        return `
      <div class="pv-user-cell">
        <img src="${avatar}" alt="${ticket.submittedBy}" class="pv-user-avatar">
        <div class="pv-user-info">
          <span class="pv-user-name">${ticket.submittedBy}</span>
          <span class="pv-user-role-badge ${roleBadgeClass(role)}">${role}</span>
        </div>
      </div>
    `;
    }

    function statusBadgeStyle(status) {
        if (status === TICKET_STATUS.COMPLETED) {
            return "background: var(--pv-done-bg); color: var(--pv-done-text);";
        }
        if (status === TICKET_STATUS.CANCELLED) {
            return "background: var(--pv-cancel-bg); color: var(--pv-cancel-text);";
        }
        return "background: var(--pv-open-bg); color: var(--pv-open-text);";
    }

    function actionButtonsHtml(ticket) {
        if (ticket.status === TICKET_STATUS.OPEN) {
            return `
        <button class="pv-action-btn pv-complete-btn" data-id="${ticket.id}" data-action="complete">Complete</button>
        <button class="pv-action-btn pv-cancel-btn" data-id="${ticket.id}" data-action="cancel">Cancel</button>
      `;
        }
        return `<button class="pv-action-btn pv-reopen-btn" data-id="${ticket.id}" data-action="reopen">Reopen</button>`;
    }

    function getVisibleTickets(allTickets) {
        return allTickets.filter((ticket) => {
            if (filterApp !== "All Apps" && ticket.app !== filterApp) return false;
            if (filterStatus !== "All" && ticket.status !== filterStatus) return false;
            if (searchText) {
                const q = searchText.toLowerCase();
                const matches =
                    ticket.app.toLowerCase().includes(q) ||
                    ticket.submittedBy.toLowerCase().includes(q) ||
                    ticket.description.toLowerCase().includes(q);
                if (!matches) return false;
            }
            return true;
        });
    }

    function updateSummaryCounts(allTickets) {
        $countOpenEl.text(allTickets.filter((t) => t.status === TICKET_STATUS.OPEN).length);
        $countCompletedEl.text(allTickets.filter((t) => t.status === TICKET_STATUS.COMPLETED).length);
        $countCancelledEl.text(allTickets.filter((t) => t.status === TICKET_STATUS.CANCELLED).length);
        $totalCountEl.text(allTickets.length);
    }

    function render() {
        const allTickets = PARAVERSE_TICKETS.getAll();
        const visible = getVisibleTickets(allTickets);

        updateSummaryCounts(allTickets);
        $visibleCountEl.text(visible.length);

        initializeTicketTable();

        if (ticketDataTable) {
            const rows = visible.map((ticket, index) => ({
                index: `#${index + 1}`,
                app: appLogoHtml(ticket.app),
                submittedByHtml: userCellHtml(ticket),
                description: ticket.description,
                statusHtml: `<span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${ticket.status}</span>`,
                actions: actionButtonsHtml(ticket),
                id: ticket.id,
            }));

            ticketDataTable.clear();
            ticketDataTable.rows.add(rows).draw(false);
        } else {
            if (visible.length === 0) {
                $tableBody.html(`<tr class="pv-empty-row"><td colspan="6">No tickets match your filters.</td></tr>`);
            } else {
                $tableBody.html(
                    visible
                        .map((ticket, index) => `
          <tr>
            <td class="pv-id-cell">#${index + 1}</td>
            <td class="pv-app-cell">${appLogoHtml(ticket.app)}</td>
            <td class="pv-submitted-cell">${userCellHtml(ticket)}</td>
            <td class="pv-desc-cell" title="${ticket.description}">${ticket.description}</td>
            <td><span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${ticket.status}</span></td>
            <td class="pv-action-cell">${actionButtonsHtml(ticket)}</td>
          </tr>
        `)
                        .join("")
                );
            }
        }

        $lastUpdatedEl.text("Last updated: " + new Date().toLocaleDateString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
        }));
    }

    // --- Event wiring -------------------------------------------------

    $searchInput.on("input", function () {
        searchText = $(this).val();
        render();
    });

    $appFilter.on("change", function () {
        filterApp = $(this).val();
        render();
    });

    $statusFilter.on("change", function () {
        filterStatus = $(this).val();
        render();
    });

    $resetBtn.on("click", function () {
        filterApp = "All Apps";
        filterStatus = "All";
        searchText = "";
        $searchInput.val("");
        $appFilter.val("All Apps");
        $statusFilter.val("All");
        $summaryCards.removeClass("pv-active");
        render();
    });

    $summaryCards.on("click", function () {
        const status = $(this).data("status");
        filterStatus = filterStatus === status ? "All" : status;
        $statusFilter.val(filterStatus);
        $summaryCards.removeClass("pv-active");
        if (filterStatus !== "All") {
            $(this).addClass("pv-active");
        }
        render();
    });

    $tableBody.on("click", ".pv-action-btn", function () {
        const id = $(this).data("id");
        const action = $(this).data("action");
        let newStatus = TICKET_STATUS.OPEN;
        if (action === "complete") newStatus = TICKET_STATUS.COMPLETED;
        if (action === "cancel") newStatus = TICKET_STATUS.CANCELLED;

        PARAVERSE_TICKETS.updateStatus(id, newStatus);
        render();
    });

    render();

    // Auto-refresh the dashboard every 3 seconds to pick up new submissions
    setInterval(render, 3000);
});