<?php
namespace Algorithm;


class NeedlemanWuschTest extends \PHPUnit_Framework_TestCase {

	public function testNeedlemanWusch(){
		$nw = new NeedlemanWunsch(1, 0, -1);
		$seq1 = 'ACAGTCGAACG';
		$seq2 = 'ACCGTCCG';
		// Print to screen
		$nw->renderAsASCII($seq1, $seq2);
	}
}