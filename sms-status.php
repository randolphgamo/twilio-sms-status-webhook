<?php
/**
 * Twilio SMS Status Webhook
 * Receives delivery status updates from Twilio and logs them.
 */

// Get data sent by Twilio
$messageSid = $_POST['MessageSid'] ?? 'unknown';
$status = $_POST['MessageStatus'] ?? 'unknown';
$to = $_POST['To'] ?? 'unknown';
$from = $_POST['From'] ?? 'unknown';

// Format log message
$log = date("Y-m-d H:i:s") . " | SID: $messageSid | From: $from | To: $to | Status: $status\n";

// Save to log file
file_put_contents("sms_status.log", $log, FILE_APPEND);

// Optional: send email notification
$adminEmail = "admin@example.com";
$subject = "Twilio SMS Status Update";
$message = "Message SID: $messageSid\nFrom: $from\nTo: $to\nStatus: $status";

@mail($adminEmail, $subject, $message);

// Return success response
http_response_code(200);
echo "Webhook received";
