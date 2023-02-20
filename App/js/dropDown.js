function toggleDropdown() {
  const dropdown = document.getElementById("dropdown-content");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
}

const checkboxes = document.querySelectorAll("#dropdown-content input[type=checkbox]");
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener("change", function() {
    let selectedOptions = "";
    checkboxes.forEach(function(currentCheckbox) {
      if (currentCheckbox.checked) {
        selectedOptions += currentCheckbox.value + ", ";
      }
    });
    selectedOptions = selectedOptions.slice(0, -2);
    document.getElementById("dropdown-content").setAttribute("data-value", selectedOptions);
    document.querySelector("button").textContent = selectedOptions || "Select options";
  });
});