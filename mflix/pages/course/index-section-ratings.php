<?php
/**
 * Course Ratings Summary
 * DB Query stub:
 * $SQL = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews
 *         FROM mflix_testimonials
 *         WHERE course_id = ?";
 *
 * Rating distribution:
 * $SQL = "SELECT rating, COUNT(*) as count
 *         FROM mflix_testimonials
 *         WHERE course_id = ?
 *         GROUP BY rating ORDER BY rating DESC";
 */

// Placeholder data
$RATING = [
  'average' => 9.2,
  'total_reviews' => 24,
  'distribution' => [
    10 => 12,
    9 => 6,
    8 => 4,
    7 => 1,
    6 => 1,
    5 => 0,
    4 => 0,
    3 => 0,
    2 => 0,
    1 => 0,
  ],
];
$max_count = max($RATING['distribution']) ?: 1;
?>

<div class="card border-0 shadow-sm">
  <div class="card-header border-0 pt-6">
    <h3 class="card-title fw-bold text-gray-900">
      <i class="ki-outline ki-star fs-2 text-mflix me-2"></i> Ratings
    </h3>
    <div class="card-toolbar">
      <a href="/mflix/testimonials/<?= htmlspecialchars($END_URL) ?>" onclick="KTApp.showPageLoading()"
        class="btn btn-sm btn-light-mflix">View All</a>
    </div>
  </div>
  <div class="card-body pt-0">
    <div class="text-center mb-6">
      <span class="fs-3x fw-bold text-mflix"><?= number_format($RATING['average'], 1) ?></span>
      <span class="text-gray-500 fs-5">/10</span>
      <p class="text-gray-500 fs-7 mt-1"><?= intval($RATING['total_reviews']) ?> reviews</p>
    </div>

    <?php for ($i = 10; $i >= 1; $i--): ?>
    <?php
      $count = $RATING['distribution'][$i] ?? 0;
      $pct = $RATING['total_reviews'] > 0 ? round(($count / $RATING['total_reviews']) * 100) : 0;
    ?>
    <div class="d-flex align-items-center mb-2">
      <span class="text-gray-700 fw-semibold fs-8 me-3" style="width: 20px;"><?= $i ?></span>
      <div class="progress flex-grow-1" style="height: 8px;">
        <div class="progress-bar bg-mflix" role="progressbar" style="width: <?= $pct ?>%"
          aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <span class="text-gray-500 fs-8 ms-3" style="width: 30px;"><?= $count ?></span>
    </div>
    <?php endfor; ?>
  </div>
</div>
