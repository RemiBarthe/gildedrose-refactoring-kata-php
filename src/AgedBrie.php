<?php
/**
 * Created by PhpStorm.
 * User: remba
 * Date: 19/05/2019
 * Time: 13:59
 */

class AgedBrie extends Item
{
    public function updateItemQuality()
    {
        if($this->quality < static::$max_quality){
            $this->quality++;
        }

        $this->sell_in--;
    }
}