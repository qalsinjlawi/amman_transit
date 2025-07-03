<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محطة {{ $lineStop->busStop->stop_name }} - خط {{ $lineStop->busLine->line_number }} - Amman Transit</title>
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .breadcrumb-nav {
            background: var(--white);
            border-radius: 10px;
            padding: 15px 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px var(--shadow);
        }

        .breadcrumb {
            margin: 0;
            background: none;
        }

        .breadcrumb-item a {
            color: var(--light-aqua-line);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--deep-transit-green);
        }

        .breadcrumb-item.active {
            color: var(--deep-transit-green);
            font-weight: 600;
        }

        .header-section {
            background: var(--white);
            border-radius: 15px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            border-right: 5px solid var(--deep-transit-green);
            text-align: center;
        }

        .stop-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .line-badge {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .order-badge {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 12px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stop-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin: 20px 0;
        }

        .line-name {
            font-size: 1.3rem;
            color: #666;
            margin-bottom: 20px;
        }

        .direction-display {
            background: var(--background-sandstone);
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .direction-forward {
            color: #28a745;
        }

        .direction-backward {
            color: #dc3545;
        }

        .direction-text {
            font-size: 1.4rem;
            font-weight: 600;
        }

        .back-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .back-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .info-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: var(--deep-transit-green);
        }

        .info-card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        .info-value {
            color: #666;
            font-weight: 500;
        }

        .highlight-value {
            color: var(--light-aqua-line);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .timeline-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .timeline-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .timeline-title {
            color: var(--deep-transit-green);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .arrival-time-display {
            background: linear-gradient(45deg, var(--light-aqua-line), #2A8A8A);
            color: var(--white);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin: 20px 0;
        }

        .arrival-time-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .arrival-time-text {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .location-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .location-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: var(--deep-transit-green);
        }

        .location-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
        }

        .coordinates-display {
            background: var(--background-sandstone);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            color: var(--deep-transit-green);
            font-weight: 600;
            margin: 15px 0;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .action-btn {
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
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
        }

        .action-btn.maps-btn {
            background: #4285f4;
        }

        .action-btn.maps-btn:hover {
            background: #3367d6;
        }

        .route-progress {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .progress-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: var(--deep-transit-green);
        }

        .progress-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .progress-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .progress-item:last-child {
            border-bottom: none;
        }

        .progress-info {
            font-weight: 600;
            color: var(--text-dark);
        }

        .progress-value {
            color: var(--light-aqua-line);
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .stop-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .stop-title {
                font-size: 2rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .action-btn {
                width: 100%;
                max-width: 250px;
                justify-content: center;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .info-value {
                text-align: right;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('line_stops.index') }}">
                        <i class="fas fa-route"></i> محطات الخطوط
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('bus_lines.show', $lineStop->busLine->id) }}">
                        خط {{ $lineStop->busLine->line_number }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $lineStop->busStop->stop_name }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="header-section">
            <div class="stop-header">
                <span class="line-badge">
                    <i class="fas fa-bus"></i>
                    خط {{ $lineStop->busLine->line_number }}
                </span>
                <span class="order-badge">
                    <i class="fas fa-list-ol"></i>
                    محطة رقم {{ $lineStop->stop_order }}
                </span>
            </div>

            <h1 class="stop-title">{{ $lineStop->busStop->stop_name }}</h1>
            <p class="line-name">{{ $lineStop->busLine->line_name }}</p>

            <div class="direction-display">
                @if($lineStop->direction == 'forward')
                    <i class="fas fa-arrow-left fa-2x direction-forward"></i>
                    <span class="direction-text direction-forward">اتجاه الذهاب</span>
                @else
                    <i class="fas fa-arrow-right fa-2x direction-backward"></i>
                    <span class="direction-text direction-backward">اتجاه العودة</span>
                @endif
            </div>

            <div>
                <a href="{{ route('line_stops.index') }}" class="back-btn">
                    <i class="fas fa-arrow-right"></i>
                    العودة لمحطات الخطوط
                </a>
            </div>
        </div>

        <!-- Information Grid -->
        <div class="info-grid">
            <!-- Stop Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-map-marker-alt fa-lg"></i>
                    <h3 class="info-card-title">معلومات المحطة</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">اسم المحطة</span>
                    <span class="info-value">{{ $lineStop->busStop->stop_name }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">المنطقة</span>
                    <span class="info-value">{{ $lineStop->busStop->area ?? 'غير محدد' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">العنوان</span>
                    <span class="info-value">{{ $lineStop->busStop->address ?? 'غير محدد' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">ساعات العمل</span>
                    <span class="info-value">{{ $lineStop->busStop->operating_hours }}</span>
                </div>
            </div>

            <!-- Line Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-route fa-lg"></i>
                    <h3 class="info-card-title">معلومات الخط</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">رقم الخط</span>
                    <span class="info-value highlight-value">{{ $lineStop->busLine->line_number }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">ترتيب المحطة</span>
                    <span class="info-value highlight-value">{{ $lineStop->stop_order }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">سعر التذكرة</span>
                    <span class="info-value highlight-value">{{ $lineStop->busLine->ticket_price }} دينار</span>
                </div>
                <div class="info-item">
                    <span class="info-label">التكرار</span>
                    <span class="info-value">كل {{ $lineStop->busLine->frequency_minutes }} دقيقة</span>
                </div>
            </div>
        </div>

        <!-- Arrival Time Section -->
        <div class="timeline-section">
            <div class="timeline-header">
                <h2 class="timeline-title">
                    <i class="fas fa-clock"></i>
                    وقت الوصول المتوقع
                </h2>
            </div>

            @if($lineStop->arrival_time_offset)
                <div class="arrival-time-display">
                    <div class="arrival-time-number">+{{ $lineStop->arrival_time_offset }}</div>
                    <div class="arrival-time-text">دقيقة من بداية الرحلة</div>
                </div>
            @else
                <div class="arrival-time-display">
                    <div class="arrival-time-number">غير محدد</div>
                    <div class="arrival-time-text">لم يتم تحديد وقت الوصول بعد</div>
                </div>
            @endif
        </div>

        <!-- Location Section -->
        <div class="location-section">
            <div class="location-header">
                <i class="fas fa-map-pin fa-lg"></i>
                <h3 class="location-title">موقع المحطة</h3>
            </div>
            
            <div class="coordinates-display">
                <i class="fas fa-crosshairs"></i>
                الإحداثيات: {{ $lineStop->busStop->latitude }}, {{ $lineStop->busStop->longitude }}
            </div>

            <div class="action-buttons">
                <a href="https://www.google.com/maps?q={{ $lineStop->busStop->latitude }},{{ $lineStop->busStop->longitude }}" 
                   target="_blank" class="action-btn maps-btn">
                    <i class="fab fa-google"></i>
                    فتح في Google Maps
                </a>
                <button class="action-btn" onclick="copyCoordinates()">
                    <i class="fas fa-copy"></i>
                    نسخ الإحداثيات
                </button>
                <a href="https://waze.com/ul?q={{ $lineStop->busStop->latitude }},{{ $lineStop->busStop->longitude }}" 
                   target="_blank" class="action-btn" style="background: #33ccff;">
                    <i class="fas fa-route"></i>
                    فتح في Waze
                </a>
                <a href="{{ route('bus_stops.show', $lineStop->busStop->id) }}" class="action-btn">
                    <i class="fas fa-info-circle"></i>
                    تفاصيل المحطة
                </a>
            </div>
        </div>

        <!-- Route Progress -->
        <div class="route-progress">
            <div class="progress-header">
                <i class="fas fa-list-ol fa-lg"></i>
                <h3 class="progress-title">موقع المحطة في المسار</h3>
            </div>
            
            <div class="progress-item">
                <span class="progress-info">ترتيب هذه المحطة</span>
                <span class="progress-value">{{ $lineStop->stop_order }}</span>
            </div>
            <div class="progress-item">
                <span class="progress-info">اتجاه الرحلة</span>
                <span class="progress-value">
                    @if($lineStop->direction == 'forward')
                        {{ $lineStop->busLine->start_station }} ← {{ $lineStop->busLine->end_station }}
                    @else
                        {{ $lineStop->busLine->end_station }} ← {{ $lineStop->busLine->start_station }}
                    @endif
                </span>
            </div>
            <div class="progress-item">
                <span class="progress-info">وقت الوصول التقديري</span>
                <span class="progress-value">
                    @if($lineStop->arrival_time_offset)
                        بعد {{ $lineStop->arrival_time_offset }} دقيقة من البداية
                    @else
                        غير محدد
                    @endif
                </span>
            </div>
            <div class="progress-item">
                <span class="progress-info">حالة المحطة</span>
                <span class="progress-value">
                    @if($lineStop->busStop->status == 'active')
                        تعمل بشكل طبيعي
                    @elseif($lineStop->busStop->status == 'maintenance')
                        قيد الصيانة
                    @else
                        مغلقة مؤقتاً
                    @endif
                </span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Copy coordinates to clipboard
        function copyCoordinates() {
            const coordinates = "{{ $lineStop->busStop->latitude }}, {{ $lineStop->busStop->longitude }}";
            navigator.clipboard.writeText(coordinates).then(function() {
                showMessage('تم نسخ الإحداثيات بنجاح!', 'success');
            }).catch(function() {
                showMessage('حدث خطأ في نسخ الإحداثيات', 'error');
            });
        }

        // Show message function
        function showMessage(message, type) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
            
            const alert = document.createElement('div');
            alert.className = `alert ${alertClass} alert-dismissible fade show`;
            alert.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
                border-radius: 10px;
            `;
            alert.innerHTML = `
                <i class="${icon} me-2"></i>
                ${message}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            
            document.body.appendChild(alert);
            
            // Auto dismiss after 4 seconds
            setTimeout(() => {
                if (alert.parentElement) {
                    alert.remove();
                }
            }, 4000);
        }

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.breadcrumb-nav, .header-section, .info-card, .timeline-section, .location-section, .route-progress');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 150);
            });

            // Add interactive effects
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 8px 25px rgba(31, 89, 74, 0.2)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '0 4px 15px rgba(31, 89, 74, 0.1)';
                });
            });

            // Animate arrival time number if exists
            const arrivalNumber = document.querySelector('.arrival-time-number');
            if (arrivalNumber && !isNaN(arrivalNumber.textContent)) {
                const targetNumber = parseInt(arrivalNumber.textContent.replace('+', ''));
                let currentNumber = 0;
                const increment = targetNumber / 30;

                const animateNumber = () => {
                    if (currentNumber < targetNumber) {
                        currentNumber += increment;
                        arrivalNumber.textContent = '+' + Math.floor(currentNumber);
                        requestAnimationFrame(animateNumber);
                    } else {
                        arrivalNumber.textContent = '+' + targetNumber;
                    }
                };

                setTimeout(animateNumber, 1000);
            }
        });
    </script>
</body>
</html>