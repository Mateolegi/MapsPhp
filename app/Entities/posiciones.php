<?php

/**
* This class represent the entity of Posiciones
*/
class Posiciones{
	private $lat;
	private $lng;


    public function getLat(){
        return $this->lat;
    }

    public function setLat($lat){
        $this->lat = $lat;
    }

    public function getLng(){
        return $this->lng;
    }

    public function setLng($lng){
        $this->lng = $lng;
    }
}

