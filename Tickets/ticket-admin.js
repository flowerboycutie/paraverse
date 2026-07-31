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

    // Details modal refs
    const $detailsModalOverlay = $("#pvDetailsModalOverlay");
    const $modalApp = $("#pvModalTicketApp");
    const $modalSubmittedBy = $("#pvModalSubmittedBy");
    const $modalStatus = $("#pvModalStatus");
    const $modalDescription = $("#pvModalDescription");
    const $modalCloseBtn = $("#pvModalCloseBtn");

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
                { data: "statusHtml", className: "pv-status-badge-cell" },
                { data: "actions", className: "pv-action-cell", orderable: false, searchable: false },
                { data: "detailsHtml", className: "pv-details-cell", orderable: false, searchable: false }
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

    // Completed/Cancelled tickets show who did it; a ticket that's been
    // reopened after being completed/cancelled shows who reopened it.
    // A freshly submitted ticket (status Open, never touched by an
    // admin action) just shows plain "Open" — lastActionBy is only set
    // once an admin action has actually happened, see ticket-data.js.
    function statusLabelText(ticket) {
        if (ticket.status === TICKET_STATUS.COMPLETED) {
            return `Completed by: ${ticket.lastActionBy || CURRENT_ASSOCIATE_NAME}`;
        }
        if (ticket.status === TICKET_STATUS.CANCELLED) {
            return `Cancelled by: ${ticket.lastActionBy || CURRENT_ASSOCIATE_NAME}`;
        }
        if (ticket.status === TICKET_STATUS.OPEN && ticket.lastActionBy) {
            return `Reopened by: ${ticket.lastActionBy}`;
        }
        return ticket.status;
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

    // "View details »" button — the description no longer shows directly
    // in the row; this opens the modal with the full ticket info instead.
    function detailsButtonHtml(ticket) {
        return `<button type="button" class="pv-details-btn" data-id="${ticket.id}">View details &raquo;</button>`;
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

    // --- Details modal -------------------------------------------------

    function openDetailsModal(ticket) {
        $modalApp.html(appLogoHtml(ticket.app));
        $modalSubmittedBy.html(userCellHtml(ticket));
        $modalStatus.html(`<span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${statusLabelText(ticket)}</span>`);
        $modalDescription.text(ticket.description);
        $detailsModalOverlay.addClass("pv-modal-open");
    }

    function closeDetailsModal() {
        $detailsModalOverlay.removeClass("pv-modal-open");
    }

    $modalCloseBtn.on("click", closeDetailsModal);

    $detailsModalOverlay.on("click", function (e) {
        if (e.target === this) closeDetailsModal();
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape" && $detailsModalOverlay.hasClass("pv-modal-open")) {
            closeDetailsModal();
        }
    });

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
                statusHtml: `<span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${statusLabelText(ticket)}</span>`,
                actions: actionButtonsHtml(ticket),
                detailsHtml: detailsButtonHtml(ticket),
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
            <td><span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${statusLabelText(ticket)}</span></td>
            <td class="pv-action-cell">${actionButtonsHtml(ticket)}</td>
            <td class="pv-details-cell">${detailsButtonHtml(ticket)}</td>
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

        // CURRENT_ASSOCIATE_NAME is the placeholder for "whoever is
        // currently logged in" — see ticket-data.js for the swap-in point.
        PARAVERSE_TICKETS.updateStatus(id, newStatus, CURRENT_ASSOCIATE_NAME);
        render();
    });

    $tableBody.on("click", ".pv-details-btn", function () {
        const id = $(this).data("id");
        const ticket = PARAVERSE_TICKETS.getAll().find((t) => t.id === id);
        if (ticket) openDetailsModal(ticket);
    });

    render();

    // Auto-refresh the dashboard every 3 seconds to pick up new submissions
    setInterval(render, 3000);
});