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
	use TSuppliesHello, TSpeaker {
		getHelloMessage as private speak;
//		sayIt as speak;
	}
}

$speaker = new SaySomething();
$speaker->speak();
$speaker->sayIt();
