<?php

namespace App\Http\Controllers\Admin\Qrcode;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileEmployee;
class QrcodeController extends Controller
{
public function show($id)
{
    $profile = ProfileEmployee::findOrFail($id);
  
    return view('website.profileEmployee', compact('profile'));
}
public function generateQRCode(Request $request)
{
    // Validate inputs
    $request->validate([
        'type' => 'required|string',
        'name' => 'required|string|max:255',
        'job_title' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'location' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $type = $request->type;
    $phone = $request->phone;
    $email = $request->email;
    $name = $request->name;
    $jobTitle = $request->job_title;
    $location = $request->location;

    // Default or user-inputted social links
    if ($type === 'company') {
        $facebook = 'http://facebook.com/webenia';
        $twitter = 'https://www.instagram.com/webeniaagency/';
        $linkedin = 'https://www.linkedin.com/company/webenia/posts/?feedView=all';
        $website = 'https://webenia.com/';
    } else {
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $linkedin = $request->linkedin;
        $website = $request->website ?? null;
    }

    // Handle image upload
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
    }

    // Save employee profile
    $profile = ProfileEmployee::create([
        'type' => $type,
        'name' => $name,
        'job_title' => $jobTitle,
        'phone' => $phone,
        'email' => $email,
        'location' => $location,
        'company_name' => $request->company_name,
        'company_website' => $request->company_website,
        'company_description' => $request->company_description,
        'company_logo_image_path' => $request->company_logo_image_path,
        'company_banner_image_path' => $request->company_banner_image_path,
        'company_cover_image_path' => $request->company_cover_image_path,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'linkedin' => $linkedin,
        'website' => $website,
        'image' => $imageName,
    ]);

    // Generate profile URL
    $profileUrl = route('profile.show', $profile->id);

    // Generate QR code image
    $qrCode = new QrCode($profileUrl);
    $writer = new PngWriter();

    $qrCodePath = public_path('qrcodes');
    if (!File::exists($qrCodePath)) {
        File::makeDirectory($qrCodePath, 0755, true);
    }

    $fileName = $profile->id . '_profile_qrcode.png';
    $filePath = $qrCodePath . '/' . $fileName;

    $writer->write($qrCode)->saveToFile($filePath);

    // Update profile with QR code path
    $profile->update([
        'qr_code_image_path' => 'qrcodes/' . $fileName
    ]);

    // Download the QR code image and delete after sending
    return response()->download($filePath)->deleteFileAfterSend(true);
}
    public function index()
    {
        return view('website.profileEmployee');
    }
    public function create()
    {
        return view('website.createqrcode');
    }
    public function store(Request $request)
    {
        
    }

    public function edit()
    {
        return view('admin.qrcode.edit');
    }
    public function update(Request $request)
    {
        
    }
}
