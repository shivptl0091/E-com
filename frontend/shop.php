<?php

require_once "./commen/header.php";

$product_where = "";

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $product_where = " WHERE categoryname IN (" . implode(',', $category) . ")";
}
$brand_where = "";

if (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
    $brand_where = " WHERE Brandname IN (" . implode(',', $brand) . ")";
}



?>
<div class="text-end me-5 mt-5 my-5">
    <a href="./shop.php" class="btn-primary py-2 px-4">Refresh</a>
</div>
<!-- Breadcrumb -->
<div class="container mx-auto px-4 py-6">
    <div class="breadcrumb">
        <a href="index.php">Home</a>
        <span>→</span>
        <span style="color: var(--text-light); font-weight: 600;">Shop</span>
    </div>
</div>

<!-- Main Shop Section -->
<section class="container mx-auto px-4 pb-16">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Desktop Sidebar -->
        <form method="GET" action="shop.php" class="hidden lg:block sidebar">
            <div class="filter-section">
                <h3 class="font-bold text-lg mb-4">Categories</h3>
                <div class="space-y-2">
                    <?php
                    $where = "";
                    if (isset($_GET['search'])) {
                        $search = trim($_GET['search']);
                        $where = "where `categoryname` LIKE '%$search%' OR `price` LIKE '%$search%' ";
                    }

                    $categories_data =  $db->getdata("categories", 0, 0, $where);
                    foreach ($categories_data as $categories) {

                        $checked = "";

                        if (isset($_GET['category'])) {
                            $category = $_GET['category'];

                            if (in_array($categories['id'], $category)) {

                                $checked = "checked";
                            }
                        }

                        echo ' <label class="checkbox-custom">
                        <input type="checkbox" name="category[]" value="' . $categories['id'] . '"  onchange="filterProducts()" '.$checked .'>
                        <span> ' . $categories['categoryname'] . '<span style="color: var(--text-gray)"></span></span>
                    </label>';
                    }
                    ?>
                </div>
            </div>

            <!-- Desktop Sidebar -->
            <form method="GET" action="shop.php" class="hidden lg:block sidebar">
                <div class="filter-section">
                    <h3 class="font-bold text-lg mb-4">Brandname</h3>
                    <div class="space-y-2">
                        <?php
                        $where = "";
                        if (isset($_GET['search'])) {
                            $search = trim($_GET['search']);
                            $where = "where `Brandname` LIKE '%$search%' ` ";
                        }

                        $brand_data =  $db->getdata("brand", 0, 0, $brand_where);
                        foreach ($brand_data as $brand) {
                             $checked = "";

                        if (isset($_GET['brand'])) {
                            $brand = $_GET['brand'];

                            if (in_array($brand['id'], $brand)) {

                                $checked = "checked";
                            }
                        }

                            echo ' <label class="checkbox-custom">
                        <input type="checkbox" name="brand[]" value="' . $brand['id'] . '"  onchange="filterProducts()"'.$checked .'>
                        <span> ' . $brand['Brandname'] . '<span style="color: var(--text-gray)"></span></span>
                    </label>';
                        }
                        ?>
                    </div>
                </div>

                <div class="filter-section">
                    <h3 class="font-bold text-lg mb-4">Price Range</h3>
                    <div class="price-range">
                        <input type="range" min="0" max="500" value="250" id="priceRange" oninput="updatePriceLabel()">
                        <div class="flex justify-between mt-2" style="color: var(--text-gray)">
                            <span>$0</span>
                            <span id="priceValue" style="color: var(--primary-blue); font-weight: 600;">$250</span>
                            <span>$500</span>
                        </div>
                    </div>
                </div>

                <!-- <div class="filter-section">
                <h3 class="font-bold text-lg mb-4">Rating</h3>
                <div class="space-y-2">
                    <label class="checkbox-custom">
                        <input type="checkbox" name="rating" value="5" onchange="filterProducts()">
                        <span class="flex items-center gap-2">
                            <span class="rating">★★★★★</span>
                            <span style="color: var(--text-gray)">(5 stars)</span>
                        </span>
                    </label>
                    <label class="checkbox-custom">
                        <input type="checkbox" name="rating" value="4" onchange="filterProducts()">
                        <span class="flex items-center gap-2">
                            <span class="rating">★★★★☆</span>
                            <span style="color: var(--text-gray)">(4+ stars)</span>
                        </span>
                    </label>
                    <label class="checkbox-custom">
                        <input type="checkbox" name="rating" value="3" onchange="filterProducts()">
                        <span class="flex items-center gap-2">
                            <span class="rating">★★★☆☆</span>
                            <span style="color: var(--text-gray)">(3+ stars)</span>
                        </span>
                    </label>
                </div>
            </div> -->

                <div class="filter-section">
                    <h3 class="font-bold text-lg mb-4">Availability</h3>
                    <div class="space-y-2">
                        <label class="checkbox-custom">
                            <input type="checkbox" name="availability" value="in-stock" onchange="filterProducts()">
                            <span>In Stock <span style="color: var(--text-gray)">(20)</span></span>
                        </label>
                        <!-- <label class="checkbox-custom">
                        <input type="checkbox" name="availability" value="on-sale" onchange="filterProducts()">
                        <span>On Sale <span style="color: var(--text-gray)">(6)</span></span>
                    </label> -->
                    </div>
                </div>

                <button class="btn-primary w-full" onclick="resetFilters()">Reset Filters</button>
                <button class="btn-primary w-full mt-2" type="submit">Applly Filters</button>
            </form>

            <!-- Products Section -->
            <div class="lg:col-span-3">
                <!-- Top Bar -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-display font-bold mb-2">All Products</h1>
                        <p style="color: var(--text-gray)">Showing <span id="productCount">24</span> results</p>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
                        <!-- Mobile Filter Button -->
                        <button class="lg:hidden btn-primary flex items-center gap-2" onclick="toggleMobileSidebar()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filters
                        </button>

                        <!-- View Toggle -->
                        <div class="view-toggle">
                            <button class="view-btn active" id="gridViewBtn" onclick="switchView('grid')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </button>
                            <button class="view-btn" id="listViewBtn" onclick="switchView('list')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Sort Dropdown -->
                        <select class="sort-select" onchange="sortProducts(this.value)">
                            <option value="featured">Featured</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="newest">Newest</option>
                            <option value="rating">Top Rated</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    <?php
                    $where = "";
                    if (isset($_GET['search'])) {
                        $search = trim($_GET['search']);
                        $where  = " WHERE `productname` LIKE '%$search%'";
                    }
                    $product_data =  $db->getdata("product", 0, 0, $product_where);

                    foreach ($product_data as $product) {
                        echo '  <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="footwear" data-price="89.99" data-rating="5" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel1">
                                    <div class="product-carousel-slide">
                                       <img src="http://localhost/E-com/Admin_Page/photo/' . $product['photo'] . '" alt="' . $product['photo'] . '">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="http://localhost/E-com/Admin_Page/photo/' . $product['photo'] . '" alt="Product 1">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="http://localhost/E-com/Admin_Page/photo/' . $product['photo'] . '" alt="Product 1">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(1, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(1, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(1, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-new absolute top-4 left-4 z-10">New</span>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">' . $product['productname'] . '</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★★</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(128)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">₹' . $product['price'] . '</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(1)">Add to Cart</button>
                            </div>
                        </div>
                    </div>';
                    }
                    // echo "<pre>";
                    // print_r($product_data);
                    ?>

                    <?php /*
                  <!-- Product 1 -->
                    <!-- Product 2 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="clothing" data-price="90.99" data-rating="4" data-availability="on-sale">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel2">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=400&fit=crop" alt="Product 2">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?w=400&h=400&fit=crop" alt="Product 2">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1522273400909-fd1a8f77637e?w=400&h=400&fit=crop" alt="Product 2">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(2, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(2, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(2, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-sale absolute top-4 left-4 z-10">-30%</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Elegant Summer Dress</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★☆</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(95)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-lg line-through opacity-60" style="color: var(--text-gray)">$129.99</span>
                                    <span class="text-2xl font-bold ml-2" style="color: var(--primary-blue)">$90.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(2)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="accessories" data-price="149.99" data-rating="5" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel3">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop" alt="Product 3">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=400&h=400&fit=crop" alt="Product 3">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400&h=400&fit=crop" alt="Product 3">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(3, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(3, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(3, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-hot absolute top-4 left-4 z-10">Hot</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Premium Backpack</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★★</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(203)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">$149.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(3)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="accessories" data-price="199.99" data-rating="4" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel4">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1585155770787-cb3c8e4b3a5b?w=400&h=400&fit=crop" alt="Product 4">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1603320410149-db26b12d5c2b?w=400&h=400&fit=crop" alt="Product 4">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1594223274512-ad4803739b7c?w=400&h=400&fit=crop" alt="Product 4">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(4, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(4, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(4, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-new absolute top-4 left-4 z-10">New</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Designer Sunglasses</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★☆</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(76)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">$199.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(4)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="accessories" data-price="49.99" data-rating="5" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel5">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1562183241-b937e95585b6?w=400&h=400&fit=crop" alt="Product 5">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?w=400&h=400&fit=crop" alt="Product 5">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1608602300673-6e0e0a091bfd?w=400&h=400&fit=crop" alt="Product 5">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(5, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(5, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(5, 2)"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Leather Wallet</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★★</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(412)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">$49.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(5)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="electronics" data-price="299.99" data-rating="5" data-availability="on-sale">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel6">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&h=400&fit=crop" alt="Product 6">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1544117519-31a4b719223d?w=400&h=400&fit=crop" alt="Product 6">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=400&fit=crop" alt="Product 6">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(6, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(6, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(6, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-sale absolute top-4 left-4 z-10">-20%</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Smart Watch Pro</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★★</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(567)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-lg line-through opacity-60" style="color: var(--text-gray)">$374.99</span>
                                    <span class="text-2xl font-bold ml-2" style="color: var(--primary-blue)">$299.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(6)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="footwear" data-price="129.99" data-rating="4" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel7">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop" alt="Product 7">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400&h=400&fit=crop" alt="Product 7">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=400&h=400&fit=crop" alt="Product 7">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(7, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(7, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(7, 2)"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Running Shoes Elite</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★☆</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(289)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">$129.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(7)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="clothing" data-price="79.99" data-rating="5" data-availability="in-stock">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel8">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1588117305388-c2631a279f82?w=400&h=400&fit=crop" alt="Product 8">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=400&h=400&fit=crop" alt="Product 8">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400&h=400&fit=crop" alt="Product 8">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(8, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(8, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(8, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-hot absolute top-4 left-4 z-10">Hot</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Denim Jacket</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★★</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(156)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold" style="color: var(--primary-blue)">$79.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(8)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 9 -->
                    <div class="product-card rounded-xl overflow-hidden shadow-lg" data-category="clothing" data-price="59.99" data-rating="4" data-availability="on-sale">
                        <div class="relative">
                            <div class="product-carousel">
                                <div class="product-carousel-track" id="productCarousel9">
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=400&h=400&fit=crop" alt="Product 9">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=400&h=400&fit=crop" alt="Product 9">
                                    </div>
                                    <div class="product-carousel-slide">
                                        <img src="https://images.unsplash.com/photo-1618354691229-88d47f285158?w=400&h=400&fit=crop" alt="Product 9">
                                    </div>
                                </div>
                                <div class="product-carousel-indicators">
                                    <div class="product-carousel-indicator active" onclick="goToProductSlide(9, 0)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(9, 1)"></div>
                                    <div class="product-carousel-indicator" onclick="goToProductSlide(9, 2)"></div>
                                </div>
                            </div>
                            <span class="badge badge-sale absolute top-4 left-4 z-10">-25%</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Casual T-Shirt</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="rating flex">
                                    <span>★★★★☆</span>
                                </div>
                                <span class="text-sm" style="color: var(--text-gray)">(234)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-lg line-through opacity-60" style="color: var(--text-gray)">$79.99</span>
                                    <span class="text-2xl font-bold ml-2" style="color: var(--primary-blue)">$59.99</span>
                                </div>
                                <button class="btn-primary py-2 px-4" onclick="addToCart(9)">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                 */   ?>
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center items-center gap-2">
                    <!--   <button class="px-4 py-2 rounded-lg border-2 font-semibold transition hover:bg-blue-600 hover:text-white hover:border-blue-600" style="border-color: var(--primary-blue); color: var(--primary-blue)">Previous</button>
                <button class="px-4 py-2 rounded-lg font-semibold text-white" style="background: var(--primary-blue)">1</button>
                <button class="px-4 py-2 rounded-lg border-2 font-semibold transition hover:bg-blue-600 hover:text-white hover:border-blue-600" style="border-color: var(--primary-blue); color: var(--primary-blue)">2</button>
                <button class="px-4 py-2 rounded-lg border-2 font-semibold transition hover:bg-blue-600 hover:text-white hover:border-blue-600" style="border-color: var(--primary-blue); color: var(--primary-blue)">3</button>
                <button class="px-4 py-2 rounded-lg border-2 font-semibold transition hover:bg-blue-600 hover:text-white hover:border-blue-600" style="border-color: var(--primary-blue); color: var(--primary-blue)">Next</button>
            </div>
        </div>
    </div> -->
</section>

<!-- Footer -->
<?php
require_once "./commen/footer.php";
?>