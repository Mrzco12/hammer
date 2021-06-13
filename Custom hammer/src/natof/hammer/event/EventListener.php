<?php

namespace natof\hammer\event;

use natof\hammer\hammer;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;

class EventListener implements Listener{

    public $face;


    public function onBreak(BlockBreakEvent $event){
        $config = new Config(hammer::getInstance()->getDataFolder() . "config.yml", 2);
        $item = $event->getItem();
        $pickaxe = Item::get(Item::DIAMOND_PICKAXE);
        if(!$event->isCancelled()) {
            foreach ($config->get("add") as $name => $id) {
                $id = explode(":", $id);
                if ($item->getId() == $id[0]) {
                    if($item->getId() == $pickaxe->getId()){
                        $pickaxe = Item::get(Item::GOLDEN_PICKAXE);
                    }
                    $block = $event->getBlock();
                    $player = $event->getPlayer();
                    if ($this->face == 0 || $this->face == 1){
                        $x = $block->getX();
                        $y = $block->getY();
                        $z = $block->getZ();
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z + 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y, $z - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y, $z + 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y, $z - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y, $z + 1), $pickaxe, $player, true);
                    }
                    else if($this->face == 3 || $this->face ==  2){
                        $x = $block->getX();
                        $y = $block->getY();
                        $z = $block->getZ();
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y - 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y - 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y - 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x + 1, $y + 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x - 1, $y + 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y + 1, $z), $pickaxe, $player, true);

                    }
                    else if($this->face == 4 || $this->face == 5){
                        $x = $block->getX();
                        $y = $block->getY();
                        $z = $block->getZ();

                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z + 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y - 1, $z + 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y - 1, $z  - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y - 1, $z), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y + 1, $z  + 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y + 1, $z  - 1), $pickaxe, $player, true);
                        $block->getLevel()->useBreakOn(new Vector3($x, $y + 1, $z), $pickaxe, $player, true);
                    }
                }
            }
        }
    }

    public function detectFaceBlock(PlayerInteractEvent $event){
        $this->face = $event->getFace();
    }
}
