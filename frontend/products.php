<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - BlueStore</title>
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

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* Table Styles */
        .table-container {
            background: var(--bg-light);
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        [data-theme="dark"] .table-container {
            background: var(--bg-gray);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: var(--primary-blue);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        }

        tr:hover {
            background: var(--bg-gray);
        }

        [data-theme="dark"] tr:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        tr:last-child td {
            border-bottom: none;
        }

        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-in-stock {
            background: #10b981;
            color: white;
        }

        .badge-low-stock {
            background: #f59e0b;
            color: white;
        }

        .badge-out-of-stock {
            background: #ef4444;
            color: white;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-view {
            background: var(--primary-blue);
            color: white;
        }

        .btn-view:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
        }

        .btn-edit {
            background: #10b981;
            color: white;
        }

        .btn-edit:hover {
            background: #059669;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 5px;
        }

        /* Responsive Table */
        @media (max-width: 1024px) {
            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }

        /* Filter Section */
        .filter-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-blue);
            background: transparent;
            color: var(--primary-blue);
        }

        .filter-btn.active {
            background: var(--primary-blue);
            color: white;
        }

        .filter-btn:hover {
            background: var(--primary-blue);
            color: white;
        }

        .search-input {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 2px solid transparent;
            background: var(--bg-gray);
            color: var(--text-light);
            transition: all 0.3s ease;
            width: 100%;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        nav {
            background: var(--bg-light);
            border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        }

        [data-theme="dark"] nav {
            background: var(--bg-gray);
        }
    </style>
</head>
<body>
    <!-- Simple Navigation -->
    <nav class="sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: var(--primary-blue)">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold font-display">BlueStore</span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="index.php" class="hover:text-blue-600 transition font-semibold">← Back to Home</a>
                    <button id="themeToggle" class="p-2 hover:bg-gray-100 rounded-lg transition" onclick="toggleTheme()">
                        <svg id="sunIcon" class="w-6 h-6" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moonIcon" class="w-6 h-6 hidden" style="color: var(--text-gray)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Products Section -->
    <section class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Product Catalog</h1>
            <p class="text-lg" style="color: var(--text-gray)">Manage and view all products</p>
        </div>

        <!-- Filters and Search -->
        <div class="mb-8 space-y-4">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex flex-wrap gap-2">
                    <button class="filter-btn active" onclick="filterProducts('all')">All Products</button>
                    <button class="filter-btn" onclick="filterProducts('in-stock')">In Stock</button>
                    <button class="filter-btn" onclick="filterProducts('low-stock')">Low Stock</button>
                    <button class="filter-btn" onclick="filterProducts('out-of-stock')">Out of Stock</button>
                </div>
                <div class="w-full md:w-auto md:min-w-[300px]">
                    <input type="text" class="search-input" placeholder="Search products..." id="searchInput" onkeyup="searchProducts()">
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="table-container">
            <div style="overflow-x: auto;">
                <table id="productsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product 1 -->
                        <tr data-category="in-stock">
                            <td>#001</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Classic White Sneakers</div>
                                <div class="text-sm" style="color: var(--text-gray)">Premium comfort footwear</div>
                            </td>
                            <td>Footwear</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$89.99</div>
                            </td>
                            <td>245</td>
                            <td><span class="badge badge-in-stock">In Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★★</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(128)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 2 -->
                        <tr data-category="in-stock">
                            <td>#002</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Elegant Summer Dress</div>
                                <div class="text-sm" style="color: var(--text-gray)">Lightweight and stylish</div>
                            </td>
                            <td>Women's Clothing</td>
                            <td>
                                <div>
                                    <span class="line-through text-sm" style="color: var(--text-gray)">$129.99</span>
                                    <span class="font-bold ml-1" style="color: var(--primary-blue)">$90.99</span>
                                </div>
                            </td>
                            <td>87</td>
                            <td><span class="badge badge-in-stock">In Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★☆</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(95)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 3 -->
                        <tr data-category="in-stock">
                            <td>#003</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Premium Backpack</div>
                                <div class="text-sm" style="color: var(--text-gray)">Durable and spacious</div>
                            </td>
                            <td>Accessories</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$149.99</div>
                            </td>
                            <td>156</td>
                            <td><span class="badge badge-in-stock">In Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★★</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(203)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 4 -->
                        <tr data-category="low-stock">
                            <td>#004</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1585155770787-cb3c8e4b3a5b?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Designer Sunglasses</div>
                                <div class="text-sm" style="color: var(--text-gray)">UV protection included</div>
                            </td>
                            <td>Accessories</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$199.99</div>
                            </td>
                            <td>12</td>
                            <td><span class="badge badge-low-stock">Low Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★☆</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(76)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 5 -->
                        <tr data-category="in-stock">
                            <td>#005</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1562183241-b937e95585b6?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Leather Wallet</div>
                                <div class="text-sm" style="color: var(--text-gray)">Genuine leather material</div>
                            </td>
                            <td>Accessories</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$49.99</div>
                            </td>
                            <td>324</td>
                            <td><span class="badge badge-in-stock">In Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★★</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(412)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 6 -->
                        <tr data-category="out-of-stock">
                            <td>#006</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Smart Watch Pro</div>
                                <div class="text-sm" style="color: var(--text-gray)">Advanced fitness tracking</div>
                            </td>
                            <td>Electronics</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$299.99</div>
                            </td>
                            <td>0</td>
                            <td><span class="badge badge-out-of-stock">Out of Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★★</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(567)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 7 -->
                        <tr data-category="in-stock">
                            <td>#007</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Running Shoes Elite</div>
                                <div class="text-sm" style="color: var(--text-gray)">Lightweight performance</div>
                            </td>
                            <td>Footwear</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$129.99</div>
                            </td>
                            <td>198</td>
                            <td><span class="badge badge-in-stock">In Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★☆</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(289)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Product 8 -->
                        <tr data-category="low-stock">
                            <td>#008</td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1588117305388-c2631a279f82?w=80&h=80&fit=crop" alt="Product" class="product-img">
                            </td>
                            <td>
                                <div class="font-semibold">Denim Jacket</div>
                                <div class="text-sm" style="color: var(--text-gray)">Classic vintage style</div>
                            </td>
                            <td>Men's Clothing</td>
                            <td>
                                <div class="font-bold" style="color: var(--primary-blue)">$79.99</div>
                            </td>
                            <td>8</td>
                            <td><span class="badge badge-low-stock">Low Stock</span></td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <span style="color: #fbbf24;">★★★★★</span>
                                    <span class="text-sm" style="color: var(--text-gray)">(156)</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center items-center gap-2">
            <button class="px-4 py-2 rounded-lg border-2 font-semibold transition" style="border-color: var(--primary-blue); color: var(--primary-blue)" onmouseover="this.style.background='var(--primary-blue)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-blue)'">Previous</button>
            <button class="px-4 py-2 rounded-lg font-semibold text-white" style="background: var(--primary-blue)">1</button>
            <button class="px-4 py-2 rounded-lg border-2 font-semibold transition" style="border-color: var(--primary-blue); color: var(--primary-blue)" onmouseover="this.style.background='var(--primary-blue)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-blue)'">2</button>
            <button class="px-4 py-2 rounded-lg border-2 font-semibold transition" style="border-color: var(--primary-blue); color: var(--primary-blue)" onmouseover="this.style.background='var(--primary-blue)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-blue)'">3</button>
            <button class="px-4 py-2 rounded-lg border-2 font-semibold transition" style="border-color: var(--primary-blue); color: var(--primary-blue)" onmouseover="this.style.background='var(--primary-blue)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-blue)'">Next</button>
        </div>
    </section>

    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            document.getElementById('sunIcon').classList.toggle('hidden');
            document.getElementById('moonIcon').classList.toggle('hidden');
        }

        // Load saved theme
        window.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            
            if (savedTheme === 'dark') {
                document.getElementById('sunIcon').classList.add('hidden');
                document.getElementById('moonIcon').classList.remove('hidden');
            }
        });

        // Filter Products
        function filterProducts(category) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            const rows = document.querySelectorAll('#productsTable tbody tr');
            rows.forEach(row => {
                if (category === 'all') {
                    row.style.display = '';
                } else {
                    if (row.getAttribute('data-category') === category) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }

        // Search Products
        function searchProducts() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#productsTable tbody tr');

            rows.forEach(row => {
                const productName = row.cells[2].textContent.toLowerCase();
                const category = row.cells[3].textContent.toLowerCase();
                
                if (productName.includes(input) || category.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Action Buttons
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const productName = row.cells[2].querySelector('.font-semibold').textContent;
                alert('View product: ' + productName);
            });
        });

        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const productName = row.cells[2].querySelector('.font-semibold').textContent;
                alert('Edit product: ' + productName);
            });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const productName = row.cells[2].querySelector('.font-semibold').textContent;
                if (confirm('Are you sure you want to delete: ' + productName + '?')) {
                    row.remove();
                }
            });
        });
    </script>
</body>
</html>
