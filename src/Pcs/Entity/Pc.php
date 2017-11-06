<?php

namespace App\Pcs\Entity;

class Pc
{
    protected $id;

    protected $version;

    protected $marque;

    protected $age;

    protected $idproprietaire;

    public function __construct($id, $marque, $age, $version, $idproprietaire)
    {
        $this->id = $id;
        $this->version = $version;
        $this->age = $age;
        $this->marque = $marque;
        $this->idproprietaire = $idproprietaire;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdProprietaire($idproprietaire)
    {
        $this->idproprietaire = $idproprietaire;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setVersion($version)
    {
        $this->age = $age;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdProprietaire()
    {
        return $this->idproprietaire;
    }
    public function getVersion()
    {
        return $this->version;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getMarque()
    {
        return $this->marque;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['marque'] = $this->marque;
        $array['age'] = $this->age;
        $array['version'] = $this->version;
        $array['idproprietaire'] = $this->idproprietaire;

        return $array;
    }
}
