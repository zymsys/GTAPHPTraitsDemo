<?php
trait T {
	public function __construct() {
		echo "Constructor called!\n";
	}
}

class C {
	use T;
}

$c = new C();
