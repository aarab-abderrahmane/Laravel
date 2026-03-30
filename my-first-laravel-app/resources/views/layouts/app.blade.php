<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        nav {
            background-color: #1e40af;
            padding: 14px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }

        nav .nav-links {
            display: flex;
            gap: 20px;
        }

        nav .nav-links a {
            font-size: 0.95rem;
            font-weight: normal;
        }
    </style>
</head>
<body>

    <nav>
        <a href="/blog">📝 My Blog</a>
        <div class="nav-links">
            <a href="/blog">All Posts</a>
            <a href="/blog/create">+ New Post</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
