<?php

define('MBG', TRUE);

DIRECT_ACCESS_BLOCKED();

/**
 * DB Query stub:
 * $id = intval($_POST['id']);
 * $course_code = htmlspecialchars($_POST['course_code'], ENT_QUOTES, 'UTF-8');
 * $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
 * $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
 * $thumbnail = htmlspecialchars($_POST['thumbnail'], ENT_QUOTES, 'UTF-8');
 * $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
 * $featured = intval($_POST['featured']);
 *
 * if ($id > 0) {
 *   $SQL = "UPDATE mflix_courses SET course_code=?, title=?, description=?, thumbnail=?, status=?, featured=? WHERE id=?";
 *   $SQL = $EDITH->prepare($SQL);
 *   $SQL->bind_param('sssssii', $course_code, $title, $description, $thumbnail, $status, $featured, $id);
 * } else {
 *   $hash = sha1(uniqid(mt_rand(), true));
 *   $SQL = "INSERT INTO mflix_courses (hash, course_code, title, description, thumbnail, status, featured) VALUES (?,?,?,?,?,?,?)";
 *   $SQL = $EDITH->prepare($SQL);
 *   $SQL->bind_param('ssssssi', $hash, $course_code, $title, $description, $thumbnail, $status, $featured);
 * }
 * $SQL->execute();
 */

$response = [
  'status' => 'success',
  'message' => 'Course has been successfully saved.'
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
