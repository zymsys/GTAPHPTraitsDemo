<?php
mysql_connect('localhost','root','');
mysql_select_db('tc');

trait TComment {
	abstract function forWhatName();

	public function addComment($comment) {
		mysql_query("INSERT INTO `comment` 
			(`forwhat`,`forid`,`comment`,`added`) VALUES 
			('" . $this->forWhatName() . "'," . $this->id . ",'" .
			mysql_escape_string($comment) . "',now())");
	}
}

trait TPersonState {
	private function load($id) {
		$ri = mysql_query("SELECT `id`, `name` FROM `person` 
			WHERE `id`=$id");
		list($this->id, $this->name) = mysql_fetch_array($ri);
	}

	private function make() {
		mysql_query("INSERT INTO `person` (`name`) VALUES ('')");
		$this->id = mysql_insert_id();
		$this->name = '';
	}

	public function setName($name) {
		mysql_query("UPDATE `person` SET `name`='".
			mysql_escape_string($name)."' WHERE `id`=".$this->id);
		$this->name = $name;
	}
}

trait TPerson {
	use TComment, TPersonState;

	private $id, $name;

	public function __construct($id = 0) {
		if ($id) {
			$this->load($id);
		} else {
			$this->make();
		}
	}

	public function getName() {
		return $this->name;
	}

	private function forWhatName() {
		return 'person';
	}
}

class Person {
	use TPerson;
}

$p = new Person();
$p->setName('John Casey');
$p->addComment('Also protects Chuck.');
