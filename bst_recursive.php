<?php
	class Node{
		public $left;
		public $right;
		public $value;
		function __construct($value){
			$this->value = $value;
			$this->right = null;
			$this->left = null;
		}
	}

	class BinaryTree
	{
		public $head;
		function __construct($value){
			$this->head = new Node($value);
		}
		function insertRecursive($node, $value){
			if($node == null)
				return new Node($value);
			if($value < $node->value)
				$node->left = $this->insertRecursive($node->left, $value);
			else if($value > $node->value)
				$node->right = $this->insertRecursive($node->right, $value);
			return $node;
		}
		static function inOrderTraversal($node){
			if($node != null){
				BinaryTree::inOrderTraversal($node->left);
				echo $node->value."<br>";
				BinaryTree::inOrderTraversal($node->right);
			}
		}
	}

	function microtime_float(){
    	list($usec, $sec) = explode(" ", microtime());
    	return ((float)$usec + (float)$sec);
	}

	$time_start = microtime_float();

	$bst = new BinaryTree(1);
	for($i=0; $i<10000; $i++){
		$bst->insertRecursive($bst->head,rand(0,999999));
	}

	$time_end = microtime_float();
	$duration = $time_end - $time_start;
	
	BinaryTree::inOrderTraversal($bst->head);
	echo $duration;

?>