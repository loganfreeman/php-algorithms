<?php
namespace Algorithm;

function getKeywords() {
    return array("one", "two", "three", "four");
}


class AhoCorasickTest extends \PHPUnit_Framework_TestCase
{

	public function testAhoCorasick(){
		$ac = new AhoCorasick();
		$ac->setCombineResults(false);
		$keywords = getKeywords();
		// $tree = $ac->buildTree($keywords);
	}
}