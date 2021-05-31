<?php
    class Reservation{
        private int $id;
        private int $agency;
        private int $event;

        function __construct(int $id, int $agency, int $event){
            $this->id = $id;
            $this->agency = $agency;
            $this->event = $event;
        }

        function getId():int{
            return $this->id;
        }
        function getAgency():int{
            return $this->agency;
        }
        function getEvent():int{
            return $this->event;
        }

        function setId(int $id){
            $this->id = $id;
        }
        function setAgency(int $agency){
            $this->agency = $agency;
        }
        function setEvent(int $event){
            $this->event = $event;
        }
    }
?>