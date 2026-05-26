<?php
$testimonials = [
  [
    "profile_url" => "#",
    "avatar" => "#",
    "name" => "Jan Edilbert N. Solomon",
    "date" => "Jul 2, 2025 02:24:35 pm",
    "rating" => 10,
    "course_id" => "aa5e2263a14d19eb60ac4eeba81d966799e21023",
    "course_name" => "Advertising Principles",
    "review" => "nice course learned a lot"
  ],
  [
    "profile_url" => "#",
    "avatar" => "#",
    "name" => "Kensheen Lee N. Fernandez",
    "date" => "May 24, 2025 10:26:40 am",
    "rating" => 9,
    "course_id" => "2a4dfa8ec838633708f075f7cc3aa8c757bc0a92",
    "course_name" => "Computer Programming 1",
    "review" => "this is very helpful and informative, great for reviews for exams"
  ],
  [
    "profile_url" => "/#",
    "avatar" => "#",
    "name" => "Juan Dela Cruz",
    "date" => "Jun 9, 2025 04:40:16 pm",
    "rating" => 10,
    "course_id" => "4d277f1f4c126fb672b032b50daf23cb52a8516e",
    "course_name" => "Building System Design",
    "review" => "Wow great great",
  ]
];
?>

<section class="my-20 py-20" style="position: relative; overflow: hidden;">

  <!--begin::Background Graphic-->
  <img src="./assets/img/learning.png" alt="" style="
        position: absolute;
        right: -50px;
        top: 50%;
        transform: translateX(-50%) translateY(-80%) rotate(15deg) scale(0.8);
        width: 300px;
        opacity: 0.15;
        z-index: 0;
        pointer-events: none;">
  <!--end::Background Graphic-->

  <!--begin::Heading-->
  <div class="text-center mb-20">
    <span class="badge badge-light-danger fw-bold fs-7 px-4 py-2 mb-5 text-uppercase ls-1" style="color: #e50914;">Student Reviews</span>
    <h2 class="fs-2hx fw-bolder text-gray-900 lh-sm mb-5">You're Not Learning Alone</h2>
    <p class="fs-5 text-muted fw-semibold mb-0 mx-auto" style="max-width: 600px;">
      At M-Flix, learning is more than just watching lessons — it's about growing together. Don't just take our word for it, here's what our learners have to say.
    </p>
  </div>
  <!--end::Heading-->

  <!--begin::Minimal List-->
  <div class="row g-0">
    <?php foreach ($testimonials as $i => $t): ?>
      <div class="col-lg-4 px-8 <?= $i < count($testimonials) - 1 ? 'border-end' : '' ?> mb-10 mb-lg-0">
        <div style="border-left: 3px solid #e50914;" class="ps-7 h-100 d-flex flex-column">

          <!--begin::Review-->
          <p class="fs-4 fw-semibold text-gray-700 mb-7 flex-grow-1">"<?= $t['review'] ?>"</p>
          <!--end::Review-->

          <!--begin::Course-->
          <a href="/mflix/testimonials/<?= $t['course_id'] ?>" onclick="KTApp.showPageLoading()"
            class="fw-bold fs-7 text-uppercase d-block mb-6 ellipsis-1" style="color: #e50914; letter-spacing: 0.05em;">
            <?= $t['course_name'] ?>
          </a>
          <!--end::Course-->

          <!--begin::Author-->
          <div class="d-flex align-items-center gap-3">
            <div class="symbol symbol-35px flex-shrink-0">
              <img src="<?= $t['avatar'] ?>" class="rounded-circle">
            </div>
            <div class="flex-grow-1 mw-0">
              <a href="<?= $t['profile_url'] ?>" class="d-block text-gray-900 fw-bold fs-6 text-hover-mflix ellipsis-1"><?= $t['name'] ?></a>
              <span class="text-muted fs-7"><?= $t['date'] ?></span>
            </div>
            <span class="badge badge-light fw-bolder fs-8 px-3 py-2 flex-shrink-0">
              <i class="fa fa-star text-warning me-1"></i><?= $t['rating'] ?>
            </span>
          </div>
          <!--end::Author-->

        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!--end::Minimal List-->

</section>