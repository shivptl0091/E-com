<?php


require_once "./commen/header.php";
        
 ?>
  <div class="text-end me-5 mt-5 my-5">
    <a href="./category.php" class="btn-primary py-2 px-4">Refresh</a>
</div>
<!-- ═══════════════════════════════════════════
     HERO BANNER
════════════════════════════════════════════ -->
<section class="category-hero">
    <div class="container mx-auto px-4 relative z-10">
        <div class="breadcrumb mb-6" style="color: rgba(255,255,255,0.7)">
            <a href="index.php" style="color:rgba(255,255,255,0.7)" class="hover:text-white transition">Home</a>
            <span>→</span>
            <span style="color:white; font-weight:600">Categories</span>
        </div>
        <div class="max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-widest mb-3 animate-fade-in-up" style="color:rgba(255,255,255,0.7)">Browse Our Collections</p>
            <h1 class="text-4xl md:text-6xl font-display font-bold text-white mb-5 animate-fade-in-up delay-100" style="line-height:1.1">
                Shop by<br><span style="color:#93c5fd">Category</span>
            </h1>
            <p class="text-lg animate-fade-in-up delay-200" style="color:rgba(255,255,255,0.8); max-width:500px">
                Explore our curated collections across fashion, footwear, accessories, and the latest in tech — all in one place.
            </p>
            <div class="flex flex-wrap gap-3 mt-8 animate-fade-in-up delay-300">
                <a href="shop.php" class="btn-primary">Shop All Products</a>
                <a href="deals.php" class="btn-secondary" style="border-color:rgba(255,255,255,0.5); color:white">View Deals →</a>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     STATS BAR
════════════════════════════════════════════ -->
<div class="container mx-auto px-4 -mt-6 relative z-20 mb-14">
    <div class="stats-bar shadow-xl animate-fade-in-up">
        <div class="stat-item">
            <div class="stat-number">24+</div>
            <div class="stat-label">Total Products</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">5</div>
            <div class="stat-label">Categories</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">6</div>
            <div class="stat-label">Active Sales</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">4.8★</div>
            <div class="stat-label">Avg. Rating</div>
        </div>
    </div>
</div>


<!-- ═══════════════════════════════════════════
     TRENDING TAGS
════════════════════════════════════════════ -->
<section class="container mx-auto px-4 mb-14">
    <div class="flex flex-wrap items-center gap-3">
        <span class="font-semibold text-sm" style="color:var(--text-gray)">🔥 Trending:</span>
        <a href="shop.php?category=all"         class="tag-pill active">All</a>
        <a href="shop.php?category=footwear"    class="tag-pill">👟 Footwear</a>
        <a href="shop.php?category=clothing"    class="tag-pill">👗 Clothing</a>
        <a href="shop.php?category=accessories" class="tag-pill">👜 Accessories</a>
        <a href="shop.php?category=electronics" class="tag-pill">⌚ Electronics</a>
        <a href="deals.php"                     class="tag-pill">🏷️ On Sale</a>
        <a href="shop.php?filter=new"           class="tag-pill">✨ New Arrivals</a>
        <a href="shop.php?filter=top-rated"     class="tag-pill">⭐ Top Rated</a>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     MAIN CATEGORY GRID
════════════════════════════════════════════ -->
<section class="container mx-auto px-4 mb-16">
    <div class="mb-8">
        <h2 class="text-3xl md:text-4xl font-display font-bold section-title">All Categories</h2>
        <p class="mt-5" style="color:var(--text-gray)">Discover exactly what you're looking for</p>
    </div>

    <!-- Grid: 2 large + 3 small -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- LARGE: Footwear (spans 2 rows on desktop) -->
        <div class="lg:row-span-2">

         <?php
         $where="";
                if(isset($_GET['search'])){
                    $search=trim($_GET['search']);
                    $where  =" WHERE `categoryname` LIKE '%$search%'";
            }

            $categories_data =  $db->getdata("categories",0,0,$where);
    
            foreach ($categories_data as $categories) {

            echo '  <a href="shop.php?category=footwear" class="cat-card cat-card-large block h-full animate-fade-in-up" style="min-height:460px">
                <span class="cat-card-badge hot">Trending</span>
                <img src="http://localhost/E-com/Admin_Page/categories_photo/'.$categories['categories_photo'].'" alt="Footwear">
                <div class="cat-card-body">
                    <div class="cat-card-title font-display">'.$categories['categoryname'].'</div>
                    <div class="cat-card-sub">8 Products · Sneakers, Boots & More</div>
                    <div class="cat-card-cta">
                        Shop Now
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        ';
            }
            ?>

        <?php /*
         

        <!-- Clothing -->
        <a href="shop.php?category=clothing" class="cat-card block animate-fade-in-up delay-100">
            <span class="cat-card-badge sale">Sale</span>
            <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=400&fit=crop" alt="Clothing">
            <div class="cat-card-body">
                <div class="cat-card-title font-display">Clothing</div>
                <div class="cat-card-sub">10 Products · Dresses, Tops & Jackets</div>
                <div class="cat-card-cta">
                    Shop Now
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Electronics -->
        <a href="shop.php?category=electronics" class="cat-card block animate-fade-in-up delay-200">
            <span class="cat-card-badge new">New</span>
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&h=400&fit=crop" alt="Electronics">
            <div class="cat-card-body">
                <div class="cat-card-title font-display">Electronics</div>
                <div class="cat-card-sub">1 Product · Smart Watches & Tech</div>
                <div class="cat-card-cta">
                    Shop Now
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Accessories -->
        <a href="shop.php?category=accessories" class="cat-card block animate-fade-in-up delay-300">
            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600&h=400&fit=crop" alt="Accessories">
            <div class="cat-card-body">
                <div class="cat-card-title font-display">Accessories</div>
                <div class="cat-card-sub">5 Products · Bags, Wallets & More</div>
                <div class="cat-card-cta">
                    Shop Now
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
        </a>
           */ ?>
    <!-- </div> -->
</section>


<!-- ═══════════════════════════════════════════
     FEATURED PRODUCTS BY CATEGORY
════════════════════════════════════════════ -->

<!-- Footwear Picks -->
<section class="container mx-auto px-4 mb-16">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl font-display font-bold section-title">Footwear Picks</h2>
            <p class="mt-5" style="color:var(--text-gray)">Step up your style game</p>
        </div>
        <a href="shop.php?category=footwear" class="btn-secondary text-sm py-2 px-5">View All →</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

    <?php

      $where="";
                if(isset($_GET['search'])){
                    $search=trim($_GET['search']);
                    $where  =" WHERE `categoryname` LIKE '%$search%' OR `price` LIKE '%$search%' ";
            }

            $categories_data =  $db->getdata("categories",0,0,$where);
    
            foreach ($categories_data as $categories) {

             echo '  <a href="shop.php" class="group block rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" style="background:var(--bg-light); border:1px solid transparent" onmouseover="this.style.borderColor=\'var(--primary-blue)\'" onmouseout="this.style.borderColor=\'transparent\'">
                    <div class="overflow-hidden aspect-square relative">
                        <img src="http://localhost/E-com/Admin_Page/categories_photo/'.$categories['categories_photo'].'" alt="Classic White Sneakers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="badge badge-new absolute top-3 left-3">New</span>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold mb-1">'.$categories['categoryname'].'</h4>
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-lg" style="color:var(--primary-blue)">₹'.$categories['price'].'</span>
                            <button class="btn-primary py-1.5 px-3 text-sm" onclick="addToCart(1)">+ Cart</button>
                        </div>
                    </div>
                </a>
                
                ';
}
    //    echo "<prE>";
    //         print_r($categories_data);
    //         die();
    ?>
     </div>
</section>
        <!-- Shoe 1 -->
<?php /*
        <!-- Shoe 2 -->
        <a href="shop.php" class="group block rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" style="background:var(--bg-light); border:1px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
            <div class="overflow-hidden aspect-square relative">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop" alt="Running Shoes Elite" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-4">
                <h4 class="font-semibold mb-1">Running Shoes Elite</h4>
                <div class="rating text-sm mb-2">★★★★☆ <span class="text-xs" style="color:var(--text-gray)">(289)</span></div>
                <div class="flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:var(--primary-blue)">$129.99</span>
                    <button class="btn-primary py-1.5 px-3 text-sm" onclick="addToCart(7)">+ Cart</button>
                </div>
            </div>
        </a>

        <!-- Shoe 3 -->
        <a href="shop.php" class="group block rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" style="background:var(--bg-light); border:1px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
            <div class="overflow-hidden aspect-square relative">
                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=400&fit=crop" alt="Classic Boot" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="badge badge-sale absolute top-3 left-3">-20%</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold mb-1">Heritage Boot</h4>
                <div class="rating text-sm mb-2">★★★★★ <span class="text-xs" style="color:var(--text-gray)">(74)</span></div>
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm line-through" style="color:var(--text-gray)">$159.99</span>
                        <span class="font-bold text-lg ml-1" style="color:var(--primary-blue)">$127.99</span>
                    </div>
                    <button class="btn-primary py-1.5 px-3 text-sm" onclick="addToCart(10)">+ Cart</button>
                </div>
            </div>
        </a>

        <!-- Shoe 4 -->
        <a href="shop.php" class="group block rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" style="background:var(--bg-light); border:1px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
            <div class="overflow-hidden aspect-square relative">
                <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=400&h=400&fit=crop" alt="Sport Sneakers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="badge badge-hot absolute top-3 left-3">Hot</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold mb-1">Sport Sneakers Pro</h4>
                <div class="rating text-sm mb-2">★★★★★ <span class="text-xs" style="color:var(--text-gray)">(183)</span></div>
                <div class="flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:var(--primary-blue)">$109.99</span>
                    <button class="btn-primary py-1.5 px-3 text-sm" onclick="addToCart(11)">+ Cart</button>
                </div>
            </div>
        </a>
  */ ?>
   


<!-- ═══════════════════════════════════════════
     SEASONAL BANNER
════════════════════════════════════════════ -->
<section class="container mx-auto px-4 mb-16">
    <div class="seasonal-banner">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-3" style="background:rgba(255,255,255,0.15)">Limited Time</span>
                <h3 class="text-3xl md:text-4xl font-display font-bold text-white mb-2">Summer Sale 2024</h3>
                <p style="color:rgba(255,255,255,0.8)" class="mb-1">Up to <strong class="text-white">40% off</strong> selected items across all categories</p>
                <p class="text-sm" style="color:rgba(255,255,255,0.6)">🕐 Offer ends in: <strong class="text-white" id="countdown">2d 14h 32m</strong></p>
            </div>
            <div class="text-center md:text-right">
                <div class="text-6xl md:text-8xl font-display font-bold text-white opacity-20 absolute right-8 top-4 select-none hidden md:block">SALE</div>
                <a href="deals.php" class="btn-primary text-lg px-8 py-3 relative z-10">Shop the Sale →</a>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     CLOTHING HIGHLIGHTS
════════════════════════════════════════════ -->
<section class="py-14" style="background:var(--bg-gray)">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-display font-bold section-title">Clothing Highlights</h2>
                <p class="mt-5" style="color:var(--text-gray)">Fresh styles for every occasion</p>
            </div>
            <a href="shop.php?category=clothing" class="btn-secondary text-sm py-2 px-5">View All →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
             <?php
   $where="";
                if(isset($_GET['search'])){
                    $search=trim($_GET['search']);
                    $where  =" WHERE `categoryname` LIKE '%$search%' OR `price` LIKE '%$search%' ";
            }

            $categories_data =  $db->getdata("categories",0,0,$where);
    
            foreach ($categories_data as $categories) {
           echo '        <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="http://localhost/E-com/Admin_Page/categories_photo/'.$categories['categories_photo'].'" alt="Summer Dress" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <span class="badge badge-sale text-xs mb-2">-30%</span>
                    <h4 class="font-semibold mb-1 truncate">'.$categories['categoryname'].'</h4>
                    <div class="rating text-xs mb-2">★★★★☆ <span style="color:var(--text-gray)">(95)</span></div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold" style="color:var(--primary-blue)">₹'.$categories['price'].'</span>
                    </div>
                </div>
            </div> ';
            }
?>
         
         
         <!-- Clothing Card 1 - Horizontal Style -->
            <?php /*
            <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="https://images.unsplash.com/photo-1588117305388-c2631a279f82?w=200&h=200&fit=crop" alt="Denim Jacket" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <span class="badge badge-hot text-xs mb-2">Hot</span>
                    <h4 class="font-semibold mb-1 truncate">Denim Jacket</h4>
                    <div class="rating text-xs mb-2">★★★★★ <span style="color:var(--text-gray)">(156)</span></div>
                    <div>
                        <span class="font-bold" style="color:var(--primary-blue)">$79.99</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=200&h=200&fit=crop" alt="Casual T-Shirt" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <span class="badge badge-sale text-xs mb-2">-25%</span>
                    <h4 class="font-semibold mb-1 truncate">Casual T-Shirt</h4>
                    <div class="rating text-xs mb-2">★★★★☆ <span style="color:var(--text-gray)">(234)</span></div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm line-through" style="color:var(--text-gray)">$79.99</span>
                        <span class="font-bold" style="color:var(--primary-blue)">$59.99</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=200&h=200&fit=crop" alt="Hoodie" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <span class="badge badge-new text-xs mb-2">New</span>
                    <h4 class="font-semibold mb-1 truncate">Urban Hoodie</h4>
                    <div class="rating text-xs mb-2">★★★★★ <span style="color:var(--text-gray)">(47)</span></div>
                    <div>
                        <span class="font-bold" style="color:var(--primary-blue)">$69.99</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?w=200&h=200&fit=crop" alt="Blouse" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold mb-1 truncate">Floral Blouse</h4>
                    <div class="rating text-xs mb-2">★★★★☆ <span style="color:var(--text-gray)">(88)</span></div>
                    <div>
                        <span class="font-bold" style="color:var(--primary-blue)">$54.99</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 rounded-xl p-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.1)">
                <img src="https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=200&h=200&fit=crop" alt="Joggers" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <span class="badge badge-hot text-xs mb-2">Best Seller</span>
                    <h4 class="font-semibold mb-1 truncate">Slim Fit Joggers</h4>
                    <div class="rating text-xs mb-2">★★★★★ <span style="color:var(--text-gray)">(312)</span></div>
                    <div>
                        <span class="font-bold" style="color:var(--primary-blue)">$49.99</span>
                    </div>
                </div>
            </div>
                */ ?>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     ACCESSORIES + ELECTRONICS (2-col layout)
════════════════════════════════════════════ -->
<section class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- Accessories -->
        <div>
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h2 class="text-2xl font-display font-bold section-title">Accessories</h2>
                    <p class="mt-5 text-sm" style="color:var(--text-gray)">5 Curated picks</p>
                </div>
                <a href="shop.php?category=accessories" class="text-sm font-semibold hover:underline" style="color:var(--primary-blue)">See All →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
             <?php
             $where="";
                if(isset($_GET['search'])){
                    $search=trim($_GET['search']);
                    $where  =" WHERE `categoryname` LIKE '%$search%' OR `price` LIKE '%$search%' ";
            }

            $categories_data =  $db->getdata("categories",0,0,$where);
    
            foreach ($categories_data as $categories) {
             echo '    <div class="rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.08)">
                    <div class="overflow-hidden" style="height:160px">
                        <img src="http://localhost/E-com/Admin_Page/categories_photo/'.$categories['categories_photo'].'" alt="Backpack" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-3">
                        <span class="badge badge-hot text-xs">Hot</span>
                        <h4 class="font-semibold mt-1 mb-1 text-sm">'.$categories['categoryname'].'</h4>
                        <div class="flex justify-between items-center">
                            <span class="font-bold" style="color:var(--primary-blue)">₹'.$categories['price'].'</span>
                            <button class="btn-primary py-1 px-3 text-xs">+ Cart</button>
                        </div>
                    </div>
                </div> ';
            }
?>
<?php /*
               

                <div class="rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.08)">
                    <div class="overflow-hidden" style="height:160px">
                        <img src="https://images.unsplash.com/photo-1585155770787-cb3c8e4b3a5b?w=300&h=200&fit=crop" alt="Sunglasses" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-3">
                        <span class="badge badge-new text-xs">New</span>
                        <h4 class="font-semibold mt-1 mb-1 text-sm">Designer Sunglasses</h4>
                        <div class="flex justify-between items-center">
                            <span class="font-bold" style="color:var(--primary-blue)">$199.99</span>
                            <button class="btn-primary py-1 px-3 text-xs">+ Cart</button>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group" style="background:var(--bg-light); border:1px solid rgba(100,116,139,0.08)">
                    <div class="overflow-hidden" style="height:160px">
                        <img src="https://images.unsplash.com/photo-1562183241-b937e95585b6?w=300&h=200&fit=crop" alt="Wallet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-3">
                        <h4 class="font-semibold mt-1 mb-1 text-sm">Leather Wallet</h4>
                        <div class="flex justify-between items-center">
                            <span class="font-bold" style="color:var(--primary-blue)">$49.99</span>
                            <button class="btn-primary py-1 px-3 text-xs">+ Cart</button>
                        </div>
                    </div>
                </div>
*/
              ?>
                <!-- View More Tile -->
                <a href="shop.php?category=accessories" class="rounded-xl flex items-center justify-center transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 border-dashed" style="height:100%; min-height:200px; border-color:var(--primary-blue); color:var(--primary-blue)">
                    <div class="text-center p-4">
                        <div class="text-3xl mb-2">→</div>
                        <div class="font-semibold">View All Accessories</div>
                        <div class="text-sm mt-1" style="color:var(--text-gray)">5 products</div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Electronics -->
        <div>
          <?php
                   $where="";
                if(isset($_GET['search'])){
                    $search=trim($_GET['search']);
                    $where  =" WHERE `categoryname` LIKE '%$search%' OR `price` LIKE '%$search%' ";
            }
                $product_data =  $db->getdata("product",0,0,$where);
                
                foreach ($product_data as $product) {
                echo ' <div class="flex justify-between items-end mb-6"><div>
                    <h2 class="text-2xl font-display font-bold section-title">'.$product['categoryname'].'</h2>
                    <p class="mt-5 text-sm" style="color:var(--text-gray)">The latest tech</p>
                </div>
                <a href="shop.php?category=electronics" class="text-sm font-semibold hover:underline" style="color:var(--primary-blue)">See All →</a>
            </div>
            
                    
            <!-- Hero electronic product -->
            <div class="rounded-2xl overflow-hidden shadow-xl relative group cursor-pointer" style="height:380px">
                <img src="http://localhost/E-com/Admin_Page/photo/'.$product['photo'].'" alt="Smart Watch" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 60%)"></div>
                <span class="absolute top-4 left-4 badge badge-sale">-20% Off</span>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-2xl font-display font-bold text-white mb-1">'.$product['categoryname'].'</h3>
                    <div class="rating text-sm mb-3 text-yellow-400">★★★★★ <span class="text-gray-300 text-xs">(567 reviews)</span></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-white text-2xl font-bold ml-2">₹'.$product['price'].'</span>
                        </div>
                        <button class="btn-primary" onclick="addToCart(6)">Add to Cart</button>
                    </div>
                </div>
            </div>
            ';
            }
            ?>  
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     SHOP BY PRICE
════════════════════════════════════════════ -->
<section class="py-14" style="background:var(--bg-gray)">
    <div class="container mx-auto px-4">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-display font-bold">Shop by Budget</h2>
            <p class="mt-3" style="color:var(--text-gray)">Find the perfect item, whatever your budget</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <a href="shop.php?maxPrice=50" class="group rounded-xl p-6 text-center cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" style="background:var(--bg-light); border:2px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
                <div class="text-4xl mb-3">💰</div>
                <div class="font-display font-bold text-xl mb-1" style="color:var(--primary-blue)">Under $50</div>
                <div class="text-sm" style="color:var(--text-gray)">Great everyday finds</div>
            </a>

            <a href="shop.php?minPrice=50&maxPrice=100" class="group rounded-xl p-6 text-center cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" style="background:var(--bg-light); border:2px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
                <div class="text-4xl mb-3">🛍️</div>
                <div class="font-display font-bold text-xl mb-1" style="color:var(--primary-blue)">$50–$100</div>
                <div class="text-sm" style="color:var(--text-gray)">Quality on a budget</div>
            </a>

            <a href="shop.php?minPrice=100&maxPrice=200" class="group rounded-xl p-6 text-center cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" style="background:var(--bg-light); border:2px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
                <div class="text-4xl mb-3">⭐</div>
                <div class="font-display font-bold text-xl mb-1" style="color:var(--primary-blue)">$100–$200</div>
                <div class="text-sm" style="color:var(--text-gray)">Premium selection</div>
            </a>

            <a href="shop.php?minPrice=200" class="group rounded-xl p-6 text-center cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" style="background:var(--bg-light); border:2px solid transparent" onmouseover="this.style.borderColor='var(--primary-blue)'" onmouseout="this.style.borderColor='transparent'">
                <div class="text-4xl mb-3">👑</div>
                <div class="font-display font-bold text-xl mb-1" style="color:var(--primary-blue)">$200+</div>
                <div class="text-sm" style="color:var(--text-gray)">Luxury & exclusive</div>
            </a>

        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     FOOTER (from footer.php)
════════════════════════════════════════════ -->
<?php
require_once "./commen/footer.php";
?>