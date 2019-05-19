<?php

require __DIR__ . "/../src/GildedRose.php";
require __DIR__ . "/../src/Item.php";
require __DIR__ . "/../src/AgedBrie.php";
require __DIR__ . "/../src/Sulfuras.php";
require __DIR__ . "/../src/BackstagePasses.php";
require __DIR__ . "/../src/Conjured.php";

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase {
    function testItem() {
        $items = array(
            new Item("item 1", 1, 5),
            new Item("item 2", -1, 7),
            new Item("item 3", 6, 0)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("4", $items[0]->quality);
        $this->assertEquals("5", $items[1]->quality);
        $this->assertEquals("0", $items[2]->quality);
    }

    function testAgedBrie() {
        $items = array(
            new AgedBrie("item 1", 1, 5),
            new AgedBrie("item 2", -1, 7),
            new AgedBrie("item 3", 6, 50)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("6", $items[0]->quality);
        $this->assertEquals("8", $items[1]->quality);
        $this->assertEquals("50", $items[2]->quality);
    }

    function testSulfuras() {
        $items = array(
            new Sulfuras("item 1", -1, 80),
            new Sulfuras("item 2", 1, 56),
            new Sulfuras("item 3", 10, 81)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("80", $items[0]->quality);
        $this->assertEquals("80", $items[1]->quality);
        $this->assertEquals("80", $items[2]->quality);
    }

    function testBackstagePasses() {
        $items = array(
            new BackstagePasses("item 1", 0, 50),
            new BackstagePasses("item 2", 3, 49),
            new BackstagePasses("item 3", 8, 34)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
        $this->assertEquals("50", $items[1]->quality);
        $this->assertEquals("36", $items[2]->quality);
    }

    /**
     * @dataProvider qualityForConjured
     */
    function testConjured($sell_in, $quality, $excepted_quality) {
        $items = array(
            new Conjured("item", $sell_in, $quality)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($excepted_quality, $items[0]->quality);

    }

    public function qualityForConjured()
    {
        return [
            [-1, 20, 16],
            [4, 0, 0],
            [6, 10, 8]
        ];
    }
}