(function ($) {
  "use strict";

  $(document).ready(function () {
    // Cache DOM elements
    const $breedFilter = $("#breed-filter");
    const $allergiesFilter = $("#allergies-filter");
    const $resetButton = $("#reset-filters");
    const $dogItems = $(".dog-item");
    const $noResults = $("#no-results");

    // Verify elements exist
    if (!$breedFilter.length || !$allergiesFilter.length || !$dogItems.length) {
      console.error("Required elements not found");
      return;
    }

    // Apply filters when dropdown changes
    $breedFilter.on("change", applyFilters);
    $allergiesFilter.on("change", applyFilters);

    // Reset filters
    $resetButton.on("click", function () {
      $breedFilter.val("");
      $allergiesFilter.val("");
      $dogItems.show();
      $noResults.addClass("hidden");
    });

    function applyFilters() {
      const selectedBreedId = $breedFilter.val();
      const selectedAllergies = $allergiesFilter.val();
      let visibleCount = 0;

      $dogItems.each(function () {
        const $dog = $(this);
        const dogBreedId = $dog.attr("data-breed-id");
        const hasAllergies = $dog.attr("data-has-allergies");

        let showDog = true;

        // Check breed filter
        if (selectedBreedId && selectedBreedId !== dogBreedId) {
          showDog = false;
        }

        // Check allergies filter
        if (selectedAllergies) {
          if (selectedAllergies === "yes" && hasAllergies !== "yes") {
            showDog = false;
          } else if (selectedAllergies === "no" && hasAllergies !== "no") {
            showDog = false;
          }
        }

        // Show or hide dog
        if (showDog) {
          $dog.show();
          visibleCount++;
        } else {
          $dog.hide();
        }
      });

      // Show/hide no results message
      $noResults.toggleClass("hidden", visibleCount > 0);
    }

    // Initial filter
    if ($breedFilter.val() || $allergiesFilter.val()) {
      applyFilters();
    }
  });
})(jQuery);
