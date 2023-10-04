<?php

    class Vehiculo
    {
        private $serial;
        private $numero_vehiculo;
        private $color;
        private $ID_tipo;
        private $ID_fabricante;

        public function __construct($serial, $numero_vehiculo, $color, $ID_tipo, $ID_fabricante)
        {
            $this->serial = $serial;
            $this->numero_vehiculo = $numero_vehiculo;
            $this->color = $color;
            $this->ID_tipo = $ID_tipo;
            $this->ID_fabricante = $ID_fabricante;
        }

        public function getSerial()
        {
            return $this->serial;
        }

        public function setSerial($serial)
        {
            $this->serial = $serial;
        }

        public function getNumeroVehiculo()
        {
            return $this->numero_vehiculo;
        }

        public function setNumeroVehiculo($numero_vehiculo)
        {
            $this->numero_vehiculo = $numero_vehiculo;
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setColor($color)
        {
            $this->color = $color;
        }

        public function getIDTipo()
        {
            return $this->ID_tipo;
        }

        public function setIDTipo($ID_tipo)
        {
            $this->ID_tipo = $ID_tipo;
        }

        public function getIDFabricante()
        {
            return $this->ID_fabricante;
        }

        public function setIDFabricante($ID_fabricante)
        {
            $this->ID_fabricante = $ID_fabricante;
        }
    }


?>