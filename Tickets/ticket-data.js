/**
 * ticket-data.js
 * Shared data + helpers for the Paraverse Ticketing System.
 * Vanilla JS, no dependencies. Include this before ticket-public.js / ticket-admin.js.
 */

// List of all Paraverse apps, each with a few example problems shown as
// clickable suggestion chips on the public form. Edit the "examples"
// arrays freely — these are illustrative starting points, not fixed categories.
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

    // Seeds a few sample rows so the admin table isn't empty on first load.
    seedIfEmpty() {
        if (PARAVERSE_TICKETS.getAll().length > 0) return;
        PARAVERSE_TICKETS.saveAll([
            {
                id: "TCK-seed-1",
                submittedBy: "Juan Dela Cruz",
                app: "iCare",
                description: "Cannot book an appointment with faculty, keeps saying 'slot unavailable'.",
                status: TICKET_STATUS.OPEN,
                createdAt: new Date().toISOString(),
            },
            {
                id: "TCK-seed-2",
                submittedBy: "Maria Santos",
                app: "Briefcase",
                description: "Cannot add a new section to my profile, the '+ Add' button doesn't respond.",
                status: TICKET_STATUS.COMPLETED,
                createdAt: new Date().toISOString(),
            },
            {
                id: "TCK-seed-3",
                submittedBy: "Ana Reyes",
                app: "Repository",
                description: "File upload gets stuck on 'Uploading...' and never finishes.",
                status: TICKET_STATUS.OPEN,
                createdAt: new Date().toISOString(),
            },
        ]);
    },
};/**
 * ticket-data.js
 * Shared data + helpers for the Paraverse Ticketing System.
 * Vanilla JS, no dependencies. Include this before ticket-public.js / ticket-admin.js.
 */

// List of all Paraverse apps, each with a few example problems shown as
// clickable suggestion chips on the public form. Edit the "examples"
// arrays freely — these are illustrative starting points, not fixed categories.
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

    // Seeds a few sample rows so the admin table isn't empty on first load.
    seedIfEmpty() {
        if (PARAVERSE_TICKETS.getAll().length > 0) return;
        PARAVERSE_TICKETS.saveAll([
            {
                id: "TCK-seed-1",
                submittedBy: "Juan Dela Cruz",
                app: "iCare",
                description: "Cannot book an appointment with faculty, keeps saying 'slot unavailable'.",
                status: TICKET_STATUS.OPEN,
                createdAt: new Date().toISOString(),
            },
            {
                id: "TCK-seed-2",
                submittedBy: "Maria Santos",
                app: "Briefcase",
                description: "Cannot add a new section to my profile, the '+ Add' button doesn't respond.",
                status: TICKET_STATUS.COMPLETED,
                createdAt: new Date().toISOString(),
            },
            {
                id: "TCK-seed-3",
                submittedBy: "Ana Reyes",
                app: "Repository",
                description: "File upload gets stuck on 'Uploading...' and never finishes.",
                status: TICKET_STATUS.OPEN,
                createdAt: new Date().toISOString(),
            },
        ]);
    },
};