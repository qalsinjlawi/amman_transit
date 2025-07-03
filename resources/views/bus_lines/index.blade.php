<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطوط الباصات - Amman Transit</title>
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

        .lines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .line-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-right: 5px solid var(--light-aqua-line);
            position: relative;
        }

        .line-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .line-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .line-number {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-maintenance {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-suspended {
            background-color: #f8d7da;
            color: #721c24;
        }

        .line-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 15px;
        }

        .route-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #666;
        }

        .route-station {
            flex: 1;
            font-weight: 500;
        }

        .route-arrow {
            color: var(--light-aqua-line);
            font-size: 1.2rem;
        }

        .line-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: var(--deep-transit-green);
        }

        .price-highlight {
            color: var(--light-aqua-line);
            font-size: 1.1rem;
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
            
            .lines-grid {
                grid-template-columns: 1fr;
            }

            .line-details {
                grid-template-columns: 1fr;
            }

            .route-info {
                flex-direction: column;
                text-align: center;
                gap: 8px;
            }

            .route-arrow {
                transform: rotate(90deg);
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
                خطوط الباصات
            </h1>
            <p class="page-subtitle">تصفح جميع خطوط النقل العام المتاحة في عمان</p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="ابحث عن خط أو محطة..." id="searchInput">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <!-- Lines Grid -->
        @if($busLines->count() > 0)
            <div class="lines-grid" id="linesGrid">
                @foreach ($busLines as $busLine)
                    <div class="line-card">
                        <div class="line-header">
                            <span class="line-number">{{ $busLine->line_number }}</span>
                            <span class="status-badge status-{{ $busLine->status }}">
                                @if($busLine->status == 'active')
                                    <i class="fas fa-check-circle"></i> نشط
                                @elseif($busLine->status == 'maintenance')
                                    <i class="fas fa-tools"></i> صيانة
                                @else
                                    <i class="fas fa-pause-circle"></i> معلق
                                @endif
                            </span>
                        </div>

                        <h3 class="line-name">{{ $busLine->line_name }}</h3>

                        <div class="route-info">
                            <div class="route-station">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $busLine->start_station }}
                            </div>
                            <i class="fas fa-arrow-left route-arrow"></i>
                            <div class="route-station">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $busLine->end_station }}
                            </div>
                        </div>

                        <div class="line-details">
                            <div class="detail-item">
                                <span class="detail-label">سعر التذكرة</span>
                                <span class="detail-value price-highlight">{{ $busLine->ticket_price }} دينار</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">التكرار</span>
                                <span class="detail-value">كل {{ $busLine->frequency_minutes }} دقيقة</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">بداية التشغيل</span>
                                <span class="detail-value">{{ date('H:i', strtotime($busLine->start_time)) }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">نهاية التشغيل</span>
                                <span class="detail-value">{{ date('H:i', strtotime($busLine->end_time)) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('bus_lines.show', $busLine->id) }}" class="view-btn">
                            <i class="fas fa-eye"></i>
                            عرض تفاصيل الخط
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- No Search Results Message -->
            <div class="no-results" id="noResults">
                <i class="fas fa-search"></i>
                <h4>لا توجد نتائج</h4>
                <p>لم يتم العثور على خطوط تطابق بحثك</p>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-route"></i>
                <h3>لا توجد خطوط باصات حالياً</h3>
                <p>سيتم إضافة الخطوط قريباً</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const lineCards = document.querySelectorAll('.line-card');
            const noResults = document.getElementById('noResults');
            let visibleCards = 0;
            
            lineCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCards++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCards === 0 && searchTerm !== '') {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .search-section, .line-card');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add hover effects for line cards
            const lineCards = document.querySelectorAll('.line-card');
            lineCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.borderRightColor = 'var(--deep-transit-green)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.borderRightColor = 'var(--light-aqua-line)';
                });
            });
        });
    </script>
</body>
</html>