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
 * $SQL = "SELECT c.*, COUNT(DISTINCT v.id) as video_count, COUNT(DISTINCT m.id) as module_count
 *         FROM mflix_courses c
 *         LEFT JOIN mflix_videos v ON v.course_id = c.id
 *         LEFT JOIN mflix_modules m ON m.course_id = c.id
 *         WHERE c.hash = ?
 *         GROUP BY c.id";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('s', $END_URL);
 * $SQL->execute();
 * $RESULT = $SQL->get_result();
 * if ($RESULT->num_rows == 0) { header("location: /mflix/courses"); exit(); }
 * $RECORD = $RESULT->fetch_assoc();
 */

// Placeholder data
$RECORD = [
  'id' => 1,
  'hash' => $END_URL,
  'course_code' => 'CPE0001',
  'title' => 'Computer Engineering as a Discipline',
  'description' => 'An introductory course on Computer Engineering that covers its history, scope, and career opportunities in the field.',
  'modules' => 8,
  'videos' => 16,
  'duration' => '2h 49m',
  'channel_name' => 'Educational Innovation and Technology Hub',
  'channel_slug' => 'educational-innovation-and-technology-hub',
];

$META_TITLE = $RECORD['course_code'] . ' — ' . $RECORD['title'];
$META_DESC = $RECORD['description'];
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
              <div class="app-container container-xxl py-10">
                <div class="row">
                  <div class="col-lg-8">
                    <?php include("index-section-modules.php"); ?>
                  </div>
                  <div class="col-lg-4">
                    <?php include("index-section-credits.php"); ?>
                    <?php include("index-section-ratings.php"); ?>
                  </div>
                </div>
              </div>
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
