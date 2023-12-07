<?php
include("../database/dbConfig.php");
	
class Pet {

    private $name;
    private $type;
    private $breed;
    private $hair_type;
    private $weight; 
  
    public function __construct($name, $type, $breed, $hair_type, $weight) 
    {
        $this->name = $name;
        $this->type = $type;
        $this->breed = $breed;
        $this->hair_type = $hair_type;
		$this->weight = $weight;
    }

    // Setter Methods
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
	
	function getId($cust_id)
    {
		$sql = "Select PetID from pet where CustomerID={$cust_id} and PetName='{$name}'";
		$result = $mysqli-> query($sql);
		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $row["PetID"];
    }   
}