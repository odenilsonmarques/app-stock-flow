
function generateProductNumber() {
    let productNumber = '';
    for (let i = 0; i < 15; i++) {
        productNumber += Math.floor(Math.random() * 10);
    }
    document.getElementById('product_number').value = productNumber;
}
