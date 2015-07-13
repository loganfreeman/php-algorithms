<?php
namespace Algorithm;


class HttpRequestTest extends \PHPUnit_Framework_TestCase
{

	public function testRequest(){
		// Next, make sure Requests can load internal classes
		\Requests::register_autoloader();
		// Now let's make a request!
		$request = \Requests::get('http://httpbin.org/get', array('Accept' => 'application/json'));
		// Check what we received
		var_dump($request);
	}
}

?>