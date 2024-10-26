<?php 
class tipo 
{
    private $tipo_id;
    private $nombre_tipo;

    /**
     * Get the value of tipo_id
     */ 
    public function getTipo_id()
    {
        return $this->tipo_id;
    }

    /**
     * Set the value of tipo_id
     *
     * @return  self
     */ 
    public function setTipo_id($tipo_id)
    {
        $this->tipo_id = $tipo_id;

        return $this;
    }

    /**
     * Get the value of nombre_tipo
     */ 
    public function getNombre_tipo()
    {
        return $this->nombre_tipo;
    }

    /**
     * Set the value of nombre_tipo
     *
     * @return  self
     */ 
    public function setNombre_tipo($nombre_tipo)
    {
        $this->nombre_tipo = $nombre_tipo;

        return $this;
    }
}
?>