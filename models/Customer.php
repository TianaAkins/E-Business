<?php

class Customer {

    private $first;
    private $last;
    private $address;
    private $phone;
    private $email;       
    private $password;
    private $password_confirmation;
  
    public function __construct($first, $last, $address, $phone, $email, $password, $password_confirmation) 
    {
        $this->first = $first;
        $this->last = $last;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;        
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }

    // Setter Methods
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

    function setPassword($password)
    {
        $this->password = $password;
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

}