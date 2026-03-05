<?php
/**
 * Production Team Credits
 * DB Query stub:
 * $SQL = "SELECT ct.*, a.first_name, a.last_name, a.avatar
 *         FROM mflix_course_team ct
 *         LEFT JOIN accounts a ON a.id = ct.user_id
 *         WHERE ct.course_id = ?
 *         ORDER BY ct.sequence ASC";
 */

// Placeholder data
$TEAM = [
  ['user_id' => 101, 'name' => 'Dr. Maria Reyes', 'role' => 'Subject Matter Expert'],
  ['user_id' => 102, 'name' => 'John Santos', 'role' => 'Project Lead'],
  ['user_id' => 103, 'name' => 'Ana Cruz', 'role' => 'Content Specialist'],
  ['user_id' => 104, 'name' => 'Marco Dela Cruz', 'role' => 'Multimedia Designer'],
  ['user_id' => 105, 'name' => 'Lisa Tan', 'role' => 'TechXpert'],
  ['user_id' => 106, 'name' => 'Carlo Reyes', 'role' => 'Poster Designer'],
  ['user_id' => 107, 'name' => 'Marie Garcia', 'role' => 'Trailer Editor'],
];
?>

<div class="card border-0 shadow-sm mb-6">
  <div class="card-header border-0 pt-6">
    <h3 class="card-title fw-bold text-gray-900">
      <i class="ki-outline ki-people fs-2 text-mflix me-2"></i> Production Team
    </h3>
  </div>
  <div class="card-body pt-0">
    <?php foreach ($TEAM as $member): ?>
    <div class="d-flex align-items-center mb-4">
      <div class="symbol symbol-35px me-3">
        <div class="symbol-label bg-light-mflix text-mflix fw-bold fs-6">
          <?= strtoupper(substr($member['name'], 0, 1)) ?>
        </div>
      </div>
      <div>
        <a href="/briefcase/profile/<?= intval($member['user_id']) ?>"
          class="fw-semibold text-gray-800 text-hover-mflix d-block fs-7"><?= htmlspecialchars($member['name']) ?></a>
        <span class="text-gray-500 fs-8"><?= htmlspecialchars($member['role']) ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
