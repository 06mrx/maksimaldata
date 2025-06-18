<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Maksimal Data') }} - Premium Fiber Optic Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'shimmer': 'shimmer 2s infinite',
                        'gradient': 'gradient 8s linear infinite',
                        'slide-down': 'slideDown 0.3s ease-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'fade-in-left': 'fadeInLeft 0.5s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            }
                        },
                        shimmer: {
                            '0%': {
                                transform: 'translateX(-100%)'
                            },
                            '100%': {
                                transform: 'translateX(100%)'
                            }
                        },
                        gradient: {
                            '0%, 100%': {
                                backgroundPosition: '0% 50%'
                            },
                            '50%': {
                                backgroundPosition: '100% 50%'
                            }
                        },
                        slideDown: {
                            '0%': {
                                transform: 'translateY(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                            '100%': {
                                transform: 'translateY(-100%)',
                                opacity: '0'
                            }
                        },
                        fadeInLeft: {
                            '0%': {
                                transform: 'translateX(-30px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            }
                        }
                    },
                    backgroundSize: {
                        '300%': '300%',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6, #0ea5e9, #06b6d4);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 8s ease infinite;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-morphism-mobile {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .luxury-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .hero-bg {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 25%, #0ea5e9 50%, #06b6d4 75%, #0891b2 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
        }

        .mobile-menu {
            transform: translateY(-100%);
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            opacity: 0;
        }

        .mobile-menu.active {
            transform: translateY(0);
            opacity: 1;
        }

        .hamburger {
            transition: all 0.3s ease;
        }

        .hamburger.active {
            transform: rotate(180deg);
        }

        .menu-item {
            transform: translateX(-30px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .menu-item.animate {
            transform: translateX(0);
            opacity: 1;
        }
    </style>
</head>

<body class="font-['Inter'] bg-gradient-to-br from-slate-50 via-blue-50 to-sky-50 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-500" id="navbar">
        <div class="glass-morphism">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-white/10 p-1 rounded-xl flex items-center justify-center shadow-lg">
                            {{-- <i class="fas fa-network-wired text-white text-lg"></i> --}}
                            <img src="{{ asset('favicon/apple-icon-76x76.png') }}" alt="">
                        </div>
                        <span class="text-2xl font-bold gradient-text">Maksimal Data</span>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-8 items-center">
                        @foreach (['home' => 'Home', 'about' => 'Tentang', 'projects' => 'Projek', 'services' => 'Layanan', 'partners' => 'Mitra', 'contact' => 'Kontak'] as $id => $label)
                            <a href="#{{ $id }}"
                                class="relative navbar-text text-slate-100 hover:text-indigo-800 font-medium transition-all duration-300 group">
                                {{ $label }}
                                <span
                                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-sky-500 transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        @endforeach
                        <a href="#training-schedule"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-sky-500 text-white rounded-2xl font-semibold transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                            Daftar Pelatihan
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-slate-100 hover:text-blue-600 transition-all duration-300 hamburger"
                        id="mobileMenuBtn">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden fixed top-0 left-0 w-full h-screen glass-morphism-mobile mobile-menu z-40"
            id="mobileMenu">
            <div class="flex flex-col h-full pt-24 pb-8 px-6">
                <!-- Close Button -->
                <button class="absolute top-6 right-6 text-slate-700 hover:text-red-500 transition-colors"
                    id="closeMobileMenu">
                    <i class="fas fa-times text-2xl"></i>
                </button>

                <!-- Mobile Menu Items -->
                <div class="flex flex-col space-y-6 flex-1">
                    @foreach (['home' => 'Home', 'about' => 'Tentang', 'projects' => 'Projek', 'services' => 'Layanan', 'partners' => 'Mitra', 'contact' => 'Kontak'] as $id => $label)
                        <a href="#{{ $id }}"
                            class="menu-item mobile-menu-link text-2xl font-semibold text-slate-700 hover:text-blue-600 transition-all duration-300 py-3 border-b border-slate-200 hover:border-blue-300 group">
                            <i
                                class="fas fa-chevron-right text-blue-500 mr-4 group-hover:translate-x-2 transition-transform duration-300"></i>
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                <!-- Mobile CTA Button -->
                <div class="menu-item mt-8">
                    <a href="#training-schedule"
                        class="block w-full mobile-menu-link text-center px-8 py-4 bg-gradient-to-r from-blue-600 to-sky-500 text-white rounded-2xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Daftar Pelatihan
                    </a>
                </div>

                <!-- Social Links -->
                <div class="menu-item flex justify-center space-x-6 pt-8 border-t border-slate-200">
                    <a href="#"
                        class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-12 h-12 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#"
                        class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const scheduleSelect = document.getElementById('schedule_id');
        const registerButton = document.getElementById('register-button');
        const baseUrl = "{{ route('register.form') }}";

        scheduleSelect.addEventListener('change', function () {
            const selectedId = this.value;
            if (selectedId) {
                registerButton.href = `${baseUrl}?schedule_id=${selectedId}`;
                registerButton.classList.remove('pointer-events-none', 'opacity-50');
            } else {
                registerButton.href = '#';
                registerButton.classList.add('pointer-events-none', 'opacity-50');
            }
        });

        // Optional: Disable button initially
        registerButton.classList.add('pointer-events-none', 'opacity-50');
    });
</script>

    <script>
        // Smooth scrolling and navbar effects
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            const sections = document.querySelectorAll('section[id]');
            const navbarTexts = document.querySelectorAll('.navbar-text');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
            const menuItems = document.querySelectorAll('.menu-item');

            // Mobile Menu Toggle
            function toggleMobileMenu() {
                const isActive = mobileMenu.classList.contains('active');

                if (isActive) {
                    // Close menu
                    mobileMenu.classList.remove('active');
                    mobileMenuBtn.classList.remove('active');
                    document.body.style.overflow = '';

                    // Reset menu items animation
                    menuItems.forEach(item => {
                        item.classList.remove('animate');
                    });
                } else {
                    // Open menu
                    mobileMenu.classList.add('active');
                    mobileMenuBtn.classList.add('active');
                    document.body.style.overflow = 'hidden';

                    // Animate menu items with stagger effect
                    menuItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('animate');
                        }, index * 100);
                    });
                }
            }

            // Mobile menu event listeners
            mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            closeMobileMenu.addEventListener('click', toggleMobileMenu);

            // Close mobile menu when clicking on a link
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    toggleMobileMenu();
                });
            });

            // Close mobile menu when clicking outside
            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    toggleMobileMenu();
                }
            });

            // Prevent body scroll when mobile menu is open
            mobileMenu.addEventListener('touchmove', (e) => {
                e.preventDefault();
            }, {
                passive: false
            });

            // Navbar scroll effect
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    navbar.classList.add('backdrop-blur-xl', 'bg-white/90');
                    navbar.classList.remove('bg-transparent');
                    navbarTexts.forEach(text => {
                        text.classList.add('gradient-text', 'text-slate-800');
                    });

                    // Update mobile menu button color
                    const hamburgerIcon = mobileMenuBtn.querySelector('i');
                    hamburgerIcon.classList.add('text-slate-800');
                    hamburgerIcon.classList.remove('text-slate-100');
                } else {
                    navbar.classList.remove('backdrop-blur-xl', 'bg-white/90');
                    navbar.classList.add('bg-transparent');
                    navbarTexts.forEach(text => {
                        text.classList.remove('gradient-text', 'text-slate-800');
                    });

                    // Reset mobile menu button color
                    const hamburgerIcon = mobileMenuBtn.querySelector('i');
                    hamburgerIcon.classList.remove('text-slate-800');
                    hamburgerIcon.classList.add('text-slate-100');
                }
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Contact form submission
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const button = this.querySelector('button[type="submit"]');
                    const originalText = button.innerHTML;

                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                    button.disabled = true;

                    // Simulate form submission
                    setTimeout(() => {
                        button.innerHTML = '<i class="fas fa-check mr-2"></i>Terkirim!';
                        button.className = button.className.replace('from-blue-600 to-sky-500',
                            'from-green-600 to-emerald-500');

                        setTimeout(() => {
                            button.innerHTML = originalText;
                            button.disabled = false;
                            button.className = button.className.replace(
                                'from-green-600 to-emerald-500',
                                'from-blue-600 to-sky-500');
                            this.reset();
                        }, 2000);
                    }, 1500);
                });
            }

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                    }
                });
            }, observerOptions);

            // Observe all sections
            sections.forEach(section => {
                observer.observe(section);
            });

            // Floating particles animation
            function createFloatingParticle() {
                const particle = document.createElement('div');
                particle.className = 'absolute w-1 h-1 bg-blue-400/30 rounded-full pointer-events-none';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = '100vh';

                document.body.appendChild(particle);

                const animation = particle.animate([{
                        transform: 'translateY(0px) translateX(0px)',
                        opacity: 1
                    },
                    {
                        transform: `translateY(-100vh) translateX(${(Math.random() - 0.5) * 200}px)`,
                        opacity: 0
                    }
                ], {
                    duration: Math.random() * 4000 + 6000,
                    easing: 'linear'
                });

                animation.onfinish = () => {
                    if (particle.parentNode) {
                        particle.parentNode.removeChild(particle);
                    }
                };
            }

            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768 && mobileMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            });

            // Keyboard accessibility
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            });

        });
    </script>
</body>

</html>
