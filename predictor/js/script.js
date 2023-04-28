document.addEventListener('DOMContentLoaded', () => {
  let absence_button = document.getElementById('absence-button');
  let grades_button = document.getElementById('znamky-button');
  let add_grade_button = document.getElementById('add-znamka-button');
  let abence_needed_field = document.getElementById('absence-needed-field');

  let grades_list = [];
  let values_list = [];

  function absence_calc() {
    let all_hours = document.getElementById('all-hodiny').value;
    let missed_hours = document.getElementById('missed-hodiny').value;
    let percent_number = Number(all_hours) / Number(missed_hours);
    let percents = 100 / percent_number;
    let percent_result = document.getElementById('result-percents');

    if (all_hours.length == 0 || missed_hours.length == 0) {
      percent_result.textContent = 'Vyplň obě pole';
    } else {
      percent_result.textContent = percents.toFixed(2) + ' %';
    }
    if (percents <= 25) {
      abence_needed_field.textContent = 0;
    } else {
      for (let i = Number(all_hours); i < 200; i++) {
        let condition = i / Number(missed_hours);
        let second_condition = 100 / condition;
        let final_condition = second_condition <= 25;

        if (final_condition) {
          abence_needed_field.textContent = i;
          break;
        }
      }
    }
  }

  function grade_calc() {
    let first_sum = 0;
    let second_sum = 0;

    for (let i = 0; i < grades_list.length; i++) {
      let times = grades_list[i] * values_list[i];
      first_sum += times;
    }

    for (let i = 0; i < values_list.length; i++) {
      second_sum += values_list[i];
    }

    let grade_average = first_sum / second_sum;
    let rounded_grade_average = grade_average.toFixed(2);

    let average_field = document.getElementById('znamky-average');
    average_field.textContent = rounded_grade_average;
  }

  function add_grade() {
    let new_grade = document.getElementById('new-znamka').value;
    let new_value = document.getElementById('znamka-value').value;
    let grade_list = document.getElementById('znamky-list');
    let znamky_prumer_error_field = document.getElementById('znamky-average');

    if (new_grade.length == 0 || new_value.length == 0) {
      znamky_prumer_error_field.textContent = 'Byly špatně zadané hodnoty';
    } else {
      znamky_prumer_error_field.textContent = '';
      let li = document.createElement('li');
      li.textContent = new_grade + ' (váha: ' + new_value + ')';
      li.setAttribute('class', 'znamka');

      let icon = document.createElement('i');
      icon.setAttribute('class', 'fa-solid fa-xmark delete-icon');

      grade_list.appendChild(li);
      li.appendChild(icon);

      grades_list.push(Number(new_grade));
      values_list.push(Number(new_value));
    }
  }

  absence_button.onclick = absence_calc;
  add_grade_button.onclick = add_grade;
  grades_button.onclick = grade_calc;
});
