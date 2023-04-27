document.addEventListener('DOMContentLoaded', () => {
  let absence_button = document.getElementById('absence-button');

  function absence_calc() {
    let all_hours = document.getElementById('all-hodiny').value;
    let missed_hours = document.getElementById('missed-hodiny').value;
    let percent_number = Number(all_hours) / Number(missed_hours);
    let percents = 100 / percent_number;
    let percent_result = document.getElementById('result-percents');

    if (all_hours.length == 0 || missed_hours.length == 0) {
      percent_result.textContent = 'Vyplň obě pole';
    } else {
      for (let i = 0; i < 100; i++) {
        if (i / missed_hours / 100 === 25) {
        }
      }
    }
  }
  absence_button.onclick = absence_calc;
});
