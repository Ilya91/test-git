<?php
header('Content-Type: text/html; charset=utf-8');

echo '<a href="?action=read">Read</a> ';
echo '<a href="?action=write">Write</a><br/><br/>';

$action = $_GET['action'];

switch($action){
    case 'write':
        $data = array(
            array(
                "title" => "Россия",
                "id" => 1,
            ),
            array(
                "title" => "США",
                "id" => 2,
            ),
            array(
                "title" => "Испания",
                "id" => 3,
            ),
            array(
                "title" => "Австралия",
                "id" => 4,
            ),
        );

        // создаем объект документа
        $dom = new DOMDocument('1.0', 'UTF-8');
        // создаем корневой элемент
        $countries = $dom->createElement('countries');
        // добавляем корневой элемент к документу
        $dom->appendChild($countries);

        foreach($data as $value){
            // создаем элемент страны
            $country = $dom->createElement('country', $value['title']);
            // создаем атрибут и выставляем значение
            $attr_id = $dom->createAttribute('id');
            $attr_id->value = $value['id'];
            // добавляем атрибут к стране
            $country->appendChild($attr_id);
            // добавляем страну к корневому элементу
            $countries->appendChild($country);
        }

        //$xml -> formatOutput =true; 
        $dom->save('./test.xml');
        echo 'Файл успешно записан';

        break;
    default:
        $xmlPath = './countries.xml';
        $xml = simplexml_load_file($xmlPath);
        //var_dump($xml);
        $attrs = $xml->attributes();
        echo "Страны из ".$attrs['source'] . '<br/><br/>';
        foreach ($xml as $country) {
            echo $country->id . ' - ' . $country->title . '<br/>';
        }
        break;
}

