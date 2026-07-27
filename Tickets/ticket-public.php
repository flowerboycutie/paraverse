<!-- ticket-public.php     -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .pv-ticket-section,
    .pv-ticket-section * {
        box-sizing: border-box;
    }

    .pv-ticket-section {
        --pv-primary: #4F46E5;
        --pv-primary-light: rgba(79, 70, 229, 0.12);
        --pv-primary-hover: #4338CA;
        --pv-text: #1A1A2E;
        --pv-text-soft: #3D3D5C;
        --pv-muted: #6C6C8A;
        --pv-border: #DDE1E7;
        --pv-disabled: #A5A3C8;

        font-family: 'Inter', Helvetica, Arial, sans-serif;
        color: var(--pv-text);
        padding: 48px 16px;
        width: 100%;
    }

    .pv-ticket-wrap {
        max-width: 680px;
        width: 100%;
        margin: 0 auto;
    }

    .pv-ticket-intro {
        text-align: center;
        margin-bottom: 32px;
    }

    .pv-ticket-intro h3 {
        font-weight: 700;
        font-size: 1.5rem;
        letter-spacing: -0.3px;
        margin: 0 0 4px 0;
    }

    .pv-ticket-intro p {
        color: var(--pv-muted);
        font-size: 0.9375rem;
        margin: 0;
    }

    .pv-ticket-card {
        background: #ffffff;
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
        padding: 40px 44px;
    }

    @media (max-width: 576px) {
        .pv-ticket-card {
            padding: 28px 20px;
        }
    }

    .pv-ticket-card h5 {
        font-weight: 600;
        font-size: 1.0625rem;
        margin: 0 0 4px 0;
    }

    .pv-ticket-card>#pvFormState>p.pv-subtext {
        color: var(--pv-muted);
        font-size: 0.875rem;
        margin: 0 0 24px 0;
    }

    .pv-field {
        margin-bottom: 24px;
    }

    .pv-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--pv-text-soft);
        margin-bottom: 6px;
    }

    .pv-required {
        color: #DC3545;
    }

    .pv-input {
        display: block;
        width: 100%;
        border: 1px solid var(--pv-border);
        border-radius: 8px;
        padding: 9px 14px;
        font-size: 0.875rem;
        font-family: inherit;
        color: var(--pv-text-soft);
        background-color: #ffffff;
    }

    .pv-input:focus {
        outline: none;
        border-color: var(--pv-primary);
        box-shadow: 0 0 0 3px var(--pv-primary-light);
    }

    textarea.pv-input {
        resize: vertical;
        min-height: 100px;
    }

    /* Suggestion chips */
    .pv-suggestions-area {
        display: none;
        margin-bottom: 24px;
    }

    .pv-suggestions-label {
        font-size: 0.8125rem;
        font-weight: 500;
        color: var(--pv-muted);
        margin: 0 0 8px 0;
    }

    .pv-chips-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .pv-chip {
        display: inline-block;
        font-size: 0.8125rem;
        border-radius: 20px;
        border: 1.5px solid var(--pv-border);
        background: #F8F9FB;
        color: #555555;
        padding: 4px 14px;
        line-height: 1.6;
        cursor: pointer;
        font-family: inherit;
    }

    .pv-chip:hover {
        border-color: var(--pv-primary);
        background: #EEF2FF;
        color: var(--pv-primary);
    }

    .pv-chip.pv-active {
        border-color: var(--pv-primary);
        background: #EEF2FF;
        color: var(--pv-primary);
        font-weight: 500;
    }

    .pv-submit-btn {
        display: block;
        width: 100%;
        background-color: var(--pv-primary);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.9375rem;
        padding: 10px;
        cursor: pointer;
    }

    .pv-submit-btn:hover:not(:disabled) {
        background-color: var(--pv-primary-hover);
    }

    .pv-submit-btn:disabled {
        background-color: var(--pv-disabled);
        cursor: not-allowed;
    }

    /* Success state */
    #pvSuccessState {
        display: none;
        text-align: center;
        padding: 48px 0;
    }

    .pv-success-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #E8F5E9;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
    }

    #pvSuccessState h4 {
        font-weight: 600;
        font-size: 1.25rem;
        margin: 0 0 8px 0;
    }

    #pvSuccessState p {
        color: var(--pv-muted);
        font-size: 0.9375rem;
        margin: 0 0 24px 0;
        line-height: 1.6;
    }

    .pv-reset-btn {
        display: inline-block;
        background: #ffffff;
        color: var(--pv-text-soft);
        border: 1px solid var(--pv-border);
        border-radius: 6px;
        font-size: 0.8125rem;
        font-weight: 500;
        padding: 6px 20px;
        cursor: pointer;
        font-family: inherit;
    }

    .pv-reset-btn:hover {
        background: #F8F9FB;
    }
</style>

<section class="pv-ticket-section">
    <div class="pv-ticket-wrap">

        <div class="pv-ticket-intro">
            <h3>Paraverse Support</h3>
            <p>Encountered a bug or issue? Let us know and we'll get it fixed.</p>
        </div>

        <div class="pv-ticket-card">

            <!-- Form state -->
            <div id="pvFormState" class="card card-flush" style="border: none; box-shadow: none;">
                <div class="card-header pt-6">
                    <h5 class="card-title fw-bold m-0">Report a problem</h5>
                    <p class="text-muted fs-7 mb-0">Select the Paraverse app you're having trouble with and describe the issue.</p>
                </div>
                <div class="card-body py-6">
                    <form id="pvTicketForm" novalidate>
                        <!-- Placeholder fields until real login/session data supplies these automatically -->
                        <div class="fv-row mb-5">
                            <label for="pvSubmitterName" class="form-label fw-semibold">Your name</label>
                            <input
                                type="text"
                                class="form-control form-control-solid"
                                id="pvSubmitterName"
                                placeholder="Juan Dela Cruz"
                                required>
                        </div>

                        <div class="fv-row mb-5">
                            <label for="pvSubmitterRole" class="form-label fw-semibold">Are you a student or associate?</label>
                            <select class="form-select form-select-solid" id="pvSubmitterRole" required>
                                <option value="" selected>— Select one —</option>
                                <option value="Student">Student</option>
                                <option value="Associate">Associate</option>
                            </select>
                        </div>

                        <div class="fv-row mb-5">
                            <label for="pvAppSelect" class="form-label fw-semibold">Which app has a problem?</label>
                            <select class="form-select form-select-solid" id="pvAppSelect" required>
                                <option value="" selected>— Select an app —</option>
                            </select>
                        </div>

                        <div class="fv-row mb-8">
                            <label for="pvDescription" class="form-label fw-semibold">
                                Describe the problem <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="form-control form-control-solid"
                                id="pvDescription"
                                placeholder="Explain what happened and what you were trying to do..."
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="pvSubmitBtn" disabled>Submit ticket</button>
                    </form>
                </div>
            </div>

            <!-- Success state -->
            <div id="pvSuccessState">
                <div class="pv-success-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13l4 4L19 7" stroke="#2E7D32" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h4>Ticket submitted!</h4>
                <p>Your report for <strong id="pvSubmittedApp"></strong> has been received.<br>Our team will look into it shortly.</p>
                <button type="button" id="pvResetBtn" class="pv-reset-btn">Submit another ticket</button>
            </div>

        </div>
    </div>
</section>

<script src="ticket-data.js?v=<?= time() ?>"></script>
<script src="ticket-public.js?v=<?= time() ?>"></script>