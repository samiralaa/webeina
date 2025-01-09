@extends('dashboard.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dynamic Section Forms</title>
        <style>
            .container {
                max-width: 900px;
                margin: 30px auto;
                padding: 25px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            }

            h3 {
                font-size: 22px;
                color: #444;
                margin-bottom: 15px;
            }

            label {
                font-size: 14px;
                font-weight: bold;
                color: #555;
                margin-bottom: 5px;
                display: block;
            }

            input,
            textarea,
            select,
            button {
                width: 100%;
                padding: 12px;
                margin-bottom: 15px;
                border: 1px solid #d9d9d9;
                border-radius: 8px;
                font-size: 14px;
                background-color: #f9f9f9;
            }



            .form-section {
                display: none;
                padding: 20px;
                border: 1px solid #ececec;
                border-radius: 10px;
                background: #fcfcfc;
                margin-top: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            }

            .form-section.active {
                display: block;
            }







            .list-item {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
            }

            .list-item input {
                flex: 1;
            }

            .list-item button {
                background-color: #dc3545;
                padding: 8px;
                width: 80px;
                text-align: center;
                font-size: 12px;
                color: white;
            }

            .list-item button:hover {
                background-color: #c82333;
            }

            .alert {
                padding: 15px;
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
                border-radius: 8px;
                margin-bottom: 20px;
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

                <option value="answerQuestion">Misstion and vision</option>
            </select>

            <!-- Banner Form -->
            <div id="bannerForm" class="form-section">
                <h3>Banner Form</h3>
                <form action="" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="text" name="type" value="Banner" hidden>
                    <input type="text" name="page_type" value = "page_type" hidden>

                    <label>Description (EN):</label>
                    <textarea name="description[en]" required></textarea>
                    <label>Description (AR):</label>
                    <textarea name="description[ar]" required></textarea>

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
                <h3>Misstion and Vision Form</h3>
                <form action="" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="text" name="type" value="main_process" hidden>
                    <input type="text" name="page_type" value = "page_type" hidden>

                    <label>Description (EN):</label>
                    <textarea name="description[en]" required></textarea>
                    <label>Description (AR):</label>
                    <textarea name="description[ar]" required></textarea>
                    <label for=""> image</label>
                    <input type="file" name="image" required>
                    <label>Status:</label>
                    <select name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <button type="submit">Save Banner</button>
                </form>
            </div>

            {{-- overview form --}}
            {{-- <div id="overviewForm" class="form-section">
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
        </div> --}}


            <!-- Call To Action Form -->
            <div id="ctaForm" class="form-section">
                <h3>Call To Action Form</h3>
                <form action="" method="POST" enctype="multipart/form-data">
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
            <h3>Misstion and Vision Form</h3>
            <form action="" method="POST">
                @csrf
                <div id="sections-container">
                    <!-- Section 1 -->
                    <div class="section">
                        <h3>Section</h3>
                        <label for="title">Title:</label>
                        <input type="text" name="data[0][title]" required>

                        <label for="content-text">Content Text:</label>
                        <textarea name="data[0][content][text]" rows="3" required></textarea>

                        <label for="content-list">List Items:</label>
                        <div class="list-items-container" id="list-items-0">
                            <!-- List items will go here -->
                        </div>
                        <button type="button" class="add-list-item" data-section="0">Add List Item</button>
                    </div>
                </div>

                <button type="button" id="add-section">Add Section</button>
                <button type="submit" class="btn btn-success mt-3">Save Data</button>
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
            let sectionIndex = 0;

            document.getElementById('add-section').addEventListener('click', () => {
                sectionIndex++;
                const sectionsContainer = document.getElementById('sections-container');

                const newSection = document.createElement('div');
                newSection.classList.add('section');
                newSection.innerHTML = `
        <h3>Section</h3>
        <label for="title">Title:</label>
        <input type="text" name="data[${sectionIndex}][title]" required>

        <label for="content-text">Content Text:</label>
        <textarea name="data[${sectionIndex}][content][text]" rows="3" required></textarea>

        <label for="content-list">List Items:</label>
        <div class="list-items-container" id="list-items-${sectionIndex}">
            <!-- List items will go here -->
        </div>
        <button type="button" class="add-list-item" data-section="${sectionIndex}">Add List Item</button>
    `;

                sectionsContainer.appendChild(newSection);
            });

            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('add-list-item')) {
                    const sectionIndex = e.target.getAttribute('data-section');
                    const listContainer = document.getElementById(`list-items-${sectionIndex}`);
                    const listIndex = listContainer.childElementCount;

                    const newItem = document.createElement('div');
                    newItem.classList.add('list-item');
                    newItem.innerHTML = `
            <input type="text" name="data[${sectionIndex}][content][list][${listIndex}]" placeholder="List Item">
            <button type="button" class="remove-list-item">Remove</button>
        `;
                    listContainer.appendChild(newItem);
                }

                if (e.target.classList.contains('remove-list-item')) {
                    e.target.parentElement.remove();
                }
            });
        </script>
    </body>

    </html>
@endsection
