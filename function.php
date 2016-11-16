<?php

function tab($data) {
    $ret = '';

    $ret .= '<table border="1">';

    $row = $data[0];
    $ret .= '<tr>';
    foreach($row as $key => $val){
        $ret .= '<th>'.$key.'</th>';
    }
    $ret .= '</tr>';

    foreach($data as $key1 => $val1){
        $ret .= '<tr>';
        foreach($val1 as $key2 => $val2){
            $ret .= '<td>'.$val2.'</td>';
        }
        $ret .= '</tr>';
    }
    $ret .= '</table>';

    return $ret;
}