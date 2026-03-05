<?php
/**
 * Paginated Reviews
 * DB Query stub:
 * $page = intval($_GET['page'] ?? 1);
 * $limit = 10;
 * $offset = ($page - 1) * $limit;
 *
 * $SQL = "SELECT t.*, a.first_name, a.last_name, a.avatar
 *         FROM mflix_testimonials t
 *         LEFT JOIN accounts a ON a.id = t.user_id
 *         WHERE t.course_id = (SELECT id FROM mflix_courses WHERE hash = ?)
 *         ORDER BY t.created_at DESC LIMIT ? OFFSET ?";
 *
 * Rating summary:
 * $SQL = "SELECT AVG(rating) as avg, COUNT(*) as total FROM mflix_testimonials WHERE course_id = ?";
 */

// Placeholder data
$RATING_SUMMARY = ['average' => 9.2, 'total' => 24];
$REVIEWS = [
  ['user_id' => 1, 'user_name' => 'Juan Dela Cruz', 'rating' => 10, 'text' => 'Excellent course content! The videos are well-produced and the explanations are clear.', 'date' => 'Nov 4, 2025 11:19:24 am'],
  ['user_id' => 2, 'user_name' => 'Maria Santos', 'rating' => 9, 'text' => 'Very informative and engaging. I enjoyed every module of this course.', 'date' => 'Oct 28, 2025 3:45:10 pm'],
  ['user_id' => 3, 'user_name' => 'Pedro Reyes', 'rating' => 10, 'text' => 'The best educational video platform I have used. The course structure is very well organized.', 'date' => 'Oct 15, 2025 9:30:00 am'],
  ['user_id' => 4, 'user_name' => 'Ana Garcia', 'rating' => 8, 'text' => 'Great course overall. Some videos could be a bit longer for more detailed explanations.', 'date' => 'Oct 10, 2025 2:15:30 pm'],
  ['user_id' => 5, 'user_name' => 'Carlo Tan', 'rating' => 9, 'text' => 'Love the production quality. The team did an amazing job putting this together.', 'date' => 'Oct 5, 2025 10:00:00 am'],
];
?>

<section>
  <div class="app-container container-xxl py-10">
    <div class="row">
      <div class="col-lg-4 mb-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body text-center p-8">
            <span class="fs-3x fw-bold text-mflix"><?= number_format($RATING_SUMMARY['average'], 1) ?></span>
            <span class="text-gray-500 fs-5">/10</span>
            <p class="text-gray-500 fs-7 mt-2"><?= intval($RATING_SUMMARY['total']) ?> total reviews</p>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div id="reviews-container">
          <?php foreach ($REVIEWS as $review): ?>
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-6">
              <div class="d-flex align-items-center mb-4">
                <div class="symbol symbol-40px me-4">
                  <div class="symbol-label bg-light-mflix text-mflix fw-bold fs-5">
                    <?= strtoupper(substr($review['user_name'], 0, 1)) ?>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <a href="/briefcase/profile/<?= intval($review['user_id']) ?>"
                    class="fw-bold text-gray-900 text-hover-mflix"><?= htmlspecialchars($review['user_name']) ?></a>
                  <span class="d-block text-gray-500 fs-8"><?= htmlspecialchars($review['date']) ?></span>
                </div>
                <span class="badge bg-mflix text-white fs-7"><?= intval($review['rating']) ?>/10</span>
              </div>
              <p class="text-gray-700 mb-0"><?= htmlspecialchars($review['text']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Pagination placeholder -->
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item active"><a class="page-link bg-mflix border-mflix" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-mflix" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-mflix" href="#">3</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
