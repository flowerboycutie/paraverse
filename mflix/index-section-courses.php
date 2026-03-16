<?php
$courses = [
  [
    "id" => "256d7cf7a6120379859b3aae4e587270aec27881",
    "code" => "GED0021",
    "title" => "Modern Communication 3",
    "rating" => 9.9,
    "modules" => 11,
    "subtopics" => 12,
    "badge" => "Official Courseware",
    "poster" => "/mflix/assets/img/courses/poster-aalcc.jpg"
  ],
  [
    "id" => "4d277f1f4c126fb672b032b50daf23cb52a8516e",
    "code" => "CE0017",
    "title" => "Building System Design (LEC)",
    "rating" => 9.5,
    "modules" => 6,
    "subtopics" => 6,
    "badge" => "Official Courseware",
    "poster" => "/mflix/assets/img/courses/poster-asako.jpg"
  ],
  [
    "id" => "00ceeacb1b06dc5db90119032a300e6feada438f",
    "code" => "COE0019",
    "title" => "Differential Equations",
    "rating" => 10.0,
    "modules" => 12,
    "subtopics" => 20,
    "badge" => "Official Courseware",
    "poster" => "/mflix/assets/img/courses/poster-gitling.jpg"
  ],
  [
    "id" => "3682c375b2223fd832be7281098636f1d92d8e16",
    "code" => "IT0002",
    "title" => "User Design Fundamentals",
    "rating" => 9.3,
    "modules" => 7,
    "subtopics" => 13,
    "badge" => "Official Courseware",
    "poster" => "/mflix/assets/img/courses/poster-monster.jpg"
  ]
];
?>

<section class="my-17">
  <div class="card border-0 shadow card-flush h-xl-100">
    <div class="card-header pt-10">
      <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h3 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
          <span class="card-label fw-bold text-gray-900 fs-3">Featured Courses</span>
        </h3>
        <span class="pt-1 text-muted fw-semibold fs-5">Handpicked courses for your success</span>
      </div>
      <div class="card-toolbar">
        <a onclick="KTApp.showPageLoading()" href="#" class="btn btn-mflix btn-active-dark px-8">View all</a>
      </div>
    </div>
    <div class="card-body pt-10">
      <div class="row g-2 g-xl-5">

        <?php foreach ($courses as $course): ?>
          <div class="col-xl-3 col-lg-4 col-6 my-5">
            <article class="course-card">
              <a class="d-block" href="/mflix/course/<?= $course['id'] ?>" onclick="KTApp.showPageLoading()">
                <div class="card overlay overlay-scale border-0 shadow overflow-hidden">
                  <div class="card-body p-0">
                    <div class="overlay-wrapper">
                      <div class="h-auto w-100 d-block bgi-position-center bgi-no-repeat bgi-size-cover rounded position-relative bg-light-dark lozad"
                        data-background-image="<?= $course['poster'] ?>"
                        style="aspect-ratio: 2 / 3; background-image: url('<?= $course['poster'] ?>');"
                        data-loaded="true">
                      </div>
                    </div>
                    <div class="overlay-layer bg-dark bg-opacity-25 bg-hover-opacity-75 justify-content-between flex-column p-5 p-lg-7">
                      <div class="d-flex flex-row justify-content-between w-100">
                        <div class="w-100 h-100 d-flex justify-content-start align-items-start">
                          <p class="text-white fw-bolder"><?= $course['code'] ?></p>
                        </div>
                        <div class="w-100 h-100 d-flex justify-content-end align-items-start">
                          <p class="text-white fw-bolder">
                            <i class="fa fa-star fa-sm text-warning"></i> <?= $course['rating'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="w-100">
                        <div class="d-flex align-items-center mb-3">
                          <span class="badge text-uppercase text-white" style="background-color: #e50914"><?= $course['badge'] ?></span>
                        </div>
                        <h3 class="text-white fw-bolder mb-0"><?= $course['title'] ?></h3>
                        <div class="d-flex mt-2">
                          <div class="d-flex align-items-center me-3">
                            <i class="fa-xs text-mflix fa-solid fa-book me-1"></i>
                            <span class="font-size-xs fw-bolder text-gray-400"><?= $course['modules'] ?> Modules</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <i class="fa-xs text-mflix fa-solid fa-clapperboard me-1"></i>
                            <span class="font-size-xs fw-bolder text-gray-400"><?= $course['subtopics'] ?> Subtopics</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </article>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>