<?php

namespace natof\hammer;

use natof\hammer\event\EventListener;
use pocketmine\plugin\PluginBase;

class hammer extends PluginBase{

    private static $instance;

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->saveResource("config.yml");
    }


    public function onLoad(){
        self::$instance = $this;
    }

    public static function getInstance(): hammer{
        return self::$instance;
    }
}
