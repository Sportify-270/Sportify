function submitPayment() {
    const cardholderName = document.getElementById('cardholder-name').value;
    const cardNumber = document.getElementById('card-number').value;
    const expirationDate = document.getElementById('expiration-date').value;
    const cvv = document.getElementById('cvv').value;

    if (!cardholderName || !cardNumber || !expirationDate || !cvv) {
        alert('Please fill out all fields.');
        return;
    }

    // Here, you would normally send the payment data to your server or payment gateway
    console.log('Payment submitted:', { cardholderName, cardNumber, expirationDate, cvv });

    // Simulating a successful payment response
    alert('Payment successful!');

    // Clear the form
    document.getElementById('payment-form').reset();
}
