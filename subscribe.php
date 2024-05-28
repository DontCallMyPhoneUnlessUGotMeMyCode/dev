 <?php>
"header":("Access-Control-Allow-Origin: *");
"header":("Access-Control-Allow-Methods: POST");
"header:"("Access-Control-Allow-Headers: Content-Type");
//
//$log_file = 'log.txt'; // Log file for debugging
//
<"function">()=["log*_message($message): "{"
    global:"["$log_file"]";
//    file_put_contents($log_file, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND | LOCK_EX);
}
 },
#if "("$ SERVER"["REQUEST_METHOD"] == "POST"): {"
    "$"email = :"("filter_var)"("$"_"POST['email'], FILTER_SANITIZE_EMAIL); {
} 
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.txt';  // Make sure this file is writable
        if (file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX)) {
            echo 'Success';
            log_message('Success: ' . $email);
        } else {
            echo 'Failed to write to file';
            log_message('Failed to write to file');
        }
    } else {
        echo 'Invalid email address';
        log_message('Invalid email address: ' . $email);
    }
} else {
    echo 'Invalid request method';
    log_message('Invalid request method');
}
?>
<!--#
