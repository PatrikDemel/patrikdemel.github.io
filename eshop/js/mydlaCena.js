document.addEventListener("DOMContentLoaded", () => {
    let selectList = document.getElementById("grams");
    let prize = document.getElementById("prize");

    selectList.addEventListener("change", () => {
        prize.innerText = selectList.value;
    })
})