<?php
    interface Employee
    {
        function getSalary();
        function setSalary($salary);
        function getRole();
    }

    class Manager implements Employee
    {
        private $salary;
        private $podwladni;

        public function __construct()
        {
            $this->salary = 0;
            $this->podwladni = [];
        }
        function getSalary()
        {
            return $this->salary;
        }

        function setSalary($salary)
        {
            $this->salary = $salary;
        }

        function getRole()
        {
            return __CLASS__;
        }

        function addEmployee(Employee $employee)
        {
            $this->podwladni[] = $employee;
        }
    }

    class Developer implements Employee
    {
        private $salary;
        private $programmingLanguage;

        function __construct()
        {
            $this->salary = 0;
            $this->programmingLanguage = "";
        }
        function getSalary()
        {
            return $this->salary;
        }

        function setSalary($salary)
        {
            $this->salary = $salary;
        }

        function getRole()
        {
            return __CLASS__;
        }

        function setProgrammingLanguage($programmingLanguage)
        {
            $this->programmingLanguage = $programmingLanguage;
        }

        function getProgrammingLanguage()
        {
            return $this->programmingLanguage;
        }
    }

    class Designer implements Employee
    {
        private $salary;
        private $designingTool;

//        public function __construct()
//        {
//            $this->salary = 0;
//            $this->designingTool="";
//        }
        function getSalary()
        {
            return $this->salary;
        }

        function setSalary($salary)
        {
            $this->salary = $salary;
        }

        function getRole()
        {
            return __CLASS__;
        }
        function getDesigningTool()
        {
            return $this->designingTool;
        }

        function setDesigningTool($designingTool)
        {
            $this->designingTool=$designingTool;
        }
    }

