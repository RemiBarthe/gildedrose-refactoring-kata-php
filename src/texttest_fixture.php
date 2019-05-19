<?php

require 'lib/autoload.php';

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new AgedBrie('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 80),
    new Sulfuras('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 1, 49),
    new Conjured('Conjured Mana Cake', 3, 6)
);

$app = new GildedRose($items);

$days =2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
