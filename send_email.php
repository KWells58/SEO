<?php
require 'vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

// Ensure that your AWS credentials are set in the environment using environment variables

// Create an SES client
$client = new SesClient([
    'version' => 'latest',
    'region'  => 'us-east-1', // Change to your desired region
]);

// Email parameters
$source = $_POST['email']; // Use the email address provided in the form as the source
$destination = ['ToAddresses' => ['zazaforfeet@gmail.com']]; // The destination email address
$message = [
    'Subject' => ['Data from the contact form'],
    'Body' => ['Text' => ['Data: ' . print_r($_POST, true)]],
];

try {
    // Send the email
    $result = $client->sendEmail([
        'Source' => $source,
        'Destination' => $destination,
        'Message' => $message,
    ]);

    // Check the result for success
    echo 'Email sent successfully. Message ID: ' . $result['MessageId'];
} catch (AwsException $e) {
    // Handle errors
    echo 'Email not sent. Error: ' . $e->getAwsErrorMessage();
}

