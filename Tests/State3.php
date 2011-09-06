<?php
trait TInstanceState {
	private $ivar;

	function setivar($val) {
		$this->ivar = $val;
	}

	function getivar() {
		return $this->ivar;
	}
}

class C {
	use TInstanceState;
}
class D {
	use TInstanceState;
}

$a = new C();
$b = new D();

$a->setivar("a");
$b->setivar("b");

echo $a->getivar().$b->getivar()."\n";
