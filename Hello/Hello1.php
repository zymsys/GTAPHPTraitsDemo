<?php
class SaySomething {
	function getHelloMessage() {
		return "Hello World!\n";
	}

	function sayIt() {
		echo $this->getHelloMessage();
	}
}

$speaker = new SaySomething();
$speaker->sayIt();
echo "I said ".$speaker->getHelloMessage();