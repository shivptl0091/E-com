# BlueStore - E-Commerce Template

A modern, responsive e-commerce template built with Tailwind CSS, HTML, CSS, and JavaScript with PHP extension.

## Features

### 🎨 Design Features
- **Modern Blue Theme** - Professional blue color scheme
- **Dark Mode** - Toggle between light and dark themes with persistent storage
- **Responsive Design** - Mobile-first approach, works on all devices
- **Beautiful Typography** - Uses Outfit and Playfair Display fonts
- **Smooth Animations** - Fade-in effects, hover states, and transitions

### 🛍️ E-Commerce Features
- **Hero Carousel** - Auto-playing main banner with 3 slides
- **Product Carousels** - Each product card has its own image carousel (3 images per product)
- **Category Cards** - Beautiful category browsing with overlay effects
- **Product Cards** - Hover effects, ratings, badges (New/Sale)
- **Product Table** - Admin-style product management table
- **Search & Filter** - Search products and filter by stock status
- **Newsletter Subscription** - Email collection section
- **Shopping Cart Icon** - With badge counter
- **User Account** - Account icon in navigation

### 🎯 Interactive Elements
- **Mobile Menu** - Slide-in menu for mobile devices
- **Sticky Navigation** - Navbar stays at top while scrolling
- **Search Bar** - Expandable search functionality
- **Rating Stars** - Visual product ratings
- **Action Buttons** - View, Edit, Delete product actions

## Files Included

### 1. index.php
Main homepage with:
- Hero carousel (3 slides)
- Category sections
- Featured products with image carousels
- Newsletter section
- Full navigation and footer

### 2. products.php
Product management page with:
- Filterable product table
- Search functionality
- Stock status badges
- Admin action buttons
- Pagination

## Color Scheme

### Light Mode
- Primary Blue: `#2563eb`
- Dark Blue: `#1e40af`
- Accent Blue: `#60a5fa`
- Background: `#ffffff`
- Secondary BG: `#f8fafc`
- Text: `#0f172a`
- Gray Text: `#64748b`

### Dark Mode
- Primary Blue: `#3b82f6`
- Dark Blue: `#2563eb`
- Accent Blue: `#93c5fd`
- Background: `#0f172a`
- Secondary BG: `#1e293b`
- Text: `#f1f5f9`
- Gray Text: `#94a3b8`

## Technologies Used

- **HTML5** - Semantic markup
- **CSS3** - Custom properties, animations, flexbox, grid
- **Tailwind CSS** - Utility-first CSS framework (via CDN)
- **JavaScript** - Vanilla JS for interactivity
- **PHP Extension** - Files use .php extension for backend integration
- **Google Fonts** - Outfit and Playfair Display

## Installation

1. Place files in your web server directory
2. Ensure PHP is installed (if running locally, use XAMPP/WAMP/MAMP)
3. Open `index.php` in your browser
4. No additional setup required - all dependencies loaded via CDN

## Usage

### Theme Toggle
- Click the sun/moon icon in the navigation to switch themes
- Theme preference is saved in localStorage

### Main Carousel
- Auto-plays every 5 seconds
- Use arrow buttons to navigate manually
- Click indicators at bottom to jump to specific slide
- Pauses on hover

### Product Carousels
- Each product card has 3 images
- Auto-rotates through images
- Click indicators to view specific image
- Pauses on hover

### Mobile Menu
- Click hamburger icon to open
- Click outside or X button to close
- Includes all navigation links

### Product Filtering
- Click filter buttons to show products by stock status
- Use search bar to find products by name or category
- Click action buttons (View/Edit/Delete) for product management

## Customization

### Colors
Edit CSS variables in the `<style>` section:
```css
:root {
    --primary-blue: #2563eb;
    --primary-blue-dark: #1e40af;
    /* ... more colors */
}
```

### Images
Replace image URLs with your own:
- Hero carousel: Lines with carousel slides
- Product images: In product cards and table
- Category images: In category cards

### Products
Add more products in the table by copying the table row structure:
```html
<tr data-category="in-stock">
    <td>#009</td>
    <td><img src="..." class="product-img"></td>
    <td>
        <div class="font-semibold">Product Name</div>
        <div class="text-sm">Description</div>
    </td>
    <!-- ... more cells -->
</tr>
```

## Backend Integration

Files use `.php` extension and are ready for backend integration:

### Database Structure (Recommended)

**Products Table:**
```sql
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    sale_price DECIMAL(10, 2),
    stock INT DEFAULT 0,
    rating DECIMAL(3, 2),
    review_count INT DEFAULT 0,
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255),
    badge VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Categories Table:**
```sql
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### PHP Integration Points

1. **Product Listing** - Replace static HTML with PHP loops:
```php
<?php
// Fetch products from database
$products = mysqli_query($conn, "SELECT * FROM products");
while($product = mysqli_fetch_assoc($products)) {
    // Output product card HTML
}
?>
```

2. **Shopping Cart** - Add to cart functionality:
```php
<?php
session_start();
if(isset($_POST['add_to_cart'])) {
    $_SESSION['cart'][$product_id] = [
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    ];
}
?>
```

3. **User Authentication** - Login/Register:
```php
<?php
session_start();
// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    // Show user menu
} else {
    // Show login button
}
?>
```

4. **Search & Filter** - Dynamic queries:
```php
<?php
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';

$query = "SELECT * FROM products WHERE name LIKE '%$search%'";
if($category !== 'all') {
    $query .= " AND category = '$category'";
}
?>
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Features to Add (Backend Required)

- [ ] User registration and login
- [ ] Shopping cart functionality
- [ ] Checkout process
- [ ] Payment gateway integration
- [ ] Order management
- [ ] Product reviews system
- [ ] Wishlist functionality
- [ ] Admin dashboard
- [ ] Inventory management
- [ ] Email notifications

## Credits

- **Fonts**: Google Fonts (Outfit, Playfair Display)
- **Icons**: SVG icons (custom)
- **Images**: Unsplash (placeholder images)
- **CSS Framework**: Tailwind CSS

## License

Free to use for personal and commercial projects.

## Support

For customization help or issues:
1. Check the code comments
2. Review the JavaScript functions
3. Test in different browsers
4. Ensure PHP is properly configured

---

**Note**: This is a frontend template. Backend functionality (database, authentication, payment processing) needs to be implemented separately using PHP and MySQL.

Enjoy building your e-commerce website! 🚀
