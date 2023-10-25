const minusButton = document.getElementById("minus");
const plusButton = document.getElementById("plus");
const stockInput = document.getElementById("stock");
const stockValue = document.getElementById("stockvalue");

minusButton.addEventListener("click", function() {
    let currentValue = parseInt(stockInput.value);
    if (currentValue > 0) {
        stockInput.value = currentValue - 1;
        stockValue.textContent = currentValue - 1;
    }
});

plusButton.addEventListener("click", function() {
    let currentValue = parseInt(stockInput.value);
    stockInput.value = currentValue + 1;
    stockValue.textContent = currentValue + 1;
});

function toggleCustomInput() {
    const select = document.getElementById("myDropdown");
    const customInput = document.getElementById("customtype");

    if (select.value === "others") {
        customInput.style.display = "block";
    } else {
        customInput.style.display = "none"; 
    }
}
toggleCustomInput();
