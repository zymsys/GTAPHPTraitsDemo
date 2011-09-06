<?php
trait TInstanceState {
	public $ivar;
}

class C {
	use TInstanceState;
}

$a = new C();
$b = new C();

$a->ivar = "a";
$b->ivar = "b";

echo $a->ivar.$b->ivar."\n";
