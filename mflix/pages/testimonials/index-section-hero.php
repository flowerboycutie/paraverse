<section class="bg-gradient-mflix">
  <div class="app-container container-xxl py-10">
    <a href="/mflix/course/<?= htmlspecialchars($COURSE['hash']) ?>" onclick="KTApp.showPageLoading()"
      class="text-white opacity-75 text-hover-white fs-6 mb-3 d-inline-block">
      <i class="ki-outline ki-arrow-left text-white fs-5 me-1"></i> Back to Course
    </a>
    <h1 class="text-white fs-2x fw-bold mb-2">Reviews</h1>
    <p class="text-white opacity-75 fs-5 mb-0">
      <span class="badge bg-white text-mflix me-2"><?= htmlspecialchars($COURSE['course_code']) ?></span>
      <?= htmlspecialchars($COURSE['title']) ?>
    </p>
  </div>
</section>
