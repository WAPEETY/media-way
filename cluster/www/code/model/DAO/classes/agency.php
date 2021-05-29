<?php

class Agency{
    private int $id;
    private string $username;
    private string $password;
    private string $pec;
    private string $name;
    private bool $enabled;

    function __construct(int $id, string $username,string $password,string $pec,string $name,bool $enabled){
        $this->id = $id;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->pec = $pec;
        $this->name = $name;
        $this->enabled = $enabled;
    }

    function getId(){
        return $this->id;
    }
    function getUsername(){
        return $this->username;
    }
    function getPassword(){
        return $this->password;
    }
    function getPec(){
        return $this->pec;
    }
    function getName(){
        return $this->name;
    }
    function isEnabled(){
        return $this->enabled;
    }

    function setId(int $id){
        $this->id = $id;
    }
    function setUsername(string $username){
        $this->username = $username;
    }
    function setPassword(string $password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    function setPec(string $pec){
        $this->pec = $pec;
    }
    function setName(string $name){
        $this->name = $name;
    }
}

?>