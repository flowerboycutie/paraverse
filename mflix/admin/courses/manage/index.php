<?php
define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$END_URL = htmlspecialchars($_GET['id'] ?? '');

if (!empty($END_URL)) {
  /**
   * DB Query stub (edit mode):
   * $SQL = "SELECT * FROM mflix_courses WHERE hash = ?";
   * $SQL = $EDITH->prepare($SQL);
   * $SQL->bind_param('s', $END_URL);
   * $SQL->execute();
   * $RESULT = $SQL->get_result();
   * if ($RESULT->num_rows == 0) { header("location: /mflix/admin/courses"); exit(); }
   * $RECORD = $RESULT->fetch_assoc();
   */
  $RECORD = ['id' => 1, 'hash' => $END_URL, 'course_code' => '', 'title' => '', 'description' => '', 'status' => 'draft'];
  $META_TITLE = "Edit Course";
  $META_DESC = "Edit course details";
} else {
  $RECORD = ['id' => 0, 'hash' => '', 'course_code' => '', 'title' => '', 'description' => '', 'status' => 'draft'];
  $META_TITLE = "Add Course";
  $META_DESC = "Create a new course";
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
