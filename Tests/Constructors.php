<?php
trait Tmagic {
    public function __construct() {
        echo "Magic Function Constructor Called.\n";
    }

    public function __destruct() {
        echo "Magic Function Destructor Called.\n";
    }
}

trait Tname {
    public function Tname() {
        echo "Trait Name Constructor Called.\n";
    }
    public function Cname() {
        echo "Class Name Constructor Called.\n";
    }
}

class Cmagic {
    use Tmagic;
}

class Cname {
    use Tname;
}

$cm = new Cmagic();
$cn = new Cname();
