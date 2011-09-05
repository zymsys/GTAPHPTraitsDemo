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
}

$speaker = new SaySomething();
$speaker->sayIt();
echo "I said ".$speaker->getHelloMessage();