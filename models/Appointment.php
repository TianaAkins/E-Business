<?php
include("../database/dbConfig.php");
	
class Appointment {

    private $id;
    private $customer;
    private $pet;
	private $service;
    private $appt_date;
    private $appt_time;
	private $status;
	private $payment_status;
	private $total_cost;
  
    public function __construct($id, $customer, $pet, $service, $appt_date, $appt_time, $status, $payment_status, $total_cost) 
    {
		$this->id = $id;
        $this->customer = $customer;
        $this->pet = $pet;
		$this->service = $service;
        $this->appt_date=$appt_date;
        $this->appt_time = $appt_time;
		$this->status = $status;
		$this->payment_status = $payment_status;
		$this->total_cost = $total_cost;
    }
	///past appointment - apptid, petName, date, time, service, cost, payment status

    // Setter Methods
    function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    function setPet($pet)
    {
        $this->pet = $pet;
    }
	
	function setService($service)
    {
        $this->service = $service;
    }

    function setDate($appt_date)
    {
        $this->appt_date = $appt_date;
    }
    
    function setTime($appt_time)
    {
        $this->appt_time = $appt_time;
    }    

    function setStatus($status)
    {
        $this->status = $status;
    }    
	
	function setPaymentStatus($payment_status)
	{
		$this->payment_status = $payment_status;
	}
	
	function setTotalCost($total_cost)
	{
		$this->total_cost = $total_cost;
	}

    // Getter Methods 
    function getCustomer()
    {
        return $this->customer;
    }

    function getPet()
    {
        return $this->pet;
    }
	
	function getService()
	{
		return $this->service;
	}

    function getApptDate()
    {
        return $this->appt_date;
    }

    function getApptTime()
    {
        return $this->appt_time;
    }

    function getStatus()
    {
        return $this->status;
    }

	function getPaymentStatus()
	{
		if(payment_status==1)
			echo "Paid";
		else
			echo "Unpaid";
	}
	
	function getTotalCost()
	{
		return $this->total_cost;
	}
	
	function getID()
    {
		return $this->id;
    }   
}