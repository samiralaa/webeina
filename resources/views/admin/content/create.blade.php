@extends('dashboard.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Section Forms</title>
    <style>
        .form-section {
            background: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }



        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .buttom_style {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div id="processForm" class="form-section">
        <h3>UX Process Form</h3>
        <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="type" value="Process" hidden>
            <label for="">Title (EN):</label>
            <input type="text" name="title[en]">
            <label for="">Title (AR):</label>
            <input type="text" name="title[ar]">
            <label for="">Sub Title (EN):</label>
            <input type="text" name="sub_title[en]">
            <label for="">Sub Title (AR):</label>
            <input type="text" name="sub_title[ar]">
            <label for="link" class="form-label">Link:</label>
            <input type="text" name="link">
            <label for="">Description (EN):</label>
            <textarea name="description[en]"></textarea>
            <label for="">Description (AR):</label>
            <textarea name="description[ar]"></textarea>
            <label for="">Status:</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

            <button type="submit" class="buttom_style">Save UX Process</button>
        </form>
    </div>

</body>

</html>
@endsection