<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول خط {{ $busSchedule->busLine->line_number }} - {{ date('H:i', strtotime($busSchedule->departure_time)) }} - Amman Transit</title>
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

        .schedule-header {
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

        .status-badge {
            padding: 10px 20px;
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

        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .departure-time-display {
            font-size: 4rem;
            font-weight: 700;
            color: var(--light-aqua-line);
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .line-name {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 15px;
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
            font-size: 1.3rem;
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

        .price-highlight {
            color: var(--light-aqua-line);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .route-info-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .route-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .route-title {
            color: var(--deep-transit-green);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .route-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .station {
            background: var(--background-sandstone);
            border: 2px solid var(--light-aqua-line);
            border-radius: 12px;
            padding: 20px;
            font-weight: 600;
            color: var(--deep-transit-green);
            text-align: center;
            min-width: 200px;
            flex: 1;
            max-width: 350px;
        }

        .route-arrow {
            color: var(--light-aqua-line);
            font-size: 2.5rem;
            font-weight: bold;
        }

        .timing-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px var(--shadow);
            margin-bottom: 30px;
        }

        .timing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .timing-card {
            background: var(--background-sandstone);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 2px solid var(--light-aqua-line);
        }

        .timing-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 5px;
        }

        .timing-label {
            color: #666;
            font-size: 0.9rem;
        }

        .day-type-display {
            background: linear-gradient(45deg, var(--light-aqua-line), #2A8A8A);
            color: var(--white);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin-top: 20px;
        }

        .day-type-text {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .day-type-desc {
            font-size: 1rem;
            opacity: 0.9;
        }

        .next-departures {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .next-departures-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: var(--deep-transit-green);
        }

        .next-departures-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .departure-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .departure-item:last-child {
            border-bottom: none;
        }

        .departure-time {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--light-aqua-line);
        }

        .departure-status {
            font-size: 0.9rem;
            color: #666;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .schedule-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .departure-time-display {
                font-size: 3rem;
            }
            
            .route-display {
                flex-direction: column;
                gap: 15px;
            }
            
            .route-arrow {
                transform: rotate(90deg);
                font-size: 2rem;
            }
            
            .station {
                min-width: auto;
                max-width: none;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .timing-grid {
                grid-template-columns: 1fr 1fr;
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
                    <a href="{{ route('bus_schedules.index') }}">
                        <i class="fas fa-calendar-alt"></i> الجداول الزمنية
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('bus_lines.show', $busSchedule->busLine->id) }}">
                        خط {{ $busSchedule->busLine->line_number }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ date('H:i', strtotime($busSchedule->departure_time)) }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="header-section">
            <div class="schedule-header">
                <span class="line-badge">
                    <i class="fas fa-bus"></i>
                    خط {{ $busSchedule->busLine->line_number }}
                </span>
                <span class="status-badge status-{{ $busSchedule->is_active ? 'active' : 'inactive' }}">
                    @if($busSchedule->is_active)
                        <i class="fas fa-check-circle"></i> نشط
                    @else
                        <i class="fas fa-times-circle"></i> غير نشط
                    @endif
                </span>
            </div>

            <h1 class="line-name">{{ $busSchedule->busLine->line_name }}</h1>

            <div class="departure-time-display">
                {{ date('H:i', strtotime($busSchedule->departure_time)) }}
            </div>

            <div class="direction-display">
                @if($busSchedule->direction == 'forward')
                    <i class="fas fa-arrow-left fa-2x direction-forward"></i>
                    <span class="direction-text direction-forward">اتجاه الذهاب</span>
                @else
                    <i class="fas fa-arrow-right fa-2x direction-backward"></i>
                    <span class="direction-text direction-backward">اتجاه العودة</span>
                @endif
            </div>

            <div>
                <a href="{{ route('bus_schedules.index') }}" class="back-btn">
                    <i class="fas fa-arrow-right"></i>
                    العودة للجداول الزمنية
                </a>
            </div>
        </div>

        <!-- Information Grid -->
        <div class="info-grid">
            <!-- Schedule Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-clock fa-lg"></i>
                    <h3 class="info-card-title">معلومات الموعد</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">وقت المغادرة</span>
                    <span class="info-value">{{ date('H:i', strtotime($busSchedule->departure_time)) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">الاتجاه</span>
                    <span class="info-value">
                        @if($busSchedule->direction == 'forward')
                            الذهاب
                        @else
                            العودة
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">نوع اليوم</span>
                    <span class="info-value">
                        @if($busSchedule->day_type == 'weekday')
                            أيام العمل
                        @elseif($busSchedule->day_type == 'friday')
                            يوم الجمعة
                        @else
                            يوم السبت
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">حالة الخدمة</span>
                    <span class="info-value">
                        @if($busSchedule->is_active)
                            متاح حالياً
                        @else
                            غير متاح
                        @endif
                    </span>
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
                    <span class="info-value">{{ $busSchedule->busLine->line_number }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">سعر التذكرة</span>
                    <span class="info-value price-highlight">{{ $busSchedule->busLine->ticket_price }} دينار</span>
                </div>
                <div class="info-item">
                    <span class="info-label">التكرار</span>
                    <span class="info-value">كل {{ $busSchedule->busLine->frequency_minutes }} دقيقة</span>
                </div>
                <div class="info-item">
                    <span class="info-label">ساعات التشغيل</span>
                    <span class="info-value">{{ date('H:i', strtotime($busSchedule->busLine->start_time)) }} - {{ date('H:i', strtotime($busSchedule->busLine->end_time)) }}</span>
                </div>
            </div>
        </div>

        <!-- Route Information -->
        <div class="route-info-section">
            <div class="route-header">
                <h2 class="route-title">
                    <i class="fas fa-map-marked-alt"></i>
                    مسار الرحلة
                </h2>
            </div>
            
            <div class="route-display">
                @if($busSchedule->direction == 'forward')
                    <div class="station">
                        <i class="fas fa-map-marker-alt"></i><br>
                        <strong>{{ $busSchedule->busLine->start_station }}</strong><br>
                        <small>نقطة الانطلاق</small>
                    </div>
                    <i class="fas fa-arrow-left route-arrow"></i>
                    <div class="station">
                        <i class="fas fa-map-marker-alt"></i><br>
                        <strong>{{ $busSchedule->busLine->end_station }}</strong><br>
                        <small>الوجهة النهائية</small>
                    </div>
                @else
                    <div class="station">
                        <i class="fas fa-map-marker-alt"></i><br>
                        <strong>{{ $busSchedule->busLine->end_station }}</strong><br>
                        <small>نقطة الانطلاق</small>
                    </div>
                    <i class="fas fa-arrow-left route-arrow"></i>
                    <div class="station">
                        <i class="fas fa-map-marker-alt"></i><br>
                        <strong>{{ $busSchedule->busLine->start_station }}</strong><br>
                        <small>الوجهة النهائية</small>
                    </div>
                @endif
            </div>
        </div>

        <!-- Timing Section -->
        <div class="timing-section">
            <div class="timing-grid">
                <div class="timing-card">
                    <div class="timing-value">{{ date('H:i', strtotime($busSchedule->departure_time)) }}</div>
                    <div class="timing-label">وقت المغادرة</div>
                </div>
                <div class="timing-card">
                    <div class="timing-value">{{ $busSchedule->busLine->frequency_minutes }} دقيقة</div>
                    <div class="timing-label">التكرار</div>
                </div>
            </div>

            <div class="day-type-display">
                <div class="day-type-text">
                    @if($busSchedule->day_type == 'weekday')
                        أيام العمل
                    @elseif($busSchedule->day_type == 'friday')
                        يوم الجمعة
                    @else
                        يوم السبت
                    @endif
                </div>
                <div class="day-type-desc">
                    @if($busSchedule->day_type == 'weekday')
                        الأحد إلى الخميس
                    @elseif($busSchedule->day_type == 'friday')
                        جدول خاص ليوم الجمعة
                    @else
                        جدول نهاية الأسبوع
                    @endif
                </div>
            </div>
        </div>

        <!-- Next Departures -->
        <div class="next-departures">
            <div class="next-departures-header">
                <i class="fas fa-clock fa-lg"></i>
                <h3 class="next-departures-title">المواعيد التالية لنفس الخط</h3>
            </div>
            
            @php
                $currentTime = strtotime($busSchedule->departure_time);
                $frequency = $busSchedule->busLine->frequency_minutes;
                $nextDepartures = [];
                for($i = 1; $i <= 5; $i++) {
                    $nextTime = $currentTime + ($i * $frequency * 60);
                    $nextDepartures[] = date('H:i', $nextTime);
                }
            @endphp

            @foreach($nextDepartures as $index => $time)
                <div class="departure-item">
                    <span class="departure-time">{{ $time }}</span>
                    <span class="departure-status">
                        @if($index == 0)
                            الموعد التالي
                        @else
                            بعد {{ ($index + 1) * $frequency }} دقيقة
                        @endif
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.breadcrumb-nav, .header-section, .info-card, .route-info-section, .timing-section, .next-departures');
            
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

            // Update time every second for real-time feel
            setInterval(function() {
                const now = new Date();
                const currentTime = now.getHours().toString().padStart(2, '0') + ':' + 
                                  now.getMinutes().toString().padStart(2, '0');
                
                // You can add real-time features here if needed
            }, 1000);
        });
    </script>
</body>
</html>