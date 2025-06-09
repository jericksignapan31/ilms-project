function convertToPeso() {
    // Get the value from the <p> tag
    const priceElement = document.getElementById('price');
    const priceValue = parseFloat(priceElement.textContent);

    // Format the value as peso
    const formattedPrice = new Intl.NumberFormat('en-PH', {
        style: 'currency',
        currency: 'PHP',
    }).format(priceValue);

    // Update the <p> tag with the formatted value
    priceElement.textContent = formattedPrice;
}