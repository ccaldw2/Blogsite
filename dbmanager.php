<?php 

    class dbmanager {

        private $connection;
        
        public function __construct($host, $user, $pw, $db) {
            $this->connection = new mysqli($host, $user, $pw, $db);
        }
        
        public function fetch_table($table_name) {
            $query = "SELECT * FROM $table_name";
            $result = $this->connection->query($query);
            if (!$result) die($this->connection->error);
            return $result;
        }
        
        public function fetch_item($table_name, $parameter, $value){
            $query = "SELECT * FROM $table_name WHERE $parameter = '$value'";
            $result = $this->connection->query($query);
            if (!$result) die($this->connection->error);
            return $result;
        }
    }
    
    
    
    
    
?>