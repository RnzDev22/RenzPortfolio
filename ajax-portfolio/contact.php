<?php
require_once '../core/init.php';

$user   = new User();
$gen    = new GeneralCls();
$secret = new SecretCls();

// Get form inputs
$SenderName = $_POST['names'];   // Change to consistent names
$Email      = $_POST['emails'];  // Change to consistent names
$Subject    = $_POST['subjects'];  // Change to consistent names
$Message    = $_POST['messages'];  // Change to consistent names

// Validate form inputs
if(empty($SenderName) || empty($Subject) || empty($Message) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);  // Use 400 for bad request
    echo json_encode(['error' => 'Invalid form input']);
    exit();
}

// Sanitize inputs
$SenderName = strip_tags(htmlspecialchars($SenderName));
$Email      = strip_tags(htmlspecialchars($Email));
$Subject    = strip_tags(htmlspecialchars($Subject));
$Message    = strip_tags(htmlspecialchars($Message));

// Insert into DB
$result = $secret->dynamicFunction('ins_portfolio_messages', 
    array(
        $SenderName,
        $Subject,
        $Email,
        $Message
    )
)[0];


// Respond with the result
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
?>
