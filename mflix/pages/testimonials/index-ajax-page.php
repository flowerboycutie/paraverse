<?php

define('MBG', TRUE);
DIRECT_ACCESS_BLOCKED();

$hash = htmlspecialchars($_GET['id'] ?? '');
$page = intval($_GET['page'] ?? 1);
$limit = 10;

if (!$hash) {
  header('Content-Type: application/json');
  echo json_encode(['error' => 'Missing course hash']);
  exit;
}

/**
 * DB Query stub:
 * $offset = ($page - 1) * $limit;
 *
 * $SQL = "SELECT t.*, a.first_name, a.last_name, a.avatar
 *         FROM mflix_testimonials t
 *         LEFT JOIN accounts a ON a.id = t.user_id
 *         WHERE t.course_id = (SELECT id FROM mflix_courses WHERE hash = ?)
 *         ORDER BY t.created_at DESC LIMIT ? OFFSET ?";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('sii', $hash, $limit, $offset);
 * $SQL->execute();
 * $result = $SQL->get_result();
 * $reviews = [];
 * while ($row = $result->fetch_assoc()) { $reviews[] = $row; }
 */

$response = [
  'status' => 'success',
  'reviews' => [],
  'page' => $page,
  'total_pages' => 1,
];

header('Content-Type: application/json');
echo json_encode($response);
