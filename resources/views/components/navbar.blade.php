<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNSP Hotel Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }
        
        .menu-item {
            position: relative;
            overflow: hidden;
        }
        
        .menu-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #f59e0b, #d97706);
            transform: translateX(-50%);
            transition: width 0.3s ease;
            border-radius: 2px 2px 0 0;
        }
        
        .menu-item.active::after,
        .menu-item:hover::after {
            width: 80%;
        }
        
        .logo-container {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-radius: 12px;
            padding: 0.5rem 1rem;
            box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.1);
        }
        
        .icon-wrapper {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }
        
        .menu-item.active .icon-wrapper {
            animation: bounce 1s ease-in-out infinite;
        }
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-3px);
            }
        }
        
        .mobile-menu {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-menu.active {
            transform: translateY(0);
        }
        
        .cta-button {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<nav class="navbar fixed top-0 left-0 right-0 z-50 border-b border-amber-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo -->
            <a href="/produk" class="flex-shrink-0">
                <div class="logo-container">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-lg font-bold text-gray-800">Horizon Hotel</h1>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="/produk" class="menu-item {{ request()->is('produk') ? 'active' : '' }} flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold {{ request()->is('produk') ? 'text-amber-600' : 'text-gray-600 hover:text-amber-600' }} transition-all duration-300">
                    <div class="icon-wrapper">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M0,12V6C0,3.243,2.243,1,5,1h14c2.757,0,5,2.243,5,5v6h-3v-1c0-2.206-1.794-4-4-4h-2c-1.2,0-2.266,.542-3,1.382-.734-.84-1.8-1.382-3-1.382h-2c-2.206,0-4,1.794-4,4v1H0Zm9-3h-2c-1.103,0-2,.897-2,2v1h6v-1c0-1.103-.897-2-2-2Zm10,2c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h6v-1ZM0,14v6c0,.553,.448,1,1,1s1-.447,1-1v-2H22v2c0,.553,.447,1,1,1s1-.447,1-1v-6H0Z"/>
                        </svg>
                    </div>
                    <span>Produk</span>
                </a>

                <a href="/about" class="menu-item {{ request()->is('about') ? 'active' : '' }} flex items-center gap-2 px-4 py-2 rounded-lg text-sm {{ request()->is('about') ? 'font-semibold text-amber-600' : 'font-medium text-gray-600 hover:text-amber-600' }} transition-all duration-300">
                    <div class="icon-wrapper">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,24A12,12,0,1,0,0,12,12.013,12.013,0,0,0,12,24ZM12,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12,5Zm-1,5h1a2,2,0,0,1,2,2v6a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2Z"/>
                        </svg>
                    </div>
                    <span>Tentang Kami</span>
                </a>

                <a href="/booking" class="menu-item {{ request()->is('booking*') ? 'active' : '' }} flex items-center gap-2 px-4 py-2 rounded-lg text-sm {{ request()->is('booking*') ? 'font-semibold text-amber-600' : 'font-medium text-gray-600 hover:text-amber-600' }} transition-all duration-300">
                    <div class="icon-wrapper">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                             <path d="m21,7H0C0,4.243,2.243,2,5,2v-1c0-.552.448-1,1-1s1,.448,1,1v1h7v-1c0-.552.447-1,1-1s1,.448,1,1v1c2.757,0,5,2.243,5,5Zm-.162,11.82l-5.829-2.292v-5.462c0-.996-.681-1.92-1.664-2.08-1.253-.204-2.336.758-2.336,1.973v9.924c-1.076-.886-2.111-1.752-2.145-1.784-.922-.861-2.373-.813-3.235.109-.863.923-.819,2.372.098,3.23l1.821,1.628h16.462v-.593c0-2.055-1.258-3.901-3.171-4.653Zm-11.83-1.982v-5.878c0-.7.201-1.366.538-1.96H0v6c0,2.114,1.324,3.916,3.183,4.646.177-.653.492-1.276.985-1.803,1.269-1.359,3.224-1.707,4.841-1.005Zm11.699-.218c.177-.511.293-1.05.293-1.62v-6h-4.54c.349.613.549,1.322.549,2.067v4.099l3.699,1.454Z"/>
                        </svg>
                    </div>
                    <span>Pesan Kamar</span>
                </a>
            </div>

            <!-- CTA Button & Mobile Toggle -->
            <div class="flex items-center gap-3">
                <!-- CTA Button (Hidden on mobile) -->
                <button class="hidden md:flex cta-button items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-semibold text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>Hubungi Kami</span>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle" class="md:hidden p-2 rounded-lg text-amber-600 hover:bg-amber-50 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu md:hidden absolute top-full left-0 right-0 bg-white border-b border-amber-100 shadow-lg">
        <div class="px-4 py-4 space-y-2">
            <a href="/produk" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold {{ request()->is('produk') ? 'text-amber-600 bg-amber-50' : 'text-gray-600 hover:bg-amber-50 hover:text-amber-600' }} transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M0,12V6C0,3.243,2.243,1,5,1h14c2.757,0,5,2.243,5,5v6h-3v-1c0-2.206-1.794-4-4-4h-2c-1.2,0-2.266,.542-3,1.382-.734-.84-1.8-1.382-3-1.382h-2c-2.206,0-4,1.794-4,4v1H0Zm9-3h-2c-1.103,0-2,.897-2,2v1h6v-1c0-1.103-.897-2-2-2Zm10,2c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h6v-1ZM0,14v6c0,.553,.448,1,1,1s1-.447,1-1v-2H22v2c0,.553,.447,1,1,1s1-.447,1-1v-6H0Z"/>
                </svg>
                <span>Produk</span>
            </a>

            <a href="/about" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->is('about') ? 'font-semibold text-amber-600 bg-amber-50' : 'font-medium text-gray-600 hover:bg-amber-50 hover:text-amber-600' }} transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,24A12,12,0,1,0,0,12,12.013,12.013,0,0,0,12,24ZM12,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12,5Zm-1,5h1a2,2,0,0,1,2,2v6a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2Z"/>
                </svg>
                <span>Tentang Kami</span>
            </a>

            <a href="/booking" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->is('booking*') ? 'font-semibold text-amber-600 bg-amber-50' : 'font-medium text-gray-600 hover:bg-amber-50 hover:text-amber-600' }} transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="m21,7H0C0,4.243,2.243,2,5,2v-1c0-.552.448-1,1-1s1,.448,1,1v1h7v-1c0-.552.447-1,1-1s1,.448,1,1v1c2.757,0,5,2.243,5,5Zm-.162,11.82l-5.829-2.292v-5.462c0-.996-.681-1.92-1.664-2.08-1.253-.204-2.336.758-2.336,1.973v9.924c-1.076-.886-2.111-1.752-2.145-1.784-.922-.861-2.373-.813-3.235.109-.863.923-.819,2.372.098,3.23l1.821,1.628h16.462v-.593c0-2.055-1.258-3.901-3.171-4.653Zm-11.83-1.982v-5.878c0-.7.201-1.366.538-1.96H0v6c0,2.114,1.324,3.916,3.183,4.646.177-.653.492-1.276.985-1.803,1.269-1.359,3.224-1.707,4.841-1.005Zm11.699-.218c.177-.511.293-1.05.293-1.62v-6h-4.54c.349.613.549,1.322.549,2.067v4.099l3.699,1.454Z"/>
                </svg>
                <span>Pesan Kamar</span>
            </a>

            <button class="cta-button w-full flex items-center justify-center gap-2 px-5 py-3 rounded-lg text-sm font-semibold text-white mt-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>Hubungi Kami</span>
            </button>
        </div>
    </div>
</nav>

<script>
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.remove('active');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            mobileMenu.classList.remove('active');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });
</script>

</body>
</html>