<?php 
class modelo{
    private $modelo_id;
    private $nombre_modelo;
 


    /**
     * Get the value of modelo_id
     */ 
    public function getModelo_id()
    {
        return $this->modelo_id;
    }

    /**
     * Set the value of modelo_id
     *
     * @return  self
     */ 
    public function setModelo_id($modelo_id)
    {
        $this->modelo_id = $modelo_id;

        return $this;
    }

    /**
     * Get the value of nombre_modelo
     */ 
    public function getNombre_modelo()
    {
        return $this->nombre_modelo;
    }

    /**
     * Set the value of nombre_modelo
     *
     * @return  self
     */ 
    public function setNombre_modelo($nombre_modelo)
    {
        $this->nombre_modelo = $nombre_modelo;

        return $this;
    }
}

?>