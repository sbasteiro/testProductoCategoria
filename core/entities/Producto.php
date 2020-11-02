<?php
include 'Entity.php';

class Producto extends Entity {
    protected $table = 'producto';
    protected $fillables = ['nombre', 'precio', 'url_imagen', 'sku', 'categoria_id'];
    public $nombre;
    public $precio;
    public $url_imagen;
    public $sku;
    public $categoria_id;
    
    function __construct() {
        $dbConnector = new DBConnector('producto');
        $this->dbConnectionInstance = $dbConnector->getPdoInstance();
    }
}

