document.addEventListener("DOMContentLoaded", () => {
    const appSelect = document.getElementById("pvAppSelect");
    const description = document.getElementById("pvDescription");
    const submitBtn = document.getElementById("pvSubmitBtn");
    const chipsContainer = document.getElementById("pvChipsContainer");
    const suggestionsArea = document.getElementById("pvSuggestionsArea");
    const formState = document.getElementById("pvFormState");
    const successState = document.getElementById("pvSuccessState");
    const submittedApp = document.getElementById("pvSubmittedApp");
    const resetBtn = document.getElementById("pvResetBtn");
    const form = document.getElementById("pvTicketForm");

    let activeChip = null;

    PARAVERSE_APPS.forEach((app) => {
        const option = document.createElement("option");
        option.value = app.name;
        option.textContent = app.name;
        appSelect.appendChild(option);
    });

    function checkReady() {
        submitBtn.disabled = !(appSelect.value && description.value.trim());
    }

    function renderChips(appName) {
        if (!chipsContainer || !suggestionsArea) return; // chip suggestions markup isn't present in this HTML

        chipsContainer.innerHTML = "";
        activeChip = null;

        const app = PARAVERSE_APPS.find((a) => a.name === appName);
        const suggestions = app ? app.examples : [];

        if (!suggestions.length) {
            suggestionsArea.style.display = "none";
            return;
        }

        suggestions.forEach((text) => {
            const chip = document.createElement("button");
            chip.type = "button";
            chip.className = "pv-chip";
            chip.textContent = text;

            chip.addEventListener("click", () => {
                if (activeChip) activeChip.classList.remove("pv-active");

                if (activeChip === chip) {
                    activeChip = null;
                    description.value = "";
                } else {
                    chip.classList.add("pv-active");
                    activeChip = chip;
                    description.value = text;
                }
                checkReady();
            });

            chipsContainer.appendChild(chip);
        });

        suggestionsArea.style.display = "block";
    }

    function showForm() {
        formState.hidden = false;
        successState.hidden = true;
        formState.style.display = "";
        successState.style.display = "none";
    }

    function showSuccess() {
        formState.hidden = true;
        successState.hidden = false;
        formState.style.display = "none";
        successState.style.display = "block";
    }

    function resetForm() {
        form.reset();
        appSelect.value = "";
        description.value = "";
        if (suggestionsArea) suggestionsArea.style.display = "none";
        if (chipsContainer) chipsContainer.innerHTML = "";
        activeChip = null;
        submitBtn.disabled = true;
        showForm();
    }

    appSelect.addEventListener("change", () => {
        description.value = "";
        renderChips(appSelect.value);
        checkReady();
    });

    description.addEventListener("input", checkReady);

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        if (!appSelect.value || !description.value.trim()) return;

        PARAVERSE_TICKETS.add({
            app: appSelect.value,
            description: description.value.trim(),
        });

        submittedApp.textContent = appSelect.value;
        showSuccess();
    });

    resetBtn.addEventListener("click", (e) => {
        e.preventDefault();
        resetForm();
        const formTop = document.getElementById("pvFormState");
        if (formTop) {
            formTop.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });
});