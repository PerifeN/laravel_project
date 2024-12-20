<footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Section: About Us -->
            <div class="col-md-4">
                <h5 class="mb-3">About Us</h5>
                <p>
                    Welcome to our online shop! We provide high-quality products and excellent customer service to make your shopping experience unforgettable.
                </p>
                <p class="mt-3">
                    <a href="#" class="text-white text-decoration-underline">Learn more</a> 
                </p>
            </div>

            <!-- Section: Quick Links -->
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white">Login site</a></li>
                    <li><a href="/products" class="text-white">Shop</a></li>
                    <li><a href="/contact-form" class="text-white">Contact Us</a></li>
                    <li><a href="/faq" class="text-white">FAQ</a></li>
                </ul>
            </div>

            <!-- Section: Contact -->
            <div class="col-md-4">
                <h5 class="mb-3">Contact</h5>
                <p><i class="fas fa-map-marker-alt me-2"></i>123 Example Street, City, ZIP</p>
                <p><i class="fas fa-phone me-2"></i>+69 123 456 789</p>
                <p><i class="fas fa-envelope me-2"></i>support@webshop.com</p>
                <div class="social-icons mt-3">
                    <a href="https://facebook.com" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <p class="mb-0">© {{ date('Y') }} WebShop. All rights reserved.</p>
        </div>
    </div>
</footer>