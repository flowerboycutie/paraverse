<section>
  <div class="card border-0 shadow">

    <div class="card-header border-0 pt-10">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-2 mb-1"><?= htmlspecialchars($META_TITLE) ?></span>
        <span class="fs-6 my-0 pt-1 text-gray-600"><?= htmlspecialchars($META_DESC ?? "") ?></span>
      </h3>
      <div class="card-toolbar">
        <a href="/mflix/admin/videos" onclick="KTApp.showPageLoading()" class="btn btn-mflix fw-bold">
          <i class="bi bi-arrow-left fs-2 text-white"></i>Back to Videos
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

        <div class="col-md-8">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6 required">Title</label>
            <input id="title" type="text" class="form-control form-control-solid"
              placeholder="Video title" value="<?= htmlspecialchars($RECORD['title'] ?? '') ?>" required>
          </div>
        </div>

        <div class="col-md-4">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Video ID</label>
            <input id="video_id" type="text" class="form-control form-control-solid"
              placeholder="e.g. EB293755F0" value="<?= htmlspecialchars($RECORD['video_id'] ?? '') ?>">
          </div>
        </div>

        <div class="col-12">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Description</label>
            <textarea id="description" class="form-control form-control-solid" rows="3"
              placeholder="Video description"><?= htmlspecialchars($RECORD['description'] ?? '') ?></textarea>
          </div>
        </div>

        <div class="col-md-6">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Embed URL</label>
            <input id="embed_url" type="url" class="form-control form-control-solid"
              placeholder="https://..." value="<?= htmlspecialchars($RECORD['embed_url'] ?? '') ?>">
          </div>
        </div>

        <div class="col-md-3">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Duration</label>
            <input id="duration" type="text" class="form-control form-control-solid"
              placeholder="e.g. 12:34" value="<?= htmlspecialchars($RECORD['duration'] ?? '') ?>">
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

        <div class="col-md-6">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Course ID</label>
            <input id="course_id" type="number" class="form-control form-control-solid"
              placeholder="Course ID" value="<?= intval($RECORD['course_id'] ?? 0) ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="fv-row mb-10">
            <label class="form-label fw-bold fs-6">Module ID</label>
            <input id="module_id" type="number" class="form-control form-control-solid"
              placeholder="Module ID" value="<?= intval($RECORD['module_id'] ?? 0) ?>">
          </div>
        </div>

        <div class="d-flex justify-content-end mt-5">
          <a href="/mflix/admin/videos" onclick="KTApp.showPageLoading()" class="btn btn-secondary me-3">Cancel</a>
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
      formData.append("video_id", $("#video_id").val());
      formData.append("title", $("#title").val());
      formData.append("description", $("#description").val());
      formData.append("embed_url", $("#embed_url").val());
      formData.append("duration", $("#duration").val());
      formData.append("status", $("#status").val());
      formData.append("course_id", $("#course_id").val());
      formData.append("module_id", $("#module_id").val());

      $.ajax({
        url: "/mflix/admin/videos/manage/index-ajax-save.php",
        method: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {
          if (res.status === "success") {
            window.location.href = "/mflix/admin/videos";
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
