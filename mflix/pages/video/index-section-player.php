<div class="mb-8">
  <a href="/mflix/course/<?= htmlspecialchars($VIDEO['course_hash']) ?>" onclick="KTApp.showPageLoading()"
    class="text-mflix text-hover-mflix fs-6 mb-4 d-inline-block">
    <i class="ki-outline ki-arrow-left text-mflix fs-5 me-1"></i> <?= htmlspecialchars($VIDEO['course_title']) ?>
  </a>

  <!-- Video Player Area -->
  <div class="bg-dark rounded d-flex align-items-center justify-content-center mb-6" style="height: 420px;">
    <?php if (!empty($VIDEO['embed_url'])): ?>
    <iframe src="<?= htmlspecialchars($VIDEO['embed_url']) ?>" class="w-100 h-100 rounded"
      frameborder="0" allowfullscreen></iframe>
    <?php else: ?>
    <div class="text-center">
      <i class="ki-outline ki-to-right text-white opacity-50" style="font-size: 80px;"></i>
      <p class="text-white opacity-50 mt-4 fs-5">Video player placeholder</p>
    </div>
    <?php endif; ?>
  </div>

  <!-- Video Metadata -->
  <h2 class="fw-bold text-gray-900 mb-3"><?= htmlspecialchars($VIDEO['title']) ?></h2>
  <div class="d-flex flex-wrap gap-4 mb-5">
    <span class="text-gray-600 fs-7">
      <i class="ki-outline ki-timer fs-6 text-mflix me-1"></i>
      <?= htmlspecialchars($VIDEO['duration']) ?>
    </span>
    <span class="text-gray-600 fs-7">
      <i class="ki-outline ki-folder fs-6 text-mflix me-1"></i>
      <?= htmlspecialchars($VIDEO['module_title']) ?>
    </span>
    <a href="/mflix/channel/<?= htmlspecialchars($VIDEO['channel_slug']) ?>" class="text-gray-600 text-hover-mflix fs-7">
      <i class="ki-outline ki-profile-user fs-6 text-mflix me-1"></i>
      <?= htmlspecialchars($VIDEO['channel_name']) ?>
    </a>
  </div>

  <?php if (!empty($VIDEO['description'])): ?>
  <div class="card border-0 bg-light">
    <div class="card-body p-5">
      <p class="text-gray-700 mb-0"><?= htmlspecialchars($VIDEO['description']) ?></p>
    </div>
  </div>
  <?php endif; ?>
</div>
