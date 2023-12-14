<?php
include("../database/dbConfig.php");
	
class Service {

    private $id;
    private $name;
    private $cost;
	
    public function __construct($id, $name, $cost) 
    {
		$this->id = $id;
        $this->name = $name;
        $this->cost = $cost;

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

    function setCost($cost)
    {
        $this->cost = $cost;
    } 

    // Getter Methods 
    function getName()
    {
        return $this->name;
    }

    function getCost()
    {
        return $this->cost;
    }

    function getID()
    {
        return $this->id;
    }
 
}