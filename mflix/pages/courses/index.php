<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Courses — mflix";
$META_DESC = "Browse all available video courses on mflix.";
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
              <?php include("index-section-grid.php"); ?>
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
