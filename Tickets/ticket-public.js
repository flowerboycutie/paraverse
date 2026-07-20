// ticket-public.js

$(function () {
    const $appSelect = $("#pvAppSelect");
    const $description = $("#pvDescription");
    const $submitBtn = $("#pvSubmitBtn");
    const $chipsContainer = $("#pvChipsContainer");
    const $suggestionsArea = $("#pvSuggestionsArea");
    const $formState = $("#pvFormState");
    const $successState = $("#pvSuccessState");
    const $submittedApp = $("#pvSubmittedApp");
    const $resetBtn = $("#pvResetBtn");
    const $form = $("#pvTicketForm");

    let activeChip = null;

    PARAVERSE_APPS.forEach((app) => {
        const $option = $("<option></option>");
        $option.val(app.name).text(app.name);
        $appSelect.append($option);
    });

    function checkReady() {
        $submitBtn.prop("disabled", !($appSelect.val() && $description.val().trim()));
    }

    function renderChips(appName) {
        if (!$chipsContainer.length || !$suggestionsArea.length) return;

        $chipsContainer.empty();
        activeChip = null;

        const app = PARAVERSE_APPS.find((a) => a.name === appName);
        const suggestions = app ? app.examples : [];

        if (!suggestions.length) {
            $suggestionsArea.hide();
            return;
        }

        suggestions.forEach((text) => {
            const $chip = $("<button type=\"button\"></button>");
            $chip.addClass("pv-chip").text(text);

            $chip.on("click", function () {
                if (activeChip) {
                    $(activeChip).removeClass("pv-active");
                }

                if (activeChip === this) {
                    activeChip = null;
                    $description.val("");
                } else {
                    $(this).addClass("pv-active");
                    activeChip = this;
                    $description.val(text);
                }
                checkReady();
            });

            $chipsContainer.append($chip);
        });

        $suggestionsArea.show();
    }

    function showForm() {
        $formState.show();
        $successState.hide();
    }

    function showSuccess() {
        $formState.hide();
        $successState.show();
    }

    function resetForm() {
        $form[0].reset();
        $appSelect.val("");
        $description.val("");
        $suggestionsArea.hide();
        $chipsContainer.empty();
        activeChip = null;
        $submitBtn.prop("disabled", true);
        showForm();
    }

    $appSelect.on("change", function () {
        $description.val("");
        renderChips($appSelect.val());
        checkReady();
    });

    $description.on("input", checkReady);

    $form.on("submit", function (e) {
        e.preventDefault();

        if (!$appSelect.val() || !$description.val().trim()) return;

        PARAVERSE_TICKETS.add({
            app: $appSelect.val(),
            description: $description.val().trim(),
        });

        $submittedApp.text($appSelect.val());
        showSuccess();
    });

    $resetBtn.on("click", function (e) {
        e.preventDefault();
        resetForm();
        const $formTop = $("#pvFormState");
        if ($formTop.length) {
            $formTop[0].scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });
});