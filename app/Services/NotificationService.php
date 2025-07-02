<?php

namespace App\Services;

use App\Models\Notification;
use Google\Client;
use Illuminate\Support\Facades\Http;

class NotificationService
{

    public static function sendFcmNotification(array $registrationTokens, string $title, string $body, array $data = []): array
    {
        // Getting Access Token for Firebase
        $accessToken = self::getAccessToken();


        $projectId = config('services.firebase.project_id');
        $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

        $responses = [];

        // Iterate through each registration token to send the notification
        foreach ($registrationTokens as $token) {
            $payload = [
                'message' => [
                    'token' => $token,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => array_map('strval', array_merge($data, [
                        'type' => 'notification',
                        'title' => $title,
                        'body' => $body,
                    ])),
                ]
            ];

            $headers = [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ];

            // Send Notification via Firebase
            $response = Http::withHeaders($headers)->post($url, $payload);
            $responses[] = $response->json();

            // Store the notification in the database
            $userId = $data['user_id'] ?? null; // Get user ID from the data to associate with the notification

            if ($userId) {
                // If user_id exists, store the notification for the user
                Notification::create([
                    'user_id' => $userId,
                    'type' => $data['type'] ?? 'default', // Add type for the notification (e.g., post_like, comment)
                    'title' => $title,
                    'message' => $body,
                    'status' => 'unread', // Mark as unread by default
                    'related_id' => $data['related_id'] ?? null, // This can be post_id or comment_id if applicable
                    'related_type' => $data['related_type'] ?? null, // This can be 'Post' or 'Comment' depending on the use case
                    'data' => json_encode($data), // Store the entire data as a JSON
                ]);
            }
        }

        // Return response to the caller
        return [
            'error' => false,
            'message' => 'Notification(s) sent successfully.',
            'data' => $responses
        ];
    }

    public static function getAccessToken(): string
    {
        $keyPath = public_path('firebase/service-account.json');

        $client = new Client();
        $client->setAuthConfig($keyPath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $client->fetchAccessTokenWithAssertion();
        return $client->getAccessToken()['access_token'];
    }
}
