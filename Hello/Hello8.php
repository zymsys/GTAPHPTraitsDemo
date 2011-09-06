<?php
trait TSuppliesHello {
	function getHelloMessage() {
		return "Hello World!\n";
	}

	abstract function sayIt();
}

class SaySomething {
	use TSuppliesHello;
	function sayIt() {
		echo $this->getHelloMessage();
	}
}

$speaker = new SaySomething();
$speaker->sayIt();
