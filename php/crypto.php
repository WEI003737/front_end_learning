<?php

function cryptoRandom($min, $max) {
  $range = $max - $min;
  if ($range === 0) return $min;
  $log = log($range, 2);
  $bytes = ($log / 8) + 1;
  $bits = $log + 1;
  $filter =  (1 << $bits) - 1;
  do {
    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes, $s)));
    $rnd = $rnd & $filter;
  } while ($rnd >= $range);
  return $min + $rnd;
}

var_dump(cryptoRandom(0, 100));

?>