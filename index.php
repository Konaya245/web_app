<?php
include 'src/counter.php';

static $current_serving = array(-1); // serving by counter 1 5 that -1 is genesis block
static $waiting = array(); // waiting ppl


$counter1 = new Counter();
$counter2 = new Counter();
$counter3 = new Counter();
$counter4 = new Counter();
$counter5 = new Counter();
$counter_array = array($counter1, $counter2, $counter3, $counter4, $counter5);

function assignToCounter()
{
    global $counter_array;
    global $current_serving;
    global $waiting;
    for ($i = 0; $i < count($current_serving) - 1; $i++) {
        if ($counter_array[$i]->get_current_serving() == null) {
            if (count($waiting) >= 1) {
                foreach ($waiting as $value) {
                    checkSlot($value);
                }
            }
            $counter_array[$i]->set_current_serving($current_serving[$i + 1], $current_serving, ($i + 1));
        }
    }
}

function generate()
{

    $random_number = rand(1000, 9999);
    global $current_serving;
    global $waiting;
    if (check($random_number) && count($current_serving) <= 5) {
        array_push($current_serving, $random_number);
        return $random_number;
    } else {
        array_push($waiting, $random_number);
        return $random_number;
    }
}

function check($generated)
{
    global $current_serving;
    foreach ($current_serving as $value) {
        if ($generated == $value) {
            $generated = rand(1000, 9999);
            check($generated);
        } else {
            return $generated;
        }
    }
}

function checkSlot($value) // basically to ensure we either add or not
{
    global $current_serving;
    global $waiting;
    for ($i = 0; $i < count($current_serving); $i++) {
        if ($current_serving[$i] == null) {
            $current_serving[$i] = $value;
            $toreplace = array_search($value, $waiting);
            $waiting[$toreplace] = null;
            return true;
        }
    }
    return false;
}

function get_counter($number)
{
    
}
$counter1->set_agent("1821881");
$counter2->set_agent("1829957");
$counter3->set_agent("1820833");
$counter4->set_agent("1920218");
$counter5->set_agent("1711575");
// // $counter1->get_timer(time(), array_search($counter1, $counter_array));



do {
    echo "Welcome to Counter Line Up System\n";
    // gettimeofday();
    echo "1. Get Number\n2. Show Average waiting time\n3. Show waiting \n4. Show available Counters\n5. Show Counter detailsQ\n6. Enter q or Q to exit\n\nEnter Choice: ";

    $option = fgets(STDIN);

    switch ($option) {
        case 1: {
            echo "Your Number is: " . generate()."\n";
            assignToCounter();
        }
    }
} while ($option != 999);


// generate();
// generate();
// generate();
// generate();
// generate();
// generate();
// generate();

// echo "\nserving before: ";
// foreach ($current_serving as $value) {
//     echo $value .= " ";
// }
// echo "\nwaiting before: ";
// foreach ($waiting as $value) {

//     echo $value .= " ";
// }
// echo "\nFrom Counter Object: ";
// // // $counter1 ->set_current_serving(null);
// // // $counter1 ->set_current_serving(null, $current_serving, 1);
// // // $current_serving[2] = null;

// assignToCounter();
// sleep(2);
// $counter1 ->get_timer(time(), (array_search($counter1, $counter_array)+1), $current_serving);
// assignToCounter();
// foreach ($counter_array as $value) {
//     echo $value->get_current_serving() . " ";
// }


// echo "\nserving after: ";
// foreach ($current_serving as $value) {
//     echo $value .= " ";
// }
// echo "\nwaiting after: ";
// foreach ($waiting as $value) {

//     echo $value .= " ";
// }
