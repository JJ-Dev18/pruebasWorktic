<?php
//  
  class DB{
    private $dbUrl; 
    private $host;
    private $user ;
    private $password ;
    private $db ;

    public function __construct(){
        // $this->host     = $cleardb_url["host"];;
        // $this->db       = substr($cleardb_url["path"],1);
        // $this->user     = $cleardb_url["user"];
        // $this->password = $cleardb_url["pass"];
        // $this->dbUrl = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        try{
            $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $cleardb_server = $cleardb_url["host"];
            $cleardb_username = $cleardb_url["user"];
            $cleardb_password = $cleardb_url["pass"];
            $cleardb_db = substr($cleardb_url["path"],1);
            
            $connection = "mysql:host=" . $cleardb_server . ";dbname=" . $cleardb_db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $cleardb_username, $cleardb_password, $options);
            $active_group = 'default';
            $query_builder = TRUE;
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}


?>