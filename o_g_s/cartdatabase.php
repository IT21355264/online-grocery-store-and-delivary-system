<?php
class database
{
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='hey_goods';

        private $con ='';


    public function connect()
    {
        // Create connection
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->con->connect_error) {
            echo 'disconnected';
        die("Connection failed: " . $this->con->connect_error);
        }
        

    }


    public function select($sql){
        
         $result = $this->con->query($sql);
         return $result;
    }

    public function close()
    {
        $this->con->close();
    }
}


?>