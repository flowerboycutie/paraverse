<?php

/**
 * Recently Uploaded Videos — 4-column thumbnail grid
 * DB Query stub:
 * $SQL = "SELECT v.*, c.course_code, c.title as course_title
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         WHERE v.status = 'published'
 *         ORDER BY v.uploaded_at DESC LIMIT 4";
 */

$RECENT_VIDEOS = [
  [
    'id' => 'EB293755F0',
    'slug' => 'behavioral-metrics',
    'title' => 'Behavioral Metrics',
    'duration' => '9:17',
    'image' => 'https://images.unsplash.com/photo-1690192609138-33b5c4f04b8f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'id' => 'B89AAA0214',
    'slug' => 'self-reported-metrics',
    'title' => 'Self-Reported Metrics',
    'duration' => '10:21',
    'image' => 'https://images.unsplash.com/photo-1594256347468-5cd43df8fbaf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'id' => 'FA27A8FE26',
    'slug' => 'usability-issues',
    'title' => 'Usability Issues',
    'duration' => '16:00',
    'image' => 'https://images.unsplash.com/photo-1624207616909-8bc0ca58743b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'id' => 'FE9D700542',
    'slug' => 'performance-metrics',
    'title' => 'Performance Metrics',
    'duration' => '13:47',
    'image' => 'https://images.unsplash.com/photo-1654166602082-d18e7cd4bdac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
];
?>

<section class="mb-5">
  <!-- Header -->
  <div class="d-flex align-items-center justify-content-between mb-8">
    <div>
      <h2 class="fw-bolder text-gray-900 mb-1" style="font-size: 28px;">Recently Uploaded Videos</h2>
      <p class="text-gray-500 fs-7 mb-0">New videos you don't want to miss</p>
    </div>
    <a href="/mflix/videos/" onclick="KTApp.showPageLoading()" class="btn btn-sm btn-mflix rounded-2 fw-bold">View all</a>
  </div>

  <!-- Grid -->
  <div class="row g-5">
    <?php foreach ($RECENT_VIDEOS as $video): ?>
      <div class="col-lg-3 col-md-6">
        <a href="/mflix/video/<?= htmlspecialchars($video['id']) ?>_<?= htmlspecialchars($video['slug']) ?>" onclick="KTApp.showPageLoading()" class="text-decoration-none">
          <div class="d-flex flex-column gap-3">
            <!-- Thumbnail -->
            <div class="position-relative rounded-3 overflow-hidden" style="height: 160px; background: url('<?= $video['image'] ?>') center/cover no-repeat;">
              <!-- Duration badge -->
              <div class="position-absolute rounded-1 px-2 py-1" style="bottom: 8px; left: 8px; background-color: rgba(0,0,0,0.8);">
                <span class="text-white fw-semibold" style="font-size: 11px;"><?= htmlspecialchars($video['duration']) ?></span>
              </div>
              <!-- Play icon -->
              <div class="position-absolute d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background-color: rgba(229,9,20,0.6); top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <i class="ki-duotone ki-to-right fs-3 text-white"></i>
              </div>
            </div>
            <span class="fw-semibold text-gray-900 fs-7"><?= htmlspecialchars($video['title']) ?></span>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>