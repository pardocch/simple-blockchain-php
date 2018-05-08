<?php 
require_once("./block.php");
class BlockChain
{
	public function __construct()
	{
		$this->chain = [$this->createGenesisBlock()];
		$this->difficulty = 4;
	}

	public function createGenesisBlock()
	{
		return new Block(0, strtotime("01/01/2017"), "Genesis Block");
	}

	public function getLatestBlock()
	{
		return $this->chain[count($this->chain)-1];
	}

	public function addBlock($newBlock)
	{
		$newBlock->previousHash = $this->getLatestBlock()->hash;
		$newBlock->mineBlock($this->difficulty);
		array_push($this->chain, $newBlock);
	}

	public function isChainValid()
	{
		for ($i = 1; $i < count($this->chain); $i++)  {
			$currentBlock = $this->chain[$i];
			$previousHash = $this->chain[$i-1];

			if ($currentBlock->hash !== $currentBlock->calculateHash()) {
				return false;
			}

			if ($currentBlock->previousHash !== $previousHash->hash) {
				return false;
			}
		}

		return true;
	}
}
