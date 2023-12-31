<?php
include("../database/dbConfig.php");
	
class Appointment {

    private $id;
    private $customerID;
    public $petName;
	private $serviceName;
    private $appt_date;
    private $appt_time;
	private $appt_status;
	private $payment_status;
	private $total_cost;
  
    public function __construct($id, $customerID, $petName, $serviceName, $appt_date, $appt_time, $appt_status, $payment_status, $total_cost) 
    {
		$this->id = $id;
		$this->customerID=$customerID;
        $this->petName = $petName;
		$this->serviceName = $serviceName;
        $this->appt_date=$appt_date;
        $this->appt_time = $appt_time;
		$this->appt_status = $appt_status;
		$this->payment_status = $payment_status;
		$this->total_cost = $total_cost;
    }
	///past appointment - apptid, petName, date, time, service, cost, payment status

    // Setter Methods
    function setCustomer($customerID)
    {
        $this->customerID = $customerID;
    }

    function setPetName($petName)
    {
        $this->petName = $petName;
    }
	
	function setService($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    function setDate($appt_date)
    {
        $this->appt_date = $appt_date;
    }
    
    function setTime($appt_time)
    {
        $this->appt_time = $appt_time;
    } 
	
	function setApptStatus($payment_status)
	{
		$this->appt_status = $payment_status;
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
	function getID()
    {
		return $this->id;
    }  
	
    function getCustomerID()
    {
        return $this->customerID;
    }

    function getPetName()
    {
        return $this->petName;
    }
	
	function getServiceName()
	{
		return $this->serviceName;
	}

    function getApptDate()
    {
        return $this->appt_date;
    }

    function getApptTime()
    {
        return $this->appt_time;
    }

	function getApptStatus()
	{
		return $this->appt_status;
	}
	
	function getPaymentStatus()
	{
		if($this->payment_status==1)
			$status = "Paid";
		else
			$status = "Unpaid";
		return $status;
	}
	
	function getTotalCost()
	{
		return $this->total_cost;
	}
}