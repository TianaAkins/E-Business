<?php
include("../database/dbConfig.php");
	
class Appointment {

    private $id;
    private $customerID;
    public $petID;
	private $serviceID;
    private $appt_date;
    private $appt_time;
	private $status;
	private $payment_status;
	private $total_cost;
  
    public function __construct($id, $customerID, $petID, $serviceID, $appt_date, $appt_time, $status, $payment_status, $total_cost) 
    {
		$this->id = $id;
        $this->customerID = $customerID;
        $this->petID = $petID;
		$this->serviceID = $serviceID;
        $this->appt_date=$appt_date;
        $this->appt_time = $appt_time;
		$this->status = $status;
		$this->payment_status = $payment_status;
		$this->total_cost = $total_cost;
    }
	///past appointment - apptid, petName, date, time, service, cost, payment status

    // Setter Methods
    function setCustomer($customerID)
    {
        $this->customerID = $customerID;
    }

    function setPetID($petID)
    {
        $this->petID = $petID;
    }
	
	function setService($serviceID)
    {
        $this->serviceID = $serviceID;
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
    function getCustomerID()
    {
        return $this->customerID;
    }

    function getPetID()
    {
        return $this->petID;
    }
	
	function getServiceID()
	{
		return $this->serviceID;
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