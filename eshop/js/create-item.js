document.addEventListener("DOMContentLoaded", () => {
    let button = document.querySelector("button");
    
    button.onclick = function () {
        let productID = button.dataset.id;
        let productPrize = button.dataset.price;
        let productTitle = button.dataset.title;
        let productGrams = button.dataset.grams;
        let productQuantity = document.querySelector("input").value;

        let item = {
            ID: productID, prize: productPrize, title: productTitle, quantity: productQuantity, grams: productGrams
        }

        localStorage.setItem(productID, JSON.stringify(item));
    }
})