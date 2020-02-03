<?php
function permStacker($array,$length){
    $stack=[[]];  // declare intitial empty element
    for($x=0; $x<$length; ++$x){  // limit the total number of passes / max string length
        foreach($stack as $combination){
            //foreach(array_diff($array,range('a',end($combination))) as $left){  // do not include iterate letter that come earlier than rightmost letter
            foreach($array as $left){  // do not include iterate letter that come earlier than rightmost letter
                $merge=array_merge($combination,[$left]);
                $stack[implode($merge)]=$merge;  // keys hold desired strings, values hold subarray of combinations for iterated referencing
            }
        }
    }
    unset($stack[0]); // remove initial empty element
    return array_keys($stack);  // return array of permutations as space delimited strings
}
  $HINTS=[];
  $HINTS[0] = "p";
  $HINTS[1] = "o";
  $HINTS[2] = "i";
  $HINTS[3] = "u";
  $HINTS[4] = "l";
  $HINTS[5] = "k";
  $HINTS[6] = "j";
  $HINTS[7] = "t";
  $HINTS[8] = "r";
  $HINTS[9] = "e";
$permutations=permStacker(array_diff(range('a', 'z'), $HINTS),2);
echo 'Total Permutations: ',sizeof($permutations),"\n";
foreach ($permutations as $key => $value) {
    // HINTS[72] = "sl"
    echo "HINTS[" . ($key - 6) . "] = \"" . $permutations[$key] . "\"\n";   
}

?>
