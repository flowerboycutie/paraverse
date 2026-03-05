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

<section class="position-relative overflow-hidden" style="height: 700px; background-color: #0A0A0A;">
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

  <!-- Gradient Overlay -->
  <div class="position-absolute w-100 h-100" style="top: 0; left: 0; background: radial-gradient(ellipse 120% 120% at center, transparent 0%, rgba(10,10,10,0.8) 40%, #0A0A0A 85%); z-index: 1;"></div>

  <!-- Center CTA -->
  <div class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center px-5" style="top: 0; left: 0; z-index: 2;">
    <h1 class="text-white fw-bolder mb-3" style="font-size: 56px; letter-spacing: -1px; line-height: 1.1; max-width: 800px;">
      Binge Watch Courses<br>Like Your Favorite TV Show
    </h1>
    <p class="mb-8" style="color: rgba(255,255,255,0.6); font-size: 16px; line-height: 1.5; max-width: 600px;">
      Stream educational content anytime, anywhere. Your next skill is just a play button away.
    </p>
    <div class="d-flex align-items-center gap-3 flex-wrap justify-content-center">
      <a href="/mflix/" onclick="KTApp.showPageLoading()" class="btn btn-mflix rounded-2 d-flex align-items-center gap-2" style="padding: 14px 28px;">
        <i class="ki-duotone ki-to-right fs-4 text-white"></i>
        <span class="fw-semibold fs-6 text-white">Start Watching</span>
      </a>
      <a href="/mflix/courses/" onclick="KTApp.showPageLoading()" class="btn rounded-2 d-flex align-items-center" style="padding: 14px 28px; border: 1px solid rgba(255,255,255,0.3); color: #fff;">
        <span class="fw-semibold fs-6">Browse Courses</span>
      </a>
    </div>
  </div>
</section>