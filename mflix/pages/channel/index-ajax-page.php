<?php

define('MBG', TRUE);
DIRECT_ACCESS_BLOCKED();

$slug = htmlspecialchars($_GET['id'] ?? '');
$page = intval($_GET['page'] ?? 1);

if (!$slug) {
  header('Content-Type: application/json');
  echo json_encode(['error' => 'Missing channel slug']);
  exit;
}

/**
 * DB Query stub:
 * $limit = 12;
 * $offset = ($page - 1) * $limit;
 * $SQL = "SELECT v.*, c.course_code
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         WHERE v.channel_id = (SELECT id FROM mflix_channels WHERE slug = ?)
 *         ORDER BY v.uploaded_at DESC LIMIT ? OFFSET ?";
 */

$response = [
  'status' => 'success',
  'videos' => [],
  'page' => $page,
  'total_pages' => 1,
];

header('Content-Type: application/json');
echo json_encode($response);
