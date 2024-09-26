<?php 
class Snowboard{
    private $id;
    private $name;
    private $length;
    private $width;
    private $Tipo; 
    private $ruedas; 


    /**
     * Get the value of Tipo
     */ 
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * Set the value of Tipo
     *
     * @return  self
     */ 
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of ruedas
     */ 
    public function getRuedas()
    {
        return $this->ruedas;
    }

    /**
     * Set the value of ruedas
     *
     * @return  self
     */ 
    public function setRuedas($ruedas)
    {
        $this->ruedas = $ruedas;

        return $this;
    }
}