<?php
include("../database/dbConfig.php");
	
class Pet {

	private $id;
    private $name;
    private $type;
    private $breed;
    private $hair_type;
    private $weight; 
	private $customer;
  
    public function __construct($id, $name, $type, $breed, $hair_type, $weight, $customer) 
    {
		$this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->breed = $breed;
        $this->hair_type = $hair_type;
		$this->weight = $weight;
		$this->customer = $customer;
    }

    // Setter Methods
	function setID($id)
    {
        $this->id = $id;
    }
	
    function setName($name)
    {
        $this->name = $name;
    }

    function setPetType($type)
    {
        $this->type = $type;
    }

    function setBreed($breed)
    {
        $this->breed = $breed;
    }
    
    function setHairType($hair_type)
    {
        $this->hair_type = $hair_type;
    }    

    function setWeight($weight)
    {
        $this->weight = $weight;
    }    

    // Getter Methods 
    function getName()
    {
        return $this->name;
    }

    function getPetType()
    {
        return $this->type;
    }

    function getBreed()
    {
        return $this->breed;
    }

    function getHairType()
    {
        return $this->hair_type;
    }

    function getWeight()
    {
        return $this->weight;
    }    
	
	function getID()
    {
		return $this->id;
    }   
}