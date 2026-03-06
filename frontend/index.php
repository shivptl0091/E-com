<?php

require_once "./commen/header.php";

?>
<div class="text-end me-5 mt-5">
    <a href="index.php" class="btn-primary py-2 px-4 my-5">Refresh</a>
</div>


<!-- Hero Section with Main Carousel -->
<section class="container mx-auto px-4 py-8">
    <div class="carousel-container" id="mainCarousel">
        <div class="carousel-track">
        <?php
    $where = "";
    if (isset($_GET['search'])) {
       $search = trim($_GET['search']);
        $where = "where `banner_title` LIKE '%$search%' OR `banner_subtitle` LIKE '%$search%' OR `banner_button_text` LIKE '%$search%'";
    }

        $site_settings_data =  $db->getdata("site_settings",0,0,$where);
         foreach ($site_settings_data as $site_settings) {

            echo'
            <div class="carousel-slide">
                 <img src="http://localhost/E-com/Admin_Page/banner_image/'.$site_settings['banner_image'].'" alt="Hero 1">
                 <div class="absolute inset-0 flex items-center justify-center text-white text-center z-10" style="background: rgba(0, 0, 0, 0.4)">
                     <div class="animate-fade-in-up">
                         <h1 class="text-5xl md:text-7xl font-display font-bold mb-4">'.$site_settings['banner_title'].'</h1>
                         <p class="text-xl md:text-2xl mb-8 opacity-90">'.$site_settings['banner_subtitle'].'</p>
                         <button class="btn-primary">'.$site_settings['banner_button_text'].'</button>
                     </div>
                 </div>
             </div>
';
                          
             }
        
        ?>
        <?php /*    
        <!-- Slide 1 -->

            <!-- Slide 2 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?w=1200&h=500&fit=crop" alt="Hero 2">
                <div class="absolute inset-0 flex items-center justify-center text-white text-center z-10" style="background: rgba(0, 0, 0, 0.4)">
                    <div>
                        <h1 class="text-5xl md:text-7xl font-display font-bold mb-4">New Arrivals</h1>
                        <p class="text-xl md:text-2xl mb-8 opacity-90">Fresh styles just landed</p>
                        <button class="btn-primary">Explore</button>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=1200&h=500&fit=crop" alt="Hero 3">
                <div class="absolute inset-0 flex items-center justify-center text-white text-center z-10" style="background: rgba(0, 0, 0, 0.4)">
                    <div>
                        <h1 class="text-5xl md:text-7xl font-display font-bold mb-4">Special Offers</h1>
                        <p class="text-xl md:text-2xl mb-8 opacity-90">Up to 50% off selected items</p>
                        <button class="btn-primary">Get Deals</button>
                    </div>
                </div>
            </div>
           */ ?>
            
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-btn prev" onclick="moveCarousel('main', -1)">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button class="carousel-btn next" onclick="moveCarousel('main', 1)">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators" id="mainIndicators">
            <div class="carousel-indicator active" onclick="goToSlide('main', 0)"></div>
            <div class="carousel-indicator" onclick="goToSlide('main', 1)"></div>
            <div class="carousel-indicator" onclick="goToSlide('main', 2)"></div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="container mx-auto px-4 py-16">
    <div class="text-center mb-12 animate-fade-in-up">
        <h2 class="text-4xl md:text-5xl font-display font-bold mb-4">Shop by Category</h2>
        <p class="text-lg" style="color: var(--text-gray)">Explore our curated collections</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

         <?php

            $product_data =  $db->getdata("product");


            foreach ($product_data as $product) {

        echo ' <div class="category-card animate-fade-in-up delay-100">
            <img src="http://localhost/E-com/Admin_Page/photo/'.$product['photo'].'" alt="'.$product['photo'].'" class="w-full h-80 object-cover">
            <div class="category-card-content">
                <h3 class="text-2xl font-bold mb-2">'.$product['productname'].'</h3>
                <p class="opacity-90 mb-4">'.$product['long_description'].'</p>
                <button class="btn-secondary bg-white text-black hover:bg-blue-600 hover:text-white border-white">Explore</button>
            </div>
        </div>
        ';
        }
        ?>

        
        <?php  /*
        <!-- Category 1 -->
        <div class="category-card animate-fade-in-up delay-100">
            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=400&h=500&fit=crop" alt="Women's Fashion" class="w-full h-80 object-cover">
            <div class="category-card-content">
                <h3 class="text-2xl font-bold mb-2">Women's Fashion</h3>
                <p class="opacity-90 mb-4">Trendy & Elegant</p>
                <button class="btn-secondary bg-white text-black hover:bg-blue-600 hover:text-white border-white">Explore</button>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="category-card animate-fade-in-up delay-200">
            <img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891?w=400&h=500&fit=crop" alt="Men's Fashion" class="w-full h-80 object-cover">
            <div class="category-card-content">
                <h3 class="text-2xl font-bold mb-2">Men's Fashion</h3>
                <p class="opacity-90 mb-4">Classic & Modern</p>
                <button class="btn-secondary bg-white text-black hover:bg-blue-600 hover:text-white border-white">Explore</button>
            </div>
        </div>

        <!-- Category 3 -->
        <div class="category-card animate-fade-in-up delay-300">
            <img src="https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?w=400&h=500&fit=crop" alt="Accessories" class="w-full h-80 object-cover">
            <div class="category-card-content">
                <h3 class="text-2xl font-bold mb-2">Accessories</h3>
                <p class="opacity-90 mb-4">Complete Your Look</p>
                <button class="btn-secondary bg-white text-black hover:bg-blue-600 hover:text-white border-white">Explore</button>
            </div>
        </div>
        */
?>

    </div>
</section>

<!-- Featured Products Section -->
<section class="container mx-auto px-4 py-16" style="background: var(--bg-gray); margin: 0; width: 100%; max-width: 100%;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in-up">
            <h2 class="text-4xl md:text-5xl font-display font-bold mb-4">Featured Products</h2>
            <p class="text-lg" style="color: var(--text-gray)">Handpicked favorites for you</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <?php

            $product_data =  $db->getdata("product");


            foreach ($product_data as $product) {

                echo '    <div class="product-card rounded-xl overflow-hidden shadow-lg animate-fade-in-up delay-100">
                    <div class="relative">
                        <!-- Product Image Carousel -->
                        <div class="product-carousel">
                            <div class="product-carousel-track" id="productCarousel1">
                                <div class="product-carousel-slide">
                                    <img src="http://localhost/E-com/Admin_Page/photo/'.$product['photo'].'" alt="Product 1 - View 1">
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
                        <h3 class="text-xl font-bold mb-2">'.$product['productname'].'</h3>
                        <div class="flex items-center gap-2 mb-3">
                            <div class="rating flex">
                                <span>★★★★★</span>
                            </div>
                            <span class="text-sm" style="color: var(--text-gray)">(128)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold" style="color: var(--primary-blue)">$'.$product['price'].'</span>
                            </div>
                            <button class="btn-primary py-2 px-4">Add to Cart</button>
                        </div>
                    </div>
                </div>';
            }

            // echo "<prE>";
            // print_r($product_data);
            // die();



            ?>

            <?php /* ?>
                <!-- Product 1 -->
                <div class="product-card rounded-xl overflow-hidden shadow-lg animate-fade-in-up delay-100">
                    <div class="relative">
                        <!-- Product Image Carousel -->
                        <div class="product-carousel">
                            <div class="product-carousel-track" id="productCarousel1">
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=400&h=400&fit=crop" alt="Product 1 - View 1">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400&h=400&fit=crop" alt="Product 1 - View 2">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=400&fit=crop" alt="Product 1 - View 3">
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
                        <h3 class="text-xl font-bold mb-2">Classic White Sneakers</h3>
                        <div class="flex items-center gap-2 mb-3">
                            <div class="rating flex">
                                <span>★★★★★</span>
                            </div>
                            <span class="text-sm" style="color: var(--text-gray)">(128)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold" style="color: var(--primary-blue)">$89.99</span>
                            </div>
                            <button class="btn-primary py-2 px-4">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card rounded-xl overflow-hidden shadow-lg animate-fade-in-up delay-200">
                    <div class="relative">
                        <div class="product-carousel">
                            <div class="product-carousel-track" id="productCarousel2">
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=400&fit=crop" alt="Product 2 - View 1">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?w=400&h=400&fit=crop" alt="Product 2 - View 2">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1522273400909-fd1a8f77637e?w=400&h=400&fit=crop" alt="Product 2 - View 3">
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
                            <button class="btn-primary py-2 px-4">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card rounded-xl overflow-hidden shadow-lg animate-fade-in-up delay-300">
                    <div class="relative">
                        <div class="product-carousel">
                            <div class="product-carousel-track" id="productCarousel3">
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop" alt="Product 3 - View 1">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=400&h=400&fit=crop" alt="Product 3 - View 2">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400&h=400&fit=crop" alt="Product 3 - View 3">
                                </div>
                            </div>
                            <div class="product-carousel-indicators">
                                <div class="product-carousel-indicator active" onclick="goToProductSlide(3, 0)"></div>
                                <div class="product-carousel-indicator" onclick="goToProductSlide(3, 1)"></div>
                                <div class="product-carousel-indicator" onclick="goToProductSlide(3, 2)"></div>
                            </div>
                        </div>
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
                            <button class="btn-primary py-2 px-4">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card rounded-xl overflow-hidden shadow-lg animate-fade-in-up delay-400">
                    <div class="relative">
                        <div class="product-carousel">
                            <div class="product-carousel-track" id="productCarousel4">
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1585155770787-cb3c8e4b3a5b?w=400&h=400&fit=crop" alt="Product 4 - View 1">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1603320410149-db26b12d5c2b?w=400&h=400&fit=crop" alt="Product 4 - View 2">
                                </div>
                                <div class="product-carousel-slide">
                                    <img src="https://images.unsplash.com/photo-1594223274512-ad4803739b7c?w=400&h=400&fit=crop" alt="Product 4 - View 3">
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
                            <button class="btn-primary py-2 px-4">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <?php */ ?>


        </div>

        <div class="text-center mt-12">
            <button class="btn-secondary">View All Products</button>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="hero-gradient py-20">
    <div class="container mx-auto px-4 text-center text-white">
        <h2 class="text-4xl md:text-5xl font-display font-bold mb-4 animate-fade-in-up">Stay Updated</h2>
        <p class="text-xl mb-8 opacity-90 animate-fade-in-up delay-100">Subscribe to get special offers and exclusive deals</p>
        <div class="max-w-md mx-auto animate-fade-in-up delay-200">
            <div class="flex gap-2">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold hover:bg-gray-100 transition">Subscribe</button>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
require_once "./commen/footer.php";
?>