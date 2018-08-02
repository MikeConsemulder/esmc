<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 05-Dec-16
 * Time: 15:10
 */

class Event {
	public $eventName = 'Evenement naam';
	public $eventText = 'Evenement text';

	function getSubscribers() {
		print 'print all the subscribers';
	}
}

$event = new Event;
?>