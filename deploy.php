<?php
include_once 'core/DBConnectorProducto.php';
include_once 'core/DBConnectorCategoria.php';

try {
    $dbConCategoria = new DBConnectorCategoria();
    $pdoCategoria = $dbConCategoria->getPdoInstance();

    $dbConProducto = new DBConnectorProducto();
    $pdoProducto = $dbConProducto->getPdoInstance();
    $query_producto = $pdoProducto->query("SELECT COUNT(*) AS count FROM information_schema.tables WHERE table_schema = 'producto' AND table_name = 'version'");
    $version_producto = $query_producto->fetch();
    //print_r($version_producto);
    if (!empty($version_producto['count'])){
        echo "Ya se realizó un deploy anterior";
    } else {
        $pdoCategoria->query('CREATE TABLE categoria (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(30) NOT NULL    
                );');

        $pdoCategoria->query('INSERT INTO `categoria` (`nombre`) VALUES ("belleza");');
        $pdoCategoria->query('INSERT INTO `categoria` (`nombre`) VALUES ("salud");');
        $pdoCategoria->query('INSERT INTO `categoria` (`nombre`) VALUES ("deportes");');

        $pdoProducto->query('CREATE TABLE producto (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nombre VARCHAR(30) NOT NULL,
                        precio INT NOT NULL,
                        url_imagen VARCHAR(255) NOT NULL,
                        sku VARCHAR(30) NOT NULL,
                        categoria_id INT(6) UNSIGNED NOT NULL,
                        UNIQUE i_sku (sku)
                    );');
        $pdoProducto->query('ALTER TABLE producto 
                            ADD foreign key FK_producto(categoria_id)
                            REFERENCES categoria.categoria(id)
                            on delete cascade
                            on update cascade;');

        $pdoProducto->query('INSERT INTO `producto` (`nombre`, `precio`, `url_imagen`, `sku`, `categoria_id`) VALUES ("Crema Facial", 350, "https://perfumeriaspigmento.com.ar/media/catalog/product/cache/image/620x678/e9c3970ab036de70892d86c6d221abfe/8/7/87151.jpg", "111aaa", 1);');
        $pdoProducto->query('INSERT INTO `producto` (`nombre`, `precio`, `url_imagen`, `sku`, `categoria_id`) VALUES ("Lapiz Labial", 500, "https://st.depositphotos.com/1364311/2242/i/950/depositphotos_22424641-stock-photo-red-lipstick.jpg", "111aab", 1);');
        $pdoProducto->query('INSERT INTO `producto` (`nombre`, `precio`, `url_imagen`, `sku`, `categoria_id`) VALUES ("Protector Bucal", 120, "https://d26lpennugtm8s.cloudfront.net/stores/142/220/products/bucal-opro-azul1-a61057dd4bbac2b7cf15663994818062-480-0.jpg", "112aaa", 3);');

        $pdoProducto->query('CREATE TABLE version (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
        );');

        echo "Deploy realizado con éxito";
    }
} catch (Exception $exc) {
    echo "Ha ocurrido un error: ".$exc->getMessage();
}






