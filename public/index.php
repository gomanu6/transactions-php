<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Transactions</title>
</head>
<body>
    <h1>Transactions</h1>
    <p>List of All Transactions</p>


<?php

// declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */

require APP_PATH . 'app.php';

$files = getTransactionFiles(FILES_PATH);

// var_dump($files);

$transactions = [];
foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file));

}

$totals = getTotals($transactions);
// var_dump($totals);
// var_dump($transactions);


require VIEWS_PATH . 'transactions.php';


?>

</body>
</html>