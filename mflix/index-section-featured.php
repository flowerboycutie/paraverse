<?php

/**
 * Featured Courses — 4-column card grid
 * DB Query stub:
 * $SQL = "SELECT c.*, AVG(t.rating) as avg_rating, COUNT(v.id) as video_count
 *         FROM mflix_courses c
 *         LEFT JOIN mflix_testimonials t ON t.course_id = c.id
 *         LEFT JOIN mflix_videos v ON v.course_id = c.id
 *         WHERE c.featured = 1 AND c.status = 'published'
 *         GROUP BY c.id
 *         ORDER BY c.sequence ASC LIMIT 4";
 */

$FEATURED_COURSES = [
  [
    'hash' => 'aa5e2263a14d19eb60ac4eeba81d966799e21023',
    'course_code' => 'MMA0079',
    'tag' => 'Official Courseware',
    'title' => 'Advertising Principles',
    'modules' => 9,
    'subtopics' => 7,
    'rating' => '10.0',
    'image' => 'https://images.unsplash.com/photo-1636959865743-f3999844bdff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'hash' => 'b420373d5e75be074515d47222a05f64b8ddca26',
    'course_code' => 'CE0017',
    'tag' => 'Official Courseware',
    'title' => 'Building System Design (LEC)',
    'modules' => 6,
    'subtopics' => 6,
    'rating' => '9.5',
    'image' => 'https://images.unsplash.com/photo-1766038843648-4e1a55e7700b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'hash' => '00ceeacb1b06dc5db90119032a300e6feada438f',
    'course_code' => 'CCS0003',
    'tag' => 'Official Courseware',
    'title' => 'Computer Programming 1 (LEC)',
    'modules' => 7,
    'subtopics' => 15,
    'rating' => '8.9',
    'image' => 'https://images.unsplash.com/photo-1610563166150-b34df4f3bcd6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
  [
    'hash' => '967cbd6e4887e3ee5837f51241c1f81a645021f2',
    'course_code' => 'CCS0005',
    'tag' => 'Official Courseware',
    'title' => 'Intro to Human Computer Interaction',
    'modules' => 11,
    'subtopics' => 19,
    'rating' => null,
    'image' => 'https://images.unsplash.com/photo-1687389806477-22be64a5480f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=600',
  ],
];
?>

<section class="mb-5">
  <!-- Header -->
  <div class="d-flex align-items-center justify-content-between mb-8">
    <div>
      <h2 class="fw-bolder text-gray-900 mb-1" style="font-size: 28px;">Featured Courses</h2>
      <p class="text-gray-500 fs-7 mb-0">Handpicked courses for your success</p>
    </div>
    <a href="/mflix/courses/" onclick="KTApp.showPageLoading()" class="btn btn-sm btn-mflix rounded-2 fw-bold">View all</a>
  </div>

  <!-- Grid -->
  <div class="row g-5">
    <?php foreach ($FEATURED_COURSES as $course): ?>
      <div class="col-lg-3 col-md-6">
        <a href="/mflix/course/<?= htmlspecialchars($course['hash']) ?>" onclick="KTApp.showPageLoading()" class="text-decoration-none">
          <div class="card border border-gray-200 shadow-sm h-100 overflow-hidden rounded-3">
            <!-- Thumbnail -->
            <div class="overflow-hidden" style="height: 180px; background: url('<?= $course['image'] ?>') center/cover no-repeat;"></div>
            <!-- Body -->
            <div class="card-body d-flex flex-column gap-2 p-4">
              <div class="d-flex align-items-center gap-2">
                <span class="fw-semibold text-mflix" style="font-size: 11px; letter-spacing: 1px;"><?= htmlspecialchars($course['course_code']) ?></span>
                <span class="text-gray-500" style="font-size: 11px;"><?= htmlspecialchars($course['tag']) ?></span>
              </div>
              <span class="fw-bold text-gray-900 fs-6"><?= htmlspecialchars($course['title']) ?></span>
              <div class="d-flex align-items-center gap-3">
                <span class="text-gray-500" style="font-size: 11px;"><?= $course['modules'] ?> Modules</span>
                <span class="text-gray-500" style="font-size: 11px;"><?= $course['subtopics'] ?> Subtopics</span>
              </div>
              <?php if ($course['rating']): ?>
                <div class="d-flex align-items-center gap-1">
                  <i class="ki-duotone ki-star fs-7" style="color: #F6C000;"><span class="path1"></span><span class="path2"></span></i>
                  <span class="fw-bold text-gray-900" style="font-size: 13px;"><?= $course['rating'] ?></span>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>