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

<section id="fc-how" class="py-5 py-lg-6 bg-white">
    <div class="container py-4">

        <div class="text-center mb-0">
            <div class="eyebrow mb-3">How It Works</div>
            <h2 class="fw-bold text-teal-deep mb-3" style="font-size:clamp(1.9rem,3.5vw,2.75rem);letter-spacing:-.025em;line-height:1.15;">
                From creation to mastery in 4 steps
            </h2>
            <p class="text-slate mx-auto lh-lg" style="max-width:520px;">
                Getting started is straightforward — build your deck, choose your mode, and start reviewing.
            </p>
        </div>

        <!-- steps -->
        <div class="row g-4 mt-4">
            <div class="col-sm-6 col-lg-3 step-col">
                <div class="step-card h-100 border rounded-3 p-4 bg-white">
                    <i class="bi bi-file-plus position-absolute top-0 end-0 mt-4 me-4 text-teal opacity-25" style="font-size:1.5rem;"></i>
                    <div class="step-num bg-teal-light text-teal border border-teal-mid mb-4">01</div>
                    <div class="fw-bold text-teal-deep mb-2">Create your deck</div>
                    <p class="text-slate small lh-base mb-0">Fill in flashcards one by one with a form, or import your questions from a <strong>.csv</strong> file to set up instantly.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 step-col">
                <div class="step-card h-100 border rounded-3 p-4 bg-white">
                    <i class="bi bi-book-half position-absolute top-0 end-0 mt-4 me-4 text-teal opacity-25" style="font-size:1.5rem;"></i>
                    <div class="step-num bg-teal-light text-teal border border-teal-mid mb-4">02</div>
                    <div class="fw-bold text-teal-deep mb-2">Learn the material</div>
                    <p class="text-slate small lh-base mb-0">Flip through every card in your deck at your own pace. Read the question, reveal the answer, and move on.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 step-col">
                <div class="step-card h-100 border rounded-3 p-4 bg-white">
                    <i class="bi bi-pencil-square position-absolute top-0 end-0 mt-4 me-4 text-teal opacity-25" style="font-size:1.5rem;"></i>
                    <div class="step-num bg-teal-light text-teal border border-teal-mid mb-4">03</div>
                    <div class="fw-bold text-teal-deep mb-2">Practice with 10 items</div>
                    <p class="text-slate small lh-base mb-0">Take a quick 10-question quiz to check how much you've retained. Instant feedback shows you what to revisit.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 step-col">
                <div class="step-card h-100 border rounded-3 p-4 bg-white">
                    <i class="bi bi-clipboard-check position-absolute top-0 end-0 mt-4 me-4 text-teal opacity-25" style="font-size:1.5rem;"></i>
                    <div class="step-num bg-teal-light text-teal border border-teal-mid mb-4">04</div>
                    <div class="fw-bold text-teal-deep mb-2">Take the 100-item exam</div>
                    <p class="text-slate small lh-base mb-0">When you're ready, sit the full 100-question test and get a comprehensive score report to measure your mastery.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function switchMethod(id, btn) {
        document.querySelectorAll(".method-panel").forEach(p => p.classList.remove("active"));
        document.querySelectorAll("[id^='tab-']").forEach(t => {
            t.classList.remove("btn-white", "shadow-sm", "text-teal-deep");
            t.classList.add("btn-transparent", "text-slate");
        });
        document.getElementById("method-" + id).classList.add("active");
        btn.classList.remove("btn-transparent", "text-slate");
        btn.classList.add("btn-white", "shadow-sm", "text-teal-deep");
    }
</script>