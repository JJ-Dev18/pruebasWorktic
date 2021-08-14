<?php
   $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
  class DB{
     
    private $host;
    private $user ;
    private $password ;
    private $db ;
    private $active_group = 'default';
    private $query_builder = TRUE;

    public function __construct(){
        $this->host     = $cleardb_url["host"];;
        $this->db       = substr($cleardb_url["path"],1);
        $this->user     = $cleardb_url["user"];
        $this->password = $cleardb_url["pass"];
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
           
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}


?>