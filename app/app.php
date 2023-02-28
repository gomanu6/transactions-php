

<?php
// declare(strict_types = 1);

require 'read.php';

function getTransactionFiles($dirpath) {
    $files = [];
    
    foreach(scandir($dirpath)  as $file ) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirpath . $file;
        
        
        // var_dump($file);
    }
    
    // echo "<pre>";
    // print_r($files);
    // echo "</pre>";
    
    return $files;
    
}



function getTransactions($filepath) {
    if (file_exists($filepath)) {
        // echo "File Found";
        $trans = readTransactions($filepath, 'parseTransaction');
        // var_dump($trans);
        return $trans;
    
    
    }
}





