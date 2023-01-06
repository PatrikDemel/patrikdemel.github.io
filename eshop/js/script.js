document.addEventListener("DOMContentLoaded", () => {
    let menuIcon = document.querySelector("#bars");
    let mobileMenu = document.querySelector(".mobile-navbar");
    mobileMenu.style.display = "none";
    menuIcon.onclick = function () {

        if (mobileMenu.style.display === "none") {
            mobileMenu.style.display = "block";
            menuIcon.style.backgroundColor = "#8b2faf";
            menuIcon.style.color = "#fff";
        } else {
            mobileMenu.style.display = "none";
            menuIcon.style.backgroundColor = "#fff";
            menuIcon.style.color = "#000";
        }
    };
})