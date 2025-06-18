<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المحطات - Amman Transit</title>
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

        .search-section {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .search-container {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid var(--light-aqua-line);
            border-radius: 25px;
            font-family: 'Cairo', sans-serif;
            font-size: 1.1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--deep-transit-green);
            box-shadow: 0 0 0 3px rgba(31, 89, 74, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-aqua-line);
            font-size: 1.2rem;
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
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
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

        .filter-select {
            padding: 12px 15px;
            border: 2px solid var(--light-aqua-line);
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: var(--deep-transit-green);
            box-shadow: 0 0 0 3px rgba(31, 89, 74, 0.1);
        }

        .stations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .station-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-right: 5px solid var(--light-aqua-line);
            position: relative;
        }

        .station-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .station-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .station-name {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .station-area {
            color: #666;
            font-size: 1rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            text-align: center;
            display: inline-block;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-maintenance {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-closed {
            background-color: #f8d7da;
            color: #721c24;
        }

        .station-details {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-icon {
            color: var(--light-aqua-line);
            font-size: 1rem;
            width: 20px;
        }

        .detail-text {
            color: #666;
            font-size: 0.95rem;
        }

        .operating-hours {
            background: var(--background-sandstone);
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
        }

        .hours-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
        }

        .hours-value {
            font-weight: 600;
            color: var(--deep-transit-green);
            font-size: 1rem;
        }

        .view-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .view-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
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

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .page-title {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }
            
            .stations-grid {
                grid-template-columns: 1fr;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .station-header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .station-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">
                <i class="fas fa-map-marker-alt"></i>
                المحطات
            </h1>
            <p class="page-subtitle">اكتشف جميع محطات النقل العام في عمان</p>
        </div>

        <!-- Statistics Section -->
        @if($stations->count() > 0)
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">{{ $stations->count() }}</div>
                    <div class="stat-label">إجمالي المحطات</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stations->where('status', 'active')->count() }}</div>
                    <div class="stat-label">محطات نشطة</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stations->pluck('area')->filter()->unique()->count() }}</div>
                    <div class="stat-label">مناطق مُغطاة</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $stations->where('status', 'maintenance')->count() }}</div>
                    <div class="stat-label">قيد الصيانة</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="ابحث عن محطة..." id="searchInput">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">فلترة حسب الحالة</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="all">جميع الحالات</option>
                        <option value="active">نشطة</option>
                        <option value="maintenance">صيانة</option>
                        <option value="closed">مغلقة</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">فلترة حسب المنطقة</label>
                    <select class="filter-select" id="areaFilter">
                        <option value="all">جميع المناطق</option>
                        @if($stations->count() > 0)
                            @foreach($stations->pluck('area')->filter()->unique()->sort() as $area)
                                <option value="{{ $area }}">{{ $area }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">ترتيب حسب</label>
                    <select class="filter-select" id="sortFilter">
                        <option value="name">الاسم</option>
                        <option value="area">المنطقة</option>
                        <option value="status">الحالة</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Stations Grid -->
        @if($stations->count() > 0)
            <div class="stations-grid" id="stationsGrid">
                @foreach ($stations as $station)
                    <div class="station-card" 
                         data-status="{{ $station->status }}"
                         data-area="{{ $station->area ?? 'غير محدد' }}"
                         data-name="{{ $station->stop_name }}">
                        
                        <div class="station-header">
                            <span class="status-badge status-{{ $station->status }}">
                                @if($station->status == 'active')
                                    <i class="fas fa-check-circle"></i> نشطة
                                @elseif($station->status == 'maintenance')
                                    <i class="fas fa-tools"></i> صيانة
                                @else
                                    <i class="fas fa-times-circle"></i> مغلقة
                                @endif
                            </span>
                        </div>

                        <h3 class="station-name">{{ $station->stop_name }}</h3>

                        @if($station->area)
                            <div class="station-area">
                                <i class="fas fa-map-marked-alt"></i>
                                {{ $station->area }}
                            </div>
                        @endif

                        <div class="station-details">
                            @if($station->address)
                                <div class="detail-item">
                                    <i class="fas fa-home detail-icon"></i>
                                    <span class="detail-text">{{ $station->address }}</span>
                                </div>
                            @endif
                            
                            <div class="detail-item">
                                <i class="fas fa-map-pin detail-icon"></i>
                                <span class="detail-text">{{ $station->latitude }}, {{ $station->longitude }}</span>
                            </div>

                            <div class="detail-item">
                                <i class="fas fa-signal detail-icon"></i>
                                <span class="detail-text">
                                    @if($station->status == 'active')
                                        تعمل بشكل طبيعي
                                    @elseif($station->status == 'maintenance')
                                        قيد الصيانة - خدمة محدودة
                                    @else
                                        مغلقة مؤقتاً
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="operating-hours">
                            <div class="hours-label">ساعات العمل</div>
                            <div class="hours-value">{{ $station->operating_hours }}</div>
                        </div>

                        <a href="{{ route('stations.show', $station->id) }}" class="view-btn">
                            <i class="fas fa-eye"></i>
                            عرض تفاصيل المحطة
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- No Search Results Message -->
            <div class="no-results" id="noResults">
                <i class="fas fa-search"></i>
                <h4>لا توجد نتائج</h4>
                <p>لم يتم العثور على محطات تطابق معايير البحث</p>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-map-marker-alt"></i>
                <h3>لا توجد محطات حالياً</h3>
                <p>سيتم إضافة المحطات قريباً</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search and filter functionality
        document.getElementById('searchInput').addEventListener('keyup', filterStations);
        document.getElementById('statusFilter').addEventListener('change', filterStations);
        document.getElementById('areaFilter').addEventListener('change', filterStations);
        document.getElementById('sortFilter').addEventListener('change', function() {
            sortStations();
            filterStations();
        });

        function filterStations() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedArea = document.getElementById('areaFilter').value;
            
            const stationCards = document.querySelectorAll('.station-card');
            const noResults = document.getElementById('noResults');
            let visibleCards = 0;
            
            stationCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                const status = card.dataset.status;
                const area = card.dataset.area;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !text.includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Status filter
                if (selectedStatus !== 'all' && status !== selectedStatus) {
                    shouldShow = false;
                }
                
                // Area filter
                if (selectedArea !== 'all' && area !== selectedArea) {
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
            if (visibleCards === 0 && document.querySelectorAll('.station-card').length > 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        function sortStations() {
            const grid = document.getElementById('stationsGrid');
            const cards = Array.from(document.querySelectorAll('.station-card'));
            const sortBy = document.getElementById('sortFilter').value;
            
            cards.sort((a, b) => {
                let valueA, valueB;
                
                switch(sortBy) {
                    case 'name':
                        valueA = a.dataset.name.toLowerCase();
                        valueB = b.dataset.name.toLowerCase();
                        break;
                    case 'area':
                        valueA = a.dataset.area.toLowerCase();
                        valueB = b.dataset.area.toLowerCase();
                        break;
                    case 'status':
                        valueA = a.dataset.status;
                        valueB = b.dataset.status;
                        // Custom sort order for status: active, maintenance, closed
                        const statusOrder = { 'active': 1, 'maintenance': 2, 'closed': 3 };
                        return statusOrder[valueA] - statusOrder[valueB];
                }
                
                return valueA.localeCompare(valueB, 'ar');
            });
            
            // Re-append sorted cards
            cards.forEach(card => grid.appendChild(card));
        }

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .stats-section, .search-section, .filters-section, .station-card');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add hover effects for station cards
            const stationCards = document.querySelectorAll('.station-card');
            stationCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.borderRightColor = 'var(--deep-transit-green)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.borderRightColor = 'var(--light-aqua-line)';
                });
            });

            // Animate statistics numbers
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(numberElement => {
                const targetNumber = parseInt(numberElement.textContent);
                let currentNumber = 0;
                const increment = Math.ceil(targetNumber / 30);

                const animateNumber = () => {
                    if (currentNumber < targetNumber) {
                        currentNumber += increment;
                        if (currentNumber > targetNumber) currentNumber = targetNumber;
                        numberElement.textContent = currentNumber;
                        requestAnimationFrame(animateNumber);
                    }
                };

                // Start animation after a delay
                setTimeout(animateNumber, 500);
            });

            // Initialize sort on page load
            setTimeout(() => {
                sortStations();
            }, 1000);
        });

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.getElementById('searchInput').focus();
            }
            
            // Escape to clear search
            if (e.key === 'Escape') {
                const searchInput = document.getElementById('searchInput');
                if (searchInput.value) {
                    searchInput.value = '';
                    filterStations();
                }
            }
        });

        // Add click to copy coordinates functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.detail-item') && e.target.textContent.includes(',')) {
                const coordinatesText = e.target.textContent.trim();
                if (coordinatesText.match(/[\d.-]+,\s*[\d.-]+/)) {
                    navigator.clipboard.writeText(coordinatesText).then(() => {
                        // Show brief feedback
                        const originalText = e.target.textContent;
                        e.target.textContent = 'تم النسخ!';
                        e.target.style.color = 'var(--light-aqua-line)';
                        
                        setTimeout(() => {
                            e.target.textContent = originalText;
                            e.target.style.color = '';
                        }, 1500);
                    });
                }
            }
        });
    </script>
</body>
</html>