<?php
// Inicio paginación
if (empty($_GET['pag']) === false) {
    $pagina_actual = intval($_GET['pag']);
} else {
    $pagina_actual = 1;
}
if (empty($_GET['reg']) === false) {
    $registros_pagina = intval($_GET['reg']);
} else {
    $registros_pagina = 1;
}

$inicio = ($pagina_actual - 1) * $registros_pagina;
$fin = ($pagina_actual) * $registros_pagina;
 
//Fin paginación

//Filtro por SKU
if (empty($_GET['sku']) === false) {
    $sku = intval($_GET['sku']);
} else {
    $sku = "";
}
//Fin filtro sku

