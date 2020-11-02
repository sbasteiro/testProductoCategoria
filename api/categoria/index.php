<?php
/* 
 * sabrina basteiro 30/10/2020
 * Muestra la lista de todas las categorias
 */
include_once '../../core/DBConnectorCategoria.php';
include '../filtros.php';
include '../middleware.php';
//Traigo categorias de base de datos
try {
    $dbConCategoria = new DBConnectorCategoria();
    $pdoCategoria = $dbConCategoria->getPdoInstance();
    $query_categoria = $pdoCategoria->query('SELECT * FROM categoria;');
    $datos_categorias = $query_categoria->fetchAll();
    echo json_encode(array_slice($datos_categorias, $inicio, $fin));
} catch (Exception $exc) {
    echo "Ha ocurrido un error: ".$exc->getMessage();
}
//Fin Categorias



