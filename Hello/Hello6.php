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

trait TSuppliesHelloGTAPHP2 {
	function getHelloMessage() {
		return "Hello GTA-PHP Too!\n";
	}
}

trait TSpeaker {
	function sayIt() {
		echo $this->getHelloMessage();
	}
}

class SaySomething {
	use TSuppliesHello, TSuppliesHelloGTAPHP, TSuppliesHelloGTAPHP2, 
		TSpeaker {
		TSuppliesHelloGTAPHP::getHelloMessage 
			insteadof TSuppliesHelloGTAPHP2;
		TSuppliesHelloGTAPHP::getHelloMessage
			insteadof TSuppliesHello;
		TSpeaker::sayIt as sayHi;
	}
}

$speaker = new SaySomething();
$speaker->sayHi();
