<?php
$TESTIMONIALS = [
  [
    'stars' => '★★★★★',
    'quote' => '"The video quality is insane. It actually feels like Netflix but for learning. I finished an entire course in one weekend."',
    'name' => 'Maria Santos',
    'date' => 'Feb 2026',
  ],
  [
    'stars' => '★★★★★',
    'quote' => '"Way better than reading slides. The professors explain things clearly and the platform tracks my progress automatically."',
    'name' => 'James Reyes',
    'date' => 'Jan 2026',
  ],
  [
    'stars' => '★★★★☆',
    'quote' => '"I use MFLIX to review before exams. Being able to rewatch lectures at 2x speed is a game changer for last-minute cramming."',
    'name' => 'Carlo Mendoza',
    'date' => 'Dec 2025',
  ],
];
?>

<section>
  <div class="px-6 py-5" style="border-bottom: 1px solid #E5E7EB;">
    <span class="fw-bolder text-gray-900" style="font-family: 'Anton', sans-serif; font-size: 22px; letter-spacing: 1px;">
      WHAT STUDENTS SAY
    </span>
  </div>

  <div class="row g-4 p-5">
    <?php foreach ($TESTIMONIALS as $i => $t): ?>
    <div class="col-lg-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body d-flex flex-column gap-4">
          <span class="d-inline-block align-self-start fw-bold fs-8 px-2 py-1 rounded-2" style="background-color: rgba(229,9,20,0.1); color: #e50914;">
            <?= $t['stars'] ?>
          </span>
          <p class="text-gray-900 fs-7 mb-0" style="line-height: 1.5;">
            <?= htmlspecialchars($t['quote']) ?>
          </p>
          <span class="fw-bold fs-8 text-gray-900">
            <?= htmlspecialchars($t['name']) ?> &middot; <?= htmlspecialchars($t['date']) ?>
          </span>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
