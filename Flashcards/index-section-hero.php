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
<section id="fc-hero" class="bg-teal-light d-flex align-items-center py-5 py-lg-0">
    <div class="hero-blob hero-blob-1"></div>
    <div class="hero-blob hero-blob-2"></div>

    <div class="app-container container-xxl">
        <div class=" row align-items-center g-5">

            <!-- copy -->
            <div class="col-lg-6">
                <!-- badge -->
                <div class="fade-up-1 mb-4">
                    <span class="badge rounded-pill bg-white border border-teal-mid text-teal px-3 py-2 fw-semibold" style="font-size:.75rem;letter-spacing:.05em;">
                        <span class="d-inline-block rounded-circle bg-warning me-1" style="width:7px;height:7px;"></span>
                        Technical Reviewer System
                    </span>
                </div>

                <h1 class="hero-headline text-teal-deep fade-up-2 mb-3">
                    Study smarter with<br><span>Flashcards</span>
                </h1>

                <p class="text-slate fs-5 lh-lg fade-up-3 mb-4" style="max-width:520px;">
                    A structured reviewer system built for learners who mean business. Create decks, practice with purpose, and test your knowledge — all in one place.
                </p>

                <div class="d-flex flex-wrap gap-3 fade-up-4">
                    <a href="#" class="btn btn-teal btn-lg rounded-3 px-4">
                        <i class="bi bi-play-fill text-white"></i> Get Started
                    </a>
                    <a href="#fc-features" class="btn btn-outline-teal btn-lg rounded-3 px-4 border border-2">
                        <i class="bi bi-grid-1x2"></i> See Features
                    </a>
                </div>

                <!-- stats -->
                <div class="d-flex flex-wrap align-items-center gap-4 mt-5 fade-up-5">
                    <div>
                        <div class="fw-bold text-teal-deep" style="font-size:1.55rem;letter-spacing:-.03em;line-height:1;">3</div>
                        <div class="text-slate small fw-medium mt-1">Study Modes</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div>
                        <div class="fw-bold text-teal-deep" style="font-size:1.55rem;letter-spacing:-.03em;line-height:1;">100</div>
                        <div class="text-slate small fw-medium mt-1">Items per Exam</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div>
                        <div class="fw-bold text-teal-deep" style="font-size:1.55rem;letter-spacing:-.03em;line-height:1;">CSV</div>
                        <div class="text-slate small fw-medium mt-1">Bulk Import</div>
                    </div>
                </div>
            </div>

            <!-- visual -->
            <div class="col-lg-6 d-flex justify-content-center fade-up-2">
                <div class="card-stack">
                    <div class="card-shadow card-shadow-2"></div>
                    <div class="card-shadow card-shadow-1"></div>
                    <div class="flip-wrap" onclick="heroFlip()">
                        <div class="flip-inner" id="heroFlipInner">
                            <div class="fc-face fc-front">
                                <div class="fc-label text-teal">Question</div>
                                <div class="fc-question text-teal-deep">What is Flashcards?</div>
                                <div class="d-flex align-items-center gap-1 mt-3 text-slate" style="font-size:.72rem;">
                                    <i class="bi bi-arrow-repeat"></i> Click to reveal answer
                                </div>
                            </div>
                            <div class="fc-face fc-back">
                                <div class="fc-label text-white">Answer</div>
                                <div class="fc-question text-white">Flashcards is a tool that makes learning fun and efficient!</div>
                                <div class="d-flex align-items-center gap-1 mt-3 text-white opacity-50" style="font-size:.72rem;">
                                    <i class="bi bi-arrow-repeat"></i> Click to flip back
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chips -->
                    <div class="hero-chip d-flex align-items-center gap-2 chip-1">
                        <span class="d-flex align-items-center justify-content-center rounded-2 bg-teal-light text-teal" style="width:28px;height:28px;font-size:.85rem;"><i class="bi bi-book-half"></i></span>
                        Learn
                    </div>
                    <div class="hero-chip d-flex align-items-center gap-2 chip-2">
                        <span class="d-flex align-items-center justify-content-center rounded-2" style="width:28px;height:28px;font-size:.85rem;background:#ECFDF5;color:#059669;"><i class="bi bi-pencil-square"></i></span>
                        Practice
                    </div>
                    <div class="hero-chip d-flex align-items-center gap-2 chip-3">
                        <span class="d-flex align-items-center justify-content-center rounded-2" style="width:28px;height:28px;font-size:.85rem;background:#FFF7ED;color:#EA580C;"><i class="bi bi-clipboard-check"></i></span>
                        Test
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function heroFlip() {
        document.getElementById("heroFlipInner").classList.toggle("flipped");
    }
</script>