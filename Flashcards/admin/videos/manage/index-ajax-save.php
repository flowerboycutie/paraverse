<?php

define('MBG', TRUE);

DIRECT_ACCESS_BLOCKED();

/**
 * DB Query stub:
 * $id = intval($_POST['id']);
 * $video_id = htmlspecialchars($_POST['video_id'], ENT_QUOTES, 'UTF-8');
 * $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
 * $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
 * $embed_url = htmlspecialchars($_POST['embed_url'], ENT_QUOTES, 'UTF-8');
 * $duration = htmlspecialchars($_POST['duration'], ENT_QUOTES, 'UTF-8');
 * $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
 * $course_id = intval($_POST['course_id']);
 * $module_id = intval($_POST['module_id']);
 * $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
 *
 * if ($id > 0) {
 *   $SQL = "UPDATE mflix_videos SET video_id=?, title=?, slug=?, description=?, embed_url=?, duration=?, status=?, course_id=?, module_id=? WHERE id=?";
 *   $SQL = $EDITH->prepare($SQL);
 *   $SQL->bind_param('sssssssiis', $video_id, $title, $slug, $description, $embed_url, $duration, $status, $course_id, $module_id, $id);
 * } else {
 *   if (empty($video_id)) { $video_id = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 10)); }
 *   $SQL = "INSERT INTO mflix_videos (video_id, title, slug, description, embed_url, duration, status, course_id, module_id) VALUES (?,?,?,?,?,?,?,?,?)";
 *   $SQL = $EDITH->prepare($SQL);
 *   $SQL->bind_param('sssssssii', $video_id, $title, $slug, $description, $embed_url, $duration, $status, $course_id, $module_id);
 * }
 * $SQL->execute();
 */

$response = [
  'status' => 'success',
  'message' => 'Video has been successfully saved.'
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
