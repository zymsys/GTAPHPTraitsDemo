<?php

trait bobo {
	public $myvar;

	function sayvar() {
		echo $this->myvar;
	}
}

class b1 {
	use bobo;
}

$b = new b1();
$b->myvar = "tea";
$b->sayvar();
?>
