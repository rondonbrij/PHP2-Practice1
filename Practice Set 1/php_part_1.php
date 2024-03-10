<?php

/**
 * Calculate the total price of items in a shopping cart.
 * @param array $items An array of items, each with a 'name' and 'price'.
 * @return int The total price of all items.
 */
function calculate_total_price(array $items): int {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Perform a series of string manipulations.
 * @param string $string The string to be manipulated.
 * @return string The manipulated string.
 */
function manipulate_string(string $string): string {
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);
    return $string;
}

/**
 * Check if a number is even or odd.
 * @param int $number The number to be checked.
 * @return string A string indicating whether the number is even or odd.
 */
function check_even_or_odd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

// Usage calculate_total_price
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
echo "Total price: $" . calculate_total_price($items);

// Usage manipulate_string
$string = "This is a poorly written program with little structure and readability.";
echo "\nModified string: " . manipulate_string($string);

// Usage check_even_or_odd
$number = 42;
echo "\n" . check_even_or_odd($number);
?>
