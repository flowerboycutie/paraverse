// ticket-admin.js

document.addEventListener("DOMContentLoaded", () => {
    PARAVERSE_TICKETS.seedIfEmpty(); // remove this once real data comes from backend

    // --- Element refs -----------------------------------------------------
    const searchInput = document.getElementById("pvSearchInput");
    const appFilter = document.getElementById("pvAppFilter");
    const statusFilter = document.getElementById("pvStatusFilter");
    const resetBtn = document.getElementById("pvResetFilters");
    // The Metronic ticket table body in ticket-admin.php
    const tableBody = document.getElementById("pvTicketTableBody");
    const visibleCountEl = document.getElementById("pvVisibleCount");
    const totalCountEl = document.getElementById("pvTotalCount");
    const lastUpdatedEl = document.getElementById("pvLastUpdated");
    const countOpenEl = document.getElementById("pvCountOpen");
    const countCompletedEl = document.getElementById("pvCountCompleted");
    const countCancelledEl = document.getElementById("pvCountCancelled");
    const summaryCards = document.querySelectorAll(".pv-summary-card");

    let filterApp = "All Apps";
    let filterStatus = "All";
    let searchText = "";

    PARAVERSE_APPS.forEach((app) => {
        const option = document.createElement("option");
        option.value = app.name;
        option.textContent = app.name;
        appFilter.appendChild(option);
    });

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
        countOpenEl.textContent = allTickets.filter((t) => t.status === TICKET_STATUS.OPEN).length;
        countCompletedEl.textContent = allTickets.filter((t) => t.status === TICKET_STATUS.COMPLETED).length;
        countCancelledEl.textContent = allTickets.filter((t) => t.status === TICKET_STATUS.CANCELLED).length;
        totalCountEl.textContent = allTickets.length;
    }

    function render() {
        const allTickets = PARAVERSE_TICKETS.getAll();
        const visible = getVisibleTickets(allTickets);

        updateSummaryCounts(allTickets);
        visibleCountEl.textContent = visible.length;

        if (visible.length === 0) {
            tableBody.innerHTML = `<tr class="pv-empty-row"><td colspan="6">No tickets match your filters.</td></tr>`;
        } else {
            tableBody.innerHTML = visible
                .map((ticket, index) => `
          <tr>
            <td class="pv-id-cell">#${index + 1}</td>
            <td><span class="pv-app-badge">${ticket.app}</span></td>
            <td class="pv-submitted-cell">${ticket.submittedBy}</td>
            <td class="pv-desc-cell" title="${ticket.description}">${ticket.description}</td>
            <td><span class="pv-status-badge" style="${statusBadgeStyle(ticket.status)}">${ticket.status}</span></td>
            <td class="pv-action-cell">${actionButtonsHtml(ticket)}</td>
          </tr>
        `)
                .join("");
        }

        lastUpdatedEl.textContent = "Last updated: " + new Date().toLocaleDateString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
        });
    }

    // --- Event wiring -------------------------------------------------

    searchInput.addEventListener("input", () => {
        searchText = searchInput.value;
        render();
    });

    appFilter.addEventListener("change", () => {
        filterApp = appFilter.value;
        render();
    });

    statusFilter.addEventListener("change", () => {
        filterStatus = statusFilter.value;
        render();
    });

    resetBtn.addEventListener("click", () => {
        filterApp = "All Apps";
        filterStatus = "All";
        searchText = "";
        searchInput.value = "";
        appFilter.value = "All Apps";
        statusFilter.value = "All";
        summaryCards.forEach((card) => card.classList.remove("pv-active"));
        render();
    });

    // Clicking a summary card toggles filtering by that status.
    summaryCards.forEach((card) => {
        card.addEventListener("click", () => {
            const status = card.getAttribute("data-status");
            filterStatus = filterStatus === status ? "All" : status;
            statusFilter.value = filterStatus;
            summaryCards.forEach((c) => c.classList.remove("pv-active"));
            if (filterStatus !== "All") card.classList.add("pv-active");
            render();
        });
    });

    // Action buttons (event delegation since rows re-render often).
    tableBody.addEventListener("click", (e) => {
        const btn = e.target.closest(".pv-action-btn");
        if (!btn) return;

        const id = btn.getAttribute("data-id");
        const action = btn.getAttribute("data-action");
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