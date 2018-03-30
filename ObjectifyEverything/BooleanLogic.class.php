<?php
namespace ObjectifyEverything;
class BooleanLogic {
	public function and(bool $val1,bool $val2): bool {
		return ($val1 && $val2);
	}
	public function or(bool $val1,bool $val2): bool {
		return ($val1 || $val2);
	}
	public function not(bool $val): bool {
		return !$val;
	}
	public function xor(bool $val1,bool $val2): bool {
		return ($val1 xor $val2); //TODO - native xor, or use the methods here?
	}
	public function nand(bool $val1,bool $val2): bool {
		return $this->not($this->and($val1,$val2));
	}
}
