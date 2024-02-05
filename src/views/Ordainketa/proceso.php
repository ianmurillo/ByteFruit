<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

    // Obtener datos del cuerpo de la solicitud
    $input_data = file_get_contents("php://input");

    // Intentar decodificar datos JSON
    $json_data = json_decode($input_data, true);

    if ($json_data !== null) {
        
        require_once("../../require/header.php");

        // Insertar datos en la tabla 'bezero'
        $NAN = $json_data["nan"];
        $korreo = $json_data["korreo"];

        $sql_bezero = "INSERT INTO eroslea (NAN, korreo) VALUES (?, ?)";
        $stmt_bezero = $conn->prepare($sql_bezero);

        if ($stmt_bezero === false) {
            //echo json_encode(array("message" => "Error en la preparación de la consulta (bezero): " . $conn->error));
        } else {
            $stmt_bezero->bind_param("ss", $NAN, $korreo);

            if ($stmt_bezero->execute()) {
                //echo json_encode(array("message" => "Inserción exitosa en la tabla 'bezero'"));
            } else {
                //echo json_encode(array("message" => "Error en la inserción (bezero): " . $stmt_bezero->error));
            }

            $stmt_bezero->close();
        }

        // Insertar datos en otra tabla ('pedidos')
        $estadoPedido = "Itxaroten";

        $sql_pedidos = "INSERT INTO eskaerka (NAN, egoera, pedidoEguna) VALUES (?, ?, NOW())"; // Se utiliza NOW() para obtener la fecha y hora actual directamente en la consulta SQL
        $stmt_pedidos = $conn->prepare($sql_pedidos);

        if ($stmt_pedidos === false) {
            //echo json_encode(array("message" => "Error en la preparación de la consulta (pedidos): " . $conn->error));
        } else {
            $stmt_pedidos->bind_param("ss", $NAN, $estadoPedido);

            if ($stmt_pedidos->execute()) {
                // Obtener la última ID insertada en 'pedidos'
                $lastInsertId = $conn->insert_id;


                // Insertar datos en la tabla de artículos ('articulos')
                if (isset($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $item) {
                        $articuloId = $item['productoId'];
                        $cantidad = $item['cantidad'];
                        $precio = $item['precioProducto'];

                        $sql_articulos = "INSERT INTO detalle_pedidos (pedidosID, izena, modeloa, marka, kantitatea, prezioa, pedidoEguna) VALUES (?, ?, ?, ?, NOW())";
                        $stmt_articulos = $conn->prepare($sql_articulos);

                        if ($stmt_articulos === false) {
                            //echo json_encode(array("message" => "Error en la preparación de la consulta (articulos): " . $conn->error));
                        } else {
                            $stmt_articulos->bind_param("iids", $lastInsertId, $articuloId, $cantidad, $precio);

                            if ($stmt_articulos->execute()) {
                                //echo json_encode(array("message" => "Inserción exitosa en la tabla 'articulos'"));
                            } else {
                                //echo json_encode(array("message" => "Error en la inserción (articulos): " . $stmt_articulos->error));
                            }

                            $stmt_articulos->close();
                        }
                    }
                }

            } else {
                //echo json_encode(array("message" => "Error en la inserción (pedidos): " . $stmt_pedidos->error));
            }

            $stmt_pedidos->close();
        }
        echo json_encode(array("message" => "Inserción exitosa en la tabla 'pedidos'"));
        $conn->close();
    }    
} 
?>