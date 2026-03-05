<?php

define('MBG', TRUE);
DIRECT_ACCESS_BLOCKED();

$hash = htmlspecialchars($_GET['id'] ?? '');
if (!$hash) {
  header('Content-Type: application/json');
  echo json_encode(['error' => 'Missing course hash']);
  exit;
}

/**
 * DB Query stub:
 * $SQL = "SELECT m.id, m.title, m.sequence
 *         FROM mflix_modules m
 *         WHERE m.course_id = (SELECT id FROM mflix_courses WHERE hash = ?)
 *         ORDER BY m.sequence ASC";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('s', $hash);
 * $SQL->execute();
 * $modules = $SQL->get_result();
 *
 * $response = ['modules' => []];
 * while ($module = $modules->fetch_assoc()) {
 *   $vSQL = "SELECT id, title, slug, duration FROM mflix_videos WHERE module_id = ? ORDER BY sequence ASC";
 *   $vSQL = $EDITH->prepare($vSQL);
 *   $vSQL->bind_param('i', $module['id']);
 *   $vSQL->execute();
 *   $videos = $vSQL->get_result();
 *   $module['videos'] = [];
 *   while ($v = $videos->fetch_assoc()) { $module['videos'][] = $v; }
 *   $response['modules'][] = $module;
 * }
 */

$response = [
  'status' => 'success',
  'modules' => [],
];

header('Content-Type: application/json');
echo json_encode($response);
