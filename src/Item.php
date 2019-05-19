<?php
/**
 * Created by PhpStorm.
 * User: remba
 * Date: 18/05/2019
 * Time: 16:15
 */

class Item {

    public $name;
    public $sell_in;
    public $quality;
    protected static $max_quality = 50;
    protected static $min_quality = 0;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function updateItemQuality(){
        if($this->quality > static::$min_quality){
            $this->quality--;
        }

        if($this->quality > static::$min_quality && $this->sell_in < 0){
            $this->quality --;
        }

        $this->sell_in--;
    }
}