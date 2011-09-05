<?php
mysql_connect('localhost','root','');
mysql_select_db('tc');

class CommentHelper {
	private $forwhat;
	public function __construct($forwhat) {
		$this->forwhat = $forwhat;
	}
	public function addComment($forid,$comment) {
		mysql_query("INSERT INTO `comment` 
			(`forwhat`,`forid`,`comment`,`added`) VALUES 
			('$this->forwhat',$forid,'".
			mysql_escape_string($comment)."',now())");
	}
}

class Person {
	private $commenthelper, $id, $name;

	public function __construct($id = 0) {
		$this->commenthelper = new CommentHelper('person');
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

	public function addComment($comment) {
		$this->commenthelper->addComment($this->id,$comment);
	}
}

$p = new Person();
$p->setName('Chuck Bartowski');
$p->addComment('Has the Intersect in his head.');
