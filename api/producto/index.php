<?php
/* 
 * sabrina basteiro 30/10/2020
 * Muestta la lista de todos los productos
 */
include_once '../../core/DBConnectorProducto.php';
include '../middleware.php';
include '../filtros.php';
include '../../core/entities/Producto.php';


$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    try {
        $dbConProducto = new DBConnectorProducto();
        $pdoProducto = $dbConProducto->getPdoInstance();
        $query_producto = $pdoProducto->query('SELECT * FROM producto;');
        $datos_producto = $query_producto->fetchAll();
        echo json_encode(array_slice($datos_producto, $inicio, $fin,$sku));
    } catch (Exception $exc) {
        echo "Ha ocurrido un error: ".$exc->getMessage();
    }
  	break;
  case 'POST':
    try {
        $producto = new Producto();
        $existe_producto = $producto->getWhere(['sku' => $_POST['sku']]);
        if ($existe_producto){
            $return = ['success' => false,'message' => 'El SKU de producto ya fue ingresado anteriormente'];
        } else {
            $producto->nombre    = $_POST['nombre'];
            $producto->precio = $_POST['precio'];
            $producto->url_imagen  = $_POST['url_imagen'];
            $producto->sku  = $_POST['sku'];
            $producto->categoria_id  = $_POST['categoria_id'];
            $producto->save();
            $return = ['success' => true,'message' => 'Producto creado con exito'];
        }
        echo json_encode($return);
    } catch (Exception $exc) {
        echo "Ha ocurrido un error: ".$exc->getMessage();
    }
    break;
  default:
    echo 'metodo no autorizado';
    break;
}