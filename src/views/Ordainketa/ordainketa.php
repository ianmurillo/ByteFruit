<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordainketa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Ordainketaren formularioa</h2>

                <form id="payment-form" data-parsley-validate>
                    <div class="form-group">
                        <label for="card-holder">Nombre del titular de la tarjeta:</label>
                        <input type="text" class="form-control" id="card-holder" name="card-holder" required>
                    </div>

                    <div class="form-group">
                        <label for="card-number">Número de tarjeta:</label>
                        <input type="text" class="form-control" id="card-number" name="card-number" required data-parsley-pattern="^[0-9]{16}$">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expiry-date">Fecha de caducidad:</label>
                            <input type="text" class="form-control" id="expiry-date" name="expiry-date" placeholder="MM/YY" required data-parsley-pattern="^(0[1-9]|1[0-2])\/\d{2}$">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" required data-parsley-pattern="^[0-9]{3}$">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#payment-form').parsley();
            $('#payment-form').submit(function (event) {
                event.preventDefault();
                if ($('#payment-form').parsley().isValid()) {
                    alert('Este formulario no realiza ninguna acción real. Es solo un ejemplo.');
                }
            });
        });
    </script>

</body>
</html>
