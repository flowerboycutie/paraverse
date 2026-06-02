<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$END_URL = htmlspecialchars($_GET['id'] ?? '');

if (!empty($END_URL)) {
  /**
   * DB Query stub (edit mode):
   * $SQL = "SELECT v.*, c.course_code, c.hash as course_hash
   *         FROM mflix_videos v
   *         LEFT JOIN mflix_courses c ON c.id = v.course_id
   *         WHERE v.id = ?";
   * $SQL = $EDITH->prepare($SQL);
   * $SQL->bind_param('i', intval($END_URL));
   * $SQL->execute();
   * $RESULT = $SQL->get_result();
   * if ($RESULT->num_rows == 0) { header("location: /mflix/admin/videos"); exit(); }
   * $RECORD = $RESULT->fetch_assoc();
   */
  $RECORD = ['id' => intval($END_URL), 'video_id' => '', 'title' => '', 'slug' => '', 'description' => '', 'duration' => '', 'course_id' => 0, 'module_id' => 0, 'embed_url' => '', 'status' => 'draft'];
  $META_TITLE = "Edit Video";
  $META_DESC = "Edit video details";
} else {
  $tagged_course = htmlspecialchars($_GET['tagged_course'] ?? '');
  $RECORD = ['id' => 0, 'video_id' => '', 'title' => '', 'slug' => '', 'description' => '', 'duration' => '', 'course_id' => 0, 'module_id' => 0, 'embed_url' => '', 'status' => 'draft', 'tagged_course' => $tagged_course];
  $META_TITLE = "Add Video";
  $META_DESC = "Upload a new video";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
  class="app-default">
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/mflix/partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                  <?php include("index-inc-form.php"); ?>
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
