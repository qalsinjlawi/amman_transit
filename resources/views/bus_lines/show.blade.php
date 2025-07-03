<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خط {{ $busLine->line_number }} - {{ $busLine->line_name }} - Amman Transit</title>
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
            max-width: 1100px;
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
        }

        .line-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .line-number-badge {
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

        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 15px;
        }

        .route-display {
            background: var(--background-sandstone);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .station {
            background: var(--white);
            border: 2px solid var(--light-aqua-line);
            border-radius: 10px;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--deep-transit-green);
            text-align: center;
            min-width: 180px;
            flex: 1;
            max-width: 300px;
        }

        .route-arrow {
            color: var(--light-aqua-line);
            font-size: 2rem;
            font-weight: bold;
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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

        .price-highlight {
            color: var(--light-aqua-line);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .schedule-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .schedule-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .schedule-title {
            color: var(--deep-transit-green);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .schedule-card {
            background: var(--background-sandstone);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 2px solid var(--light-aqua-line);
        }

        .schedule-time {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 5px;
        }

        .schedule-label {
            color: #666;
            font-size: 0.9rem;
        }

        .frequency-display {
            background: linear-gradient(45deg, var(--light-aqua-line), #2A8A8A);
            color: var(--white);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .frequency-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .frequency-text {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .route-map-section {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .map-header {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 20px;
            text-align: center;
        }

        .map-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .map-placeholder {
            height: 350px;
            background: linear-gradient(45deg, #e9ecef 25%, transparent 25%), 
                        linear-gradient(-45deg, #e9ecef 25%, transparent 25%), 
                        linear-gradient(45deg, transparent 75%, #e9ecef 75%), 
                        linear-gradient(-45deg, transparent 75%, #e9ecef 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.1rem;
            text-align: center;
            padding: 20px;
        }

        .tips-section {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .tips-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: var(--deep-transit-green);
        }

        .tips-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .tip-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .tip-item:last-child {
            border-bottom: none;
        }

        .tip-icon {
            color: var(--light-aqua-line);
            font-size: 1.1rem;
        }

        .tip-text {
            color: #666;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .line-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .line-name {
                font-size: 1.8rem;
            }
            
            .route-display {
                flex-direction: column;
                gap: 10px;
            }
            
            .route-arrow {
                transform: rotate(90deg);
                font-size: 1.5rem;
            }
            
            .station {
                min-width: auto;
                max-width: none;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .schedule-grid {
                grid-template-columns: 1fr 1fr;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
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
                    <a href="{{ route('bus_lines.index') }}">
                        <i class="fas fa-route"></i> خطوط الباصات
                    </a>
                </li>
                <li class="breadcrumb-item active">خط {{ $busLine->line_number }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="header-section">
            <div class="line-header">
                <span class="line-number-badge">
                    <i class="fas fa-bus"></i>
                    خط {{ $busLine->line_number }}
                </span>
                <span class="status-badge status-{{ $busLine->status }}">
                    @if($busLine->status == 'active')
                        <i class="fas fa-check-circle"></i> يعمل حالياً
                    @elseif($busLine->status == 'maintenance')
                        <i class="fas fa-tools"></i> قيد الصيانة
                    @else
                        <i class="fas fa-pause-circle"></i> متوقف مؤقتاً
                    @endif
                </span>
            </div>

            <h1 class="line-name">{{ $busLine->line_name }}</h1>

            <div class="route-display">
                <div class="station">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <strong>{{ $busLine->start_station }}</strong><br>
                    <small>محطة البداية</small>
                </div>
                <i class="fas fa-arrow-left route-arrow"></i>
                <div class="station">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <strong>{{ $busLine->end_station }}</strong><br>
                    <small>محطة النهاية</small>
                </div>
            </div>

            <div>
                <a href="{{ route('bus_lines.index') }}" class="back-btn">
                    <i class="fas fa-arrow-right"></i>
                    العودة لقائمة الخطوط
                </a>
            </div>
        </div>

        <!-- Information Grid -->
        <div class="info-grid">
            <!-- Pricing Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-money-bill-wave fa-lg"></i>
                    <h3 class="info-card-title">معلومات التسعير</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">سعر التذكرة</span>
                    <span class="info-value price-highlight">{{ $busLine->ticket_price }} دينار</span>
                </div>
                <div class="info-item">
                    <span class="info-label">نوع التذكرة</span>
                    <span class="info-value">تذكرة واحدة</span>
                </div>
                <div class="info-item">
                    <span class="info-label">طريقة الدفع</span>
                    <span class="info-value">نقداً للسائق</span>
                </div>
            </div>

            <!-- Service Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-cogs fa-lg"></i>
                    <h3 class="info-card-title">معلومات الخدمة</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">حالة الخط</span>
                    <span class="info-value">
                        @if($busLine->status == 'active')
                            يعمل بشكل طبيعي
                        @elseif($busLine->status == 'maintenance')
                            قيد الصيانة - خدمة محدودة
                        @else
                            متوقف مؤقتاً
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">نوع الباص</span>
                    <span class="info-value">باص عادي</span>
                </div>
                <div class="info-item">
                    <span class="info-label">مكيف الهواء</span>
                    <span class="info-value">متوفر</span>
                </div>
            </div>
        </div>

        <!-- Schedule Section -->
        <div class="schedule-section">
            <div class="schedule-header">
                <h2 class="schedule-title">
                    <i class="fas fa-clock"></i>
                    جدول التشغيل
                </h2>
            </div>
            
            <div class="schedule-grid">
                <div class="schedule-card">
                    <div class="schedule-time">{{ date('H:i', strtotime($busLine->start_time)) }}</div>
                    <div class="schedule-label">بداية التشغيل</div>
                </div>
                <div class="schedule-card">
                    <div class="schedule-time">{{ date('H:i', strtotime($busLine->end_time)) }}</div>
                    <div class="schedule-label">نهاية التشغيل</div>
                </div>
            </div>

            <div class="frequency-display">
                <div class="frequency-number">{{ $busLine->frequency_minutes }}</div>
                <div class="frequency-text">دقيقة بين كل باص والآخر</div>
            </div>
        </div>

        <!-- Route Map Section -->
        <div class="route-map-section">
            <div class="map-header">
                <h2 class="map-title">
                    <i class="fas fa-map"></i>
                    خريطة المسار
                </h2>
            </div>
            <div class="map-placeholder">
                <div>
                    <i class="fas fa-route fa-3x mb-3" style="color: var(--light-aqua-line);"></i>
                    <br>
                    <strong>سيتم عرض خريطة المسار هنا</strong>
                    <br>
                    <small style="color: #999;">يمكن دمج خرائط تفاعلية تُظهر المسار والمحطات</small>
                </div>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="tips-section">
            <div class="tips-header">
                <i class="fas fa-lightbulb fa-lg"></i>
                <h3 class="tips-title">نصائح للركاب</h3>
            </div>
            
            <div class="tip-item">
                <i class="fas fa-clock tip-icon"></i>
                <span class="tip-text">احرص على الوصول للمحطة قبل الموعد بـ 5 دقائق</span>
            </div>
            <div class="tip-item">
                <i class="fas fa-money-bill tip-icon"></i>
                <span class="tip-text">تأكد من توفر المبلغ المطلوب نقداً</span>
            </div>
            <div class="tip-item">
                <i class="fas fa-hand-paper tip-icon"></i>
                <span class="tip-text">أشر للسائق لإيقاف الباص</span>
            </div>
            <div class="tip-item">
                <i class="fas fa-mobile-alt tip-icon"></i>
                <span class="tip-text">يمكنك تتبع مواقيت الباصات عبر التطبيق</span>
            </div>
            <div class="tip-item">
                <i class="fas fa-users tip-icon"></i>
                <span class="tip-text">أولوية الجلوس لكبار السن والحوامل</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.breadcrumb-nav, .header-section, .info-card, .schedule-section, .route-map-section, .tips-section');
            
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

            // Animate frequency number
            const frequencyNumber = document.querySelector('.frequency-number');
            const targetNumber = parseInt(frequencyNumber.textContent);
            let currentNumber = 0;
            const increment = targetNumber / 30; // Animation duration

            const animateNumber = () => {
                if (currentNumber < targetNumber) {
                    currentNumber += increment;
                    frequencyNumber.textContent = Math.floor(currentNumber);
                    requestAnimationFrame(animateNumber);
                } else {
                    frequencyNumber.textContent = targetNumber;
                }
            };

            // Start animation after a delay
            setTimeout(animateNumber, 1000);
        });
    </script>
</body>
</html>