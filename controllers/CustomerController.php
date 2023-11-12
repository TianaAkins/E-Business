<?php

class CustomerController {

    private $name;
    private $email;
    private $phone;
    private $address;
    private $password;
    private $password_confirmation;
  
    public function __construct($name, $email, $phone, $address, $password, $password_confirmation) {

        $this->$name = $name;
        $this->$email = $email;
        $this->$phone = $phone;
        $this->$address = $address;
        $this->$password = $password;
        $this->$password_confirmation = $password_confirmation;
        
    }

    private function emptyInput()
    {
        $result;
        if (empty($this->$name) ||
            empty($this->$email) ||
            empty($this->$phone) ||
            empty($this->$address) ||
            empty($this->$password) ||
            empty($this->$password_confirmation)) 
        {
            $result = false; 
        } 
        else 
        {
            $result = true;
        }
        return $result;        
    }

    private function invalidCharacters($input)
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $input)) {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    
    private function invalidEmail()
    {
        $result;
        if (!filter_var($this->$email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() 
    {
        $result;
        if ($this->$password !== $this->$password_confirmation)
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

}