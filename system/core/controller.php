<?php 

class controller
{
	private $view;

	public function __construct()
	{
		echo __CLASS__ . ' instanciada';
	}

	protected function render($controller_name = '', $params = array())
	{
		$this->view = new view($controller_name, $params);
	}
}

?>