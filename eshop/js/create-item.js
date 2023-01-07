document.addEventListener("DOMContentLoaded", () => {
    let button = document.querySelector(".product-btn");

    button.onclick = function () {
        let productID = button.dataset.id;
        let productPrize = button.dataset.price;
        let productTitle = button.dataset.title;
        let productQuantity = document.querySelector("input").value;

        let item = {
            ID: productID, prize: productPrize, title: productTitle, quantity: productQuantity,
        }
        localStorage.setItem(productID, JSON.stringify(item));
    };
})