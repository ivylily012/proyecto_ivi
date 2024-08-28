document.getElementById('payment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const cardNumber = document.getElementById('card-number').value;
    const name = document.getElementById('name').value;
    const expiryMonth = document.getElementById('expiry-month').value;
    const expiryYear = document.getElementById('expiry-year').value;
    const cvv = document.getElementById('cvv').value;

    
    if (cardNumber === '' || name === '' || cvv === '') {
        alert('Por favor, completa todos los campos.');
        return;
    }

    // validaciones de los datos 
    console.log('Número Tarjeta:', cardNumber);
    console.log('Nombre:', name);
    //console.log('Expiración:', ${expiryMonth}/${expiryYear});//
    console.log('CVV:', cvv);

    alert('Pago enviado con éxito.');
});