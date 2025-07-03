<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محطات الخطوط - Amman Transit</title>
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

        .direction-badges {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .direction-badge {
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

        .direction-badge.active {
            background: var(--light-aqua-line);
            color: var(--white);
        }

        .direction-badge:hover {
            transform: translateY(-2px);
        }

        .line-stops-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 25px;
        }

        .line-stop-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-right: 5px solid var(--light-aqua-line);
            position: relative;
        }

        .line-stop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .line-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .line-number {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1rem;
        }

        .stop-order {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .stop-name {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .line-name {
            color: #666;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .direction-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            background: var(--background-sandstone);
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .direction-forward {
            color: #28a745;
        }

        .direction-backward {
            color: #dc3545;
        }

        .stop-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            text-align: center;
            padding: 10px;
            background: var(--background-sandstone);
            border-radius: 8px;
        }

        .detail-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 600;
            color: var(--deep-transit-green);
            font-size: 0.95rem;
        }

        .arrival-time {
            color: var(--light-aqua-line);
            font-weight: 700;
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
            
            .line-stops-grid {
                grid-template-columns: 1fr;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .direction-badges {
                flex-direction: column;
                align-items: center;
            }

            .stop-details {
                grid-template-columns: 1fr;
            }

            .card-header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">
                <i class="fas fa-route"></i>
                محطات الخطوط
            </h1>
            <p class="page-subtitle">تصفح جميع المحطات لكل خط باص مع ترتيب الوصول</p>
        </div>

        <!-- Direction Selection -->
        <div class="direction-badges">
            <div class="direction-badge active" data-direction="all">
                <i class="fas fa-list"></i> جميع الاتجاهات
            </div>
            <div class="direction-badge" data-direction="forward">
                <i class="fas fa-arrow-left"></i> اتجاه الذهاب
            </div>
            <div class="direction-badge" data-direction="backward">
                <i class="fas fa-arrow-right"></i> اتجاه العودة
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">البحث</label>
                    <input type="text" class="search-input" placeholder="ابحث عن خط أو محطة..." id="searchInput">
                </div>
                <div class="filter-group">
                    <label class="filter-label">فلترة حسب الخط</label>
                    <select class="filter-select" id="lineFilter">
                        <option value="all">جميع الخطوط</option>
                        @foreach($lineStops->pluck('busLine')->unique('id') as $line)
                            <option value="{{ $line->id }}">خط {{ $line->line_number }} - {{ $line->line_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">ترتيب المحطات</label>
                    <select class="filter-select" id="orderFilter">
                        <option value="asc">ترتيب تصاعدي</option>
                        <option value="desc">ترتيب تنازلي</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Line Stops Grid -->
        @if($lineStops->count() > 0)
            <div class="line-stops-grid" id="lineStopsGrid">
                @foreach ($lineStops->sortBy('stop_order') as $lineStop)
                    <div class="line-stop-card" 
                         data-direction="{{ $lineStop->direction }}"
                         data-line-id="{{ $lineStop->busLine->id }}"
                         data-order="{{ $lineStop->stop_order }}">
                        
                        <div class="card-header">
                            <div class="line-info">
                                <span class="line-number">{{ $lineStop->busLine->line_number }}</span>
                                <span class="stop-order">محطة رقم {{ $lineStop->stop_order }}</span>
                            </div>
                        </div>

                        <h3 class="stop-name">{{ $lineStop->busStop->stop_name }}</h3>
                        <p class="line-name">{{ $lineStop->busLine->line_name }}</p>

                        <div class="direction-indicator">
                            @if($lineStop->direction == 'forward')
                                <i class="fas fa-arrow-left direction-forward"></i>
                                <span class="direction-forward">اتجاه الذهاب</span>
                            @else
                                <i class="fas fa-arrow-right direction-backward"></i>
                                <span class="direction-backward">اتجاه العودة</span>
                            @endif
                        </div>

                        <div class="stop-details">
                            <div class="detail-item">
                                <div class="detail-label">المنطقة</div>
                                <div class="detail-value">{{ $lineStop->busStop->area ?? 'غير محدد' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">وقت الوصول المتوقع</div>
                                <div class="detail-value arrival-time">
                                    @if($lineStop->arrival_time_offset)
                                        +{{ $lineStop->arrival_time_offset }} دقيقة
                                    @else
                                        غير محدد
                                    @endif
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('line_stops.show', $lineStop->id) }}" class="view-btn">
                            <i class="fas fa-eye"></i>
                            عرض التفاصيل
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
                <i class="fas fa-route"></i>
                <h3>لا توجد محطات خطوط حالياً</h3>
                <p>سيتم إضافة محطات الخطوط قريباً</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Direction filter
        document.querySelectorAll('.direction-badge').forEach(badge => {
            badge.addEventListener('click', function() {
                document.querySelectorAll('.direction-badge').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                filterLineStops();
            });
        });

        // Search and filter functionality
        document.getElementById('searchInput').addEventListener('keyup', filterLineStops);
        document.getElementById('lineFilter').addEventListener('change', filterLineStops);
        document.getElementById('orderFilter').addEventListener('change', function() {
            sortCards();
            filterLineStops();
        });

        function filterLineStops() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const selectedDirection = document.querySelector('.direction-badge.active').dataset.direction;
            const selectedLine = document.getElementById('lineFilter').value;
            
            const lineStopCards = document.querySelectorAll('.line-stop-card');
            const noResults = document.getElementById('noResults');
            let visibleCards = 0;
            
            lineStopCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                const direction = card.dataset.direction;
                const lineId = card.dataset.lineId;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !text.includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Direction filter
                if (selectedDirection !== 'all' && direction !== selectedDirection) {
                    shouldShow = false;
                }
                
                // Line filter
                if (selectedLine !== 'all' && lineId !== selectedLine) {
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

        function sortCards() {
            const grid = document.getElementById('lineStopsGrid');
            const cards = Array.from(document.querySelectorAll('.line-stop-card'));
            const orderFilter = document.getElementById('orderFilter').value;
            
            cards.sort((a, b) => {
                const orderA = parseInt(a.dataset.order);
                const orderB = parseInt(b.dataset.order);
                
                if (orderFilter === 'asc') {
                    return orderA - orderB;
                } else {
                    return orderB - orderA;
                }
            });
            
            // Re-append sorted cards
            cards.forEach(card => grid.appendChild(card));
        }

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .filters-section, .line-stop-card');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>