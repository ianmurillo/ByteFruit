<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago - Tienda Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <!-- Agregar estilos personalizados aquí -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        label {
            font-weight: bold;
        }
        .payment-method-section {
            display: none;
        }

        #caja{
            padding: 10px;
        }
    </style>

    <?php
    require_once("../../require/header.php");
    ?>
    
</head>
<body>

    <div class="container mt-5">
        <div id="caja" class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Datuak:</h2>

                <!-- Sección para Tarjeta de Crédito -->
                <div class="payment-method-section" id="credit-card-section">
                    <!-- Campos para Tarjeta de Crédito -->
                    <div class="form-group">
                        <label for="nan">NAN</label>
                        <input type="text" class="form-control" id="nan" name="card-holder" required>
                    </div>
                    <div class="form-group">
                        <label for="korreo">Korreo elektronikoa</label>
                        <input type="text" class="form-control" id="korreo" name="card-number" required data-parsley-pattern="^[0-9]{16}$">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expiry-date">Kreditu txartela:</label>
                            <input type="text" class="form-control" id="card-number" name="card-number" required data-parsley-pattern="^[0-9]{16}$">
                        </div>
                    </div>
                </div>

                

                <!-- Botón de Pago -->
                <button type="submit" class="btn btn-primary" id="miBoton">Erosketa egin</button>
            </div>
        </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>

    <!-- Script Personalizado -->
    <script>
        $(document).ready(function () {
            // Mostrar la sección de tarjeta de crédito al cargar la página
            $('#credit-card-section').show();

            // Manejo del cambio en la selección del método de pago
            $('#payment-method').change(function () {
                // Oculta todas las secciones
                $('.payment-method-section').hide();
                // Muestra la sección correspondiente al método seleccionado
                $('#' + $(this).val() + '-section').show();
            });

            // Inicialización de Parsley para validación del formulario
            $('#payment-form').parsley();
            
            // Manejo del envío del formulario
            $('#payment-form').submit(function (event) {
                event.preventDefault();
                if ($('#payment-form').parsley().isValid()) {
                    // Aquí puedes realizar acciones de procesamiento del pago
                    alert('¡Pago exitoso! (Este mensaje es solo un ejemplo)');
                }
            });
        });
    </script>
    <script>
    function realizarCompra() {
        var formData = {
            nan: $("#nan").val(),
            email: $("#korreo").val(),
            metodoPago: $("#metodoPago").val()
        };

        // Enviar datos del formulario en formato JSON mediante AJAX
        $.ajax({
                type: "POST",
                url: "procesar_formulario.php",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(formData)
            })
            .done(function(response) {
                // Manejar la respuesta del servidor    

                var boton = document.getElementById('miBoton');

                // Agrega un escuchador de eventos al botón
                boton.addEventListener('click', function() {
                // Redirige a la página deseada
                window.location.href = 'ordainketa.php';
                });
            })
            .fail(function() {
                // Manejar errores
                alert("Error en la solicitud AJAX");
            })
            .always(function() {});
    }
    </script>

</body>
</html>
