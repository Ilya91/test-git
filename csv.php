<?php
header('Content-Type: text/html; charset=utf-8');

echo '<a href="?action=read">Read</a> ';
echo '<a href="?action=write">Write</a><br/><br/>';

$action = $_GET['action'];

switch($action){
    case 'write':
        $data = array(
            array("Россия", "США", "Испания", "Австралия"),
            array("США", "Испания", "Австралия", "Россия"),
            array("Россия", "США", "Испания", "Австралия"),
        );

        $fp = fopen('./test.csv', 'w');

        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        echo 'Файл успешно записан';

        break;
    default:
        $csvPath = './countries.csv';
        $csvFile = fopen($csvPath, "r");
        if ($csvFile) {
            $res = array();
            while (($csvData = fgetcsv($csvFile, 100, ",")) !== FALSE) {
                $res[] = $csvData;
            }
            echo '<pre>';
            print_r($res);
        }
        break;
}
