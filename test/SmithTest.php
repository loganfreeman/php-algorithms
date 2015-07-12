<?php
namespace Algorithm;


class SmithTest extends \PHPUnit_Framework_TestCase
{

	public function testSmith(){
		$smith = new Smith( 'GCATCGCAGAGAGTATACAGTACG', 'GCAGAGAG' );
		$smith->Search();
	}
}

?>