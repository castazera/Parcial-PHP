<?php 
class conexion
{
    private const DB_SERVER = "localhost";
    private const DB_NAME = "board";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charsetn=utf8mb4";

    //A las propiedades podemos, de asi quererlo, definirles el tipo de dato que deben tener. 

    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die("Error al conectarse al SQL");
        }
    }

    /**
     * Metodo que devuelve una conexion PDO lista para usar
     * @return PDO
     */

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