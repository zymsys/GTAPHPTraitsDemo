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

class Person {
	use TComment;

	private $id, $name;

	public function __construct($id = 0) {
		if ($id) {
			$ri = mysql_query("SELECT `id`, `name` FROM `person` 
				WHERE `id`=$id");
			list($this->id, $this->name) = mysql_fetch_array($ri);
		} else {
			mysql_query("INSERT INTO `person` (`name`) VALUES ('')");
			$this->id = mysql_insert_id();
			$this->name = '';
		}
	}

	public function setName($name) {
		mysql_query("UPDATE `person` SET `name`='".
			mysql_escape_string($name)."' WHERE `id`=".$this->id);
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	private function forWhatName() {
		return 'person';
	}
}

$p = new Person();
$p->setName('Sarah Walker');
$p->addComment('Protects Chuck.');
