<?php
class Database{
    //refernces to the site https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
    //to help get RDS connected to the server 
 
    // specify your own database credentials
    private $host = "";//url of service
    private $port = "3306";
    private $dbname = "";//name of service
    private $user = "";//username for service
    private $password = "";//pw for service
    public $conn;
    // get the database connection
    public function getDBConnection(){
            $this->conn = null;
            //codeninja's PDO connection function didn't work with AWS from my local machine 
            $this->conn = mysqli_connect($this->host, $this->user, $this->password);
            if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        return $this->conn;
    }
}
?>
