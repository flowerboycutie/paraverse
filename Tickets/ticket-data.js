const PARAVERSE_APPS = [
    { name: "Portal", examples: ["Cannot log in to the portal", "Session keeps expiring unexpectedly", "Page not loading or showing blank screen"] },
    { name: "Account", examples: ["Cannot update profile picture", "Password reset email not arriving", "Account details not saving after edit"] },
    { name: "Network Map", examples: ["Network map not loading", "Connections not appearing on the map", "Map freezes when zooming in"] },
    { name: "M-Flix", examples: ["Video not playing or buffering", "Cannot access certain content", "Subtitles not displaying correctly"] },
    { name: "Arcadia", examples: ["Game not loading or crashing", "Leaderboard scores not updating", "Cannot access a specific game"] },
    { name: "Briefcase", examples: ["Cannot add a new section to profile", "Documents not uploading", "Portfolio layout not saving"] },
    { name: "Eventually", examples: ["Cannot create a new event", "Event invites not being sent", "RSVP not registering properly"] },
    { name: "Repository", examples: ["Cannot upload files to repository", "Folder structure not saving", "Files not downloading correctly"] },
    { name: "Calendar", examples: ["Events not syncing with my schedule", "Cannot set or edit reminders", "Calendar not loading"] },
    { name: "Leaderboard", examples: ["Points not updating after activity", "Rankings displaying incorrectly", "Cannot view full leaderboard"] },
    { name: "Canvas", examples: ["Whiteboard not loading", "Changes not saving after session", "Collaboration features not working"] },
    { name: "LinkedIn", examples: ["Profile not syncing with LinkedIn", "Connections not importing properly", "LinkedIn login not working"] },
    { name: "iCare", examples: ["Cannot book an appointment with faculty", "Appointment form not submitting", "Booking confirmation not received"] },
    { name: "Virtual Office", examples: ["Cannot join a virtual room", "Camera or microphone not working", "Getting disconnected frequently"] },
    { name: "Lost & Found", examples: ["Cannot post a lost or found item", "Images not uploading to listing", "Cannot contact the item poster"] },
    { name: "GCO Connect", examples: ["Cannot send messages to contacts", "Notifications not showing up", "Group chat not loading"] },
];

// Ticket status values used across the admin view.
const TICKET_STATUS = {
    OPEN: "Open",
    COMPLETED: "Completed",
    CANCELLED: "Cancelled",
};

// --- Mock storage -----------------------------------------------------
// No backend yet, so tickets live in localStorage under this key.
// Swap PARAVERSE_TICKETS.* calls for real API calls once the backend exists.
const TICKET_STORAGE_KEY = "paraverse_tickets";

const PARAVERSE_TICKETS = {
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
            app: ticket.app,
            description: ticket.description,
            status: TICKET_STATUS.OPEN,
            createdAt: new Date().toISOString(),
        });
        PARAVERSE_TICKETS.saveAll(tickets);
    },

    updateStatus(id, status) {
        const tickets = PARAVERSE_TICKETS.getAll();
        const t = tickets.find((t) => t.id === id);
        if (t) t.status = status;
        PARAVERSE_TICKETS.saveAll(tickets);
    },

    // Seeds a set of sample rows so the admin table isn't empty on first
    // load, and so sorting/timestamps have some real variety to show.
    seedIfEmpty() {
        if (PARAVERSE_TICKETS.getAll().length > 0) return;

        PARAVERSE_TICKETS.saveAll([
            {
                id: "TCK-1001",
                submittedBy: "Maria Santos",
                app: "iCare",
                description: "Cannot book an appointment with faculty.",
                status: TICKET_STATUS.OPEN,
                createdAt: "2026-06-30T09:00:00.000Z",
            },
            {
                id: "TCK-1002",
                submittedBy: "Juan Dela Cruz",
                app: "Briefcase",
                description: "Cannot add a new section to profile.",
                status: TICKET_STATUS.OPEN,
                createdAt: "2026-06-30T08:30:00.000Z",
            },
            {
                id: "TCK-1003",
                submittedBy: "Ana Reyes",
                app: "Virtual Office",
                description: "Camera and microphone not working during session.",
                status: TICKET_STATUS.COMPLETED,
                createdAt: "2026-06-29T14:00:00.000Z",
            },
            {
                id: "TCK-1004",
                submittedBy: "Carlos Mendoza",
                app: "M-Flix",
                description: "Video buffering constantly even on fast connection.",
                status: TICKET_STATUS.OPEN,
                createdAt: "2026-06-29T10:00:00.000Z",
            },
            {
                id: "TCK-1005",
                submittedBy: "Liza Villanueva",
                app: "Calendar",
                description: "Events not syncing with my schedule.",
                status: TICKET_STATUS.CANCELLED,
                createdAt: "2026-06-28T16:45:00.000Z",
            },
            {
                id: "TCK-1006",
                submittedBy: "Rico Dalisay",
                app: "Portal",
                description: "Session keeps expiring every few minutes.",
                status: TICKET_STATUS.OPEN,
                createdAt: "2026-06-28T11:15:00.000Z",
            },
            {
                id: "TCK-1007",
                submittedBy: "Jasmine Lim",
                app: "GCO Connect",
                description: "Notifications not showing up for new messages.",
                status: TICKET_STATUS.COMPLETED,
                createdAt: "2026-06-27T13:20:00.000Z",
            },
            {
                id: "TCK-1008",
                submittedBy: "Paolo Gutierrez",
                app: "Repository",
                description: "Files not uploading, stuck at 0%.",
                status: TICKET_STATUS.OPEN,
                createdAt: "2026-06-27T09:05:00.000Z",
            },
        ]);
    },

};