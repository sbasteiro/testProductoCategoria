<?php
include_once 'DBConnector.php';

class DBConnectorProducto extends DBConnector {
    function __construct() {
        parent::__construct('producto');
    }
}
