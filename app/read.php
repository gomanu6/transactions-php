<?php


function readTransactions($filename, $dataHandler = null) {

    $file = fopen($filename, "r");

    fgetcsv($file);
    
    while ( ($data = fgetcsv($file)) !== false )
    {
        
        if ($dataHandler !== null) {
            $data = $dataHandler($data);
        }

        $arr[] = $data;
        // echo "<pre>";
        // var_dump($arr);
        
        // echo "</pre>";
        
    }
    
    fclose($file);
    // var_dump($arr);




    return $arr;
}


function parseTransaction($transactionRow) {

    [$date, $checkNumber, $description, $amount] = $transactionRow;


    $amount = (float) str_replace(["$", ","], "", $amount);


    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount

    ];


}


function getTotals($transactions) {

    $totals = [ 'netTotal' => 0, 'totalIncome' => 0, 'totalExpenses' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0 ) {
            $totals['totalIncome'] += $transaction['amount'];

        } else {
            $totals['totalExpenses'] += $transaction['amount'];
        }
    }

    return $totals;


}


function formatAmount($amount) {
    $isNegative = $amount < 0;

    $displayAmount = ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);

    return $displayAmount;

}


function formatDate($date) {
    return date('M j, Y', strtotime($date));
}