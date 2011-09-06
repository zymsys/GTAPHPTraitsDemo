<?php
trait THasState {
	static public $traitstatic;
	static function showStateT() {
		echo "Trait Static: ".THasState::$traitstatic."\n";
	}
}

class CUsesState {
	use THasState;
	function showStateC() {
		echo "Trait Static: ".THasState::$traitstatic."\n";
	}
}

THasState::$traitstatic = "TS";
CUsesState::$traitstatic = "CS";
THasState::showStateT();
echo THasState::$traitstatic.CUsesState::$traitstatic;
