document.addEventListener("DOMContentLoaded", () => {
    let contactForm = document.getElementById("contact-form");
    let submittedText = document.getElementById("submitted");
    contactForm.onsubmit = function () {
        submittedText.style.display = "block";
    }
})