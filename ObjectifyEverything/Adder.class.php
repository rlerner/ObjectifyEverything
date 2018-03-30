<?php
namespace ObjectifyEverything;
// Depends on OE/BooleanLogic, OE/AdderCarrySum,

class Adder {
	public $rcCarry = false;
	public $rcSum = false;

	private $bl = false;
	public function __construct() {
		$this->bl = new BooleanLogic;
	}

	public function half(bool $var1,bool $var2):AdderCarrySum {
		if ($this->bl->and($var1,$var2)) {
			return new AdderCarrySum(1,0);
		} else {
			return new AdderCarrySum(0,$this->bl->xor($var1,$var2));
		}
	}

	public function full(bool $var1, bool $var2, bool $var3):AdderCarrySum {
		$half1 = $this->half($var1,$var2);
		$half2 = $this->half($half1->sum,$var3);
		return new AdderCarrySum($this->bl->or($half1->carry,$half2->carry),$half2->sum);
	}

	private function collateBool($val) {
		if ($val==false) {
			return 0;
		} elseif ($val==true) {
			return 1;
		} else {
			return $val;
		}
	}

	public function rippleCarry($var1,$var2,$bits=8) {

		$var1 = str_pad(decbin($var1),$bits,"0",STR_PAD_LEFT);
		$var2 = str_pad(decbin($var2),$bits,"0",STR_PAD_LEFT);

		$s[1] = $this->half(substr($var1,-1,1),substr($var2,-1,1));

		for ($i=2;$i<=$bits;$i++) {
			$s[$i] = $this->full($s[$i-1]->carry,substr($var1,-$i,1),substr($var2,-$i,1));
		}

		for ($i=$bits;$i>0;$i--) {
			$out .= $this->collateBool($s[$i]->sum);
		}

		$this->rcSum = bindec($out);
		$this->rcCarry = $s[$bits]->carry;
	}
}
