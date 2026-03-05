<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$END_URL = htmlspecialchars($_GET['id'] ?? '');
if (!$END_URL) {
  header("location: /mflix/courses");
  exit();
}

/**
 * DB Query stub:
 * $SQL = "SELECT * FROM mflix_courses WHERE hash = ?";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('s', $END_URL);
 * $SQL->execute();
 * $RESULT = $SQL->get_result();
 * if ($RESULT->num_rows == 0) { header("location: /mflix/courses"); exit(); }
 * $COURSE = $RESULT->fetch_assoc();
 */

// Placeholder
$COURSE = [
  'hash' => $END_URL,
  'course_code' => 'CPE0001',
  'title' => 'Computer Engineering as a Discipline',
];

$META_TITLE = "Reviews — " . $COURSE['title'];
$META_DESC = "Student reviews and testimonials for " . $COURSE['title'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <?php include("index-section-hero.php"); ?>
              <?php include("index-section-reviews.php"); ?>
            </main>
          </div>
          <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_scrolltop.php"); ?>
</body>

</html>
