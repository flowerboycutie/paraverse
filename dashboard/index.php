<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/functions-new.php');

//IS_LOGGED_IN($_SERVER['REQUEST_URI']);

$META_TITLE = "Welcome to Edith";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php HEAD_ESSENTIALS(); ?>
  <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
  <script src="/assets/plugins/custom/datatables/datatables.bundle.js" defer></script>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
  data-kt-app-layout="light-header" class="app-default">
  <?php include("partials/_page-loader.php"); ?>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <?php include("partials/_header.php"); ?>
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <main>
              <!-- begin::Container -->
              <div class="app-container container-xxl pt-10">
                <div class="row display-4">
                  <div class="col">
                    Paraverse Dashboard
                  </div>
                </div>
                <!-- begin::Row -->
                <div class="row">
                  <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/card.php'); ?>
                </div>
                <!-- end::Row -->
                <!-- begin::Row -->
                <div class="row">
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/card-2.php'); ?>
                  </div>
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/radial-progress-chart.php'); ?>
                  </div>
                </div>
                <!-- end::Row -->
                <!-- begin::Row -->
                <div class="row">
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/bar-chart.php'); ?>
                  </div>
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/bar-chart-2.php'); ?>
                  </div>
                </div>
                <!-- end::Row -->
                <!-- begin::Row -->
                <div class="row">
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/line-chart.php'); ?>
                  </div>
                  <div class="col-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/dashboard/widgets/list.php'); ?>
                  </div>
                </div>
                <!-- end::Row -->
              </div>
              <!-- end::Container -->
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