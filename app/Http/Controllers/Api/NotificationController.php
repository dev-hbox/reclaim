<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
        ResponseService::successResponse('Notifications fetched successfully.', $notifications);
    }


    public function markNotificationAsRead(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'notification_id' => 'required|integer|exists:notifications,id',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = Auth::user();
        $notification = Notification::where('user_id', $user->id)
            ->where('id', $request->notification_id)
            ->firstOrFail();
        $notification->status = 'read';
        $notification->save();
        ResponseService::successResponse('Notification marked as read.', $notification);
    }
}
