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

	class BinaryTree{
		public $head;
		function __construct($value){
			$this->head = new Node($value);
		}
		function insertIterative($value){
			$node = new Node($value);
			if($this->head == null){
				$this->head = $node;
			} else{
				$placed = false;
				$next = $this->head;
				while(!$placed){
					if($node->value == $next->value)
						$placed = true;
					if($node->value < $next->value){
						if($next->left){
							$next = $next->left;
						} else{
							$next->left = $node;
							$placed = true;
						}
					}
					if($node->value > $next->value){
						if($next->right){
							$next = $next->right;
						} else{
							$next->right = $node;
							$placed = true;
						}
					}
				}
			}
			return $this;
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
		$bst->insertIterative(rand(0,999999));
	}

	$time_end = microtime_float();
	$duration = $time_end - $time_start;
	
	BinaryTree::inOrderTraversal($bst->head);
	echo $duration;
?>