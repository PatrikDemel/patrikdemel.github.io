document.addEventListener("DOMContentLoaded", () => {
  let absence_button = document.getElementById("absence-button");
  let znamky_button = document.getElementById("znamky-button");
  let absence_card = document.getElementById("absence-card");
  let znamky_card = document.getElementById("znamky-card");

  absence_button.onclick = function () {
    absence_card.className = "shown";
    znamky_card.className = "hidden";
  };

  znamky_button.onclick = function () {
    absence_card.className = "hidden";
    znamky_card.className = "shown";
  };
});
