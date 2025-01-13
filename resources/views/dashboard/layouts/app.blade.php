<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eeeeee;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #0a2344;
            color: #dae0d4;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar .brand {
            text-align: center;
            padding: 1.5rem 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: #b4c8cc;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 0.8rem 1rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a {
            color: #dae0d4;
            text-decoration: none;
            display: flex;
            align-items: center;
            width: 100%;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #849cb2;
            color: #0a2344;
            border-radius: 5px;
        }

        .sidebar ul li a i {
            font-size: 1.2rem;
            margin-right: 10px;
            transition: margin 0.3s ease;
        }

        .sidebar.collapsed ul li a i {
            margin-right: 0;
        }

        .sidebar.collapsed ul li a span {
            display: none;
        }

        .sidebar ul li.active a {
            background-color: #b4c8cc;
            color: #0a2344;
            border-radius: 5px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
            background-color: #eeeeee;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        /* Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            background-color: #b4c8cc;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1001;
            color: #0a2344;
        }

        .toggle-btn i {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.collapsed {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.collapsed {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <i class="fas fa-tools"></i> Admin Panel
        </div>
        <ul>
            <!-- Users -->
            <li class="active">
                <a href="{{ route('users') }}">
                    <i class="fas fa-users"></i> <!-- Icon for User Management -->
                    <span>Users</span>
                </a>
            </li>

            <!-- Home Page -->
            <li>
                <a href="{{ route('home-page') }}">
                    <i class="fas fa-home"></i> <!-- Icon for Dashboard/Home -->
                    <span>Home Page</span>
                </a>
            </li>
{{-- faq routs --}}
            <li>
                <a href="{{ route('faq.index') }}">
                    <i class="fas fa-question"></i> <!-- Icon for FAQ -->
                    <span>FAQ</span>
                </a>
            </li>
            <!-- Services -->
            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#servicesMenu" aria-expanded="false"
                    aria-controls="servicesMenu">
                    <i class="fas fa-concierge-bell"></i> <!-- Icon for Services -->
                    <span>Services</span>
                </a>
                <ul class="collapse" id="servicesMenu">
                    <li>
                        <a href="{{ route('services.index') }}" class="ps-4">
                            <i class="fas fa-list"></i> <!-- Icon for Viewing List -->
                            <span>View Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.create') }}" class="ps-4">
                            <i class="fas fa-plus-circle"></i> <!-- Icon for Adding -->
                            <span>Add Service</span>
                        </a>
                    </li>
                    {{-- to services request page --}}
                    <li>
                        <a href="{{ route('services.request') }}" class="ps-4">
                            <i class="fas fa-question-circle"></i>
                            <span>Request Service</span>
                        </a>
                    </li>

                    {{-- // log serves for user request services --}}

                    <li>
                        <a href="{{ route('activity-log.index') }}">
                            Serves History
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Quiz -->
            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#QuizMenu" aria-expanded="false"
                    aria-controls="QuizMenu">
                    <i class="fas fa-question-circle"></i> <!-- Icon for Quiz -->
                    <span>Quiz</span>
                </a>
                <ul class="collapse" id="QuizMenu">
                    <li>
                        <a href="{{ route('questions.index') }}" class="ps-4">
                            <i class="fas fa-question"></i> <!-- Icon for Questions -->
                            <span>Questions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('answers.index') }}" class="ps-4">
                            <i class="fas fa-check-circle"></i> <!-- Icon for Answers -->
                            <span>Answers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('results.index') }}" class="ps-4">
                            <i class="fas fa-chart-bar"></i> <!-- Icon for Results -->
                            <span>Results</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Packages -->





            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#packageMenu" aria-expanded="false"
                    aria-controls="packageMenu">
                    <i class="fas fa-box-open"></i> <!-- Icon for Package -->
                    <span>Package</span>
                </a>
                <ul class="collapse" id="packageMenu">
                    <li>
                        <a href="{{ route('package.index') }}">
                            <i class="fas fa-box-open"></i> <!-- Icon for Packages -->
                            <span>Packages</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('package.order.index') }}">
                            <i class="fas fa-shopping-cart"></i> <!-- Icon for Order Packages -->
                            Request Package
                        </a>
                    </li>
                </ul>
            </li>



            <!-- Contact -->
            <li>
                <a href="{{ route('contact.index') }}">
                    <i class="fas fa-envelope"></i> <!-- Icon for Contact -->
                    <span>Contact</span>
                </a>
            </li>

            {{-- notification model for all notification type (emails , sms, push notification,whatsapp) --}}
            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#notificationMenu" aria-expanded="false"
                    aria-controls="notificationMenu">
                    <i class="fas fa-bell"></i> <!-- Icon for Notification -->
                    <span>Notification</span>
                </a>
                <ul class="collapse" id="notificationMenu">
                    <li>
                        <a href="{{ route('notifications.index') }}">
                            <i class="fas fa-bell"></i> <!-- Icon for Notification -->
                            <span>Notification</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-plus-circle"></i> <!-- Icon for Adding Notification -->
                            <span>Add Notification</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Settings -->
            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#settingsMenu" aria-expanded="false"
                    aria-controls="settingsMenu">
                    <i class="fas fa-sliders-h"></i> <!-- Icon for Settings -->
                    <span>Settings</span>
                </a>
                <ul class="collapse" id="settingsMenu">
                    <li>
                        <a href="{{ route('footer.index') }}" class="ps-4">
                            <i class="fas fa-ellipsis-h"></i> <!-- Icon for Footer Settings -->
                            <span>Footer</span>
                        </a>
                    </li>
                    {{-- custom fields --}}
                    <li>
                        <a href="{{ route('custom.index') }}" class="ps-4">
                            <i class="fas fa-ellipsis-h"></i>
                            <span>Custom Fields</span>
                        </a>
                    </li>
                    <li>
                </ul>
            </li>


        </ul>
    </div>


    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        const mainContent = document.getElementById('mainContent');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
        });
    </script>
</body>

</html>
