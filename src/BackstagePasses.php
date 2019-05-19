<?php
/**
 * Created by PhpStorm.
 * User: remba
 * Date: 19/05/2019
 * Time: 14:29
 */

class BackstagePasses extends Item
{
    public function updateItemQuality()
    {
        if($this->quality < static::$max_quality){
            $this->quality++;
        }

        if($this->sell_in <= 10 && $this->quality < static::$max_quality){
            $this->quality++;
        }

        if($this->sell_in <= 5 && $this->quality < static::$max_quality){
            $this->quality++;
        }

        if($this->sell_in < 1){
            $this->quality = 0;
        }

        $this->sell_in--;
    }
}