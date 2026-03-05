<?php
/**
 * Channel Video Grid
 * DB Query stub:
 * $page = intval($_GET['page'] ?? 1);
 * $limit = 12;
 * $offset = ($page - 1) * $limit;
 *
 * $SQL = "SELECT v.*, c.course_code, c.title as course_title
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         WHERE v.channel_id = ? AND v.status = 'published'
 *         ORDER BY v.uploaded_at DESC LIMIT ? OFFSET ?";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('iii', $CHANNEL['id'], $limit, $offset);
 * $SQL->execute();
 * $RESULT = $SQL->get_result();
 */

// Placeholder data
$CHANNEL_VIDEOS = [
  ['video_id' => 'EB293755F0', 'slug' => 'first-and-second-year', 'title' => 'First and Second Year', 'course_code' => 'CPE0001', 'duration' => '12:34'],
  ['video_id' => 'B89AAA0214', 'slug' => 'meaning-and-relevance-of-history', 'title' => 'Meaning and Relevance of History', 'course_code' => 'GED0009', 'duration' => '15:22'],
  ['video_id' => 'FA27A8FE26', 'slug' => 'definition-classification-order-degree', 'title' => 'Definition, Classification, Order, Degree and Linearity', 'course_code' => 'COE0019', 'duration' => '18:45'],
  ['video_id' => 'FE9D700542', 'slug' => 'type-conversion-and-math-library-functions', 'title' => 'Type Conversion and Math Library Functions', 'course_code' => 'CCS0003', 'duration' => '20:10'],
  ['video_id' => 'AB123456CD', 'slug' => 'history-of-computer-engineering', 'title' => 'History of Computer Engineering', 'course_code' => 'CPE0001', 'duration' => '15:22'],
  ['video_id' => 'CD789012EF', 'slug' => 'processors-and-memory', 'title' => 'Processors and Memory', 'course_code' => 'CPE0001', 'duration' => '18:45'],
];
?>

<section>
  <div class="app-container container-xxl py-10">
    <div class="d-flex justify-content-between align-items-center mb-8">
      <h3 class="fw-bold text-gray-900 mb-0">All Videos</h3>
      <span class="text-gray-500 fs-6"><?= count($CHANNEL_VIDEOS) ?> videos</span>
    </div>

    <div class="row g-6">
      <?php foreach ($CHANNEL_VIDEOS as $video): ?>
      <div class="col-md-6 col-lg-4">
        <a href="/mflix/video/<?= htmlspecialchars($video['video_id']) ?>_<?= htmlspecialchars($video['slug']) ?>"
          onclick="KTApp.showPageLoading()" class="card border-0 shadow-sm h-100 text-decoration-none">
          <div class="card-body p-0">
            <div class="bg-gradient-mflix d-flex align-items-center justify-content-center" style="height: 140px;">
              <i class="ki-outline ki-to-right text-white opacity-50" style="font-size: 40px;"></i>
            </div>
            <div class="p-5">
              <span class="badge bg-light-danger text-mflix mb-2"><?= htmlspecialchars($video['course_code']) ?></span>
              <h5 class="fw-bold text-gray-900 mb-2 text-truncate"><?= htmlspecialchars($video['title']) ?></h5>
              <span class="text-gray-500 fs-8">
                <i class="ki-outline ki-timer fs-8 me-1"></i><?= htmlspecialchars($video['duration']) ?>
              </span>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination placeholder -->
    <nav class="mt-8">
      <ul class="pagination justify-content-center">
        <li class="page-item active"><a class="page-link bg-mflix border-mflix" href="#">1</a></li>
        <li class="page-item"><a class="page-link text-mflix" href="#">2</a></li>
      </ul>
    </nav>
  </div>
</section>
