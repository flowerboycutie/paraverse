<section>
  <div class="card border-0 shadow">

    <div class="card-header border-0 pt-10">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-2 mb-1"><?= htmlspecialchars($META_TITLE) ?></span>
        <span class="fs-6 my-0 pt-1 text-gray-600"><?= htmlspecialchars($META_DESC ?? "") ?></span>
      </h3>
      <div class="card-toolbar">
        <a href="/mflix/admin/courses" onclick="KTApp.showPageLoading()" class="btn btn-mflix fw-bold">
          <i class="bi bi-arrow-left fs-2 text-white"></i>Back to Courses
        </a>
      </div>
    </div>

    <div class="card-body py-10">
      <form id="edith_form" class="row form needs-validation" method="post" novalidate>

        <div class="col-12 d-none">
          <div class="fv-row mb-10">
            <input id="id" type="text" class="form-control mb-2" value="<?= intval($RECORD['id'] ?? 0) ?>">
          </div>
        </div>

        <div class="col-md-4">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6 required">Course Code</label>
            <input id="course_code" type="text" class="form-control form-control-solid"
              placeholder="e.g. CPE0001" value="<?= htmlspecialchars($RECORD['course_code'] ?? '') ?>" required>
          </div>
        </div>

        <div class="col-md-8">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6 required">Title</label>
            <input id="title" type="text" class="form-control form-control-solid"
              placeholder="Course title" value="<?= htmlspecialchars($RECORD['title'] ?? '') ?>" required>
          </div>
        </div>

        <div class="col-12">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Description</label>
            <textarea id="description" class="form-control form-control-solid" rows="4"
              placeholder="Course description"><?= htmlspecialchars($RECORD['description'] ?? '') ?></textarea>
          </div>
        </div>

        <div class="col-md-6">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Thumbnail URL</label>
            <input id="thumbnail" type="url" class="form-control form-control-solid"
              placeholder="https://..." value="<?= htmlspecialchars($RECORD['thumbnail'] ?? '') ?>">
          </div>
        </div>

        <div class="col-md-3">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Status</label>
            <select id="status" class="form-select form-select-solid">
              <option value="draft" <?= ($RECORD['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
              <option value="published" <?= ($RECORD['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Featured</label>
            <div class="form-check form-switch form-check-custom form-check-solid mt-3">
              <input id="featured" class="form-check-input" type="checkbox" value="1"
                <?= ($RECORD['featured'] ?? 0) ? 'checked' : '' ?>>
              <label class="form-check-label fw-semibold text-gray-700" for="featured">Show on Discover page</label>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end mt-5">
          <a href="/mflix/admin/courses" onclick="KTApp.showPageLoading()" class="btn btn-secondary me-3">Cancel</a>
          <button type="submit" class="btn btn-mflix">Save Changes</button>
        </div>

      </form>
    </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('#edith_form').submit(function (e) {
      e.preventDefault();

      const form = $(this);
      const button = form.find('[type="submit"]');

      button.prop('disabled', true).removeClass("btn-mflix").addClass("btn-secondary");

      const formData = new FormData();
      formData.append("id", $("#id").val());
      formData.append("course_code", $("#course_code").val());
      formData.append("title", $("#title").val());
      formData.append("description", $("#description").val());
      formData.append("thumbnail", $("#thumbnail").val());
      formData.append("status", $("#status").val());
      formData.append("featured", $("#featured").is(":checked") ? 1 : 0);

      $.ajax({
        url: "/mflix/admin/courses/manage/index-ajax-save.php",
        method: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {
          if (res.status === "success") {
            window.location.href = "/mflix/admin/courses";
          } else {
            toastr.error(res.message || "An error occurred.");
            button.prop('disabled', false).removeClass("btn-secondary").addClass("btn-mflix");
          }
        },
        error: function () {
          toastr.error("Request failed.");
          button.prop('disabled', false).removeClass("btn-secondary").addClass("btn-mflix");
        }
      });
    });
  });
</script>
