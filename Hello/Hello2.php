<?php
trait TSuppliesHello {
	function getHelloMessage() {
		return "Hello World!\n";
	}
}

class SaySomething {
	use TSuppliesHello;
	function sayIt() {
		echo $this->getHelloMessage();
	}
}

$speaker = new SaySomething();
$speaker->sayIt();
echo $speaker->getHelloMessage()."\n";
