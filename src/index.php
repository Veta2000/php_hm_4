<?php
// 1
function max_sumDig($nMax, $maxSum) {
    $validNumbers = [];
    $totalSum = 0;

    for ($i = 1000; $i <= $nMax; $i++) {
        $digits = str_split($i);
        for ($j = 0; $j < count($digits) - 3; $j++) {
            if ($digits[$j] + $digits[$j+1] + $digits[$j+2] + $digits[$j+3] > $maxSum) {
                continue 2;
            }
        }
        $validNumbers[] = $i;
        $totalSum += $i;
    }

    $count = count($validNumbers);
    if ($count === 0) {
        return [0, 0, 0];
    }

    $average = $totalSum / $count;
    $closestNumber = $validNumbers[0];
    
    foreach ($validNumbers as $number) {
        if (abs($number - $average) < abs($closestNumber - $average)) {
            $closestNumber = $number;
        }
    }

    return [$count, $closestNumber, $totalSum];
}

// 2
function crazy_rabbit($field, $startPos) {
    $pos = $startPos;
    $jumpPower = $field[$pos];
    $direction = 1; 
    $visited = [];  
    $maxSteps = 1000; 

    while (true) {
       if ($jumpPower === 0) {
    return false;
    }
    if (array_sum($field) === 0) {
    return true;
    }

        
        if (in_array($pos, $visited) || $maxSteps-- <= 0) {
            return false; 
        }

        $visited[] = $pos; 

        if ($pos < 0) { 
            $pos = 0;
            $direction = 1;
        } elseif ($pos >= count($field)) {
            $pos = count($field) - 1;
            $direction = -1;
        }

        $jumpPower += $field[$pos];
    }
}

// 3.
function top_3_words($text) {
    $text = strtolower(preg_replace("/[^a-zA-Z' ]/", ' ', $text));
    $words = array_filter(explode(' ', $text), fn($word) => $word !== '');

    $wordCounts = array_count_values($words);
    arsort($wordCounts);

    return array_slice(array_keys($wordCounts), 0, 3);
}


$result1 = max_sumDig(2000, 3);
echo "max_sumDig(2000, 3):\n";
print_r($result1);
echo "\n";


$result2 = crazy_rabbit([2, 2, 4, 1, 5, 2, 7], 0);
echo "crazy_rabbit([2, 2, 4, 1, 5, 2, 7], 0):\n";
echo $result2 ? "true" : "false";
echo "\n\n";


$result3 = top_3_words("In a village of La Mancha, the name of which I have no desire to call to
mind, there lived not long since one of those gentlemen that keep a lance
in the lance-rack, an old buckler, a lean hack, and a greyhound for
coursing. An olla of rather more beef than mutton, a salad on most
nights, scraps on Saturdays, lentils on Fridays, and a pigeon or so extra
on Sundays, made away with three-quarters of his income.");

echo "top_3_words:\n";
print_r($result3);
echo "\n";
?>
