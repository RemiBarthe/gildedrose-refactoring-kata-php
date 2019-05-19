<?php
/**
 * Created by PhpStorm.
 * User: remba
 * Date: 19/05/2019
 * Time: 14:23
 */

class Conjured extends Item
{
    public function updateItemQuality(){
        if($this->quality > static::$min_quality){
            $this->quality -= 2;
        }

        if($this->quality > static::$min_quality && $this->sell_in < 0){
            $this->quality -= 2;
        }

        $this->sell_in--;
    }
}