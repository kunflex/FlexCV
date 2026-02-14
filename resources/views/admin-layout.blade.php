<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    @yield('styles')

    <style>
        :root {
            --primary: #2563eb;
            --bg: #f8fafc;
            --white: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow: hidden;
        }

        .layout {
            display: flex;
            height: 100vh;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            width: 240px;
            background: #0f172a;
            color: #cbd5e1;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }

        .logo {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #fff;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #94a3b8;
        }

        .menu-section ul {
            list-style: none;
            padding: 0;
            margin: 0 0 25px 0;
        }

        .menu-section li {
            margin-bottom: 6px;
        }

        .menu-section a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: inherit;
            font-size: 14px;
        }

        .menu-section a:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .menu-section a.active {
            background: var(--primary);
            color: #fff;
        }

        .side-footer {
            margin-top: auto;
            font-size: 12px;
            color: #94a3b8;
            text-align: center;
        }

        /* ===== Content ===== */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Fixed Topbar */
        .topbar {
            height: 60px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 25px;
            flex-shrink: 0;
        }

        .mobile-toggle {
            display: none;
            margin-right: auto;
            font-size: 20px;
            cursor: pointer;
        }

        /* Scrollable main content */
        main {
            flex: 1;
            overflow-y: auto;
            padding: 30px;

            /* Hide scrollbars */
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        main::-webkit-scrollbar {
            display: none;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 8px;
            width: 180px;
            overflow: hidden;
        }

        .dropdown-content a,
        .dropdown-content button {
            display: block;
            width: 100%;
            padding: 10px 14px;
            font-size: 14px;
            background: none;
            border: none;
            text-align: left;
            text-decoration: none;
            color: var(--text);
            cursor: pointer;
        }

        .dropdown-content a:hover,
        .dropdown-content button:hover {
            background: var(--bg);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* ===== Overlay ===== */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ===== Responsive ===== */
        @media (max-width: 992px) {

            body {
                overflow: auto;
            }

            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                width: 240px;
                height: 100%;
                transition: 0.3s ease;
                z-index: 1000;
            }

            .sidebar.active {
                left: 0;
            }

            .sidebar.active~.content-wrapper .overlay,
            .overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .mobile-toggle {
                display: block;
            }

            .topbar {
                justify-content: space-between;
                padding: 0 15px;
            }

            main {
                padding: 20px 15px;
            }

            .dropdown-content {
                right: 10px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 220px;
            }

            main {
                padding: 15px 12px;
            }

            .topbar {
                height: 55px;
            }
        }
    </style>
</head>

<body>

    <div class="layout">

        <!-- Overlay -->
        <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

        @auth
            <aside class="sidebar" id="sidebar">

                <div class="logo">FlexCV</div>

                @if (Auth::user()->hasRole('admin'))
                    <div class="menu-section">
                        <div class="menu-title">Main</div>
                        <ul>
                            <li><a href="{{ route('dashboard') }}" class="active"><i data-feather="home"></i> Dashboard</a>
                            </li>
                            <li><a href="{{ route('jobpostings') }}"><i data-feather="briefcase"></i> Job Postings</a></li>
                            <li><a href="{{route('joblists')}}"><i data-feather="file-text"></i>Job Applications</a></li>
                            <li><a href="#"><i data-feather="calendar"></i> Interviews</a></li>
                        </ul>
                    </div>

                    <div class="menu-section">
                        <div class="menu-title">Candidates</div>
                        <ul>
                            <li><a href="#"><i data-feather="users"></i> All Candidates</a></li>
                            <li><a href="#"><i data-feather="check-circle"></i> Shortlisted</a></li>
                            <li><a href="#"><i data-feather="database"></i> Talent Pool</a></li>
                        </ul>
                    </div>
                @elseif (Auth::user()->hasRole('employer'))
                    <div class="menu-section">
                        <div class="menu-title">Main</div>
                        <ul>
                            <li><a href="{{ route('dashboard') }}"><i data-feather="home"></i> Dashboard</a></li>
                            <li><a href="#"><i data-feather="plus-circle"></i> Post Job</a></li>
                            <li><a href="#"><i data-feather="layers"></i> Manage Jobs</a></li>
                            <li><a href="#"><i data-feather="file-text"></i> Applications</a></li>
                        </ul>
                    </div>
                @endif

                <div class="side-footer">
                    © {{ date('Y') }} FlexCV
                </div>

            </aside>
        @endauth

        <div class="content-wrapper">

            <div class="topbar">
                <div class="mobile-toggle" onclick="toggleSidebar()">☰</div>

                @auth
                    <div class="dropdown">
                        <img src="{{ asset('assets/img/avarta.png') }}" alt="Avatar">
                        <div class="dropdown-content">
                            <a href="#">Dashboard</a>
                            <a href="#">Profile</a>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <main>
                @yield('content')
            </main>

        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();

            if (document.querySelector('#editor1')) {
                ClassicEditor.create(document.querySelector('#editor1'));
            }
            if (document.querySelector('#editor2')) {
                ClassicEditor.create(document.querySelector('#editor2'));
            }
        });
    </script>
    <script>
        // Sidebar toggle for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();

            // CKEditor
            if (document.querySelector('#editor1')) {
                ClassicEditor.create(document.querySelector('#editor1'));
            }
            if (document.querySelector('#editor2')) {
                ClassicEditor.create(document.querySelector('#editor2'));
            }

            // ===== Sidebar Active Menu =====
            const menuLinks = document.querySelectorAll('.sidebar a');

            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Remove active class from all links
                    menuLinks.forEach(l => l.classList.remove('active'));

                    // Add active to the clicked link
                    this.classList.add('active');
                });
            });

            // ===== Optional: Highlight based on current URL =====
            const currentURL = window.location.href;
            menuLinks.forEach(link => {
                if (link.href === currentURL) {
                    menuLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                }
            });
        });
    </script>

    @yield('scripts')

</body>

</html>
