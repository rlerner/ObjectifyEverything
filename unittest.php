<?php
require_once "autoload.php";

$bl = new ObjectifyEverything\BooleanLogic;

// Testing BooleanLogic AND

$banner = "ObjectifyEverything\BooleanLogic ";
if ($bl->and(true,true)) {
	$out[] = $banner."AND 1,1 Pass";
} else {
	$out[] = $banner."AND 1,1 Fail";
}
if (!$bl->and(true,false)) {
	$out[] = $banner."AND 1,0 Pass";
} else {
	$out[] = $banner."AND 1,0 Fail";
}
if (!$bl->and(false,true)) {
	$out[] = $banner."AND 0,1 Pass";
} else {
	$out[] = $banner."AND 0,1 Fail";
}
if (!$bl->and(false,false)) {
	$out[] = $banner."AND 0,0 Pass";
} else {
	$out[] = $banner."AND 0,0 Fail";
}

// Testing BooleanLogic OR
if ($bl->or(true,true)) {
	$out[] = $banner."OR 1,1 Pass";
} else {
	$out[] = $banner."OR 1,1 Fail";
}
if ($bl->or(true,false)) {
	$out[] = $banner."OR 1,0 Pass";
} else {
	$out[] = $banner."OR 1,0 Fail";
}
if ($bl->or(false,true)) {
	$out[] = $banner."OR 0,1 Pass";
} else {
	$out[] = $banner."OR 0,1 Fail";
}
if (!$bl->or(false,false)) {
	$out[] = $banner."OR 0,0 Pass";
} else {
	$out[] = $banner."OR 0,0 Fail";
}

// Testing BooleanLogic NOT
if ($bl->not(false)) {
	$out[] = $banner."NOT 0 Pass";
} else {
	$out[] = $banner."NOT 0 Fail";
}
if (!$bl->not(true)) {
	$out[] = $banner."NOT 1 Pass";
} else {
	$out[] = $banner."NOT 1 Fail";
}

// Testing BooleanLogic XOR
if (!$bl->xor(true,true)) {
	$out[] = $banner."XOR 1,1 Pass";
} else {
	$out[] = $banner."XOR 1,1 Fail";
}
if ($bl->xor(true,false)) {
	$out[] = $banner."XOR 1,0 Pass";
} else {
	$out[] = $banner."XOR 1,0 Fail";
}
if ($bl->xor(false,true)) {
	$out[] = $banner."XOR 0,1 Pass";
} else {
	$out[] = $banner."XOR 0,1 Fail";
}
if (!$bl->xor(false,false)) {
	$out[] = $banner."XOR 0,0 Pass";
} else {
	$out[] = $banner."XOR 0,0 Fail";
}

// Testing BooleanLogic NAND
if (!$bl->nand(true,true)) {
	$out[] = $banner."NAND 1,1 Pass";
} else {
	$out[] = $banner."NAND 1,1 Fail";
}
if ($bl->nand(true,false)) {
	$out[] = $banner."NAND 1,0 Pass";
} else {
	$out[] = $banner."NAND 1,0 Fail";
}
if ($bl->nand(false,true)) {
	$out[] = $banner."NAND 0,1 Pass";
} else {
	$out[] = $banner."NAND 0,1 Fail";
}
if ($bl->nand(false,false)) {
	$out[] = $banner."NAND 0,0 Pass";
} else {
	$out[] = $banner."NAND 0,0 Fail";
}


echo "<h1>ObjectifyEverying / BooleanLogic Tests</h1>";
echo "<pre>";
print_r($out);
$out = [];


$banner = "ObjectifyEverything\Adder";
$addr = new ObjectifyEverything\Adder();

// Half Adder Test
$msg = $addr->half(0,0);
if ($msg->sum == 0 && $msg->carry == 0) {
	$out[] = $banner." half(0,0) PASS";
} else {
	$out[] = $banner." half(0,0) FAIL";
}
$msg = $addr->half(1,0);
if ($msg->sum==1 && $msg->carry==0) {
	$out[] = $banner." half(1,0) PASS";
} else {
	$out[] = $banner." half(1,0) FAIL";
}
$msg = $addr->half(0,1);
if ($msg->sum==1 && $msg->carry==0) {
	$out[] = $banner." half(0,1) PASS";
} else {
	$out[] = $banner." half(0,1) FAIL";
}
$msg = $addr->half(1,1);
if ($msg->sum==0 && $msg->carry==1) {
	$out[] = $banner." half(1,1) PASS";
} else {
	$out[] = $banner." half(1,1) FAIL";
}

// Full Adder Test
$msg = $addr->full(0,0,0);
if ($msg->sum == 0 && $msg->carry==0) {
	$out[] = $banner." full(0,0,0) PASS";
} else {
	$out[] = $banner." full(0,0,0) FAIL";
}
$msg = $addr->full(0,0,1);
if ($msg->sum == 1 && $msg->carry==0) {
	$out[] = $banner." full(0,0,1) PASS";
} else {
	$out[] = $banner." full(0,0,1) FAIL";
}
$msg = $addr->full(0,1,0);
if ($msg->sum == 1 && $msg->carry == 0) {
	$out[] = $banner." full(0,1,0) PASS";
} else {
	$out[] = $banner." full(0,1,0) FAIL";
}
$msg = $addr->full(1,0,0);
if ($msg->sum == 1 && $msg->carry == 0) {
	$out[] = $banner." full(1,0,0) PASS";
} else {
	$out[] = $banner." full(1,0,0) FAIL";
}
$msg = $addr->full(0,1,1);
if ($msg->sum == 0 && $msg->carry == 1) {
	$out[] = $banner." full(0,1,1) PASS";
} else {
	$out[] = $banner." full(0,1,1) FAIL";
}
$msg = $addr->full(1,1,0);
if ($msg->sum == 0 && $msg->carry == 1) {
	$out[] = $banner." full(1,1,0) PASS";
} else {
	$out[] = $banner." full(1,1,0) FAIL";
}
$msg = $addr->full(1,1,1);
if ($msg->sum == 1 && $msg->carry == 1) {
	$out[] = $banner." full(1,1,1) PASS";
} else {
	$out[] = $banner." full(1,1,1) FAIL";
}

$addr->rippleCarry(0,0,8);
if ($addr->rcSum == 0 && $addr->rcCarry == 0) {
	$out[] = $banner." rippleCarry(0,0,8) PASS";
} else {
	$out[] = $banner." rippleCarry(0,0,8) FAIL";
}
$addr->rippleCarry(128,127,8);
if ($addr->rcSum == 255 && $addr->rcCarry == 0) {
	$out[] = $banner." rippleCarry(128,127,8) PASS";
} else {
	$out[] = $banner." rippleCarry(128,127,8) FAIL";
}
$addr->rippleCarry(255,1,8);
if ($addr->rcSum==0 && $addr->rcCarry == 1) {
	$out[] = $banner." rippleCarry(255,1,8) PASS";
} else {
	$out[] = $banner." rippleCarry(255,1,8) FAIL";
}




echo "<h1>ObjectifyEverying / Adder Tests</h1>";
print_r($out);
$out = [];



echo "-- end of tests --";


