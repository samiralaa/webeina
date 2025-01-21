<?php

namespace App\Http\Controllers\Notofiction;

use App\Http\Controllers\Controller;
use App\Imports\EmailsImport;
use App\Mail\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{

    public function showUploadForm()
    {
        return view('upload');
    }

    public function processUpload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        // Read data from the uploaded file
        $file = $request->file('file');
        $rows = Excel::toCollection(new EmailsImport, $file);

        // Extract names and emails
        $data = $rows->first()->map(function ($row) {
            return [
                'name' => $row[0] ?? null,  // First column for name
                'email' => $row[1] ?? null, // Second column for email
            ];
        })->filter(function ($item) {
            // Filter valid email addresses only
            return filter_var($item['email'], FILTER_VALIDATE_EMAIL);
        });

        // Iterate through the filtered data and send notifications
        $data->each(function ($user) {
            if ($user['email']) {
                Notification::route('mail', $user['email'])->notify(new SendNotification(
                    'New Notification Title', // Replace with your dynamic title
                    'This is the notification content for ' . ($user['name'] ?? 'User') // Replace with your dynamic message
                ));
            }
        });
        return $data;
        return response()->json([
            'success' => true,
            'message' => 'Notifications have been sent successfully!',
            'processed' => $data->values(),
        ]);


        $mailData = [
            'title' => 'This is Test Mail',
            'files' => [
                public_path('attachments/test_image.jpeg'),
                public_path('attachments/test_pdf.pdf'),
            ],
        ];

        Mail::to('devsamiralzeer243@gmail.com')->send(new SendNotification($mailData));

        echo "Mail send successfully !!";
    }
}
