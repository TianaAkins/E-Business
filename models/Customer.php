<?php

class Customer {

	private $id;
    private $first;
    private $last;
    private $address;
    private $phone;
    private $email;       
  
    public function __construct($id, $first, $last, $address, $phone, $email) 
    {
        $this->id = $id;
		$this->first = $first;
        $this->last = $last;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;        

    }

    // Setter Methods
	function setID($id)
	{
		$this->id = $id;
	}
	
    function setFirst($first)
    {
        $this->first = $first;
    }

    function setLast($last)
    {
        $this->last = $last;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }
    
    function setPhone($phone)
    {
        $this->phone = $phone;
    }    

    function setEmail($email)
    {
        $this->email = $email;
    }    

    // Getter Methods 
    function getFirst()
    {
        return $this->first;
    }

    function getLast()
    {
        return $this->last;
    }

    function getAddress()
    {
        return $this->address;
    }

    function getPhone()
    {
        $this->phone;
    }

    function getEmail()
    {
        return $this->email;
    }    
	
	function getID()
	{
		return $this->id;
	}

}