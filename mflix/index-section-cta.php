<?php
$MARQUEE_IMAGES = [
    'https://images.unsplash.com/photo-1637904743105-3118bbe3ed8b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1758691736067-b309ee3ef7b9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1718241905502-5d9b71410d63?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1770321927608-7dba9d1ba506?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1758685848006-1bc450061624?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1643625768411-6b6d5493fd86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
    'https://images.unsplash.com/photo-1742830575078-6663793d9536?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=400',
];
?>

<section class="position-relative overflow-hidden" style="background-color: #0A0A0A;">

    <!-- Single centered marquee row -->
    <div class="position-absolute w-100" style="top: 50%; left: 0; transform: translateY(-50%); filter: blur(3px); opacity: 0.4;">
        <div class="d-flex gap-4" style="animation: mflixMarqueeLeft 60s linear infinite; width: max-content;">
            <?php for ($dup = 0; $dup < 2; $dup++): ?>
                <?php foreach ($MARQUEE_IMAGES as $img): ?>
                    <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 320px; height: 180px; background: url('<?= $img ?>') center/cover no-repeat;"></div>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Dark overlay — heavier than hero, more closed in -->
    <div class="position-absolute w-100 h-100" style="top: 0; left: 0; background: linear-gradient(to bottom, #0A0A0A 15%, transparent 50%, #0A0A0A 85%); z-index: 1;"></div>

    <!-- CTA Content -->
    <div class="row align-items-center justify-content-center position-relative py-20" style="z-index: 2;">
        <div class="col-auto d-flex flex-column align-items-center justify-content-center gap-5">
            <div class="text-center mb-0">
                <h1 class="text-white fw-bolder display-3 mb-0">
                    Ready to Start Your Learning Journey?
                </h1>
                <p class="text-white-50 fs-4 fw-bold mb-0">
                    Stream educational content anytime, anywhere. Your next skill is just a play button away.
                </p>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-5">
                <a href="#" class="btn btn-mflix btn-active-dark btn-pill px-10 py-3 mx-1 fw-bolder">
                    <i class="fa-solid fa-play fa-sm text-white"></i> Watch Now
                </a>
            </div>
        </div>
    </div>

</section>