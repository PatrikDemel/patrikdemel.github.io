document.addEventListener("DOMContentLoaded", () => {
    let button = document.querySelector(".product-btn");

    button.onclick = function () {
        let productID = button.dataset.id;
        let productPrize = button.dataset.price;
        let productTitle = button.dataset.title;
        let productGrams = button.dataset.grams;
        let productQuantity = document.querySelector("input").value;

        let select = document.querySelector("select");
        let value = select.options[select.selectedIndex].value;

        let item = {
            ID: productID, prize: productPrize, title: productTitle, quantity: productQuantity, grams: productGrams
        }
        console.log(item)

        localStorage.setItem(productID, JSON.stringify(item));
    };
})