<?php

namespace RedCraftPE;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;

class SignEdit extends PluginBase implements Listener {

  public $prefix = TextFormat::YELLOW . "Cube" . TextFormat::BLUE . "X " . TextFormat::GOLD . "> ";
  
  public function onLoad() : void {
  
    $this->getLogger()->info(TextFormat::RED . "SignEdit has loaded!");
  
  }
  
  public function onEnable() : void {
  
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::RED . "SignEdit has been enabled!");   
  
  }
  
  public function onDisable() : void {
  
    $this->getLogger()->info(TextFormat::RED . "SignEdit has been disabled!");
  
  }
  
  public function onClick(PlayerInteractEvent $event) {
  
    $player = $event->getPlayer();
    $block = $event->getBlock();
    $blockID= $event->getBlock()->getID();
    
    if($blockID==63 or $blockID==68 or $blockID==323){
      $tile = $event->getBlock()->getLevel()->getTile(new Vector3($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ()));
      if($tile instanceof Sign){
        $text = $tile->getText();
        $event->getPlayer()->sendMessage("The first line of the sign is ".$text[0]);
      }
    }
  }
}
