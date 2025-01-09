<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notification.index');
    }

    public function emailsNotificationIndex()
    {
        return view('notification.emails.index');
    }
}
