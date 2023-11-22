<?php

class Customer {

    private $first;
    private $last;
    private $address;
    private $phone;
    private $email;       
    private $password;
    private $password_confirmation;
  
    public function __construct($first, $last, $address, $phone, $email, $password, $password_confirmation) {

        $this->first = $first;
        $this->last = $last;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;        
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
        
    }

    // Setter Methods
    function set_first($first)
    {
        $this->first = $first;
    }

    function set_last($last)
    {
        $this->last = $last;
    }

    function set_address($address)
    {
        $this->address = $address;
    }
    
    function set_phone($phone)
    {
        $this->phone = $phone;
    }    

    function set_email($email)
    {
        $this->email = $email;
    }    

    function set_password($password)
    {
        $this->password = $password;
    }

    // Getter Methods 
    function get_first($first)
    {
        return $this->first;
    }

    function get_last($last)
    {
         return $this->last;
    }

    function get_address($address)
    {
        return $this->address;
    }
    
    function get_phone($phone)
    {
        return $this->phone;
    }    

    function get_email($email)
    {
        return $this->email;
    }    

    function get_password($password)
    {
        return $this->password;
    }
    