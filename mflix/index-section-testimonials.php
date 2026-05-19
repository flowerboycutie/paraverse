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
  <div class="border-0 card-flush h-xl-100 mb-5 mb-xl-10">
    <div class="text-center mb-17">
      <h3 class="fw-bolder text-gray-900 mb-2 fs-2hx">You're Not Learning Alone</h3>
      <p class="text-gray-500 mb-0 mx-auto fw-bold fs-5" style="max-width: 600px;">At M-Flix, learning is more than just about learning lessons — it's about growing together. Our students don't just watch courses, they build skills, gain confidence, and become part of a community that pushes each other forward. Don't just take our word for it — here's what our learners have to say.</p>
    </div>
    <div class="card-body p-0">
      <div class="row g-2 g-xl-5">

        <?php foreach ($testimonials as $t): ?>
          <div class="col-lg-4 my-3 my-sm-1">
            <div class="card border-0 shadow card-flush h-xl-100 card-rounded">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a href="<?= $t['profile_url'] ?>" target="_blank" class="symbol symbol-50px me-3">
                      <img src="<?= $t['avatar'] ?>" class="rounded-circle">
                    </a>
                    <div>
                      <a href="<?= $t['profile_url'] ?>" target="_blank" class="d-block text-dark text-active-mflix fw-bold fs-6"><?= $t['name'] ?></a>
                      <span class="text-gray-600"><?= $t['date'] ?></span>
                    </div>
                  </div>
                  <div>
                    <span class="badge badge-light fs-8 px-4 py-3 mb-2 fw-bolder">
                      <i class="fa fa-star text-warning me-1"></i> <?= $t['rating'] ?>
                    </span>
                  </div>
                </div>
                <div>
                  <h5 class="my-5 ellipsis-2">
                    <a class="text-mflix" onclick="KTApp.showPageLoading()" href="/mflix/testimonials/<?= $t['course_id'] ?>"><?= $t['course_name'] ?></a>
                  </h5>
                  <p class="ellipsis-2 fs-5 mb-0"><?= $t['review'] ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>