<?php
$RECENT_VIDEOS = [
  ['title' => 'Introduction to RESTful API Design', 'badge' => 'IT 312', 'duration' => '18:42'],
  ['title' => 'Binary Search Trees: Traversal Methods', 'badge' => 'CS 312', 'duration' => '24:15'],
  ['title' => 'Docker Containers for PHP Development', 'badge' => 'IT 314', 'duration' => '31:07'],
  ['title' => 'JavaScript ES6+ Arrow Functions Deep Dive', 'badge' => 'IT 311', 'duration' => '15:33'],
];
?>

<section style="border-bottom: 1px solid #E5E7EB;">
  <div class="px-6 py-5" style="border-bottom: 1px solid #E5E7EB;">
    <span class="fw-bolder text-gray-900" style="font-family: 'Anton', sans-serif; font-size: 22px; letter-spacing: 1px;">
      RECENTLY UPLOADED
    </span>
  </div>

  <div class="card shadow-sm border-0 mx-5 my-4">
    <?php foreach ($RECENT_VIDEOS as $i => $video): ?>
    <div class="d-flex align-items-center justify-content-between px-5 py-4 <?= $i < count($RECENT_VIDEOS) - 1 ? 'border-bottom border-gray-200' : '' ?>">
      <span class="text-gray-900 fs-7"><?= htmlspecialchars($video['title']) ?></span>
      <div class="d-flex align-items-center gap-3">
        <span class="fw-bold fs-8 rounded-2 px-2 py-1" style="background-color: rgba(229,9,20,0.1); color: #e50914;">
          <?= htmlspecialchars($video['badge']) ?>
        </span>
        <span class="fw-bold fs-7 text-gray-900"><?= htmlspecialchars($video['duration']) ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
