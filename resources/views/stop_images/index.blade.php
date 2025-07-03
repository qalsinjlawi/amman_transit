<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض صور المحطات - Amman Transit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --deep-transit-green: #1F594A;
            --light-aqua-line: #3BB4B4;
            --background-sandstone: #F3EEE7;
            --white: #ffffff;
            --text-dark: #2c2c2c;
            --shadow: rgba(31, 89, 74, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #E8E4DD 100%);
            color: var(--deep-transit-green);
            min-height: 100vh;
            line-height: 1.6;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            border-right: 5px solid var(--deep-transit-green);
            text-align: center;
        }

        .page-title {
            color: var(--deep-transit-green);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-subtitle {
            color: #666;
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 0;
        }

        .filters-section {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-weight: 600;
            color: var(--deep-transit-green);
            font-size: 1rem;
        }

        .filter-select, .search-input {
            padding: 12px 15px;
            border: 2px solid var(--light-aqua-line);
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .filter-select:focus, .search-input:focus {
            border-color: var(--deep-transit-green);
            box-shadow: 0 0 0 3px rgba(31, 89, 74, 0.1);
        }

        .approval-badges {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .approval-badge {
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--light-aqua-line);
            color: var(--light-aqua-line);
            background: var(--white);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .approval-badge.active {
            background: var(--light-aqua-line);
            color: var(--white);
        }

        .approval-badge:hover {
            transform: translateY(-2px);
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .image-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            position: relative;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .stop-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-card:hover .stop-image {
            transform: scale(1.05);
        }

        .approval-overlay {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .approved {
            background: rgba(40, 167, 69, 0.9);
            color: white;
        }

        .pending {
            background: rgba(255, 193, 7, 0.9);
            color: #212529;
        }

        .image-info {
            padding: 20px;
        }

        .stop-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 8px;
        }

        .image-caption {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .image-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #666;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .upload-date {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .view-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .view-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
        }

        .stats-section {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            background: var(--background-sandstone);
            border-radius: 10px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #666;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--light-aqua-line);
            margin-bottom: 25px;
        }

        .empty-state h3 {
            margin-bottom: 15px;
            color: var(--deep-transit-green);
        }

        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            display: none;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        /* Lightbox styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }

        .lightbox-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .close-lightbox {
            position: absolute;
            top: 15px;
            right: 25px;
            color: #f1f1f1;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .page-title {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .images-grid {
                grid-template-columns: 1fr;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .approval-badges {
                flex-direction: column;
                align-items: center;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .image-meta {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">
                <i class="fas fa-images"></i>
                معرض صور المحطات
            </h1>
            <p class="page-subtitle">شاهد صور المحطات التي شاركها المستخدمون</p>
        </div>

        <!-- Statistics Section -->
        @if(isset($stopImages) && $stopImages->count() > 0)
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">{{ $stopImages->count() }}</div>
                    <div class="stat-label">إجمالي الصور</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stopImages->pluck('busStop')->unique()->count() }}</div>
                    <div class="stat-label">محطات مُصورة</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stopImages->pluck('user')->unique()->count() }}</div>
                    <div class="stat-label">مُساهمين</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stopImages->where('created_at', '>=', now()->subMonth())->count() }}</div>
                    <div class="stat-label">صور هذا الشهر</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Filter Section -->
        <div class="filters-section">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">البحث</label>
                    <input type="text" class="search-input" placeholder="ابحث عن محطة أو وصف..." id="searchInput">
                </div>
                <div class="filter-group">
                    <label class="filter-label">فلترة حسب المحطة</label>
                    <select class="filter-select" id="stopFilter">
                        <option value="all">جميع المحطات</option>
                        @if(isset($stopImages) && $stopImages->count() > 0)
                            @foreach($stopImages->pluck('busStop')->unique('id') as $stop)
                                <option value="{{ $stop->id }}">{{ $stop->stop_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">المُساهم</label>
                    <select class="filter-select" id="userFilter">
                        <option value="all">جميع المُساهمين</option>
                        @if(isset($stopImages) && $stopImages->count() > 0)
                            @foreach($stopImages->pluck('user')->unique('id') as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <!-- Images Grid -->
        @if(isset($stopImages) && $stopImages->count() > 0)
            <div class="images-grid" id="imagesGrid">
                @foreach ($stopImages as $stopImage)
                    <div class="image-card" 
                         data-stop-id="{{ $stopImage->busStop->id }}"
                         data-user-id="{{ $stopImage->user->id }}">
                        
                        <div class="image-container">
                            <img src="{{ $stopImage->image_url }}" 
                                 alt="{{ $stopImage->busStop->stop_name }}" 
                                 class="stop-image"
                                 onclick="openLightbox('{{ $stopImage->image_url }}')">
                        </div>

                        <div class="image-info">
                            <h3 class="stop-name">{{ $stopImage->busStop->stop_name }}</h3>
                            
                            @if($stopImage->caption)
                                <p class="image-caption">{{ $stopImage->caption }}</p>
                            @endif

                            <div class="image-meta">
                                <div class="user-info">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $stopImage->user->name }}</span>
                                </div>
                                <div class="upload-date">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ $stopImage->created_at->format('Y-m-d') }}</span>
                                </div>
                            </div>

                            <a href="{{ route('stop_images.show', $stopImage->id) }}" class="view-btn">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Search Results Message -->
            <div class="no-results" id="noResults">
                <i class="fas fa-search"></i>
                <h4>لا توجد نتائج</h4>
                <p>لم يتم العثور على صور تطابق معايير البحث</p>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-images"></i>
                <h3>لا توجد صور حالياً</h3>
                <p>سيتم إضافة صور المحطات قريباً</p>
            </div>
        @endif
    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
        <div class="lightbox-content">
            <img id="lightbox-image" src="" alt="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search and filter functionality
        document.getElementById('searchInput').addEventListener('keyup', filterImages);
        document.getElementById('stopFilter').addEventListener('change', filterImages);
        document.getElementById('userFilter').addEventListener('change', filterImages);
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const selectedStop = document.getElementById('stopFilter').value;
            const selectedUser = document.getElementById('userFilter').value;
            
            const imageCards = document.querySelectorAll('.image-card');
            const noResults = document.getElementById('noResults');
            let visibleCards = 0;
            
            imageCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                const stopId = card.dataset.stopId;
                const userId = card.dataset.userId;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !text.includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Stop filter
                if (selectedStop !== 'all' && stopId !== selectedStop) {
                    shouldShow = false;
                }
                
                // User filter
                if (selectedUser !== 'all' && userId !== selectedUser) {
                    shouldShow = false;
                }
                
                if (shouldShow) {
                    card.style.display = '';
                    visibleCards++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCards === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        // Lightbox functionality
        function openLightbox(imageSrc) {
            document.getElementById('lightbox-image').src = imageSrc;
            document.getElementById('lightbox').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close lightbox with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .stats-section, .filters-section, .image-card');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 50);
            });

            // Add image load animations
            const images = document.querySelectorAll('.stop-image');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
            });
        });
    </script>
</body>
</html>