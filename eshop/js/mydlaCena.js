document.addEventListener("DOMContentLoaded", () => {
    let selectList = document.getElementById("grams");
    let prize = document.getElementById("prize");
    let button110 = document.getElementById("button110");
    let button210 = document.getElementById("button210");

    selectList.addEventListener("change", () => {
        prize.innerText = selectList.value;
        let selected = selectList.options[selectList.selectedIndex].text

        if (selected === "210g") {
            button210.style.display = "block";
            button110.style.display = "none";

        } else {
            button110.style.display = "block";
            button210.style.display = "none";
        }
    })

    button110.onclick = function () {
        let productID = button110.dataset.id;
        let productPrize = button110.dataset.price;
        let productTitle = button110.dataset.title;
        let productGrams = button110.dataset.grams;
        let productQuantity = document.querySelector("input").value;

        let item = {
            ID: productID, prize: productPrize, title: productTitle, quantity: productQuantity, grams: productGrams
        }

        localStorage.setItem(productID, JSON.stringify(item));
    }

    button210.onclick = function () {
        let productID = button210.dataset.id;
        let productPrize = button210.dataset.price;
        let productTitle = button210.dataset.title;
        let productGrams = button210.dataset.grams;
        let productQuantity = document.querySelector("input").value;

        let item = {
            ID: productID, prize: productPrize, title: productTitle, quantity: productQuantity, grams: productGrams
        }

        localStorage.setItem(productID, JSON.stringify(item));
    }
})