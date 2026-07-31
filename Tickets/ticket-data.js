// ticket-data.js

if (typeof window.PARAVERSE_APPS === "undefined") {

    // Each app has a "logo" path — this is a TEMPLATE. Swap these paths
    // for wherever your actual app logo images live (e.g. an existing
    // /assets/img/logo/logo folder, or wherever Paraverse already stores
    // per-app icons). The filename pattern below is just a placeholder
    // guess (lowercase, spaces/& replaced with hyphens) — update freely,
    // per app, to match your real asset paths.
    window.PARAVERSE_APPS = [
        { name: "Portal", logo: "/assets/img/logo/logo-portal.svg", examples: ["Cannot log in to the portal", "Session keeps expiring unexpectedly", "Page not loading or showing blank screen"] },
        { name: "Account", logo: "/assets/img/logo/logo-account.svg", examples: ["Cannot update profile picture", "Password reset email not arriving", "Account details not saving after edit"] },
        { name: "Network Map", logo: "/assets/img/logo/logo-network-map.svg", examples: ["Network map not loading", "Connections not appearing on the map", "Map freezes when zooming in"] },
        { name: "M-Flix", logo: "/assets/img/logo/logo-mflix.svg", examples: ["Video not playing or buffering", "Cannot access certain content", "Subtitles not displaying correctly"] },
        { name: "Arcadia", logo: "/assets/img/logo/logo-arcadia.svg", examples: ["Game not loading or crashing", "Leaderboard scores not updating", "Cannot access a specific game"] },
        { name: "Briefcase", logo: "/assets/img/logo/logo-briefcase.svg", examples: ["Cannot add a new section to profile", "Documents not uploading", "Portfolio layout not saving"] },
        { name: "Eventually", logo: "/assets/img/logo/logo-eventually.svg", examples: ["Cannot create a new event", "Event invites not being sent", "RSVP not registering properly"] },
        { name: "Repository", logo: "/assets/img/logo/logo-epository.svg", examples: ["Cannot upload files to repository", "Folder structure not saving", "Files not downloading correctly"] },
        { name: "Calendar", logo: "/assets/img/logo/logo-calendar.svg", examples: ["Events not syncing with my schedule", "Cannot set or edit reminders", "Calendar not loading"] },
        { name: "Leaderboard", logo: "/assets/img/logo/logo-leaderboard.svg", examples: ["Points not updating after activity", "Rankings displaying incorrectly", "Cannot view full leaderboard"] },
        { name: "Canvas", logo: "/assets/img/logo/logo-canvas.svg", examples: ["Whiteboard not loading", "Changes not saving after session", "Collaboration features not working"] },
        { name: "LinkedIn", logo: "/assets/img/logo/logo-linkedin.svg", examples: ["Profile not syncing with LinkedIn", "Connections not importing properly", "LinkedIn login not working"] },
        { name: "iCare", logo: "/assets/img/logo/logo-icare.jpg", examples: ["Cannot book an appointment with faculty", "Appointment form not submitting", "Booking confirmation not received"] },
        { name: "Virtual Office", logo: "/assets/img/logo/logo-virtual-office.svg", examples: ["Cannot join a virtual room", "Camera or microphone not working", "Getting disconnected frequently"] },
        { name: "Lost & Found", logo: "/assets/img/logo/logo-lost-and-found.svg", examples: ["Cannot post a lost or found item", "Images not uploading to listing", "Cannot contact the item poster"] },
        { name: "GCO Connect", logo: "/assets/img/logo/logo-gco-connect.svg", examples: ["Cannot send messages to contacts", "Notifications not showing up", "Group chat not loading"] },
    ];

    // Ticket status values used across the admin view.
    window.TICKET_STATUS = {
        OPEN: "Open",
        COMPLETED: "Completed",
        CANCELLED: "Cancelled",
    };

    // Role values shown as a badge under the submitter's name in the
    // admin table. Extend this if Paraverse has more roles than these two.
    window.USER_ROLE = {
        STUDENT: "Student",
        ASSOCIATE: "Associate",
    };

    // Placeholder avatar shown when a ticket has no specific avatar set.
    // Swap for wherever real user profile pictures live once wired up.
    window.DEFAULT_AVATAR = "/assets/img/default.png";

    // TEMPLATE PLACEHOLDER — this stands in for "whichever associate is
    // currently logged in and clicking Complete/Cancel/Reopen." Once
    // there's a real backend/login session, replace this single line with
    // something like:
    //   window.CURRENT_ASSOCIATE_NAME = SESSION_USER.fullName;
    // Every status change from here on will automatically pick up
    // whatever name this constant holds — no other code needs to change.
    window.CURRENT_ASSOCIATE_NAME = "Associate Name";

    // --- Mock storage -----------------------------------------------------
    // No backend yet, so tickets live in localStorage under this key.
    // Swap PARAVERSE_TICKETS.* calls for real API calls once the backend exists.
    const TICKET_STORAGE_KEY = "paraverse_tickets";

    window.PARAVERSE_TICKETS = {
        getAll() {
            const raw = localStorage.getItem(TICKET_STORAGE_KEY);
            return raw ? JSON.parse(raw) : [];
        },

        saveAll(tickets) {
            localStorage.setItem(TICKET_STORAGE_KEY, JSON.stringify(tickets));
        },

        add(ticket) {
            const tickets = PARAVERSE_TICKETS.getAll();
            tickets.unshift({
                id: "TCK-" + Date.now(),
                submittedBy: ticket.submittedBy || "Unknown user", // auto-filled server-side later
                // Role and avatar are placeholders until the backend/login
                // session supplies the real values for whoever is logged in.
                submittedByRole: ticket.submittedByRole || USER_ROLE.STUDENT,
                submittedByAvatar: ticket.submittedByAvatar || DEFAULT_AVATAR,
                app: ticket.app,
                description: ticket.description,
                status: TICKET_STATUS.OPEN,
                // lastActionBy is intentionally left unset here — a freshly
                // submitted ticket hasn't had any admin action taken on it
                // yet, so it should just show "Open", not "Reopened by: ...".
                createdAt: new Date().toISOString(),
            });
            PARAVERSE_TICKETS.saveAll(tickets);
        },

        // lastActionBy records whoever most recently changed this ticket's
        // status — used for "Completed by: X", "Cancelled by: X", and
        // "Reopened by: X" labels. It's set on every status change
        // (complete, cancel, or reopen), not just completion.
        updateStatus(id, status, actorName) {
            const tickets = PARAVERSE_TICKETS.getAll();
            const t = tickets.find((t) => t.id === id);
            if (t) {
                t.status = status;
                t.lastActionBy = actorName || CURRENT_ASSOCIATE_NAME;
            }
            PARAVERSE_TICKETS.saveAll(tickets);
        },

        // Seeds a set of sample rows so the admin table isn't empty on first
        // load, and so sorting/timestamps have some real variety to show.
        // Mixes Student/Associate roles so both badge styles are visible,
        // and gives the Completed/Cancelled seed tickets a lastActionBy
        // so "Completed by:" / "Cancelled by:" labels show immediately.
        seedIfEmpty() {
            if (PARAVERSE_TICKETS.getAll().length > 0) return;

            PARAVERSE_TICKETS.saveAll([
                {
                    id: "TCK-1001",
                    submittedBy: "Maria Santos",
                    submittedByRole: USER_ROLE.STUDENT,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "iCare",
                    description: "Cannot book an appointment with faculty.",
                    status: TICKET_STATUS.OPEN,
                    createdAt: "2026-06-30T09:00:00.000Z",
                },
                {
                    id: "TCK-1002",
                    submittedBy: "Juan Dela Cruz",
                    submittedByRole: USER_ROLE.STUDENT,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "Briefcase",
                    description: "Cannot add a new section to profile.",
                    status: TICKET_STATUS.OPEN,
                    createdAt: "2026-06-30T08:30:00.000Z",
                },
                {
                    id: "TCK-1003",
                    submittedBy: "Ana Reyes",
                    submittedByRole: USER_ROLE.ASSOCIATE,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "Virtual Office",
                    description: "Camera and microphone not working during session.",
                    status: TICKET_STATUS.COMPLETED,
                    lastActionBy: "Associate Name",
                    createdAt: "2026-06-29T14:00:00.000Z",
                },
                {
                    id: "TCK-1004",
                    submittedBy: "Carlos Mendoza",
                    submittedByRole: USER_ROLE.STUDENT,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "M-Flix",
                    description: "Video buffering constantly even on fast connection.",
                    status: TICKET_STATUS.OPEN,
                    createdAt: "2026-06-29T10:00:00.000Z",
                },
                {
                    id: "TCK-1005",
                    submittedBy: "Liza Villanueva",
                    submittedByRole: USER_ROLE.ASSOCIATE,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "Calendar",
                    description: "Events not syncing with my schedule.",
                    status: TICKET_STATUS.CANCELLED,
                    lastActionBy: "Associate Name",
                    createdAt: "2026-06-28T16:45:00.000Z",
                },
                {
                    id: "TCK-1006",
                    submittedBy: "Rico Dalisay",
                    submittedByRole: USER_ROLE.STUDENT,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "Portal",
                    description: "Session keeps expiring every few minutes.",
                    status: TICKET_STATUS.OPEN,
                    createdAt: "2026-06-28T11:15:00.000Z",
                },
                {
                    id: "TCK-1007",
                    submittedBy: "Jasmine Lim",
                    submittedByRole: USER_ROLE.ASSOCIATE,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "GCO Connect",
                    description: "Notifications not showing up for new messages.",
                    status: TICKET_STATUS.COMPLETED,
                    lastActionBy: "Associate Name",
                    createdAt: "2026-06-27T13:20:00.000Z",
                },
                {
                    id: "TCK-1008",
                    submittedBy: "Paolo Gutierrez",
                    submittedByRole: USER_ROLE.STUDENT,
                    submittedByAvatar: DEFAULT_AVATAR,
                    app: "Repository",
                    description: "Files not uploading, stuck at 0%.",
                    status: TICKET_STATUS.OPEN,
                    createdAt: "2026-06-27T09:05:00.000Z",
                },
            ]);
        },

    };

}

// Local references so the rest of the code (and any script tag that
// loads after this one) can keep using the bare names PARAVERSE_APPS,
// TICKET_STATUS, PARAVERSE_TICKETS, USER_ROLE, DEFAULT_AVATAR without
// the window. prefix.
var PARAVERSE_APPS = window.PARAVERSE_APPS;
var TICKET_STATUS = window.TICKET_STATUS;
var PARAVERSE_TICKETS = window.PARAVERSE_TICKETS;
var USER_ROLE = window.USER_ROLE;
var DEFAULT_AVATAR = window.DEFAULT_AVATAR;
var CURRENT_ASSOCIATE_NAME = window.CURRENT_ASSOCIATE_NAME;