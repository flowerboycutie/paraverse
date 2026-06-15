<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
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

    .text-teal {
        color: var(--fc-teal) !important;
    }

    .text-teal-deep {
        color: var(--fc-teal-deep) !important;
    }

    .text-slate {
        color: var(--fc-slate) !important;
    }

    .bg-teal-light {
        background-color: var(--fc-teal-light) !important;
    }

    .bg-teal-deep {
        background-color: var(--fc-teal-deep) !important;
    }

    .bg-teal {
        background-color: var(--fc-teal) !important;
    }

    .border-teal-mid {
        border-color: var(--fc-teal-mid) !important;
    }

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

    /* ── Section ── */
    #fc-ai {
        background: #F8FAFF;
        padding: 100px 0;
        overflow: hidden;
    }

    /* ── Coming soon badge ── */
    .coming-soon-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(245, 158, 11, .1);
        border: 1px solid rgba(245, 158, 11, .3);
        color: #B45309;
        border-radius: 999px;
        padding: 5px 14px;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .coming-soon-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--fc-amber);
        display: inline-block;
        animation: pulse 1.8s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: .4;
            transform: scale(.75);
        }
    }

    /* ── Carousel container ── */
    .ai-carousel {
        position: relative;
        overflow: hidden;
    }

    .ai-carousel-track {
        display: flex;
        transition: transform .45s cubic-bezier(.45, .05, .55, .95);
        will-change: transform;
        height: 380px;
        /* fixed height — tallest slide sets the bar */
    }

    /* each slide */
    .ai-slide {
        flex: 0 0 100%;
        padding: 0 4px;
        display: flex;
        align-items: center;
        /* vertically center card within the fixed height */
        justify-content: stretch;
    }

    /* step card */
    .ai-step-card {
        width: 100%;
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 20px;
        padding: 28px 28px 24px;
        transition: border-color .2s, box-shadow .2s;
    }

    .ai-step-card:hover {
        border-color: var(--fc-teal-mid);
        box-shadow: 0 8px 32px rgba(58, 175, 169, .1);
    }

    /* step icon circle */
    .ai-step-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        border: 2px solid var(--fc-teal-mid);
        background: var(--fc-teal-light);
        color: var(--fc-teal);
        margin-bottom: 20px;
    }

    .ai-step-label {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--fc-teal);
        opacity: .8;
        margin-bottom: 6px;
    }

    .ai-step-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--fc-teal-deep);
        letter-spacing: -.015em;
        margin-bottom: 10px;
    }

    .ai-step-body {
        font-size: .88rem;
        color: var(--fc-slate);
        line-height: 1.7;
        margin-bottom: 20px;
    }

    /* ── Inline prompt mockup (slide 1) ── */
    .prompt-inline {
        background: var(--fc-teal-light);
        border: 1px solid var(--fc-teal-mid);
        border-radius: 12px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .prompt-inline-text {
        font-size: .85rem;
        color: var(--fc-teal-deep);
        font-weight: 500;
    }

    .prompt-cursor {
        display: inline-block;
        width: 2px;
        height: .9em;
        background: var(--fc-teal);
        border-radius: 1px;
        animation: blink .9s step-end infinite;
        vertical-align: text-bottom;
        margin-left: 1px;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1
        }

        50% {
            opacity: 0
        }
    }

    .prompt-inline-btn {
        flex-shrink: 0;
        background: var(--fc-teal);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 7px 14px;
        font-size: .78rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    /* ── Processing bar (slide 2) ── */
    .ai-processing {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 4px;
    }

    .ai-processing-bar {
        flex: 1;
        height: 7px;
        background: #E2E8F0;
        border-radius: 99px;
        overflow: hidden;
    }

    .ai-processing-fill {
        height: 100%;
        border-radius: 99px;
        background: linear-gradient(90deg, var(--fc-teal), var(--fc-teal-mid));
        width: 70%;
        animation: shimmer 1.8s ease-in-out infinite;
    }

    @keyframes shimmer {

        0%,
        100% {
            opacity: 1;
            width: 70%;
        }

        50% {
            opacity: .6;
            width: 88%;
        }
    }

    .ai-processing-label {
        font-size: .75rem;
        font-weight: 600;
        color: var(--fc-teal);
        white-space: nowrap;
    }

    /* ── Generated cards preview (slide 3) ── */
    .gen-preview {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .gen-preview-card {
        background: var(--fc-teal-light);
        border: 1px solid var(--fc-teal-mid);
        border-radius: 10px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .gen-preview-q {
        font-size: .82rem;
        font-weight: 600;
        color: var(--fc-teal-deep);
    }

    .gen-preview-num {
        flex-shrink: 0;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--fc-teal);
        color: #fff;
        font-size: .65rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ── Carousel nav ── */
    .ai-carousel-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 24px;
    }

    /* step dots / progress */
    .ai-dots {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .ai-dot {
        width: 8px;
        height: 8px;
        border-radius: 99px;
        background: #CBD5E1;
        border: none;
        padding: 0;
        cursor: pointer;
        transition: width .3s, background .2s;
    }

    .ai-dot.active {
        width: 28px;
        background: var(--fc-teal);
    }

    /* arrow buttons */
    .ai-nav-btn {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 1.5px solid #E2E8F0;
        background: #fff;
        color: var(--fc-teal-deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        cursor: pointer;
        transition: background .2s, border-color .2s, color .2s;
    }

    .ai-nav-btn:hover {
        background: var(--fc-teal-light);
        border-color: var(--fc-teal-mid);
        color: var(--fc-teal);
    }

    .ai-nav-btn:disabled {
        opacity: .35;
        cursor: not-allowed;
    }

    .ai-nav-arrows {
        display: flex;
        gap: 8px;
    }

    /* step counter */
    .ai-counter {
        font-size: .82rem;
        font-weight: 600;
        color: var(--fc-slate);
    }

    .ai-counter span {
        color: var(--fc-teal);
        font-weight: 800;
    }

    /* ── Disclaimer ── */
    .ai-disclaimer {
        font-size: .78rem;
        color: var(--fc-slate);
        display: flex;
        align-items: flex-start;
        gap: 7px;
        margin-top: 28px;
        padding: 12px 16px;
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
    }

    @media (max-width: 991px) {
        #fc-ai {
            padding: 72px 0;
        }
    }
</style>

<section id="fc-ai">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- ── LEFT: copy ── -->
            <div class="col-lg-5">
                <div class="d-flex align-items-center gap-3 flex-wrap mb-4">
                    <div class="eyebrow">AI-Powered</div>
                </div>

                <h2 class="fw-bold text-teal-deep mb-3" style="font-size:clamp(1.9rem,3.2vw,2.6rem);letter-spacing:-.025em;line-height:1.15;">
                    Let AI build your deck for you
                </h2>

                <p class="text-slate lh-lg mb-3" style="font-size:1.05rem;">
                    Stop spending time creating cards manually. Just describe what you want to review and Flashcards AI will generate a complete, study-ready deck in seconds.
                </p>

                <p class="text-slate lh-lg" style="font-size:.95rem;">
                    You stay in control — review every generated card, edit anything that doesn't fit, and add the deck to your collection with one click. The same Learn, Practice, and Test modes work on AI-generated decks too.
                </p>

                <div class="ai-disclaimer">
                    <i class="bi bi-info-circle flex-shrink-0 text-teal mt-1"></i>
                    <span>AI card generation is an upcoming feature and is not yet available. This functionality is still being finalized and details are subject to change.</span>
                </div>
            </div>

            <!-- ── RIGHT: carousel ── -->
            <div class="col-lg-7">

                <div class="ai-carousel" id="aiCarousel">
                    <div class="ai-carousel-track" id="aiTrack">

                        <!-- Slide 1: Prompt -->
                        <div class="ai-slide">
                            <div class="ai-step-card">
                                <div class="ai-step-icon"><i class="bi bi-textarea-t"></i></div>
                                <div class="ai-step-label">Step 1 of 4</div>
                                <div class="ai-step-title">Type your prompt</div>
                                <p class="ai-step-body">Describe the topic, subject, or scope you want to study. Be as broad or specific as you need — the AI adapts to your input.</p>
                                <div class="prompt-inline">
                                    <div class="prompt-inline-text">
                                        Generate flashcards about OSI model layers<span class="prompt-cursor"></span>
                                    </div>
                                    <div class="prompt-inline-btn">
                                        <i class="bi bi-stars text-white"></i> Generate
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Processing -->
                        <div class="ai-slide">
                            <div class="ai-step-card">
                                <div class="ai-step-icon"><i class="bi bi-cpu"></i></div>
                                <div class="ai-step-label">Step 2 of 4</div>
                                <div class="ai-step-title">AI processes your request</div>
                                <p class="ai-step-body">The AI reads your prompt, structures the topic, and writes clear question-and-answer pairs suited for active recall study.</p>
                                <div class="ai-processing">
                                    <div class="ai-processing-bar">
                                        <div class="ai-processing-fill"></div>
                                    </div>
                                    <span class="ai-processing-label"><i class="bi bi-stars me-1"></i>Generating…</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Review -->
                        <div class="ai-slide">
                            <div class="ai-step-card">
                                <div class="ai-step-icon"><i class="bi bi-eye"></i></div>
                                <div class="ai-step-label">Step 3 of 4</div>
                                <div class="ai-step-title">Review before saving</div>
                                <p class="ai-step-body">Every generated card is shown to you first. Edit, remove, or keep each one — nothing gets added to your deck without your approval.</p>
                                <div class="gen-preview">
                                    <div class="gen-preview-card">
                                        <span class="gen-preview-q">What does the Physical layer do?</span>
                                        <span class="gen-preview-num">1</span>
                                    </div>
                                    <div class="gen-preview-card">
                                        <span class="gen-preview-q">What is the role of the Network layer?</span>
                                        <span class="gen-preview-num">2</span>
                                    </div>
                                    <div class="gen-preview-card">
                                        <span class="gen-preview-q">Which layer handles end-to-end communication?</span>
                                        <span class="gen-preview-num">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4: Study -->
                        <div class="ai-slide">
                            <div class="ai-step-card">
                                <div class="ai-step-icon"><i class="bi bi-collection"></i></div>
                                <div class="ai-step-label">Step 4 of 4</div>
                                <div class="ai-step-title">Add to your deck and start studying</div>
                                <p class="ai-step-body">Approved cards go straight into your deck. Use Learn, Practice, or Test mode — the same way you would with any manually created deck.</p>
                                <div class="d-flex gap-2 flex-wrap mt-1">
                                    <span class="badge rounded-pill px-3 py-2 bg-teal-light text-teal fw-semibold" style="font-size:.78rem;"><i class="bi bi-book-half me-1"></i>Learn</span>
                                    <span class="badge rounded-pill px-3 py-2 fw-semibold" style="font-size:.78rem;background:#ECFDF5;color:#059669;"><i class="bi bi-pencil-square me-1"></i>Practice</span>
                                    <span class="badge rounded-pill px-3 py-2 fw-semibold" style="font-size:.78rem;background:#FFF7ED;color:#EA580C;"><i class="bi bi-clipboard-check me-1"></i>Test</span>
                                </div>
                            </div>
                        </div>

                    </div><!-- /track -->
                </div><!-- /carousel -->

                <!-- Nav -->
                <div class="ai-carousel-nav">
                    <div class="ai-dots">
                        <button class="ai-dot active" onclick="aiGoTo(0)"></button>
                        <button class="ai-dot" onclick="aiGoTo(1)"></button>
                        <button class="ai-dot" onclick="aiGoTo(2)"></button>
                        <button class="ai-dot" onclick="aiGoTo(3)"></button>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="ai-counter">Step <span id="aiCounterCur">1</span> of 4</div>
                        <div class="ai-nav-arrows">
                            <button class="ai-nav-btn" id="aiPrev" onclick="aiPrev()" disabled>
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <button class="ai-nav-btn" id="aiNext" onclick="aiNext()">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</section>

<script>
    (function() {
        var current = 0;
        var total = 4;

        function aiGoTo(index) {
            current = index;
            document.getElementById('aiTrack').style.transform = 'translateX(-' + (current * 100) + '%)';
            // dots
            document.querySelectorAll('.ai-dot').forEach(function(d, i) {
                d.classList.toggle('active', i === current);
            });
            // counter
            document.getElementById('aiCounterCur').textContent = current + 1;
            // buttons
            document.getElementById('aiPrev').disabled = current === 0;
            document.getElementById('aiNext').disabled = current === total - 1;
        }

        window.aiGoTo = aiGoTo;
        window.aiPrev = function() {
            if (current > 0) aiGoTo(current - 1);
        };
        window.aiNext = function() {
            if (current < total - 1) aiGoTo(current + 1);
        };

        // swipe support
        var startX = 0;
        var el = document.getElementById('aiCarousel');
        el.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
        }, {
            passive: true
        });
        el.addEventListener('touchend', function(e) {
            var diff = startX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) diff > 0 ? window.aiNext() : window.aiPrev();
        });
    })();
</script>