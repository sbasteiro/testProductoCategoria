<?php

class DBConnector {
    private $driver   = 'mysql';
    private $host     = "localhost";
    private $port     = "3306";
    private $user     = "root";
    private $pass     = "";
    private $pdoInstance;

    function __construct($database) {
        if (!$database) {
            throw new Exception('No se encuentra base de datos seleccionada');
        }
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdoInstance = new PDO($this->driver.':host='.$this->host.';dbname='.$database.';port='.$this->port, $this->user, $this->pass, $options);
    }
    
    public function getPdoInstance() {
        return $this->pdoInstance;
    }
}

