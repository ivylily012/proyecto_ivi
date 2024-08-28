<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Pago</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php 
    include __DIR__.'/inc/styles.php';
    ?>

    <?php 
    include __DIR__.'/inc/scripts.php';
    ?>
</head>
<body>
<?php 
        include __DIR__.'../inc/navBar.php';
    ?>
    <div class="container mt-5">
        <div class="row">
            <!-- Sección de Dirección de Facturación -->
            <div class="col-md-6">
                <h4>Dirección de Facturación</h4>
                <form>
                    <div class="form-group">
                        <label for="fullName">Nombre Completo</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Jacob Aiden">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" placeholder="Habitación - Calle - Localidad">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" id="city" placeholder="Berlín">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="state">Estado</label>
                            <input type="text" class="form-control" id="state" placeholder="Alemania">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zip">Código Postal</label>
                            <input type="text" class="form-control" id="zip" placeholder="123 456">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Sección de Pago -->
            <div class="col-md-6">
                <h4>Pago</h4>
                <form>
                    <div class="form-group">
                        <label for="cardType">Tarjetas Aceptadas</label><br>
                        <img id="icon-paypal" src="https://img.icons8.com/color/48/000000/paypal.png" alt="PayPal" class="card-icon">
                        <img id="icon-visa" src="https://img.icons8.com/color/48/000000/visa.png" alt="Visa" class="card-icon">
                        <img id="icon-mastercard" src="https://img.icons8.com/color/48/000000/mastercard.png" alt="Mastercard" class="card-icon">
                        <img id="icon-discover" src="https://img.icons8.com/color/48/000000/discover.png" alt="Discover" class="card-icon">
                    </div>
                    <div class="form-group">
                        <label for="cardName">Nombre en la Tarjeta</label>
                        <input type="text" class="form-control" id="cardName" placeholder="Sr. Jacob Aiden">
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Número de la Tarjeta de Crédito</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="1111 2222 3333 4444">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="expMonth">Mes de Exp.</label>
                            <input type="text" class="form-control" id="expMonth" placeholder="Agosto">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expYear">Año de Exp.</label>
                            <input type="text" class="form-control" id="expYear" placeholder="2025">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
