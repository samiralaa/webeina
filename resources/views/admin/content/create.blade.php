
@extends('dashboard.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Section Forms</title>
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input,
        textarea,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        button {
          
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
           
        }

        h3 {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }

        .form-section {
            display: none;
            /* Hidden by default */
            border: 1px solid #e0e0e0;
            padding: 15px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .form-section.active {
            display: block;
            /* Show the selected form */
        }
    </style>
</head>

<body>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <label for="formType">Select Section Type:</label>
        <select id="formType" onchange="showForm()">
            <option value="">-- Select Section --</option>
            <option value="banner">Banner</option>
            <option value="process">UX Process</option>
            <option value="cta">Call To Action (CTA)</option>
            {{-- Overview --}}
            <option value="overview">Overview</option>
            <option value="answerQuestion">Answer and Question</option>
        </select>

        <!-- Banner Form -->
        <div id="bannerForm" class="form-section">
            <h3>Banner Form</h3>
            <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="text" name="type" value="Banner" hidden>


                <label>Description (EN):</label>
                <textarea name="description[en]" required></textarea>
                <label>Description (AR):</label>
                <textarea name="description[ar]" required></textarea>
                <label>Image:</label>
                <input type="file" name="image" required>
                <label>Status:</label>
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <button type="submit">Save Banner</button>
            </form>
        </div>

        <!-- UX Process Form -->
        <div id="processForm" class="form-section">
            <h3>UX Process Form</h3>
            <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="type" value="Process" hidden>
                <label for="">title (EN):</label>
                <input type="text" name="title[en]" required>
                <label for="">title (AR):</label>
                <input type="text" name="title[ar]" required>
                <label for=""> Sub Title (EN):</label>
                <input type="text" name="sub_title[en]" required>
                <label for=""> Sub Title (AR):</label>
                <input type="text" name="sub_title[ar]" required>
                <label for="link" class="form-label">Link:</label>
                <input type="text" name="link" required>
                <label for="">Description (EN):</label>
                <textarea name="description[en]" required></textarea>
                <label for="">Description (AR):</label>
                <textarea name="description[ar]" required></textarea>
                <label for="">Status:</label>
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <button type="submit">Save UX Process</button>
            </form>
        </div>

        {{-- overview form --}}
        <div id="overviewForm" class="form-section">
            <h3>Overview Form</h3>
            <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="type" value="Overview" hidden>
                <label for="">Title (EN):</label>
                <input type="text" name="title[en]" required>
                <label for="">Title (AR):</label>
                <input type="text" name="title[ar]" required>
                <label for="">Description (EN):</label>
                <textarea name="description[en]" required></textarea>
                <label for="">Description (AR):</label>
                <label for="">image:</label>
                <input type="file" name="image" required>
                <textarea name="description[ar]" required></textarea>
                <label for="">Status:</label>
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <button type="submit">Save Overview</button>
            </form>
        </div>


        <!-- Call To Action Form -->
        <div id="ctaForm" class="form-section">
            <h3>Call To Action Form</h3>
            <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="type" value="cta" hidden>
                <label>CTA Title (EN):</label>
                <input type="text" name="title[en]" required>
                <label>CTA Title (AR):</label>
                <input type="text" name="title[ar]" required>
                <label for="">Sub Title Ar </label>
                <input type="text" name="sub_title[ar]" required>
                <label for="">Sub Title En </label>
                <input type="text" name="sub_title[en]" required>
                <label>CTA Link:</label>
                <input type="text" name="link" required>
                <label for="">description (EN):</label>
                <textarea name="description[en]" required></textarea>
                <label for="">description (AR):</label>
                <textarea name="description[ar]" required></textarea>
                <label>Status:</label>
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <button type="submit">Save CTA</button>
            </form>
        </div>
    </div>


    {{-- answor and Question form --}}
    <div id="answerQuestionForm" class="form-section">
        <h3>Answer and Question Form</h3>
        <form action="{{ route('contents.store', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="type" value="answer_question" hidden>

            <div id="qa-container">
                <div class="qa-pair">
                    <label>Question (EN):</label>
                    <input type="text" name="questions[0][question][en]" required>
                    <label>Question (AR):</label>
                    <input type="text" name="questions[0][question][ar]" required>
                    <label>Answer (EN):</label>
                    <textarea name="questions[0][answer][en]" required></textarea>
                    <label>Answer (AR):</label>
                    <textarea name="questions[0][answer][ar]" required></textarea>
                    <select name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    
                    <label for="color">Color:</label>
                    <input type="color" name="questions[0][color]">
                </div>
            </div>

            <button type="button" id="addMoreQA" class="btn btn-primary mt-3">Add More</button>
            <button type="submit" class="btn btn-success mt-3">Save Answer and Question</button>
        </form>
    </div>

    <script>
        // Function to Show/Hide Forms
        function showForm() {
            // Hide all forms
            const sections = document.querySelectorAll('.form-section');
            sections.forEach(section => section.classList.remove('active'));

            // Show the selected form
            const formType = document.getElementById('formType').value;
            if (formType) {
                document.getElementById(`${formType}Form`).classList.add('active');
            }
        }



        document.addEventListener('DOMContentLoaded', () => {
            const addMoreButton = document.getElementById('addMoreQA');
            const qaContainer = document.getElementById('qa-container');
            let index = 1;

            addMoreButton.addEventListener('click', () => {
                const newPair = document.createElement('div');
                newPair.classList.add('qa-pair', 'mt-3');
                newPair.innerHTML = `
            <label>Question (EN):</label>
            <input type="text" name="questions[${index}][question][en]" required>
            <label>Question (AR):</label>
            <input type="text" name="questions[${index}][question][ar]" required>
            <label>Answer (EN):</label>
            <textarea name="questions[${index}][answer][en]" required></textarea>
            <label>Answer (AR):</label>
            <textarea name="questions[${index}][answer][ar]" required></textarea>
            <label for="color">Color:</label>
            <input type="color" name="questions[${index}][color]">
            <button type="button" class="btn btn-danger removeQA mt-2">Remove</button>
        `;

                qaContainer.appendChild(newPair);
                index++;
            });

            qaContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('removeQA')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>
</body>

</html>
@endsection