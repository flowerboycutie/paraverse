<section class="bg-gradient-mflix">
  <div class="app-container container-xxl py-12">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <a href="/mflix/courses" onclick="KTApp.showPageLoading()" class="text-white opacity-75 text-hover-white fs-6 mb-3 d-inline-block">
          <i class="ki-outline ki-arrow-left text-white fs-5 me-1"></i> Back to Courses
        </a>
        <span class="badge bg-white text-mflix fs-7 fw-bold mb-3 d-block" style="width: fit-content;">
          <?= htmlspecialchars($RECORD['course_code']) ?>
        </span>
        <h1 class="text-white fs-2hx fw-bold mb-4"><?= htmlspecialchars($RECORD['title']) ?></h1>
        <p class="text-white opacity-75 fs-5 mb-6"><?= htmlspecialchars($RECORD['description']) ?></p>
        <div class="d-flex flex-wrap gap-5">
          <span class="text-white fs-6">
            <i class="ki-outline ki-folder fs-4 text-white me-1"></i>
            <?= intval($RECORD['modules']) ?> Modules
          </span>
          <span class="text-white fs-6">
            <i class="ki-outline ki-to-right fs-4 text-white me-1"></i>
            <?= intval($RECORD['videos']) ?> Videos
          </span>
          <span class="text-white fs-6">
            <i class="ki-outline ki-timer fs-4 text-white me-1"></i>
            <?= htmlspecialchars($RECORD['duration']) ?>
          </span>
          <a href="/mflix/channel/<?= htmlspecialchars($RECORD['channel_slug']) ?>" class="text-white text-hover-white fs-6">
            <i class="ki-outline ki-profile-user fs-4 text-white me-1"></i>
            <?= htmlspecialchars($RECORD['channel_name']) ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
