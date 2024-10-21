<?PHP
    class Conexion{
        private const DB_SERVER = "localhost";
        private const DB_USER = "root";
        private const DB_PASS="";
        private const DB_NAME="nombreBase";
        private const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        private PDO $db;

        public function getConexion():PDO{
            try{
                $this->db = new PDO(self::DB_DSN,self::DB_USER,self::DB_PASS);
            } catch(Exception $e){
                die("Error al conecxtar sql");
            }
            return $this->db;
        }
    }
?>