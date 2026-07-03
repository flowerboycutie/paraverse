<?php

define('MBG', TRUE);

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['id']);
$tableKey = htmlspecialchars($_POST['table'], ENT_QUOTES, 'UTF-8');

// Input validation
if ($id <= 0 || empty($tableKey)) {
  echo json_encode([
    'status' => 'error',
    'message' => 'Invalid input data.'
  ]);
  exit;
}

/**
 * DB Query stub:
 * $SQL = "DELETE FROM mflix_videos WHERE id = ?";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('i', $id);
 * $SQL->execute();
 */

$response = [
  'status' => 'success',
  'message' => 'Video has been successfully deleted.'
];

header('Content-Type: application/json');
echo json_encode($response);
exit;
