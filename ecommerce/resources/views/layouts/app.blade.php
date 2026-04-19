<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Aura Studio')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css">
    
    @vite(['resources/css/app.css'])
    
    <style>
        :root {
            --bg-color: #F5F4F0;
            --surface-color: #FFFFFF;
            --text-main: #1A1A18;
            --text-secondary: #6B6A66;
            --border-color: #E8E6E0;
            --accent-terracotta: #C4613A;
            --accent-sage: #7A9E7E;
            --accent-sand: #D4C5A9;
            --font-family: 'Inter', sans-serif;
            --container-width: 1200px;
            --gutter: 24px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: var(--font-family);
            background-color: var(--bg-color);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
            letter-spacing: -0.02em;
            color: var(--text-main);
        }

        h1 { font-size: 64px; line-height: 1.1; }
        h2 { font-size: 40px; line-height: 1.2; }
        h3 { font-size: 24px; line-height: 1.3; font-weight: 500; }
        
        p, span, li, a {
            font-size: 16px;
            line-height: 1.7;
            font-weight: 300;
            color: var(--text-secondary);
            text-decoration: none;
        }

        .container {
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 var(--gutter);
        }

        .grid-12 {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: var(--gutter);
        }

        section { padding: 100px 0; }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 28px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 4px;
            transition: transform 0.2s ease-out, background-color 0.2s ease-out;
            border: 1px solid transparent;
        }

        .btn-primary {
            background-color: var(--text-main);
            color: var(--surface-color);
        }

        .btn-primary:hover { transform: translateY(-2px); }

        .btn-ghost {
            background-color: transparent;
            color: var(--text-main);
            border: 1px solid var(--text-main);
        }

        .btn-ghost:hover {
            background-color: var(--text-main);
            color: var(--surface-color);
        }

        /* Header */
        .top-bar {
            background-color: var(--bg-color);
            border-bottom: 1px solid var(--border-color);
            padding: 8px 0;
        }
        
        .top-bar .container {
            display: flex;
            justify-content: space-between;
        }

        .top-bar p { font-size: 12px; }

        .main-header {
            background-color: rgba(245, 244, 240, 0.98);
            border-bottom: 1px solid var(--border-color);
            padding: 24px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .main-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo { font-size: 24px; font-weight: 500; color: var(--text-main); letter-spacing: -0.04em; }

        .search-bar {
            flex: 1;
            max-width: 400px;
            position: relative;
            margin: 0 40px;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-family: var(--font-family);
            font-weight: 300;
            font-size: 14px;
            color: var(--text-main);
        }

        .search-bar input:focus { outline: none; border-color: var(--text-secondary); }
        .search-bar i {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: var(--text-secondary); font-size: 18px;
        }

        .nav-links { display: flex; gap: 32px; }
        .nav-links a { color: var(--text-main); font-weight: 400; font-size: 14px; }
        .nav-links a:hover { color: var(--text-secondary); text-decoration: underline; text-underline-offset: 4px; }
        .nav-links a.active { font-weight: 500; text-decoration: underline; text-underline-offset: 4px; }

        .header-actions { display: flex; gap: 20px; }
        .header-actions i { font-size: 22px; color: var(--text-main); cursor: pointer; }

        /* Catalog Page Specific */
        .page-header {
            padding: 80px 0 60px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .breadcrumb { font-size: 12px; margin-bottom: 24px; }
        .breadcrumb a { font-size: 12px; }
        .breadcrumb span { font-size: 12px; margin: 0 8px; }

        .page-header-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .page-title { max-width: 600px; }

        .organic-accent { width: 120px; height: 120px; opacity: 0.8; }

        .shop-layout { padding: 60px 0 120px 0; }

        .sidebar { grid-column: span 3; padding-right: 24px; }
        .filter-group { margin-bottom: 40px; }
        .filter-group h3 { font-size: 16px; font-weight: 500; margin-bottom: 16px; }
        .filter-list { list-style: none; }
        .filter-list li { margin-bottom: 12px; }

        .checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            color: var(--text-secondary);
        }
        .checkbox-label:hover { color: var(--text-main); }
        .checkbox-label input { position: absolute; opacity: 0; }
        .checkmark {
            height: 14px; width: 14px; border: 1px solid var(--border-color);
            border-radius: 2px; margin-right: 12px; background: var(--surface-color);
        }
        .checkbox-label input:checked ~ .checkmark { border-color: var(--text-main); }
        .checkbox-label input:checked ~ .checkmark::after {
            content: ""; display: block; width: 6px; height: 6px;
            background: var(--text-main); border-radius: 1px;
        }

        .products-area { grid-column: span 9; }
        .sorting-bar {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 32px; font-size: 14px;
        }
        .sort-dropdown select {
            background: transparent; border: none; font-family: var(--font-family);
            font-size: 14px; color: var(--text-main); cursor: pointer;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px 24px;
        }

        .product-card {
            display: flex; flex-direction: column; background: transparent;
            border: none; cursor: pointer; position: relative;
        }

        .product-card .image-container {
            height: 360px; background: var(--surface-color);
            border: 1px solid var(--border-color); border-radius: 8px;
            margin-bottom: 16px; overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover .image-container {
            transform: translateY(-2px); box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .quick-add {
            position: absolute; bottom: 80px; right: 16px;
            width: 36px; height: 36px; border-radius: 50%;
            background: var(--surface-color); border: 1px solid var(--border-color);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; transform: translateY(10px); transition: all 0.2s;
        }
        .product-card:hover .quick-add { opacity: 1; transform: translateY(0); }
        .quick-add:hover { background: var(--text-main); color: var(--surface-color); }

        .product-meta { display: flex; justify-content: space-between; }
        .product-card h4 { font-size: 16px; color: var(--text-main); margin-bottom: 4px; }
        .product-card p { font-size: 14px; }
        .product-card .price { font-size: 14px; color: var(--text-main); }

        /* Pagination */
        .pagination {
            display: flex; justify-content: center; align-items: center;
            margin-top: 80px; gap: 16px;
        }
        .pagination a {
            display: flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; font-size: 14px;
        }
        .pagination a.active {
            color: var(--text-main); font-weight: 500;
            border-bottom: 1px solid var(--text-main);
        }
        .pagination-arrow { padding: 0 8px; }

        /* Product Detail Page Specific (from index.html) */
        .product-hero { padding-top: 60px; padding-bottom: 80px; }

        .product-gallery { grid-column: span 7; display: grid; gap: 16px; }
        .main-image { height: 600px; border-radius: 8px; overflow: hidden; background: #EFEFEA; }
        .main-image img { width: 100%; height: 100%; object-fit: cover; }
        .thumbnail-list { display: flex; gap: 16px; }
        .thumbnail {
            width: 80px; height: 100px; border-radius: 4px; cursor: pointer;
            overflow: hidden; background: #EFEFEA;
        }
        .thumbnail img { width: 100%; height: 100%; object-fit: cover; }

        .product-info {
            grid-column: span 5; padding-left: 24px;
            display: flex; flex-direction: column; justify-content: center;
        }

        .product-title { margin-bottom: 16px; }
        .product-price { font-size: 24px; color: var(--text-main); margin-bottom: 24px; }

        .rating { display: flex; align-items: center; gap: 8px; margin-bottom: 32px; }
        .rating i { font-size: 16px; }

        .product-desc { margin-bottom: 40px; }

        .add-to-cart-wrapper { display: flex; gap: 16px; margin-bottom: 24px; }
        .qty-selector {
            display: flex; align-items: center; border: 1px solid var(--border-color);
            border-radius: 4px; padding: 0 16px;
        }
        .qty-selector button {
            background: none; border: none; font-size: 18px; cursor: pointer;
            color: var(--text-main); padding: 8px 0;
        }
        .qty-selector span { margin: 0 20px; color: var(--text-main); }
        .btn-add { flex: 1; }

        .stock-status {
            display: flex; align-items: center; gap: 8px; font-size: 14px;
        }
        .stock-status i { color: var(--accent-sage); }

        /* Accordion */
        .product-details { border-top: 1px solid var(--border-color); padding: 80px 0; }
        .accordion { max-width: 800px; margin: 0 auto; }
        .accordion-item { border-bottom: 1px solid var(--border-color); }
        .accordion-header {
            display: flex; justify-content: space-between; align-items: center;
            padding: 24px 0; cursor: pointer; background: none; border: none;
            width: 100%; text-align: left;
        }
        .accordion-header h3 { font-size: 20px; }
        .accordion-content {
            max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out;
        }
        .accordion-content p { padding-bottom: 24px; }

        /* Highlights */
        .visual-info {
            background-color: var(--surface-color);
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }
        .highlight-item { grid-column: span 4; text-align: center; padding: 40px; }
        .sketch-icon { width: 64px; height: 64px; margin: 0 auto 24px; }
        .highlight-item h3 { font-size: 18px; margin-bottom: 12px; }

        /* Reviews */
        .reviews { background-color: var(--bg-color); }
        .review-header {
            display: flex; justify-content: space-between; align-items: flex-end;
            margin-bottom: 60px;
        }
        .review-list { display: grid; gap: 32px; }
        .review-item { border-bottom: 1px solid var(--border-color); padding-bottom: 32px; }
        .review-meta { display: flex; justify-content: space-between; margin-bottom: 16px; }
        .review-author { color: var(--text-main); font-weight: 500; }
        .review-date { font-size: 14px; }

        /* Related Products */
        .section-header { margin-bottom: 48px; }
        .product-grid {
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;
        }
        .product-grid .product-card .image-container { height: 300px; }

        /* Footer */
        footer {
            background-color: var(--surface-color);
            border-top: 1px solid var(--border-color);
            padding: 80px 0 40px;
        }
        .footer-grid {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px; margin-bottom: 80px;
        }
        .footer-col h5 { font-size: 14px; font-weight: 500; margin-bottom: 24px; }
        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 12px; }
        .footer-col a { font-size: 14px; transition: color 0.2s; }
        .footer-col a:hover { color: var(--text-main); }
        .newsletter-form { display: flex; margin-top: 16px; gap: 8px; }
        .newsletter-form input {
            flex: 1; padding: 12px; border: 1px solid var(--border-color);
            background: transparent; border-radius: 4px; font-size: 14px;
        }
        .bottom-line {
            border-top: 1px solid var(--border-color); padding-top: 32px;
            display: flex; justify-content: space-between;
        }
        .social-links { display: flex; gap: 16px; }
        .social-links i { font-size: 20px; color: var(--text-main); }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar { grid-column: span 12; }
            .products-area { grid-column: span 12; }
            .products-grid { grid-template-columns: repeat(2, 1fr); }
            .product-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) {
            h1 { font-size: 40px; }
            .grid-12 { grid-template-columns: 1fr; }
            .product-gallery, .product-info { grid-column: span 1; padding-left: 0; }
            .products-grid, .product-grid { grid-template-columns: 1fr; }
            .page-header-content { flex-direction: column; align-items: flex-start; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="top-bar">
        <div class="container">
            <div style="display: flex; gap: 16px;">
                <p>EN / USD</p>
                <p>Need help? +1 800 123 4567</p>
            </div>
            <p>Complimentary shipping on orders over $300</p>
        </div>
    </div>

    <header class="main-header">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">Aura.</a>
            
            <nav class="nav-links">
                <a href="{{ route('shop.catalog') }}">Men</a>
                <a href="{{ route('shop.catalog') }}">Women</a>
                <a href="{{ route('shop.catalog') }}" class="{{ request()->routeIs('shop.catalog') ? 'active' : '' }}">Objects</a>
                <a href="#">Editorial</a>
            </nav>

            <div class="search-bar">
                <i class="iconoir-search"></i>
                <input type="text" placeholder="Search catalog..." name="search" form="search-form">
            </div>

            <div class="header-actions">
                @auth
                    <a href="{{ route('profile.edit') }}"><i class="iconoir-user"></i></a>
                    <a href="{{ route('cart.index') }}"><i class="iconoir-shopping-bag"></i></a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; cursor:pointer; padding:0;">
                            <i class="iconoir-log-out"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"><i class="iconoir-user"></i></a>
                    <a href="{{ route('cart.index') }}"><i class="iconoir-shopping-bag"></i></a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h5>Aura Journal</h5>
                    <p style="font-size: 14px; margin-bottom: 16px;">Subscribe to our irregular dispatches on design, architecture, and slow living.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Email address">
                        <button type="button" class="btn btn-ghost" style="padding: 10px 16px;">Join</button>
                    </form>
                </div>
                <div class="footer-col">
                    <h5>Shop</h5>
                    <ul>
                        <li><a href="#">New arrivals</a></li>
                        <li><a href="#">Objects</a></li>
                        <li><a href="#">Textiles</a></li>
                        <li><a href="#">Furniture</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Assistance</h5>
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shipping & returns</a></li>
                        <li><a href="#">Care guide</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Studio</h5>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Journal</a></li>
                        <li><a href="#">Stockists</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom-line">
                <p style="font-size: 12px;">© {{ date('Y') }} Aura Studio. All rights reserved.</p>
                <div class="social-links">
                    <a href="#"><i class="iconoir-instagram"></i></a>
                    <a href="#"><i class="iconoir-pinterest"></i></a>
                    <a href="#"><i class="iconoir-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>