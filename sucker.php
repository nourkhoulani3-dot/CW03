<?php
//Exercise 5: Basic Validation
$required = ['name', 'section', 'cardnumber', 'cardtype'];

foreach ($required as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        echo '<h1>Sorry</h1>';
        echo '<p>You did not fill out the form completely. <a href="buyagrade.html">Try again?</a></p>';
        exit; 
    }
}
// Exercise 4: Save Form Data
$name = trim($_POST['name'] ?? '');
$section = trim($_POST['section'] ?? '');
$cardnumber = trim($_POST['cardnumber'] ?? '');
$cardtype = trim($_POST['cardtype'] ?? '');

$line = $name . ';' . $section . ';' . $cardnumber . ';' . $cardtype . PHP_EOL;
file_put_contents('suckers.html', $line, FILE_APPEND);

//Exercise 3: Display Input Data
echo '<h1>Raw Form Data</h1>';
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<h1>Form input values</h1>';
echo '<p>Your Name: ' . htmlspecialchars($name) . '</p>';
echo '<p>Section: ' . htmlspecialchars($section) . '</p>';
echo '<p>Card Number: ' . htmlspecialchars($cardnumber) . '</p>';
echo '<p>Card Type: ' . htmlspecialchars($cardtype) . '</p>';

//Exercise 4: Read back the database file and print it
$all = file_get_contents('suckers.html');
echo '<h2>The current database contains:</h2>';
echo '<pre>' . htmlspecialchars($all) . '</pre>';
?>