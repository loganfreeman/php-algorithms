<?php 
namespace Algorithm;
/*php implementation of the smith search algorithm
* author: Rickey Otano
* version: 2.0
* license: mit
* notes: This version is an oop rewrite port of the C source
*/
class Smith
{
	// bad suffix tables
	private $bmBadChars; // boyer-moore suffix table
	private $qsBadChars; // quick search suffix table
	// pattern & text properties
	private $pattern; // holds the search pattern
	private $patLen; // length of the pattern
	private $text; // search text
	private $txtLen; // length of the text
	
	public function __construct( $text, $pattern )
	{
		// set pattern and pattern length
		$this->pattern = $pattern;
		$this->patLen = strlen( $this->pattern );
		// set text and text length
		$this->text = $text;
		$this->txtLen = strlen( $this->text );
		// populate the suffix tables with 256 indexs set to -1
		$this->bmBadChars = array_fill( 0, 256, $this->patLen );
		$this->qsBadChars = array_fill( 0, 256, $this->patLen + 1 );
		// generate the bad character suffixs used for the shifts
		$this->GenerateBadSuffixs();
	}
	// perform the search and show the start index of the match
	public function Search()
	{
		$j = 0;
		$tmpLen = $this->patLen;
		$start = "";
		$pat = "";
		$end = "";
		
		while( $j <= $this->txtLen - $this->patLen )
		{
			if( $this->arrayCmp( $this->pattern, 0, $this->text, $j, $this->patLen ) == 0 )
			{
				$start = substr( $this->text, 0, $j );
				$pat = substr( $this->text, $j, $tmpLen );
				$end = substr( $this->text, $tmpLen + $j , $this->txtLen );
				echo $start . '<span style="background-color: yellow; font-weight: bold">' . $pat . '</span>' . $end;
			}
			
			$j += max( $this->bmBadChars[ ord( $this->text[ $j + $this->patLen - 1 ] ) ], $this->qsBadChars[ ord( $this->text[ $j + $this->patLen ] ) ] );
		}
	}
	// add bad suffix shift positions to bad suffix tables
	private function GenerateBadSuffixs()
	{
		for ( $i = 0; $i < $this->patLen - 1; ++$i )
    	{
   			$this->bmBadChars[ ord( $this->pattern[$i] ) ] = $this->patLen - $i - 1;
   		}
   		
   		for ( $i = 0; $i < $this->patLen; ++$i )
   		{
   			$this->qsBadChars[ ord( $this->pattern[$i] ) ] = $this->patLen - $i;
   		}
	}
	// php memcmp implementation
	private function memcmp( $str1, $str2, $amt, $addstr2 = 0, $addstr1 = 0 )
	{
		$rtn = -1;
	
		for( $i = 0; $i < $amt; $i++ )
		{
			if( ord( $str1[ $i ] ) + $addstr1 == ord( $str2[ $i ] ) + $addstr2 )
			{
				$rtn = -1;
			}
			else
			{
				$rtn = 0;
				break;
			}
		}
		return $rtn;
	}
	// compare array values, java port to php
	private function arrayCmp( $a, $aIdx, $b, $bIdx, $length ) 
	{
		for ( $i = 0; $i < $length && $aIdx + $i < $this->patLen && $bIdx + $i < $this->txtLen; $i++ )
		{
			if ( $a[$aIdx + $i] == $b[$bIdx + $i] )
			{
	
			}
			else if ( $a[$aIdx + $i] > $b[$bIdx + $i] )
			{
				return 1;
			}
			else
			{
				return 2;
			}
		}
		if ( $i < $length )
		{
			if ( $this->patLen - $aIdx == $this->txtLen - $bIdx )
			{
				return 0;
			}	
			else if ( $this->patLen - $aIdx > $this->txtLen - $bIdx )
			{
				return 1;
			}	
			else
			{
				return 2;
			}	
		}
		else
		{
			return 0;
		}	
	}
}
?>