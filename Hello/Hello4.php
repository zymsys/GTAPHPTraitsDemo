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

trait THelloSpeaker {
	use TSuppliesHello, TSpeaker;
}

class SaySomething {
	use THelloSpeaker;
}

$speaker = new SaySomething();
$speaker->sayIt();
echo "I said ".$speaker->getHelloMessage();
