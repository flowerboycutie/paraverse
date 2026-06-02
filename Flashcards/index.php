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
  <style>
    :root {
      --app-header-height: 72px
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      overscroll-behavior-y: none;
      -webkit-overflow-scrolling: touch
    }

    body {
      padding-top: var(--app-header-height);
      background-clip: padding-box
    }

    /* Force header to stay on top */
    #kt_app_header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 99999;
      background-color: var(--bs-white, #fff)
    }

    /* Prevent accidental horizontal overflow from transforms and absolute elements */
    /* Note: don't globally force overflow rules on positioned elements - can break marquees */


    /* Ensure main content can scroll normally but won't overscroll the viewport */
    #kt_app_root,
    #kt_app_page {
      min-height: calc(100vh - var(--app-header-height));
    }
  </style>
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
              <?php include("index-section-about.php"); ?>
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