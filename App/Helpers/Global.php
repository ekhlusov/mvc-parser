<?php
/**
 * Очистака HTML параметров
 *
 * @param $text
 *
 * @return string
 */
function clean($text)
{
    $clean = html_entity_decode(trim(str_replace(';', '-', preg_replace('/\s+/S', " ", strip_tags($text)))));// remove everything

    return $clean;
    echo '\n';// throw a new line
}

/**
 * Разбивает цену
 *
 * @param $price
 *
 * @return array
 */
function priceExploder($price)
{
    preg_match_all('/(\d{1,4} ?\d{1,6} (руб|р|₽))/ui', $price, $matches);
    $prices = [];
    foreach ($matches[0] as $index => $match) {
        $current = explode(' ', preg_replace('/\s+/', '', $matches[0][$index], 1));
        $prices[] = [
            'price'    => money_format('%i', (float)$current[0]),
            'currency' => $matches[2][0]
        ];
    }

    return $prices;
}
