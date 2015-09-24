<?php

    class JobOpening
    {
        private $name;
        private $title;
        private $job_description;
        private $contact_email;
        private $contact_phone;


    function __construct($name, $title, $job_description, $contact_email, $contact_phone)
    {
        $this->name = $name;
        $this->title = $title;
        $this->job_description = $job_description;
        $this->contact_email = $contact_email;
        $this->contact_phone = $contact_phone;
    }

    //Getters and Setters for job_posting

    function setName($new_name)
    {
        $this->name = $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function setTitle($new_title)
    {
        $this->title = $new_title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setJobDescription($new_job_description)
    {
        $this->job_description = $new_job_decription;
    }

    function getJobDescription()
    {
        return $this->job_description;
    }

    function setContactEmail($new_contact_email)
    {
        $this->contact_email = $new_contact_email;
    }

    function getContactEmail()
    {
        return $this->contact_email;
    }

    function setContactPhone($new_contact_phone)
    {
        // $contact_phone = preg_replace( "/[^0-9]/", "",$this->contact_phone);
        if(strlen($new_contact_phone) == 7){

            // return preg_replace("/[0-9]{3}([0-9]{4})/", $contact_phone);
            $phone_array = str_split($new_contact_phone);
            $inserted = array("-");
            array_splice($phone_array,3,0, $inserted);
            $this->contact_phone = $phone_array;
        } else {
            $this->contact_phone = "its not a 7 digit phone number";
        }


    }

    function getContactPhone()
    {
            return $this->contact_phone;
        // $contact_phone = preg_replace( "/[^0-9]/", "",$this->contact_phone);
        // if(strlen($this->contact_phone) == 7){
        //
        //     return preg_replace("/[0-9]{3}([0-9]{4})/", $contact_phone);
        // } else {
        //     return "its not a 7 digit phone number";
        // }

    }

    //class functions

    function save()
    {
        array_push($_SESSION["list_of_jobs"], $this);
    }

    static function getAll()
    {
        return $_SESSION["list_of_jobs"];
    }

    static function deleteAll()
    {
        $_SESSION["list_of_jobs"] = array();
    }

}




 ?>
