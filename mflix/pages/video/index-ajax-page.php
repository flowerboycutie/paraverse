<?php

define('MBG', TRUE);
DIRECT_ACCESS_BLOCKED();

$video_id = htmlspecialchars($_GET['id'] ?? '');
if (!$video_id) {
  header('Content-Type: application/json');
  echo json_encode(['error' => 'Missing video ID']);
  exit;
}

/**
 * DB Query stub:
 * $SQL = "SELECT v.*, c.title as course_title, c.hash as course_hash
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         WHERE v.video_id = ?";
 */

$response = [
  'status' => 'success',
  'video' => [],
];

header('Content-Type: application/json');
echo json_encode($response);
