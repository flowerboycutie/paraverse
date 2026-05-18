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
  ],
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
  ],
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
      <!--begin::Carousel Wrapper-->
      <div class="courses-carousel-outer position-relative">

        <!--begin::Left Arrow-->
        <button class="courses-arrow courses-arrow-prev" id="coursesPrev" aria-label="Previous">
          <i class="ki-duotone ki-arrow-left fs-2"><span class="path1"></span><span class="path2"></span></i>
        </button>
        <!--end::Left Arrow-->

        <div style="overflow: hidden;">
          <div class="courses-carousel d-flex" id="coursesCarousel">
            <?php foreach ($courses as $i => $course): ?>
              <div class="courses-slide flex-shrink-0 px-2">
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

        <!--begin::Right Arrow-->
        <button class="courses-arrow courses-arrow-next" id="coursesNext" aria-label="Next">
          <i class="ki-duotone ki-arrow-right fs-2"><span class="path1"></span><span class="path2"></span></i>
        </button>
        <!--end::Right Arrow-->

      </div>
      <!--end::Carousel Wrapper-->
    </div>

  </div>
</section>

<style>
  .courses-carousel-outer {
    padding: 0 40px;
    /* space for the side arrows */
  }

  .courses-carousel {
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
  }

  .courses-slide {
    width: 50%;
  }

  @media (min-width: 768px) {
    .courses-slide {
      width: 33.3333%;
    }
  }

  @media (min-width: 1200px) {
    .courses-slide {
      width: 25%;
    }
  }

  .courses-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.2s, box-shadow 0.2s, opacity 0.2s;
  }

  .courses-arrow:hover {
    background-color: #f1f1f1;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  .courses-arrow-prev {
    left: 0;
  }

  .courses-arrow-next {
    right: 0;
  }

  .courses-arrow.hidden {
    opacity: 0;
    pointer-events: none;
  }
</style>

<script>
  (function() {
    const carousel = document.getElementById('coursesCarousel');
    const prevBtn = document.getElementById('coursesPrev');
    const nextBtn = document.getElementById('coursesNext');
    const slides = carousel.querySelectorAll('.courses-slide');
    const total = slides.length;
    let current = 0;

    // Clone all slides and append/prepend for infinite effect
    slides.forEach(slide => {
      carousel.appendChild(slide.cloneNode(true));
      carousel.prepend(slide.cloneNode(true));
    });

    const allSlides = carousel.querySelectorAll('.courses-slide');

    function visibleCount() {
      const w = window.innerWidth;
      if (w >= 1200) return 4;
      if (w >= 768) return 3;
      return 2;
    }

    function slideWidthPct() {
      return 100 / visibleCount();
    }

    // Start offset — skip the prepended clones
    function setInitialOffset() {
      const offset = -(total * slideWidthPct());
      carousel.style.transition = 'none';
      carousel.style.transform = `translateX(${offset}%)`;
      current = total; // real slides start at index `total`
    }

    function goTo(index, animate = true) {
      if (!animate) {
        carousel.style.transition = 'none';
      } else {
        carousel.style.transition = 'transform 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
      }

      current = index;
      const offset = -(current * slideWidthPct());
      carousel.style.transform = `translateX(${offset}%)`;
    }

    // After transition ends, silently jump if we're in clone territory
    carousel.addEventListener('transitionend', () => {
      const cloneStart = 0;
      const cloneEnd = total - 1;
      const realStart = total;
      const realEnd = total * 2 - 1;

      if (current <= cloneEnd) {
        // Went too far left — jump to the real equivalent on the right
        goTo(current + total, false);
      } else if (current >= total * 2) {
        // Went too far right — jump to the real equivalent on the left
        goTo(current - total, false);
      }
    });

    prevBtn.addEventListener('click', () => goTo(current - 1));
    nextBtn.addEventListener('click', () => goTo(current + 1));

    // Swipe support
    let startX = 0;
    carousel.addEventListener('touchstart', e => {
      startX = e.touches[0].clientX;
    }, {
      passive: true
    });
    carousel.addEventListener('touchend', e => {
      const diff = startX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) goTo(current + (diff > 0 ? 1 : -1));
    });

    window.addEventListener('resize', () => {
      // Recalculate offset without animation on resize
      goTo(current, false);
    });

    setInitialOffset();
    // Arrows always visible for infinite carousel
    prevBtn.classList.remove('hidden');
    nextBtn.classList.remove('hidden');
  })();
</script>