<?php
/**
 * All Courses Grid
 * DB Query stub:
 * $SQL = "SELECT c.*, AVG(t.rating) as avg_rating, COUNT(DISTINCT v.id) as video_count, COUNT(DISTINCT m.id) as module_count
 *         FROM mflix_courses c
 *         LEFT JOIN mflix_testimonials t ON t.course_id = c.id
 *         LEFT JOIN mflix_videos v ON v.course_id = c.id
 *         LEFT JOIN mflix_modules m ON m.course_id = c.id
 *         WHERE c.status = 'published'
 *         GROUP BY c.id
 *         ORDER BY c.title ASC";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->execute();
 * $RESULT = $SQL->get_result();
 * $COURSES = [];
 * while ($row = $RESULT->fetch_assoc()) { $COURSES[] = $row; }
 */

// Placeholder data
$COURSES = [
  ['hash' => 'e6620660d2c7dce9f41f2da657a1b55d0482c2fb', 'course_code' => 'CPE0001', 'title' => 'Computer Engineering as a Discipline', 'modules' => 8, 'videos' => 16, 'duration' => '2h 49m', 'rating' => null],
  ['hash' => 'aa5e2263a14d19eb60ac4eeba81d966799e21023', 'course_code' => 'MMA0079', 'title' => 'Advertising Principles', 'modules' => 9, 'videos' => 10, 'duration' => '2h 06m', 'rating' => 10.0],
  ['hash' => 'b420373d5e75be074515d47222a05f64b8ddca26', 'course_code' => 'GED0009', 'title' => 'Readings in Philippine History', 'modules' => 11, 'videos' => 21, 'duration' => '4h 29m', 'rating' => 8.9],
  ['hash' => '00ceeacb1b06dc5db90119032a300e6feada438f', 'course_code' => 'COE0019', 'title' => 'Differential Equations', 'modules' => 12, 'videos' => 20, 'duration' => '4h 17m', 'rating' => 10.0],
  ['hash' => '967cbd6e4887e3ee5837f51241c1f81a645021f2', 'course_code' => 'GED0007', 'title' => 'Art Appreciation', 'modules' => 8, 'videos' => 15, 'duration' => '4h 11m', 'rating' => 9.5],
  ['hash' => '2a4dfa8ec838633708f075f7cc3aa8c757bc0a92', 'course_code' => 'CCS0003', 'title' => 'Computer Programming 1', 'modules' => 7, 'videos' => 15, 'duration' => '7h 25m', 'rating' => 8.9],
  ['hash' => '9751450773', 'course_code' => 'GED0011', 'title' => 'Science, Technology and Society', 'modules' => 9, 'videos' => 15, 'duration' => '4h 42m', 'rating' => null],
];
?>

<section>
  <div class="app-container container-xxl py-10">
    <div class="d-flex justify-content-between align-items-center mb-8">
      <div>
        <h1 class="fs-2hx fw-bold text-gray-900 mb-2">All Courses</h1>
        <p class="text-gray-600 fs-5 mb-0"><?= count($COURSES) ?> courses available</p>
      </div>
    </div>

    <div class="row g-6">
      <?php foreach ($COURSES as $course): ?>
      <div class="col-md-6 col-lg-4">
        <a href="/mflix/course/<?= htmlspecialchars($course['hash']) ?>" onclick="KTApp.showPageLoading()"
          class="card border-0 shadow-sm h-100 text-decoration-none border-hover-mflix">
          <div class="card-body p-0">
            <div class="bg-gradient-mflix d-flex align-items-center justify-content-center" style="height: 140px;">
              <i class="ki-outline ki-book-open text-white opacity-50" style="font-size: 56px;"></i>
            </div>
            <div class="p-6">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-mflix text-white"><?= htmlspecialchars($course['course_code']) ?></span>
                <?php if (!empty($course['rating'])): ?>
                <span class="badge bg-light-danger text-mflix fw-bold"><?= number_format($course['rating'], 1) ?></span>
                <?php endif; ?>
              </div>
              <h4 class="fw-bold text-gray-900 mb-4"><?= htmlspecialchars($course['title']) ?></h4>
              <div class="d-flex flex-wrap gap-3">
                <span class="text-gray-600 fs-8">
                  <i class="ki-outline ki-folder fs-7 text-mflix me-1"></i>
                  <?= intval($course['modules']) ?> Modules
                </span>
                <span class="text-gray-600 fs-8">
                  <i class="ki-outline ki-to-right fs-7 text-mflix me-1"></i>
                  <?= intval($course['videos']) ?> Videos
                </span>
                <span class="text-gray-600 fs-8">
                  <i class="ki-outline ki-timer fs-7 text-mflix me-1"></i>
                  <?= htmlspecialchars($course['duration']) ?>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
