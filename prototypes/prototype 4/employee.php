<?php
    class Employee {
        private $id;
        private $firstName;
        private $lastName;
        private $gender;
        private $age;

        public function getId(){
            return $this->id;
        }
        public function setId($value){
            $this->id = $value;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function setFirstName($value){
            $this->firstName = $value;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setLastName($value){
            $this->lastName= $value;
        }

        public function getGender(){
            return $this->gender;
        }

        public function setGender($value){
            $this->gender= $value;
        }

        public function getAge(){
            return $this->age;
        }

        public function setAge($value){
            $this->age = $value;
        }
    }
?>