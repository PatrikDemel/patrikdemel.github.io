document.addEventListener("DOMContentLoaded", () => {
  let absence_button = document.getElementById("absence-button");

  function absence_calc() {
    let all_hours = Number(document.getElementById("all-hodiny").value);
    let missed_hours = Number(document.getElementById("missed-hodiny").value);
    let percent_number = all_hours / missed_hours;
    let percents = 100 / percent_number;

    let percent_result = document.getElementById("result-percents");

    percent_result.innerHTML(percents);
  }

  absence_button.onclick = absence_calc;
});
