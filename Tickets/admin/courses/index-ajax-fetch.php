<?php

define('MBG', TRUE);
DIRECT_ACCESS_BLOCKED();

$sql_details = array(
  'user' => '',
  'pass' => '',
  'db' => '',
  'host' => ''
);

$table = 'mflix_courses';
$primaryKey = 'id';

$columns = array(
  array(
    'db' => 'id',
    'dt' => 0,
    'formatter' => fn($d, $row) => htmlspecialchars($d)
  ),
  array(
    'db' => 'title',
    'dt' => 1,
    'formatter' => fn($d, $row) => htmlspecialchars($d)
  ),
  array(
    'db' => 'course_code',
    'dt' => 2,
    'formatter' => fn($d, $row) => htmlspecialchars($d)
  ),
  array(
    'db' => 'status',
    'dt' => 3,
    'formatter' => fn($d, $row) => htmlspecialchars($d)
  ),
  array(
    'db' => 'hash',
    'dt' => 4,
    'formatter' => fn($d, $row) => htmlspecialchars($d)
  ),
);

$extraWhere = "1=1";

require($_SERVER['DOCUMENT_ROOT'] . '/assets/_datatables-ssp.php');
echo json_encode(
  SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, null, $extraWhere)
);
