<?php

$input = $_POST['text_d'];
$key_polybios = $_POST['key_d'];
$key_message = $_POST['key2_d'];
////////////////////////////////

// Константы START
$alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' '];
$polybios  = ['11','12','13','14','15','16','17','21','22','23','24','25','26','27','31','32','33','34','35','36','37','41','42','43','44','45','46'];
// Константы END

function regular($output) {
	$output = preg_replace('(.{2})', "$0|", $output);
	$output = explode("|", $output);
	array_pop($output);
	return $output;
}

$key_polybios_arr = str_split($key_polybios);
$with_duplicate = array_merge_recursive($key_polybios_arr, $alphabet);
$without_duplicate = array_unique($with_duplicate);

// Замена ключа для текста START
$a = NULL;
for ($i=0; $i < strlen($input) / 2; $i++) {
	$a .=  $key_message;
}
$a = substr($a, 0, strlen($input));

// Замена ключа для текста END
$input_arr  = str_ireplace($without_duplicate, $polybios, $input);
$input_arr = regular($input_arr);

$output_message  = str_ireplace($without_duplicate, $polybios, $a);
$output_message = regular($output_message);
// Цикл сложение массивов START

$arr3 = [];
foreach ([$input_arr, $output_message] as $arr) {
	foreach ($arr as $key => $value) {
		if ( !isset($arr3[$key]) ) $arr3[$key] = $value;
		else $arr3[$key] -= $value;
	}
}

$end = str_ireplace($polybios, $without_duplicate, $arr3);
$end = implode('', $end);
echo "$end";
// Цикл сложение массивов END
?>