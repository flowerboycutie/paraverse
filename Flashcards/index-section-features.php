<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    /* ── Brand tokens (only what Bootstrap can't provide) ── */
    :root {
        --fc-teal: #3AAFA9;
        --fc-teal-dark: #2B9A94;
        --fc-teal-deep: #1A3C3A;
        --fc-teal-light: #E8F7F6;
        --fc-teal-mid: #9ED8D5;
        --fc-amber: #F59E0B;
        --fc-slate: #64748B;
        --font: "Inter", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    body {
        font-family: var(--font);
    }

    /* ── Utility overrides & Bootstrap gap-fills ── */
    .text-teal {
        color: var(--fc-teal) !important;
    }

    .text-teal-deep {
        color: var(--fc-teal-deep) !important;
    }

    .text-slate {
        color: var(--fc-slate) !important;
    }

    .bg-teal {
        background-color: var(--fc-teal) !important;
    }

    .bg-teal-light {
        background-color: var(--fc-teal-light) !important;
    }

    .bg-teal-deep {
        background-color: var(--fc-teal-deep) !important;
    }

    .border-teal {
        border-color: var(--fc-teal) !important;
    }

    .border-teal-mid {
        border-color: var(--fc-teal-mid) !important;
    }

    .btn-teal {
        background-color: var(--fc-teal);
        color: #fff;
        border: none;
        font-weight: 700;
        box-shadow: 0 4px 18px rgba(58, 175, 169, .35);
        transition: background .2s, transform .15s;
    }

    .btn-teal:hover {
        background-color: var(--fc-teal-dark);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-outline-teal {
        border: 1.5px solid #CBD5E1;
        color: var(--fc-teal-deep);
        background: transparent;
        font-weight: 600;
        transition: border-color .2s, background .2s;
    }

    .btn-outline-teal:hover {
        border-color: var(--fc-teal);
        background: #fff;
        color: var(--fc-teal-deep);
    }

    /* eyebrow label */
    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--fc-teal);
    }

    .eyebrow::before {
        content: '';
        display: inline-block;
        width: 20px;
        height: 2px;
        background: var(--fc-teal);
        border-radius: 99px;
    }

    /* ── HERO ── */
    #fc-hero {
        position: relative;
        overflow: hidden;
        min-height: 92vh;
    }

    #fc-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, #9ED8D5 1px, transparent 1px);
        background-size: 28px 28px;
        opacity: .4;
        pointer-events: none;
    }

    .hero-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: .2;
        pointer-events: none;
    }

    .hero-blob-1 {
        width: 420px;
        height: 420px;
        background: var(--fc-teal);
        top: -100px;
        right: -60px;
    }

    .hero-blob-2 {
        width: 300px;
        height: 300px;
        background: var(--fc-amber);
        bottom: -60px;
        left: -40px;
    }

    .hero-headline {
        font-size: clamp(2.6rem, 5.5vw, 4.2rem);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -.03em;
    }

    .hero-headline span {
        color: var(--fc-teal);
        position: relative;
        display: inline-block;
    }

    .hero-headline span::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 4px;
        width: 100%;
        height: 5px;
        border-radius: 99px;
        background: var(--fc-amber);
    }

    .stat-divider {
        width: 1px;
        background: #CBD5E1;
        align-self: stretch;
    }

    /* ── CARD STACK / FLIP ── */
    .card-stack {
        position: relative;
        width: 340px;
        height: 220px;
    }

    .card-shadow {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 16px;
    }

    .card-shadow-2 {
        background: #9ED8D5;
        transform: rotate(6deg) translateY(10px);
    }

    .card-shadow-1 {
        background: #7ECFCB;
        transform: rotate(3deg) translateY(5px);
    }

    .flip-wrap {
        position: absolute;
        inset: 0;
        perspective: 900px;
        cursor: pointer;
    }

    .flip-inner {
        width: 100%;
        height: 100%;
        position: relative;
        transform-style: preserve-3d;
        transition: transform .6s cubic-bezier(.45, .05, .55, .95);
        border-radius: 16px;
    }

    .flip-inner.flipped {
        transform: rotateY(180deg);
    }

    .fc-face {
        position: absolute;
        inset: 0;
        border-radius: 16px;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 28px 32px;
        box-shadow: 0 12px 40px rgba(26, 60, 58, .18);
    }

    .fc-front {
        background: #fff;
    }

    .fc-back {
        background: var(--fc-teal);
        transform: rotateY(180deg);
    }

    .fc-label {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        opacity: .55;
        margin-bottom: 10px;
    }

    .fc-question {
        font-size: 1.1rem;
        font-weight: 700;
        text-align: center;
        line-height: 1.35;
    }

    /* floating chips */
    .hero-chip {
        position: absolute;
        background: #fff;
        border-radius: 10px;
        padding: 8px 14px;
        font-size: .78rem;
        font-weight: 600;
        color: var(--fc-teal-deep);
        box-shadow: 0 4px 16px rgba(26, 60, 58, .12);
        white-space: nowrap;
        animation: float 3s ease-in-out infinite;
    }

    .chip-1 {
        top: -28px;
        right: -30px;
    }

    .chip-2 {
        bottom: -24px;
        left: -20px;
        animation-delay: 1s;
    }

    .chip-3 {
        top: 50%;
        left: -60px;
        transform: translateY(-50%);
        animation-delay: .5s;
        animation-name: floatX;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-7px)
        }
    }

    @keyframes floatX {

        0%,
        100% {
            transform: translateY(-50%) translateX(0)
        }

        50% {
            transform: translateY(-50%) translateX(-6px)
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(24px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .fade-up-1 {
        animation: fadeUp .6s .0s ease both;
    }

    .fade-up-2 {
        animation: fadeUp .6s .1s ease both;
    }

    .fade-up-3 {
        animation: fadeUp .6s .2s ease both;
    }

    .fade-up-4 {
        animation: fadeUp .6s .3s ease both;
    }

    .fade-up-5 {
        animation: fadeUp .6s .4s ease both;
    }

    /* ── ABOUT deck mockup ── */
    .deck-mockup {
        border-radius: 20px;
    }

    .deck-dot {
        width: 11px;
        height: 11px;
        border-radius: 50%;
        display: inline-block;
    }

    /* ── FEATURES tabs ── */
    .feat-tab-bar {
        display: flex;
        gap: 6px;
        background: #E2E8F0;
        border-radius: 14px;
        padding: 6px;
        width: fit-content;
    }

    .feat-tab {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        border-radius: 10px;
        font-size: .88rem;
        font-weight: 600;
        color: var(--fc-slate);
        cursor: pointer;
        border: none;
        background: transparent;
        transition: all .2s;
    }

    .feat-tab.active {
        background: #fff;
        color: var(--fc-teal-deep);
        box-shadow: 0 2px 10px rgba(26, 60, 58, .12);
    }

    .feat-tab.active.tab-learn {
        color: var(--fc-teal);
    }

    .feat-tab.active.tab-prac {
        color: #059669;
    }

    .feat-tab.active.tab-test {
        color: #EA580C;
    }

    .feat-panel {
        display: none;
    }

    .feat-panel.active {
        display: block;
        animation: fadeUp .35s ease;
    }

    /* flip card inside features */
    .lv-card {
        height: 160px;
        perspective: 800px;
        cursor: pointer;
    }

    .lv-inner {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform .55s cubic-bezier(.45, .05, .55, .95);
        position: relative;
    }

    .lv-inner.flipped {
        transform: rotateY(180deg);
    }

    .lv-face {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 16px;
        box-shadow: 0 6px 24px rgba(26, 60, 58, .14);
    }

    .lv-front {
        background: #fff;
    }

    .lv-back {
        background: var(--fc-teal);
        transform: rotateY(180deg);
    }

    .lv-tag {
        font-size: .62rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        opacity: .5;
        margin-bottom: 6px;
    }

    /* ── HOW IT WORKS connector ── */
    @media (min-width: 992px) {
        .step-col:not(:last-child) .step-card::after {
            content: '';
            position: absolute;
            top: 42px;
            right: -34px;
            width: 28px;
            height: 2px;
            background: var(--fc-teal-mid);
        }
    }

    .step-card {
        position: relative;
        transition: box-shadow .2s, transform .2s;
    }

    .step-card:hover {
        box-shadow: 0 8px 32px rgba(26, 60, 58, .1) !important;
        transform: translateY(-4px);
    }

    .step-num {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .9rem;
        font-weight: 800;
    }

    /* process card hover */
    .process-card {
        transition: border-color .2s, box-shadow .2s, transform .2s;
    }

    .process-card:hover {
        border-color: var(--fc-teal) !important;
        box-shadow: 0 6px 28px rgba(58, 175, 169, .1);
        transform: translateX(4px);
    }

    /* ── CTA section ── */
    .cta-card {
        position: relative;
        border-radius: 28px;
        overflow: hidden;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(255, 255, 255, .07) 1px, transparent 1px);
        background-size: 26px 26px;
        pointer-events: none;
    }

    .cta-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: .22;
        pointer-events: none;
    }

    .cta-blob-1 {
        width: 380px;
        height: 380px;
        background: var(--fc-teal);
        top: -120px;
        right: -80px;
    }

    .cta-blob-2 {
        width: 280px;
        height: 280px;
        background: var(--fc-amber);
        bottom: -80px;
        left: -60px;
    }

    .cta-heading {
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        font-weight: 800;
        letter-spacing: -.03em;
        line-height: 1.1;
    }

    .btn-cta {
        background: var(--fc-teal);
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        padding: 15px 32px;
        border-radius: 12px;
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        box-shadow: 0 6px 24px rgba(58, 175, 169, .45);
        transition: background .2s, transform .15s;
    }

    .btn-cta:hover {
        background: var(--fc-teal-dark);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-cta-ghost {
        background: rgba(255, 255, 255, .08);
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
        padding: 15px 28px;
        border-radius: 12px;
        border: 1.5px solid rgba(255, 255, 255, .2);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        transition: background .2s;
    }

    .btn-cta-ghost:hover {
        background: rgba(255, 255, 255, .14);
        color: #fff;
    }

    /* prac option */
    .prac-option {
        cursor: pointer;
        transition: border-color .15s, background .15s;
    }

    .prac-option:hover {
        border-color: #059669 !important;
    }

    .prac-option.correct {
        border-color: #059669 !important;
        background: #ECFDF5 !important;
        color: #059669 !important;
        font-weight: 700;
    }

    .prac-option.correct .opt-letter {
        background: #059669 !important;
        color: #fff !important;
    }

    .prac-option.wrong {
        border-color: #FCA5A5 !important;
        background: #FEF2F2 !important;
        color: #DC2626 !important;
    }

    .prac-option.wrong .opt-letter {
        background: #FCA5A5 !important;
        color: #fff !important;
    }

    @media (max-width: 575px) {
        .chip-3 {
            display: none;
        }

        .card-stack {
            width: 290px;
            height: 190px;
        }

        .feat-tab span {
            display: none;
        }
    }
</style>

<section id="fc-features" class="py-5 py-lg-6" style="background:#F8FAFF;">
    <div class="container py-4">

        <!-- header -->
        <div class="text-center mb-0">
            <div class="eyebrow mb-3">Features</div>
            <h2 class="fw-bold text-teal-deep mb-3" style="font-size:clamp(2rem,4vw,2.9rem);letter-spacing:-.028em;line-height:1.12;">
                Three modes. One learning journey.
            </h2>
            <p class="text-slate mx-auto lh-lg" style="max-width:560px;">
                Flashcards guides you from first exposure to full mastery with three purposefully designed study modes.
            </p>
        </div>

        <!-- tab nav -->
        <div class="d-flex justify-content-center mt-5">
            <div class="feat-tab-bar">
                <button class="feat-tab tab-learn active" onclick="switchTab('learn',this)">
                    <i class="bi bi-book-half"></i><span>Learn</span>
                </button>
                <button class="feat-tab tab-prac" onclick="switchTab('prac',this)">
                    <i class="bi bi-pencil-square"></i><span>Practice</span>
                </button>
                <button class="feat-tab tab-test" onclick="switchTab('test',this)">
                    <i class="bi bi-clipboard-check"></i><span>Test</span>
                </button>
            </div>
        </div>

        <!-- panels -->
        <div class="mt-4">

            <!-- LEARN -->
            <div class="feat-panel active" id="panel-learn">
                <div class="border rounded-4 overflow-hidden bg-white">
                    <div class="row g-0">
                        <div class="col-lg-5 p-4 p-lg-5">
                            <span class="badge rounded-pill px-3 py-2 mb-4 d-inline-flex align-items-center gap-2 bg-teal-light text-teal fw-bold" style="font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">
                                <i class="bi bi-book-half"></i> Learn
                            </span>
                            <h3 class="fw-bold text-teal-deep mb-3" style="font-size:1.65rem;letter-spacing:-.02em;">Flip through your deck, one card at a time</h3>
                            <p class="text-slate lh-lg mb-4">The Learn mode lets you read the question, absorb it, and reveal the answer with a satisfying flip. No pressure — just you and the material.</p>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-teal-light text-teal" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;"><i class="bi bi-check"></i></span>
                                    Card flip animation for front &amp; back
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-teal-light text-teal" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;"><i class="bi bi-check"></i></span>
                                    Navigate forward and backward freely
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-teal-light text-teal" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;"><i class="bi bi-check"></i></span>
                                    Progress tracker across the deck
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-teal-light text-teal" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;"><i class="bi bi-check"></i></span>
                                    Works with any deck size
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 border-start d-flex">
                            <div class="w-100 p-4 p-lg-5 bg-teal-light d-flex flex-column align-items-center justify-content-center">
                                <div class="w-100 mb-3" style="max-width:300px;">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-slate small fw-semibold">Card 5 of 12</span>
                                        <span class="text-teal small fw-bold">40%</span>
                                    </div>
                                    <div class="progress rounded-pill" style="height:6px;background:#9ED8D5;">
                                        <div class="progress-bar bg-teal rounded-pill" style="width:40%;"></div>
                                    </div>
                                </div>
                                <div class="lv-card w-100" style="max-width:300px;" onclick="learnFlip()">
                                    <div class="lv-inner" id="learnCard">
                                        <div class="lv-face lv-front">
                                            <div class="lv-tag text-teal">Question</div>
                                            <div class="text-center fw-bold text-teal-deep" style="font-size:.95rem;">What layer does IP operate on in the OSI model?</div>
                                        </div>
                                        <div class="lv-face lv-back">
                                            <div class="lv-tag text-white">Answer</div>
                                            <div class="text-center fw-bold text-white" style="font-size:.95rem;">Layer 3 — the Network Layer</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-slate small mt-3 mb-2">Click the card to flip it</div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-white border border-teal-mid text-teal rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;">
                                        <i class="bi bi-arrow-left"></i>
                                    </button>
                                    <button class="btn btn-white border border-teal-mid text-teal rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;">
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRACTICE -->
            <div class="feat-panel" id="panel-prac">
                <div class="border rounded-4 overflow-hidden bg-white">
                    <div class="row g-0">
                        <div class="col-lg-5 p-4 p-lg-5">
                            <span class="badge rounded-pill px-3 py-2 mb-4 d-inline-flex align-items-center gap-2 fw-bold" style="font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;background:#ECFDF5;color:#059669;">
                                <i class="bi bi-pencil-square"></i> Practice
                            </span>
                            <h3 class="fw-bold text-teal-deep mb-3" style="font-size:1.65rem;letter-spacing:-.02em;">A quick 10-item quiz to check what you know</h3>
                            <p class="text-slate lh-lg mb-4">Practice mode pulls 10 random questions from your deck and presents them as multiple-choice items. Instant feedback keeps the session snappy.</p>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#ECFDF5;color:#059669;"><i class="bi bi-check"></i></span>
                                    10 randomly selected questions per session
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#ECFDF5;color:#059669;"><i class="bi bi-check"></i></span>
                                    Immediate right/wrong feedback per answer
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#ECFDF5;color:#059669;"><i class="bi bi-check"></i></span>
                                    Score summary at the end of each session
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#ECFDF5;color:#059669;"><i class="bi bi-check"></i></span>
                                    Retake as many times as you want
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 border-start d-flex">
                            <div class="w-100 p-4 p-lg-5 d-flex flex-column justify-content-center gap-3" style="background:#ECFDF5;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fw-bold" style="font-size:.72rem;letter-spacing:.08em;text-transform:uppercase;color:#059669;">Practice Quiz</span>
                                    <span class="text-slate small fw-semibold">Question 3 of 10</span>
                                </div>
                                <p class="fw-bold text-teal-deep mb-0">Which protocol is used to assign IP addresses automatically?</p>
                                <div class="prac-option d-flex align-items-center gap-3 p-3 rounded-3 bg-white border" style="border-color:#D1FAE5 !important;" onclick="pracSelect(this,'wrong')">
                                    <span class="opt-letter d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.75rem;background:#D1FAE5;color:#059669;">A</span>
                                    <span class="small fw-medium text-teal-deep">ARP</span>
                                </div>
                                <div class="prac-option d-flex align-items-center gap-3 p-3 rounded-3 bg-white border" style="border-color:#D1FAE5 !important;" onclick="pracSelect(this,'correct')">
                                    <span class="opt-letter d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.75rem;background:#D1FAE5;color:#059669;">B</span>
                                    <span class="small fw-medium text-teal-deep">DHCP</span>
                                </div>
                                <div class="prac-option d-flex align-items-center gap-3 p-3 rounded-3 bg-white border" style="border-color:#D1FAE5 !important;" onclick="pracSelect(this,'wrong')">
                                    <span class="opt-letter d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.75rem;background:#D1FAE5;color:#059669;">C</span>
                                    <span class="small fw-medium text-teal-deep">DNS</span>
                                </div>
                                <div class="prac-option d-flex align-items-center gap-3 p-3 rounded-3 bg-white border" style="border-color:#D1FAE5 !important;" onclick="pracSelect(this,'wrong')">
                                    <span class="opt-letter d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.75rem;background:#D1FAE5;color:#059669;">D</span>
                                    <span class="small fw-medium text-teal-deep">NAT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEST -->
            <div class="feat-panel" id="panel-test">
                <div class="border rounded-4 overflow-hidden bg-white">
                    <div class="row g-0">
                        <div class="col-lg-5 p-4 p-lg-5">
                            <span class="badge rounded-pill px-3 py-2 mb-4 d-inline-flex align-items-center gap-2 fw-bold" style="font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;background:#FFF7ED;color:#EA580C;">
                                <i class="bi bi-clipboard-check"></i> Test
                            </span>
                            <h3 class="fw-bold text-teal-deep mb-3" style="font-size:1.65rem;letter-spacing:-.02em;">A full 100-item exam to prove your mastery</h3>
                            <p class="text-slate lh-lg mb-4">Test mode is the real deal — a full exam simulation with 100 questions drawn from your deck, a timer, and a comprehensive results report.</p>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#FFF7ED;color:#EA580C;"><i class="bi bi-check"></i></span>
                                    100 questions per exam session
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#FFF7ED;color:#EA580C;"><i class="bi bi-check"></i></span>
                                    Full timer display throughout
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#FFF7ED;color:#EA580C;"><i class="bi bi-check"></i></span>
                                    Detailed results with score and breakdown
                                </li>
                                <li class="d-flex align-items-start gap-2 small fw-medium text-teal-deep">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:22px;height:22px;font-size:.7rem;margin-top:1px;background:#FFF7ED;color:#EA580C;"><i class="bi bi-check"></i></span>
                                    Exam-ready pressure for real preparation
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 border-start d-flex">
                            <div class="w-100 p-4 p-lg-5 d-flex flex-column justify-content-center" style="background:#FFF7ED;">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="fw-bold" style="font-size:.72rem;letter-spacing:.08em;text-transform:uppercase;color:#EA580C;">Exam Mode</span>
                                    <div class="d-flex align-items-center gap-2 bg-white rounded-pill px-3 py-1 border fw-bold small text-teal-deep" style="border-color:#FED7AA !important;">
                                        <i class="bi bi-clock" style="color:#EA580C;"></i> 42:17
                                    </div>
                                </div>
                                <div class="progress rounded-pill mb-1" style="height:8px;background:#FDDCAE;">
                                    <div class="progress-bar rounded-pill" style="width:28%;background:#EA580C;"></div>
                                </div>
                                <div class="text-slate mb-4" style="font-size:.72rem;font-weight:500;">28 of 100 answered</div>
                                <div class="d-flex align-items-center gap-3 bg-white rounded-3 border p-2 px-3 mb-2" style="border-color:#FED7AA !important;">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.72rem;background:#EA580C;color:#fff;border:1px solid #EA580C;">1</span>
                                    <span class="small fw-medium text-teal-deep">What is ARP used for?</span>
                                </div>
                                <div class="d-flex align-items-center gap-3 bg-white rounded-3 border p-2 px-3 mb-2" style="border-color:#FED7AA !important;">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.72rem;background:#EA580C;color:#fff;border:1px solid #EA580C;">2</span>
                                    <span class="small fw-medium text-teal-deep">Define a broadcast domain.</span>
                                </div>
                                <div class="d-flex align-items-center gap-3 bg-white rounded-3 border p-2 px-3 mb-2" style="border-color:#FED7AA !important;">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.72rem;background:#EA580C;color:#fff;border:1px solid #EA580C;">3</span>
                                    <span class="small fw-medium text-teal-deep">Default subnet mask for Class C?</span>
                                </div>
                                <div class="d-flex align-items-center gap-3 bg-white rounded-3 border p-2 px-3" style="border-color:#FED7AA !important;border-style:dashed !important;">
                                    <span class="d-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0" style="width:26px;height:26px;font-size:.72rem;background:#FFF7ED;color:#EA580C;border:1px solid #FED7AA;">4</span>
                                    <span class="small fw-medium text-slate">What port does HTTPS use?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function learnFlip() {
        document.getElementById("learnCard").classList.toggle("flipped");
    }

    function switchTab(id, btn) {
        document.querySelectorAll(".feat-panel").forEach(p => p.classList.remove("active"));
        document.querySelectorAll(".feat-tab").forEach(t => t.classList.remove("active"));
        document.getElementById("panel-" + id).classList.add("active");
        btn.classList.add("active");
    }

    function pracSelect(el, result) {
        el.closest(".feat-panel").querySelectorAll(".prac-option").forEach(o => o.classList.remove("correct", "wrong"));
        el.classList.add(result);
    }
</script>