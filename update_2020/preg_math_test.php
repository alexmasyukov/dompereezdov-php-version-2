<?php

$text = '<table border="1" cellpadding="5" cellspacing="0" class="price_table_1" dir="ltr" style="border-collapse:collapse">
	<tbody>
		<tr>
			<th colspan="3" rowspan="1">Стоимость машины</th>
		</tr>
		<tr>
			<td><strong>Машина</strong></td>
			<td><strong>Цена за час</strong></td>
			<td><strong>Минималка</strong></td>
		</tr>
		<tr>
			<td>Хёндай Портер</td>
			<td>410</td>
			<td>(10)</td>
		</tr>
		<tr>
			<td>Газель стандарт</td>
			<td>440</td>
			<td>(11)</td>
		</tr>
		<tr>
			<td>Газель 4 м</td>
			<td>500</td>
			<td>(12)</td>
		</tr>
		<tr>
			<td>Зил-Бычок</td>
			<td>600</td>
			<td>(13)</td>
		</tr>
		<tr>
			<td>Пятитонник</td>
			<td>700</td>
			<td>(14)</td>
		</tr>
		<tr>
			<td>Семитонник</td>
			<td>800</td>
			<td>(15)</td>
		</tr>
	</tbody>
</table>
&nbsp;

<table border="1" cellpadding="5" cellspacing="0" class="price_table_1" dir="ltr" style="border-collapse:collapse">
	<tbody>
		<tr>
			<th colspan="3" rowspan="1">Стоимость комплексного переезда с грузчиками и упаковкой</th>
		</tr>
		<tr>
			<td><strong>Объём работ</strong></td>
			<td><strong>Бригада</strong></td>
			<td><strong>Стоимость</strong></td>
		</tr>
		<tr>
			<td>Несколько предметов мебели</td>
			<td>Хёндай Портер и 2 грузчика</td>
			<td>(10|1450)</td>
		</tr>
		<tr>
			<td>Однокомнатная квартира</td>
			<td>Газель стандарт и 2 грузчика</td>
			<td>(11|2300)</td>
		</tr>
		<tr>
			<td>Двухкомнатная квартира</td>
			<td>Газель 4 м и 2 грузчика</td>
			<td>(12|3000)</td>
		</tr>
		<tr>
			<td>Трёхкомнатная квартира</td>
			<td>Зил-Бычок и 4 грузчика</td>
			<td>(13|6000)</td>
		</tr>
		<tr>
			<td>Четырёхкомнатная квартира</td>
			<td>Пятитонник и 4 грузчика</td>
			<td>(14|6000)</td>
		</tr>
		<tr>
			<td>Многокомнатная квартира</td>
			<td>Семитонник и 6 грузчиков</td>
			<td>(15|9000)</td>
		</tr>
	</tbody>
</table>
';

echo '<pre>';

//  \(([0-9]{2})\)
//  \(([0-9]{2})\|([0-9]+?)\)
preg_match_all('/\(([0-9]{2})\|([0-9]+?)\)/', $text, $output_array);

print_r($output_array);