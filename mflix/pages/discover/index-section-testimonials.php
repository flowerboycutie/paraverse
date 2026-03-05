<?php

/**
 * Student Testimonials — 3-column cards
 * DB Query stub:
 * $SQL = "SELECT t.*, a.first_name, a.last_name, c.title as course_title, c.hash as course_hash
 *         FROM mflix_testimonials t
 *         LEFT JOIN accounts a ON a.id = t.user_id
 *         LEFT JOIN mflix_courses c ON c.id = t.course_id
 *         WHERE t.status = 'approved'
 *         ORDER BY RAND() LIMIT 3";
 */

$TESTIMONIALS = [
  [
    'name' => 'Jan Edilbert N. Solomon',
    'date' => 'Jul 2, 2025',
    'avatar_color' => '#E50914',
    'rating' => 10,
    'course' => 'Introduction to Film and Interactive Media',
    'text' => 'such great course keep it up guys',
  ],
  [
    'name' => 'Maria Arabella Dasal',
    'date' => 'Dec 4, 2024',
    'avatar_color' => '#3E7EFF',
    'rating' => 10,
    'course' => 'Computer Programming 1',
    'text' => 'The modules helped me with my midterms and finals',
  ],
  [
    'name' => 'Bernard A. Bullicer',
    'date' => 'Nov 19, 2024',
    'avatar_color' => '#17C653',
    'rating' => 9,
    'course' => 'Computer Programming 1',
    'text' => 'The video presentation is well thought of and precisely discusses the topics well.',
  ],
];
?>

<section class="mb-5">
  <!-- Header -->
  <div class="text-center mb-8">
    <h2 class="fw-bolder text-gray-900 mb-2" style="font-size: 28px;">What Students Are Saying</h2>
    <p class="text-gray-500 fs-7 mb-0">Learn to software interest to our students in many field tutorials</p>
  </div>

  <!-- Grid -->
  <div class="row g-5">
    <?php foreach ($TESTIMONIALS as $testimonial): ?>
      <div class="col-lg-4 col-md-6">
        <div class="card border border-gray-200 rounded-3 h-100">
          <div class="card-body d-flex flex-column gap-4 p-6">
            <!-- User row -->
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle" style="width: 40px; height: 40px; background-color: <?= $testimonial['avatar_color'] ?>;"></div>
                <div>
                  <div class="fw-semibold text-gray-900" style="font-size: 13px;"><?= htmlspecialchars($testimonial['name']) ?></div>
                  <div class="text-gray-500" style="font-size: 11px;"><?= htmlspecialchars($testimonial['date']) ?></div>
                </div>
              </div>
              <div class="d-flex align-items-center gap-1">
                <i class="ki-duotone ki-star fs-7" style="color: #F6C000;"><span class="path1"></span><span class="path2"></span></i>
                <span class="fw-bold text-gray-900 fs-7"><?= $testimonial['rating'] ?></span>
              </div>
            </div>
            <!-- Course name -->
            <span class="fw-semibold text-mflix fs-7"><?= htmlspecialchars($testimonial['course']) ?></span>
            <!-- Quote -->
            <p class="text-gray-600 fs-8 mb-0" style="line-height: 1.5;"><?= htmlspecialchars($testimonial['text']) ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>