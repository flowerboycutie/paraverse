<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$raw = htmlspecialchars($_GET['id'] ?? '');
if (!$raw) {
  header("location: /mflix/courses");
  exit();
}

// Parse video ID and slug from format: {id}_{slug}
$parts = explode('_', $raw, 2);
$video_id = $parts[0] ?? '';
$video_slug = $parts[1] ?? '';

/**
 * DB Query stub:
 * $SQL = "SELECT v.*, c.title as course_title, c.hash as course_hash, c.id as course_id,
 *                m.title as module_title, ch.name as channel_name, ch.slug as channel_slug
 *         FROM mflix_videos v
 *         LEFT JOIN mflix_courses c ON c.id = v.course_id
 *         LEFT JOIN mflix_modules m ON m.id = v.module_id
 *         LEFT JOIN mflix_channels ch ON ch.id = v.channel_id
 *         WHERE v.video_id = ?";
 * $SQL = $EDITH->prepare($SQL);
 * $SQL->bind_param('s', $video_id);
 * $SQL->execute();
 * $RESULT = $SQL->get_result();
 * if ($RESULT->num_rows == 0) { header("location: /mflix/courses"); exit(); }
 * $VIDEO = $RESULT->fetch_assoc();
 */

// Placeholder data
$VIDEO = [
  'id' => 1,
  'video_id' => $video_id,
  'slug' => $video_slug,
  'title' => 'First and Second Year',
  'description' => 'An overview of the first and second year curriculum for Computer Engineering students.',
  'duration' => '12:34',
  'course_title' => 'Computer Engineering as a Discipline',
  'course_hash' => 'e6620660d2c7dce9f41f2da657a1b55d0482c2fb',
  'course_id' => 1,
  'module_title' => 'Module 1: Introduction to Computer Engineering',
  'channel_name' => 'Educational Innovation and Technology Hub',
  'channel_slug' => 'educational-innovation-and-technology-hub',
  'embed_url' => '',
];

$META_TITLE = $VIDEO['title'] . ' — mflix';
$META_DESC = $VIDEO['description'];
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
              <div class="app-container container-xxl py-8">
                <div class="row">
                  <div class="col-lg-8">
                    <?php include("index-section-player.php"); ?>
                  </div>
                  <div class="col-lg-4">
                    <?php include("index-section-playlist.php"); ?>
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

  <script>
    // Highlight current video in playlist
    $(document).ready(function() {
      $('[video="<?= htmlspecialchars($video_id) ?>"]').addClass('btn-primary bg-light-danger');
    });
  </script>
</body>

</html>
