<?php
    class Model{
        private int $id;
        private string $name;
        private int $minHZ;
        private int $maxHZ;

        function __construct(int $id, string $name){
            $this->id = $id;
            $this->name = $name;
        }

        function getId():int{
            return $this->id;
        }
        function getName():string{
            return $this->name;
        }

        function setId(int $id){
            $this->id = $id;
        }
        function setName(string $name){
            $this->name = $name;
        }
    }
?>