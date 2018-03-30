<?php
namespace ObjectifyEverything;
class AdderCarrySum {
	public $carry=0;
	public $sum=0;
	public function __construct(bool $carry,bool $sum) {
		$this->carry = $carry;
		$this->sum = $sum;
	}
}
