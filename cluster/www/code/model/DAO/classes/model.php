<?php
    class Model{
        private int $id;
        private string $name;
        private string $brand;
        private int $minHZ;
        private int $maxHZ;

        function __construct(int $id, string $name, string $minHZ, string $maxHZ, $brand){
            $this->id = $id;
            $this->name = $name;
            $this->minHZ = $minHZ;
            $this->maxHZ = $maxHZ;
            $this->brand = $brand;
        }

        function getId():int{
            return $this->id;
        }
        function getName():string{
            return $this->name;
        }
        function getBrand():string{
            return $this->brand;
        }
        function getMinHZ():string{
            return $this->minHZ;
        }
        function getMaxHZ():string{
            return $this->maxHZ;
        }

        function setId(int $id){
            $this->id = $id;
        }
        function setName(string $name){
            $this->name = $name;
        }
        function setBrand(string $brand){
            $this->brand = $brand;
        }
        function setRangeFreq(int $minHZ, int $maxHZ){
            $this->minHZ;
            $this->maxHZ;
        }
    }
?>