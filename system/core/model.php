<?php 

class model
{
	protected $db;

	public function __construct()
	{
		$this->db = new mysqli('localhost', 'root', '', 'classhub');
	}

	public function close()
	{
		$this->db->close();
	}
}

?>