<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/mflix/functions-new.php');

// IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "mflix — Stream Your Learning";
$META_DESC = "Binge-watch a course like it's a show. mflix is an educational video streaming platform by FEU Tech.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default" style="background-color: #F5F8FA;">
  <?php include("partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include("partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <?php include("index-section-hero.php"); ?>
              <div class="app-container container-xxl">
                <?php include("index-section-features.php"); ?>
                <?php include("index-section-courses.php"); ?>
                <?php include("index-section-testimonials.php"); ?>
              </div>
              <?php include("index-section-cta.php"); ?>
            </main>
          </div>
          <?php include("partials/_footer.php"); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("partials/_scrolltop.php"); ?>
</body>

</html>