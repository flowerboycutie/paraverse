<?php
/**
 * Course Modules Accordion
 * DB Query stub:
 * $SQL = "SELECT m.*, GROUP_CONCAT(v.id ORDER BY v.sequence) as video_ids
 *         FROM mflix_modules m
 *         LEFT JOIN mflix_videos v ON v.module_id = m.id
 *         WHERE m.course_id = ?
 *         GROUP BY m.id
 *         ORDER BY m.sequence ASC";
 *
 * For each module, fetch videos:
 * $SQL = "SELECT * FROM mflix_videos WHERE module_id = ? ORDER BY sequence ASC";
 */

// Placeholder data
$MODULES = [
  [
    'id' => 1,
    'title' => 'Module 1: Introduction to Computer Engineering',
    'videos' => [
      ['id' => 'EB293755F0', 'slug' => 'first-and-second-year', 'title' => 'First and Second Year', 'duration' => '12:34'],
      ['id' => 'AB123456CD', 'slug' => 'history-of-computer-engineering', 'title' => 'History of Computer Engineering', 'duration' => '15:22'],
    ],
  ],
  [
    'id' => 2,
    'title' => 'Module 2: Computer Hardware Fundamentals',
    'videos' => [
      ['id' => 'CD789012EF', 'slug' => 'processors-and-memory', 'title' => 'Processors and Memory', 'duration' => '18:45'],
      ['id' => 'EF345678GH', 'slug' => 'input-output-devices', 'title' => 'Input/Output Devices', 'duration' => '14:10'],
    ],
  ],
  [
    'id' => 3,
    'title' => 'Module 3: Software Engineering Basics',
    'videos' => [
      ['id' => 'GH901234IJ', 'slug' => 'software-development-lifecycle', 'title' => 'Software Development Lifecycle', 'duration' => '20:15'],
    ],
  ],
  [
    'id' => 4,
    'title' => 'Module 4: Digital Logic and Circuits',
    'videos' => [
      ['id' => 'IJ567890KL', 'slug' => 'boolean-algebra', 'title' => 'Boolean Algebra', 'duration' => '16:30'],
      ['id' => 'KL123456MN', 'slug' => 'logic-gates', 'title' => 'Logic Gates', 'duration' => '13:20'],
    ],
  ],
];
?>

<div class="mb-10">
  <h3 class="fw-bold text-gray-900 mb-6">Course Content</h3>
  <div class="accordion" id="courseAccordion">
    <?php foreach ($MODULES as $index => $module): ?>
    <div class="accordion-item border-0 mb-3">
      <h2 class="accordion-header" id="heading_<?= $module['id'] ?>">
        <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?> bg-light fw-bold text-gray-800 rounded"
          type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?= $module['id'] ?>"
          aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse_<?= $module['id'] ?>">
          <span class="me-3"><?= htmlspecialchars($module['title']) ?></span>
          <span class="badge bg-mflix text-white ms-auto me-3"><?= count($module['videos']) ?> videos</span>
        </button>
      </h2>
      <div id="collapse_<?= $module['id'] ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>"
        aria-labelledby="heading_<?= $module['id'] ?>" data-bs-parent="#courseAccordion">
        <div class="accordion-body p-0">
          <?php foreach ($module['videos'] as $video): ?>
          <a href="/mflix/video/<?= htmlspecialchars($video['id']) ?>_<?= htmlspecialchars($video['slug']) ?>"
            onclick="KTApp.showPageLoading()"
            video="<?= htmlspecialchars($video['id']) ?>"
            class="d-flex align-items-center justify-content-between p-4 border-bottom text-decoration-none text-hover-mflix">
            <div class="d-flex align-items-center">
              <i class="ki-outline ki-to-right fs-3 text-mflix me-3"></i>
              <span class="text-gray-800 fw-semibold"><?= htmlspecialchars($video['title']) ?></span>
            </div>
            <span class="text-gray-500 fs-7">
              <i class="ki-outline ki-timer fs-7 me-1"></i>
              <?= htmlspecialchars($video['duration']) ?>
            </span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
