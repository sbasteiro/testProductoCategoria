<?php
include_once 'DBConnector.php';

class DBConnectorCategoria extends DBConnector {
     function __construct() {
        parent::__construct('categoria');
    }
}
