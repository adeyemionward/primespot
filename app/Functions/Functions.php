<?php

namespace App\Functions;

use DateTime;
use DateInterval;

use App\User;

class Functions
{

    static function initials($str)
    {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
    static function amountInWords($number, $currency = "naira")
    {
        $converter = new ConvertAmountToWord();
        return $converter->Convert($number);
    }

    static function formatCurrency($number, $showSymbol = "yes")
    {
        $number = str_replace(',','',$number);
        if(!is_numeric($number)) return "";
        if(strtolower(trim($showSymbol)) == "yes") return Functions::getCurrencySymbol()."".number_format($number,2);
        return $showSymbol.number_format($number,2);
    }

    static function getCurrencySymbol()
    {
        return "N";
    }

   

    static function convertNumberToWord($num = false)
    {
        $num = str_replace(array(',', ' '), '' , trim($num));
        if(! $num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
    }
}


Class ConvertAmountToWord
{
	var $words = array();
	var $places = array();
	var $amount_in_words;
	var $decimal;
	var $decimal_len;

	function Convert($amount, $currency="Naira", $currency2 = "Kobo")
        {
            if($amount == 0) return "Zero $currency";
            $minus = "";
            if($amount < 0) {
                $amount = abs($amount);
                $minus = "Minus ";
            }

		$this->assign();
		$temp = $amount;
		$pos = strpos($temp,".");

		if ($pos) {
                    $temp = substr($temp,0,$pos);
                    $this->decimal = strstr((string)$amount,".");
                    $this->decimal_len = strlen($this->decimal) - 2;
                    $this->decimal = substr($this->decimal,1,$this->decimal_len+1);
		}

		$len = strlen($temp)-1;
		$ctr = 0;
		$arr = array();

		while ($len >= 0) {
            if ($len >= 2) {
                    $arr[$ctr++] = substr($temp, $len-2, 3);
                    $len -= 3;
            } else {
                    $arr[$ctr++] = substr($temp,0,$len+1);
                    $len = -1;
            }
		}



		$str = "";
		for ($i=count($arr)-1; $i>=0; $i--) {
			$figure = $arr[$i];
			$sub = array(); $temp="";
			for ($y=0; $y<strlen(trim($figure)); $y++) {
				$sub[$y] = substr($figure,$y,1);
			}

			$len = count($sub);
			if ($len==3) {
                if ($sub[0]!="0") {
                        $temp .= ((strlen($str)>0)?" ":"") . trim($this->words[$sub[0]]) . " Hundred and";
                }
                $temp .= $this->processTen($sub[1], $sub[2]);
			} elseif ($len==2) {
				$temp .= $this->processTen($sub[0], $sub[1]);
			} else {
				$temp .= $this->words[$sub[0]];
			}

			if (strlen($temp)>0) {
				$str .= $temp . $this->places[$i];
			}
		}

		$str .= " " . $currency;
		if ($this->decimal_len>0 && intval($this->decimal) > 0) {
			$str .= " " . $this->decimal . " ". $currency2;
		}

		$this->amount_in_words = $minus.$str;

		return $this->amount_in_words;
	}



	function processTen($sub1, $sub2)
        {
		if ($sub1=="0") {

			if ($sub2=="0") {

				return "";

			} else {

				return $this->words[$sub2];

			}

		} elseif ($sub1!="1") {

			if ($sub2!="0") {

				return $this->words[$sub1."0"] . $this->words[$sub2];

			} else {

				return $this->words[$sub1 . $sub2];

			}

		} else {

			if ($sub2=="0") {

				return $this->words["10"];

			} else {

				return $this->words[$sub1 . $sub2];

			}

		}

	}



	function assign() {

		$this->words["1"] = " One"; 			$this->words["2"] = " Two";

		$this->words["3"] = " Three"; 		$this->words["4"] = " Four";

		$this->words["5"] = " Five"; 			$this->words["6"] = " Six";

		$this->words["7"] = " Seven";			$this->words["8"] = " Eight";

		$this->words["9"] = " Nine";



		$this->words["10"] = " Ten";			$this->words["11"] = " Eleven";

		$this->words["12"] = " Twelve";		$this->words["13"] = " Thirten";

		$this->words["14"] = " Fourten";		$this->words["15"] = " Fiften";

		$this->words["16"] = " Sixten";		$this->words["17"] = " Seventen";

		$this->words["18"] = " Eighten";		$this->words["19"] = " Nineten";



		$this->words["20"] = " Twenty";		$this->words["30"] = " Thirty";

		$this->words["40"] = " Forty";		$this->words["50"] = " Fifty";

		$this->words["60"] = " Sixty";		$this->words["70"] = " Seventy";

		$this->words["80"] = " Eighty";		$this->words["90"] = " Ninety";



		$this->places[0] = "";					$this->places[1] = " Thousand";

		$this->places[2] = " Million";		$this->places[3] = " Billion";

		$this->places[4] = " Trillion";

	}

}
