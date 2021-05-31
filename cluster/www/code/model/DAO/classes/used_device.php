<?php
class Used_device{
    private int $id;
    private float $freq;
    private int $reservation;
    private int $model;

    function __construct(int $id, float $freq, int $reservation,int $model){
        $this->id = $id;
        $this->freq = $freq;
        $this->reservation = $reservation;
        $this->model = $model;
    }

    function getId(){
        return $this->id;
    }
    function getFreq(){
        return $this->freq;
    }
    function getReservation(){
        return $this->reservation;
    }
    function getModel(){
        return $this->model;
    }

    function setId($id){
        $this->id = $id;
    }
    function setReservation($reservation){
        $this->reservation = $reservation;
    }
    function setModel($model){
        $this->model = $model;
    }
}
?>