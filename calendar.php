<? php

class Calendar extends Controller{
	function display(){



		$this ->load->library('calendar');

		echo $this->calendar->generate();
	}
}