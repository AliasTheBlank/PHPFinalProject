<?php 

class player{

    protected $firstName;
    protected $lastName;
    protected $userName;
    protected $password;
    protected $registrationTime;



    public function __construct($FN, $LN, $UN, $PS)
    {
    
        $this->firstName = $FN;
        $this->lastName = $LN;
        $this->userName = $UN;
        $this->password = $PS;
        $this->registrationTime = getdate()['day']['year']['month'];

    }

    // Getters and Setters 

    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($name){
        $this->firstName = $name;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($name){
        $this->lastName = $name;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function setUserName($name){
        $this->userName = $name;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($newPS){
        $this->password = $newPS;
    }
    public function getRegistrationTime(){
        return $this->registrationTime;
    }

    public function playerHistory(){
        ?>
        <pre>
            <p> First Name: <?= $this->getFirstName()?></p>
            <p> Last Name: <?= $this->getLastName()?></p>
            <p> Username: <?= $this->getUserName()?></p>
            <p> Registration Time: <?= $this->getRegistrationTime()?></p>
        </pre>
        <?php 
    }





    
}




?>
