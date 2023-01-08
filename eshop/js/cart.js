document.addEventListener("DOMContentLoaded", () => {
    let items = localStorage;

    let itemcontainer = document.getElementById("item-section");
    let itemerror = document.getElementById("no-item-alert");

    if (items.length < 1) {
        itemerror.style.display = "flex";
        itemcontainer.style.display = "none";
    } else {
        itemerror.style.display = "none";
        itemcontainer.style.display = "flex";
    }
})