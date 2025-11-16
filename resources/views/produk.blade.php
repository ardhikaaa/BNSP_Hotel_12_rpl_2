<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNSP Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23f59e0b" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #f3f4f6;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .card:hover img {
            transform: scale(1.1);
        }
        
        .card-body {
            padding: 24px;
        }
        
        .card-body h3 {
            margin: 0 0 12px;
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .price {
            color: #f59e0b;
            font-weight: 700;
            font-size: 1.25rem;
            display: inline-block;
            padding: 8px 16px;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border-radius: 8px;
            border: 1px solid #fcd34d;
        }
        
        .luxury-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(245, 158, 11, 0.95);
            backdrop-filter: blur(10px);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }
        
        .room-features {
            display: flex;
            gap: 12px;
            margin-top: 12px;
            flex-wrap: wrap;
        }
        
        .feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        .title-section {
            text-align: center;
            margin-bottom: 48px;
            position: relative;
            padding-bottom: 20px;
        }
        
        .title-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #f59e0b, transparent);
        }
        
        .title-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 12px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .title-section p {
            color: #d1d5db;
            font-size: 1.125rem;
        }
        
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
        
        .grid > .card {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .grid > .card:nth-child(1) { animation-delay: 0.1s; }
        .grid > .card:nth-child(2) { animation-delay: 0.2s; }
        .grid > .card:nth-child(3) { animation-delay: 0.3s; }
        .grid > .card:nth-child(4) { animation-delay: 0.4s; }
        .grid > .card:nth-child(5) { animation-delay: 0.5s; }
        .grid > .card:nth-child(6) { animation-delay: 0.6s; }

        /* Play button overlay styling */
        .play-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card:hover .play-overlay {
            opacity: 1;
        }

        .play-button {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            padding: 1.2rem;
            transform: scale(1);
            transition: transform 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card:hover .play-button {
            transform: scale(1.15);
        }

        /* Video button styling */
        .video-button {
            margin-top: 1rem;
            width: 100%;
            padding: 0.625rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            background: white;
            cursor: pointer;
        }

        .video-button:hover {
            border-color: #f59e0b;
            background: #fffbeb;
            color: #f59e0b;
        }

        /* Modal styling */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .animate-modal {
            animation: modalFadeIn 0.3s ease-out;
        }

        #videoModal {
            backdrop-filter: blur(8px);
        }

        body.modal-open {
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            border-bottom: 2px solid #f59e0b;
        }

        .modal-header h3 {
            color: white;
            font-size: 1.5rem;
        }

        .modal-close-btn {
            color: #9ca3af;
            transition: all 0.2s ease;
            padding: 0.5rem;
            border-radius: 9999px;
        }

        .modal-close-btn:hover {
            color: #f59e0b;
            background: rgba(245, 158, 11, 0.1);
        }
    </style>
</head>
<body>
    <x-navbar/>
    
<!-- Hero Section -->
<div class="hero-section py-24 px-4 mt-20">
    <div class="max-w-7xl mx-auto">
        <div class="title-section">
            <div class="inline-block mb-4">
                <span class="px-4 py-2 bg-amber-500 bg-opacity-20 text-amber-400 text-sm font-medium rounded-full backdrop-blur-sm border border-amber-500 border-opacity-30">
                    Horizon Collection
                </span>
            </div>
            <h1>Luxury Rooms & Suites</h1>
            <p>Experience unparalleled comfort and elegance in our accommodations</p>
        </div>
    </div>
</div>

<div class="container max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($products as $product)
            <div class="card opacity-0">
                <div class="relative overflow-hidden" >
                    <img src="{{ asset('storage/' . $product->img) }}" 
                            alt="{{ $product->room_type }}">
                    <span class="luxury-badge">{{ $product->room_type }}</span>
                </div>

                <div class="card-body">
                    <h3>{{ $product->room_type }}</h3>
                    
                    <div class="mt-4 flex items-center justify-between">
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <span class="text-xs text-gray-500">per night</span>
                    </div>
                    
                    <!-- Button untuk lihat video -->
                    <button onclick="openVideoModal('{{ $product->video }}', '{{ $product->room_type }}')" 
                            class="video-button">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                            Watch Room Tour
                        </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 bg-black/85 z-50 hidden items-center justify-center p-4">
    <div class="relative w-full max-w-3xl bg-white rounded-2xl shadow-2xl overflow-hidden animate-modal">
        <!-- Modal Header -->
        <div class="modal-header flex items-center justify-between p-6">
            <h3 id="modalTitle" class="font-semibold">Room Tour</h3>
            <button onclick="closeVideoModal()" class="modal-close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6 bg-gray-50">
            <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                <iframe id="videoFrame"
                        class="absolute top-0 left-0 w-full h-full rounded-lg shadow-lg"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function openVideoModal(videoUrl, roomType) {
        const modal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');
        const modalTitle = document.getElementById('modalTitle');
        
        // Set video source
        videoFrame.src = videoUrl;
        
        // Set modal title
        modalTitle.textContent = roomType + ' - Room Tour';
        
        // Show modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Prevent body scroll
        document.body.classList.add('modal-open');
        
        // Add escape key listener
        document.addEventListener('keydown', handleEscapeKey);
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');
        
        // Hide modal
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        
        // Stop video by clearing src
        videoFrame.src = '';
        
        // Allow body scroll
        document.body.classList.remove('modal-open');
        
        // Remove escape key listener
        document.removeEventListener('keydown', handleEscapeKey);
    }

    function handleEscapeKey(e) {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('videoModal');
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeVideoModal();
            }
        });
    });
</script>
</body>
</html>