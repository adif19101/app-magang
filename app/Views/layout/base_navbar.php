<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container">
        <a class="navbar-brand logo inline" href="#">
            <!-- Tampilan gede, hide pas tampilan kecil -->
            <div class="d-none d-sm-block">Magang Informatika Unsika</div>

            <!-- Tampilan kecil, hide pas tampilan gede -->
            <div class="d-block d-sm-none">Magang IF</div>
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <!-- TODO bikin logika halaman active -->
                <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>">Home</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="features.html">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="blog-post-list.html">Blog</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="blog-post.html">Blog Post</a></li> -->
                <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                <?php if(auth()->loggedIn()): ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>">Logout</a></li>
                <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('register') ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>