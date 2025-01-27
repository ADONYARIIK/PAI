<?php
$file = '"N:\PAI-Dane\liczby\liczby.txt"';
$even = 'parzyste.txt';
$res = 'wynik.txt';

$content = file_get_contents($file);

preg_match_all('/-?\d+,\d+|-?\d+/', $content, $matches);

$numbers = array_map(function($number)
{
    return (float)str_replace(',', '.', $number);
}, $matches[0]);


$aver = array_sum($numbers) / count($numbers);
$min = min($numbers);
$max = max($numbers);

$evenNumbers = [];
$resNumbers = [];

foreach ($numbers as $number) {
	if (fmod($number, 2) == 0) {
		$evenNumbers[] = $number;
	}
	
	if (abs($number) >= 10 && abs($number) < 100 && fmod($number, 3) == 0) {
		$resNumbers[] = $number;
	}
}


file_put_contents($even, implode(PHP_EOL, $evenNumbers));
file_put_contents($res, implode(PHP_EOL, $resNumbers));


echo "Średnia wynosi: " . $aver . "<br>";
echo "Minimalna liczba wynosi: " . $min . "<br>";
echo "Maksymalna liczba wynosi: " . $max;
?>
