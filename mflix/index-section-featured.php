<?php
$COURSES = [
  [
    'num' => '01',
    'badge' => 'IT 311',
    'title' => "WEB SYSTEMS &\nTECHNOLOGIES",
    'desc' => 'Full-stack web development with PHP, MySQL, JavaScript and modern frameworks.',
    'stats' => '8 Modules · 32 Videos · 12h',
    'hash' => '9751450773',
  ],
  [
    'num' => '02',
    'badge' => 'IT 312',
    'title' => "INTEGRATIVE\nPROGRAMMING",
    'desc' => 'API design, microservices, and system integration patterns for enterprise applications.',
    'stats' => '6 Modules · 28 Videos · 9h',
    'hash' => '9751450774',
  ],
  [
    'num' => '03',
    'badge' => 'CS 312',
    'title' => "DATA STRUCTURES\n& ALGORITHMS",
    'desc' => 'Fundamental computing concepts, sorting, searching, trees, and graph algorithms.',
    'stats' => '10 Modules · 30 Videos · 8h',
    'hash' => '9751450775',
  ],
  [
    'num' => '04',
    'badge' => 'IT 314',
    'title' => "PLATFORM\nTECHNOLOGIES",
    'desc' => 'Cloud computing, containerization, CI/CD pipelines and DevOps practices.',
    'stats' => '5 Modules · 22 Videos · 6h',
    'hash' => '9751450776',
  ],
];
?>

<section style="border-bottom: 1px solid #E5E7EB;">
  <div class="row g-4 p-5">
    <?php foreach ($COURSES as $i => $course): ?>
    <div class="col-lg-3">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body d-flex flex-column gap-4">
          <span class="text-gray-900" style="font-family: 'Anton', sans-serif; font-size: 64px; line-height: 0.9;">
            <?= $course['num'] ?>
          </span>
          <span class="d-inline-block align-self-start fw-bold fs-8 rounded-2 px-2 py-1" style="background-color: rgba(229,9,20,0.1); color: #e50914;">
            <?= htmlspecialchars($course['badge']) ?>
          </span>
          <h3 class="text-gray-900 fw-bolder mb-0" style="font-family: 'Anton', sans-serif; font-size: 22px; line-height: 1; white-space: pre-line;">
            <?= htmlspecialchars($course['title']) ?>
          </h3>
          <p class="text-gray-900 fs-7 mb-0" style="line-height: 1.5;">
            <?= htmlspecialchars($course['desc']) ?>
          </p>
          <span class="fw-bold fs-8 text-gray-900" style="letter-spacing: 0.5px;">
            <?= htmlspecialchars($course['stats']) ?>
          </span>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
