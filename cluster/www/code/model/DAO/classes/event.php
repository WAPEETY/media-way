<?php

class Event{
    private int $id;
    private string $name;
    private int $latitude;
    private int $longitude;
    private string $start_day;
    private string $end_day;
    private string $description;
    private string $opens_at;

    function __construct(int $id, string $name,int $latitude, int $longitude, string $start_day, string $end_day, string $description, string $opens_at){
        $this->id = $id;
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->start_day = $start_day;
        $this->end_day = $end_day;
        $this->description = $description;
        $this->opens_at = $opens_at;
    }

    function getId():int{
        return $this->id;
    }
    function getName():string{
        return $this->name;
    }
    function getLatitude():int{
        return $this->lat;
    }
    function getLongitude():int{
        return $this->long;
    }
    function getCoordinates():array{
        return $coordinates = array("latitude"=>$this->lat,"longitude"=>$this->long)
    }
    function getStartDay():string{
        return $start_day = $this->start_day;
    }
    function getEndDay():string{
        return $end_day = $this->end_day;
    }
    function getDescription():string{
        return $description = this->description;
    }
    function getOpensAt():string{
        return $opens_at = $this->opens_at;
    }

    function setId(int $id){
        $this->id = $id;
    }

    function setName(string $name){
        $this->name = $name;
    }

    function setLatitude(int $latitude){
        $this->latitude = $latitude;
    }
    function setLongitude(int $longitude){
        $this->longitude = $longitude;
    }
    function setStartDay(string $start_day){
        $this->start_day = $start_day;
    }
    function setEndDay(string $end_day){
        $this->end_day = $end_day;
    }
    function setDescription(string $description){
        $this->description = $description;
    }
    function setOpensAt(string $opens_at){
        $this->opensAt = $opens_at;
    }
}
?>