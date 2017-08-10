<?php
/**
 * Created by PhpStorm.
 * User: mamazu
 * Date: 10/08/17
 * Time: 15:44
 */

function process_values($values)
{
    $result = array();
    foreach ($values as $element) {
        $element = trim($element);
        if (!is_numeric($element) || strlen($element) < 1) {
            continue;
        }
        $result[] = floatval($element);
    }
    return $result;
}

function make_step($stepName, $index1, $index2){
    return array('name' => $stepName, 'first' => $index1, 'second' => $index2);
}

function output_json($stepList, $itemLength){
    $result = array(
        'item_count' => $itemLength,
        'steps' => [],
        'compares' => 0,
        'swap' => 0
    );
    foreach ($stepList as $step){
        if($step['name'] === 'Compare'){
            $result['compares']++;
        }else if($step['name'] === 'Swap') {
            $result['swap']++;
        }
        $result['steps'][] = $step;
    }
    return json_encode($result);
}

$sorting = $_POST['algorithm'];
$values  = explode(PHP_EOL, $_POST['numbers']);
$values  = process_values($values);


function bubbleSort(&$array)
{
    $steps = [];
    for ($j = 0; $j < count($array); $j++) {
        for ($i = 0; $i < count($array) - 1; $i++) {
            $steps[] = make_step('Compare', $i, $i+1);
            if ($array[$i] > $array[$i + 1]) {
                $steps[] = make_step('Swap', $i, $i+1);
                $temp          = $array[$i];
                $array[$i]     = $array[$i + 1];
                $array[$i + 1] = $temp;
            }
        }
    }
    return $steps;
}

header('Content-Type: application/json');
switch ($sorting) {
    case 'bubble':
        echo output_json(bubbleSort($values), count($values));
        break;
}

