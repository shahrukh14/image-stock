<?php

namespace App\Services;

use MailerLiteApi\MailerLite;
use Exception;

class MailerLiteService
{
    protected $mailerLite;

    public function __construct()
    {
        // Initialize the MailerLite SDK with your API Key
        $this->mailerLite = new MailerLite(env('MAILERLITE_API_KEY'));
    }

    // Method for subscribing to a group
    public function subscribeToGroup($email, $groupId)
    {
        try {
            $response = $this->mailerLite->groups()->addSubscriber($groupId, [
                'email' => $email
            ]);
            return $response;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Method to send a campaign to a subscriber
    // public function sendCampaignToSubscriber($email, $campaignId)
    // {
    //     try {
    //         // Prepare the data for the request
    //         $data = [
    //             'send_type' => 'regular', // You can adjust this if needed (e.g., 'test')
    //             'recipients' => [
    //                 [
    //                     'email' => $email
    //                 ]
    //             ]
    //         ];

    //         // Use the SDK to send the campaign using the send() method on campaigns API
    //         $response = $this->mailerLite->campaigns()->send($campaignId, $data);

    //         return $response;
    //     } catch (Exception $e) {
    //         return ['error' => $e->getMessage()];
    //     }
    // }
}

