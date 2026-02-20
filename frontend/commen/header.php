<?php 
    require_once  "./commen/conn.php";
  $pagename=basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PATEL MART - Premium E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1e40af;
            --accent-blue: #60a5fa;
            --bg-light: #ffffff;
            --bg-gray: #f8fafc;
            --text-light: #0f172a;
            --text-gray: #64748b;
        }

        [data-theme="dark"] {
            --primary-blue: #3b82f6;
            --primary-blue-dark: #2563eb;
            --accent-blue: #93c5fd;
            --bg-light: #0f172a;
            --bg-gray: #1e293b;
            --text-light: #f1f5f9;
            --text-gray: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-blue-dark);
        }

        /* Carousel Styles */
        .carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            min-width: 100%;
            position: relative;
        }

        .carousel-slide img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 1rem;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        [data-theme="dark"] .carousel-btn {
            background: rgba(30, 41, 59, 0.9);
            color: #f1f5f9;
        }

        .carousel-btn:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-btn.prev {
            left: 20px;
        }

        .carousel-btn.next {
            right: 20px;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .carousel-indicator.active {
            background: var(--primary-blue);
            border-color: white;
            transform: scale(1.2);
        }

        /* Product Card Animations */
        .product-card {
            transition: all 0.3s ease;
            background: var(--bg-light);
            border: 1px solid transparent;
        }

        [data-theme="dark"] .product-card {
            background: var(--bg-gray);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.15);
            border-color: var(--primary-blue);
        }

        .product-card img {
            transition: transform 0.5s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        /* Button Styles */
        .btn-primary {
            background: var(--primary-blue);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-blue);
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-blue);
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 50%, #3b82f6 100%);
        }

        [data-theme="dark"] .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #2563eb 100%);
        }

        /* Category Cards */
        .category-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.7) 100%);
            z-index: 1;
            transition: all 0.3s ease;
        }

        .category-card:hover::before {
            background: linear-gradient(180deg, transparent 0%, rgba(37, 99, 235, 0.8) 100%);
        }

        .category-card img {
            transition: transform 0.5s ease;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }

        .category-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            z-index: 2;
            color: white;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-new {
            background: #10b981;
            color: white;
        }

        .badge-sale {
            background: #ef4444;
            color: white;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Navigation */
        nav {
            background: var(--bg-light);
            border-bottom: 1px solid rgba(100, 116, 139, 0.1);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] nav {
            background: var(--bg-gray);
        }

        /* Footer */
        footer {
            background: var(--bg-gray);
            border-top: 1px solid rgba(100, 116, 139, 0.1);
        }

        /* Search Bar */
        .search-bar {
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem 3rem 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 2px solid transparent;
            background: var(--bg-gray);
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-bar button {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-bar button:hover {
            background: var(--primary-blue-dark);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 400px;
            height: 100vh;
            background: var(--bg-light);
            box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 2rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Rating Stars */
        .rating {
            color: #fbbf24;
        }

        /* Product Image Carousel */
        .product-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .product-carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .product-carousel-slide {
            min-width: 100%;
        }

        .product-carousel-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .product-carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
        }

        .product-carousel-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-carousel-indicator.active {
            background: white;
            width: 24px;
            border-radius: 4px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .carousel-slide img {
                height: 300px;
            }
            
            .carousel-btn {
                width: 40px;
                height: 40px;
            }
        }


         /* Product Card */
        .product-card {
            transition: all 0.3s ease;
            background: var(--bg-light);
            border: 1px solid transparent;
        }

        [data-theme="dark"] .product-card {
            background: var(--bg-gray);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.15);
            border-color: var(--primary-blue);
        }

        .product-card img {
            transition: transform 0.5s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        /* Product Image Carousel */
        .product-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .product-carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .product-carousel-slide {
            min-width: 100%;
        }

        .product-carousel-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .product-carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .product-carousel-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-carousel-indicator.active {
            background: white;
            width: 24px;
            border-radius: 4px;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-new {
            background: #10b981;
            color: white;
        }

        .badge-sale {
            background: #ef4444;
            color: white;
        }

        .badge-hot {
            background: #f59e0b;
            color: white;
        }

        /* Button Styles */
        .btn-primary {
            background: var(--primary-blue);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }

        /* Rating Stars */
        .rating {
            color: #fbbf24;
        }

        /* Sidebar */
        .sidebar {
            background: var(--bg-light);
            border-radius: 1rem;
            padding: 1.5rem;
        }

        [data-theme="dark"] .sidebar {
            background: var(--bg-gray);
        }

        .filter-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        }

        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
            cursor: pointer;
        }

        .checkbox-custom input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-blue);
        }

        .checkbox-custom:hover {
            color: var(--primary-blue);
        }

        /* Price Range Slider */
        .price-range {
            margin-top: 1rem;
        }

        input[type="range"] {
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: var(--bg-gray);
            outline: none;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--primary-blue);
            cursor: pointer;
        }

        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--primary-blue);
            cursor: pointer;
        }

        /* Sort Dropdown */
        .sort-select {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 2px solid transparent;
            background: var(--bg-gray);
            color: var(--text-light);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .sort-select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* View Toggle Buttons */
        .view-toggle {
            display: flex;
            gap: 0.5rem;
            padding: 0.25rem;
            background: var(--bg-gray);
            border-radius: 0.5rem;
        }

        .view-btn {
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            background: transparent;
            color: var(--text-gray);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: var(--primary-blue);
            color: white;
        }

        .view-btn:hover {
            color: var(--primary-blue);
        }

        .view-btn.active:hover {
            color: white;
        }

        /* Mobile Sidebar */
        .mobile-sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            max-width: 400px;
            height: 100vh;
            background: var(--bg-light);
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease;
            z-index: 1000;
            padding: 2rem;
            overflow-y: auto;
        }

        .mobile-sidebar.active {
            left: 0;
        }

        .mobile-sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-gray);
            margin-bottom: 2rem;
        }

        .breadcrumb a {
            color: var(--text-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: var(--primary-blue);
        }

        /* List View */
        .product-list-view {
            display: flex;
            gap: 2rem;
            padding: 1.5rem;
            background: var(--bg-light);
            border-radius: 1rem;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }

        [data-theme="dark"] .product-list-view {
            background: var(--bg-gray);
        }

        .product-list-view:hover {
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.15);
            border-color: var(--primary-blue);
        }

        .product-list-view img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 0.5rem;
            flex-shrink: 0;
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 400px;
            height: 100vh;
            background: var(--bg-light);
            box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 2rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
     /* ── Buttons ── */
        .btn-primary {
            background: var(--primary-blue);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }
        .btn-primary:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37,99,235,0.3);
        }
        .btn-secondary {
            background: transparent;
            color: var(--primary-blue);
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-blue);
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        /* ── Mobile Menu ── */
        .mobile-menu {
            position: fixed; top: 0; right: -100%;
            width: 80%; max-width: 400px; height: 100vh;
            background: var(--bg-light);
            box-shadow: -5px 0 20px rgba(0,0,0,0.1);
            transition: right 0.3s ease; z-index: 1000;
            padding: 2rem; overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }
        .mobile-menu-overlay {
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            opacity: 0; visibility: hidden;
            transition: all 0.3s ease; z-index: 999;
        }
        .mobile-menu-overlay.active { opacity: 1; visibility: visible; }

        /* ── Search Bar ── */
        .search-bar { position: relative; }
        .search-bar input {
            width: 100%; padding: 0.75rem 3rem 0.75rem 1rem;
            border-radius: 0.5rem; border: 2px solid transparent;
            background: var(--bg-gray); color: var(--text-light);
            transition: all 0.3s ease;
        }
        .search-bar input:focus {
            outline: none; border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }
        .search-bar button {
            position: absolute; right: 0.5rem; top: 50%; transform: translateY(-50%);
            background: var(--primary-blue); color: white; border: none;
            border-radius: 0.375rem; padding: 0.5rem 1rem; cursor: pointer;
            transition: all 0.3s ease;
        }
        .search-bar button:hover { background: var(--primary-blue-dark); }

        /* ── Breadcrumb ── */
        .breadcrumb {
            display: flex; align-items: center; gap: 0.5rem;
            color: var(--text-gray); margin-bottom: 2rem;
        }
        .breadcrumb a { color: var(--text-gray); text-decoration: none; transition: color 0.3s ease; }
        .breadcrumb a:hover { color: var(--primary-blue); }

        /* ── Hero Banner ── */
        .category-hero {
            position: relative;
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
            overflow: hidden;
            padding: 5rem 0;
        }
        .category-hero::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .category-hero::after {
            content: '';
            position: absolute; bottom: -2px; left: 0; right: 0; height: 60px;
            background: var(--bg-light);
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        [data-theme="dark"] .category-hero::after { background: var(--bg-light); }

        /* ── Category Grid Cards ── */
        .cat-card {
            position: relative;
            border-radius: 1.25rem;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            aspect-ratio: 4/3;
        }
        .cat-card::before {
            content: '';
            position: absolute; inset: 0; z-index: 1;
            background: linear-gradient(180deg, rgba(0,0,0,0) 20%, rgba(0,0,0,0.75) 100%);
            transition: all 0.4s ease;
        }
        .cat-card:hover { transform: translateY(-10px); box-shadow: 0 25px 50px rgba(37,99,235,0.2); }
        .cat-card:hover::before { background: linear-gradient(180deg, rgba(37,99,235,0.1) 0%, rgba(30,64,175,0.85) 100%); }
        .cat-card img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.6s ease;
        }
        .cat-card:hover img { transform: scale(1.08); }
        .cat-card-body {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 1.75rem; z-index: 2; color: white;
            transform: translateY(0); transition: all 0.4s ease;
        }
        .cat-card-title { font-size: 1.35rem; font-weight: 700; margin-bottom: 0.3rem; }
        .cat-card-sub { font-size: 0.85rem; opacity: 0.8; margin-bottom: 0.75rem; }
        .cat-card-cta {
            display: inline-flex; align-items: center; gap: 0.4rem;
            font-size: 0.85rem; font-weight: 600;
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(8px);
            padding: 0.45rem 1rem; border-radius: 2rem;
            border: 1px solid rgba(255,255,255,0.25);
            opacity: 0; transform: translateY(10px);
            transition: all 0.35s ease;
        }
        .cat-card:hover .cat-card-cta { opacity: 1; transform: translateY(0); }
        .cat-card-badge {
            position: absolute; top: 1rem; right: 1rem; z-index: 3;
            background: var(--primary-blue); color: white;
            font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.5px; padding: 0.3rem 0.75rem; border-radius: 2rem;
        }
        .cat-card-badge.hot { background: #ef4444; }
        .cat-card-badge.sale { background: #f59e0b; }
        .cat-card-badge.new { background: #10b981; }

        /* ── Featured / Large Card ── */
        .cat-card-large { aspect-ratio: unset; height: 100%; min-height: 380px; }

        /* ── Stats Bar ── */
        .stats-bar {
            background: var(--bg-gray);
            border-radius: 1rem;
            padding: 1.5rem 2rem;
            display: flex; align-items: center;
            gap: 0; flex-wrap: wrap;
        }
        .stat-item {
            flex: 1; text-align: center;
            padding: 0.5rem 1rem;
            position: relative;
        }
        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute; right: 0; top: 20%; bottom: 20%;
            width: 1px; background: rgba(100,116,139,0.2);
        }
        .stat-number { font-size: 1.75rem; font-weight: 800; color: var(--primary-blue); }
        .stat-label { font-size: 0.8rem; color: var(--text-gray); margin-top: 0.2rem; }

        /* ── Trending Tags ── */
        .tag-pill {
            display: inline-flex; align-items: center; gap: 0.35rem;
            padding: 0.5rem 1.1rem; border-radius: 2rem; font-size: 0.85rem;
            font-weight: 500; cursor: pointer; transition: all 0.3s ease;
            background: var(--bg-gray); color: var(--text-gray);
            border: 2px solid transparent;
            text-decoration: none;
        }
        .tag-pill:hover, .tag-pill.active {
            background: var(--primary-blue); color: white;
            border-color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(37,99,235,0.25);
        }

        /* ── Featured Brands ── */
        .brand-logo {
            display: flex; align-items: center; justify-content: center;
            padding: 1.25rem; border-radius: 0.75rem;
            background: var(--bg-gray); transition: all 0.3s ease;
            cursor: pointer; border: 2px solid transparent;
        }
        .brand-logo:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 8px 20px rgba(37,99,235,0.12);
        }

        /* ── Seasonal Banner ── */
        .seasonal-banner {
            border-radius: 1.25rem; overflow: hidden;
            position: relative; padding: 2.5rem;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
            color: white;
        }
        .seasonal-banner::before {
            content: '';
            position: absolute; top: -30px; right: -30px;
            width: 200px; height: 200px; border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .seasonal-banner::after {
            content: '';
            position: absolute; bottom: -50px; right: 80px;
            width: 150px; height: 150px; border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        /* ── Animations ── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease forwards; }
        .animate-slide-left  { animation: slideInLeft 0.6s ease forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }

        /* ── Footer ── */
        footer { background: var(--bg-gray); border-top: 1px solid rgba(100,116,139,0.1); }

        /* ── Rating ── */
        .rating { color: #fbbf24; }

        /* ── Badge ── */
        .badge {
            display: inline-block; padding: 0.25rem 0.75rem;
            border-radius: 9999px; font-size: 0.75rem;
            font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;
        }
        .badge-new  { background: #10b981; color: white; }
        .badge-sale { background: #ef4444; color: white; }
        .badge-hot  { background: #f59e0b; color: white; }

        /* ── Section Title ── */
        .section-title { position: relative; display: inline-block; }
        .section-title::after {
            content: '';
            position: absolute; bottom: -8px; left: 0;
            width: 60px; height: 4px; border-radius: 2px;
            background: var(--primary-blue);
        }

        @media (max-width: 768px) {
            .cat-card-large { min-height: 260px; }
            .stat-number { font-size: 1.3rem; }
        }


    </style>
</head>
<body>
    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="toggleMobileMenu()"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Menu</h2>
            <button onclick="toggleMobileMenu()" class="text-3xl">&times;</button>
        </div>
        <nav class="flex flex-col gap-4">
            <a href="./index.php" class="<?php echo $pagename=='index.php'?"active":"" ?>" class="text-lg font-semibold py-2">Home</a>
            <a href="./shop.php" class="<?php echo $pagename=='shop.php'?"active":"" ?>" class="text-lg py-2" style="color: var(--text-gray)">Shop</a>
            <a href="./category.php" class="<?php echo $pagename=='category.php'?"active":"" ?>" class="text-lg py-2" style="color: var(--text-gray)">Categories</a>
            <!-- <a href="#" class="text-lg py-2" style="color: var(--text-gray)">Deals</a> -->
            <!-- <a href="#" class="text-lg py-2" style="color: var(--text-gray)">About</a> -->
            <!-- <a href="#" class="text-lg py-2" style="color: var(--text-gray)">Contact</a> -->
        </nav>
    </div>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50" id="navbar">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary-blue)">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold font-display">PATEL MART</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="index.php" class="<?php echo $pagename=='index.php'?"active":"" ?>" class="font-semibold hover:text-blue-600 transition">Home</a>
                    <a href="shop.php" class="<?php echo $pagename=='shop.php'?"active":"" ?>" class="hover:text-blue-600 transition" style="color: var(--text-gray)">Shop</a>
                     <a href="./category.php" class="<?php echo $pagename=='category.php'?"active":"" ?>"  class="hover:text-blue-600 transition" style="color: var(--text-gray)">Categories</a>
                    <!-- <a href="deals.php" class="hover:text-blue-600 transition" style="color: var(--text-gray)">Deals</a> -->
                    <!-- <a href="#" class="hover:text-blue-600 transition" style="color: var(--text-gray)">About</a>  -->
                </div>

                <!-- Right Side Icons -->
                <div class="flex items-center gap-4">
                    <!-- Search Icon (Desktop) -->
                    <button class="hidden md:block p-2 hover:bg-gray-100 rounded-lg transition" onclick="toggleSearch()">
                        <svg class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <button id="themeToggle" class="p-2 hover:bg-gray-100 rounded-lg transition" onclick="toggleTheme()">
                        <svg id="sunIcon" class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moonIcon" class="w-6 h-6 hidden" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>

                    <!-- Cart -->
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition relative">
                        <svg class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs text-white font-bold" style="background: var(--primary-blue)">3</span>
                    </button>

                    <!-- User Account -->
                    <button class="hidden md:block p-2 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Search Bar (Desktop) -->
            <div id="searchBar" class="hidden mt-4 search-bar animate-fade-in-up">
                <input type="text" placeholder="Search for products..." />
                <button>Search</button>
            </div>
        </div>
    </nav>
    
