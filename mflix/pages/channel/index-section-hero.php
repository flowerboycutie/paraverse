<section class="bg-gradient-mflix">
  <div class="app-container container-xxl py-10">
    <a href="/mflix/courses" onclick="KTApp.showPageLoading()" class="text-white opacity-75 text-hover-white fs-6 mb-3 d-inline-block">
      <i class="ki-outline ki-arrow-left text-white fs-5 me-1"></i> Back to Courses
    </a>
    <div class="d-flex align-items-center">
      <div class="symbol symbol-60px me-5">
        <div class="symbol-label bg-white text-mflix fw-bold fs-2x">
          <?= strtoupper(substr($CHANNEL['name'], 0, 1)) ?>
        </div>
      </div>
      <div>
        <h1 class="text-white fs-2x fw-bold mb-1"><?= htmlspecialchars($CHANNEL['name']) ?></h1>
        <p class="text-white opacity-75 fs-6 mb-0"><?= htmlspecialchars($CHANNEL['description']) ?></p>
      </div>
    </div>
  </div>
</section>
