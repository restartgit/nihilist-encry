<?php

//Схема квадрата Полибия
//  	1	2	3	4	5	6	7
// 1	A	B	C	D	E	F	G
// 2	H	I	J	K	L	M	N
// 3	O	P	Q	R	S	T	U
// 4	V	W	X	Y	Z	_

// Переменные с запроса START
$input = $_POST['text'];
$key_polybios = $_POST['key'];
$key_message = $_POST['key2'];
// Переменные с запроса END

// Функция стринг перевести в массив START
function regular($output) {
	$output = preg_replace('(.{2})', "$0|", $output);
	$output = explode("|", $output);
	array_pop($output);
	return $output;
}
//Функция стринг перевести в массив END

// Константы START
$alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' '];
$polybios  = ['11','12','13','14','15','16','17','21','22','23','24','25','26','27','31','32','33','34','35','36','37','41','42','43','44','45','46'];
// Константы END

// Замена текста START
$key_polybios_arr = str_split($key_polybios);
$with_duplicate = array_merge_recursive($key_polybios_arr, $alphabet);
$without_duplicate = array_unique($with_duplicate);
$output_polyios  = str_ireplace($without_duplicate, $polybios, $input);
// echo "<pre>$output_polyios" . " (Ключ для квадрата Полибия)</pre>";
// Замена текста END

// Замена ключа для текста START
$a = NULL;
for ($i=0; $i < strlen($input); $i++) {
	$a .=  $key_message;
}
$a = substr($a, 0, strlen($input));

$output_message  = str_ireplace($without_duplicate, $polybios, $a);
// echo "<pre>$output_message" . " (Ключ для сообщения)</pre>";
// Замена ключа для текста END


$output_polyios = regular($output_polyios);
$output_message = regular($output_message);

// Цикл сложение массивов START
$arr3 = [];
foreach ([$output_polyios, $output_message] as $arr) {
	foreach ($arr as $key => $value) {
		if ( !isset($arr3[$key]) ) $arr3[$key] = $value;
		else $arr3[$key] += $value;
	}
}
// Цикл сложение массивов END

$end = implode('', $arr3);
echo "$end";
?>
