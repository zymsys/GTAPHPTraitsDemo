<?php
trait TSuppliesHello {
	function getHelloMessage() {
		return "Hello World!\n";
	}
}

trait TSpeaker {
	function sayIt() {
		echo $this->getHelloMessage();
	}
}

class SaySomething {
	use TSuppliesHello, TSpeaker;
	function getHelloMessage() {
		return "Hello GTA-PHP!\n";
	}
}

$speaker = new SaySomething();
$speaker->sayIt();
