<?php

/**
 * mflix Hero Section — Marquee with CSS animation
 * Rows of course thumbnail cards scrolling, gradient overlay, centered CTA
 */

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

<style>
    @keyframes mflixMarqueeLeft {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    @keyframes mflixMarqueeRight {
        0% {
            transform: translateX(-50%);
        }

        100% {
            transform: translateX(0);
        }
    }
</style>

<!-- Marquee Rows Container -->
<div class="position-absolute w-100 h-100" style="top: 0; left: 0; transform: rotate(-8deg); transform-origin: center center;">
    <!-- Row 1 -->
    <div class="d-flex gap-4 position-absolute" style="top: 60px; left: -100px; animation: mflixMarqueeLeft 30s linear infinite; width: max-content;">
        <?php for ($dup = 0; $dup < 2; $dup++): ?>
            <?php foreach ($MARQUEE_IMAGES as $img): ?>
                <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 280px; height: 160px; background: url('<?= $img ?>') center/cover no-repeat;"></div>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
    <!-- Row 2 (reverse) -->
    <div class="d-flex gap-4 position-absolute" style="top: 260px; left: -200px; animation: mflixMarqueeRight 40s linear infinite; width: max-content;">
        <?php for ($dup = 0; $dup < 2; $dup++): ?>
            <?php foreach (array_reverse($MARQUEE_IMAGES) as $img): ?>
                <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 280px; height: 160px; background: url('<?= $img ?>') center/cover no-repeat;"></div>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
    <!-- Row 3 -->
    <div class="d-flex gap-4 position-absolute" style="top: 460px; left: -50px; animation: mflixMarqueeLeft 25s linear infinite; width: max-content;">
        <?php for ($dup = 0; $dup < 2; $dup++): ?>
            <?php foreach ($MARQUEE_IMAGES as $img): ?>
                <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 280px; height: 160px; background: url('<?= $img ?>') center/cover no-repeat;"></div>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
</div>