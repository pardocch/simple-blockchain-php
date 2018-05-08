<?php 
require_once(__DIR__.'/blockchain.php');

$simpleCoin = new BlockChain();

echo "Mining block 1...\n";
$simpleCoin->addBlock(new Block(1, strtotime("now"), "amount: 4"));
echo "Mining block 2...\n";
$simpleCoin->addBlock(new Block(2, strtotime("now"), "amount: 8"));

echo json_encode($simpleCoin, JSON_PRETTY_PRINT);