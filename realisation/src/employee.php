<?php
    class Employee {
        private $id;
        private $employeeId;
        private $firstName;
        private $lastName;
        private $salary;
        private $birthDate;
        private $departement;
        private $photo;

        function getId(){
            return $this->id;
        }

        function setId($value) {
            $this->id = $value;
        }
     
        function getEmployeeId() {
            return $this->employeeId;
        }

        function setEmployeeId($value){
            $this->employeeId = $value;
        }

        function getFirstName(){
            return $this->firstName;
        }

        function setFirstName($value){
            $this->firstName = $value;
        }

        function getLastName(){
            return $this->lastName;
        }

        function setLastName($value){
            $this->lastName = $value;
        }

        function getSalary(){
            return $this->salary;
        }

        function setSalary($value){
            $this->salary = $value;
        }

        function getBirthDate(){
            return $this->birthDate;
        }

        function setBirthDate($value){
            $this->birthDate = $value;
        }

        function getDepartement(){
            return $this->departement;
        }  

        function setDepartement($value){
            $this->departement = $value;
        }

        function getPhoto(){
            return $this->photo;
        }

        function setPhoto($value){
            $this->photo = $value;
        }
    }
?>