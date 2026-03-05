<?php
/**
 * Sidebar Playlist - Videos in same course
 * DB Query stub:
 * $SQL = "SELECT v.video_id, v.slug, v.title, v.duration, m.title as module_title
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_modules m ON m.id = v.module_id
 *         WHERE v.course_id = ?
 *         ORDER BY m.sequence ASC, v.sequence ASC";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('i', $VIDEO['course_id']);
 * $SQL->execute();
 * $PLAYLIST = $SQL->get_result();
 */

// Placeholder data
$PLAYLIST = [
  ['video_id' => 'EB293755F0', 'slug' => 'first-and-second-year', 'title' => 'First and Second Year', 'duration' => '12:34', 'module' => 'Module 1'],
  ['video_id' => 'AB123456CD', 'slug' => 'history-of-computer-engineering', 'title' => 'History of Computer Engineering', 'duration' => '15:22', 'module' => 'Module 1'],
  ['video_id' => 'CD789012EF', 'slug' => 'processors-and-memory', 'title' => 'Processors and Memory', 'duration' => '18:45', 'module' => 'Module 2'],
  ['video_id' => 'EF345678GH', 'slug' => 'input-output-devices', 'title' => 'Input/Output Devices', 'duration' => '14:10', 'module' => 'Module 2'],
  ['video_id' => 'GH901234IJ', 'slug' => 'software-development-lifecycle', 'title' => 'Software Development Lifecycle', 'duration' => '20:15', 'module' => 'Module 3'],
];
?>

<div class="card border-0 shadow-sm">
  <div class="card-header border-0 pt-6">
    <h3 class="card-title fw-bold text-gray-900 fs-5">
      <i class="ki-outline ki-document fs-3 text-mflix me-2"></i> Course Playlist
    </h3>
    <div class="card-toolbar">
      <span class="text-gray-500 fs-7"><?= count($PLAYLIST) ?> videos</span>
    </div>
  </div>
  <div class="card-body p-0" style="max-height: 500px; overflow-y: auto;">
    <?php
    $current_module = '';
    foreach ($PLAYLIST as $item):
      if ($item['module'] !== $current_module):
        $current_module = $item['module'];
    ?>
    <div class="px-5 py-3 bg-light border-bottom">
      <span class="fw-bold text-gray-700 fs-7"><?= htmlspecialchars($current_module) ?></span>
    </div>
    <?php endif; ?>
    <a href="/mflix/video/<?= htmlspecialchars($item['video_id']) ?>_<?= htmlspecialchars($item['slug']) ?>"
      onclick="KTApp.showPageLoading()"
      video="<?= htmlspecialchars($item['video_id']) ?>"
      class="d-flex align-items-center justify-content-between px-5 py-3 border-bottom text-decoration-none text-hover-mflix">
      <div class="d-flex align-items-center min-w-0">
        <i class="ki-outline ki-to-right fs-5 text-mflix me-3 flex-shrink-0"></i>
        <span class="text-gray-800 fw-semibold fs-7 text-truncate"><?= htmlspecialchars($item['title']) ?></span>
      </div>
      <span class="text-gray-500 fs-8 ms-3 flex-shrink-0"><?= htmlspecialchars($item['duration']) ?></span>
    </a>
    <?php endforeach; ?>
  </div>
</div>
