<?php
/**
 * Start Mastering Section — Table row layout
 * DB Query stub:
 * $SQL = "SELECT v.*, c.title as course_title, c.hash as course_hash, c.course_code
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         WHERE c.featured = 1 AND v.status = 'published'
 *         ORDER BY RAND() LIMIT 4";
 */

// Placeholder data
$MASTERING_COURSE = [
  'title' => 'Advertising Principles',
  'course_code' => 'MMA 079',
  'hash' => 'aa5e2263a14d19eb60ac4eeba81d966799e21023',
];

$MASTERING_VIDEOS = [
  [
    'id' => 'A1B2C3D4E5',
    'slug' => 'branding-and-ethics',
    'title' => 'Branding and Ethics',
    'duration' => '14:20',
  ],
  [
    'id' => 'F6G7H8I9J0',
    'slug' => 'history-of-advertising',
    'title' => 'History of Advertising',
    'duration' => '18:35',
  ],
  [
    'id' => 'K1L2M3N4O5',
    'slug' => 'tools-for-marketing-and-branding-strategy',
    'title' => 'Tools for Marketing and Branding Strategy',
    'duration' => '22:10',
  ],
  [
    'id' => 'P6Q7R8S9T0',
    'slug' => 'building-a-corporate-social-responsibility-image',
    'title' => 'Building A Corporate Social Responsibility Image',
    'duration' => '16:45',
  ],
];

$total = count($MASTERING_VIDEOS);
?>

<section class="border-bottom border-2 border-dark">
  <div class="px-6 py-5 border-bottom border-2 border-dark">
    <div class="d-flex flex-wrap gap-2 align-items-center">
      <span class="text-dark text-uppercase" style="font-family: 'Anton', sans-serif; font-size: 22px; letter-spacing: 1px;">
        START MASTERING
      </span>
      <span class="text-mflix text-uppercase" style="font-family: 'Anton', sans-serif; font-size: 22px; letter-spacing: 1px;">
        <?= htmlspecialchars(strtoupper($MASTERING_COURSE['title'])) ?>
      </span>
    </div>
    <span class="text-gray-600 fs-8">Quick lessons for in-depth understanding</span>
  </div>

  <?php foreach ($MASTERING_VIDEOS as $i => $video): ?>
  <a href="/mflix/video/<?= htmlspecialchars($video['id']) ?>_<?= htmlspecialchars($video['slug']) ?>"
    onclick="KTApp.showPageLoading()"
    class="d-flex justify-content-between align-items-center px-6 py-4 text-decoration-none <?= $i < $total - 1 ? 'border-bottom border-dark' : '' ?>">
    <span class="text-dark fs-7"><?= htmlspecialchars($video['title']) ?></span>
    <span class="d-flex align-items-center gap-3">
      <span class="d-inline-block border border-2 border-dark rounded-1 px-2 py-1 fw-bold text-dark fs-9">
        <?= htmlspecialchars($MASTERING_COURSE['course_code']) ?>
      </span>
      <span class="text-dark fw-bold fs-7"><?= htmlspecialchars($video['duration']) ?></span>
    </span>
  </a>
  <?php endforeach; ?>
</section>
