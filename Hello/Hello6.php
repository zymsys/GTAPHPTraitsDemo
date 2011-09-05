<?php
trait TSuppliesHello {
	function getHelloMessage() {
		return "Hello World!\n";
	}
}

trait TSuppliesHelloGTAPHP {
	function getHelloMessage() {
		return "Hello GTA-PHP!\n";
	}
}

trait TSpeaker {
	function sayIt() {
		echo $this->getHelloMessage();
	}
}

class SaySomething {
	use TSuppliesHello, TSuppliesHelloGTAPHP, TSpeaker {
		TSuppliesHelloGTAPHP::getHelloMessage insteadof TSuppliesHello;
	}
}

$speaker = new SaySomething();
$speaker->sayIt();
echo "I said ".$speaker->getHelloMessage();
