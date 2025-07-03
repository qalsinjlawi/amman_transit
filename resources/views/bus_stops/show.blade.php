<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $busStop->stop_name }} - Amman Transit</title>
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

        .stop-title {
            color: var(--deep-transit-green);
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .stop-subtitle {
            color: #666;
            font-size: 1.3rem;
            margin-bottom: 25px;
            font-weight: 400;
        }

        .status-badge {
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            margin-bottom: 20px;
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
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .info-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            color: var(--deep-transit-green);
        }

        .info-card-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 1rem;
        }

        .info-value {
            color: #666;
            font-weight: 400;
            font-size: 1rem;
            text-align: left;
        }

        .map-container {
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
            font-size: 1.3rem;
            font-weight: 600;
            text-align: center;
        }

        .map-placeholder {
            height: 400px;
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

        .coordinates {
            background: var(--background-sandstone);
            padding: 20px;
            text-align: center;
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            color: var(--deep-transit-green);
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
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

        .share-section {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px var(--shadow);
            text-align: center;
        }

        .share-title {
            color: var(--deep-transit-green);
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px 20px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }
            
            .stop-title {
                font-size: 2.2rem;
                flex-direction: column;
                gap: 15px;
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
            
            .coordinates {
                font-size: 1rem;
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
                    <a href="{{ route('bus_stops.index') }}">
                        <i class="fas fa-bus"></i> محطات النقل العام
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $busStop->stop_name }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="header-section">
            <h1 class="stop-title">
                <i class="fas fa-map-marker-alt"></i>
                {{ $busStop->stop_name }}
            </h1>
            <p class="stop-subtitle">{{ $busStop->area ?? 'منطقة غير محددة' }}</p>
            
            <span class="status-badge status-{{ $busStop->status }}">
                @if($busStop->status == 'active')
                    <i class="fas fa-check-circle"></i> المحطة نشطة وتعمل
                @elseif($busStop->status == 'maintenance')
                    <i class="fas fa-tools"></i> المحطة قيد الصيانة
                @else
                    <i class="fas fa-times-circle"></i> المحطة مغلقة مؤقتاً
                @endif
            </span>

            <div>
                <a href="{{ route('bus_stops.index') }}" class="back-btn">
                    <i class="fas fa-arrow-right"></i>
                    العودة للقائمة
                </a>
            </div>
        </div>

        <!-- Information Grid -->
        <div class="info-grid">
            <!-- Basic Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <h3 class="info-card-title">معلومات المحطة</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">اسم المحطة</span>
                    <span class="info-value">{{ $busStop->stop_name }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">المنطقة</span>
                    <span class="info-value">{{ $busStop->area ?? 'غير محدد' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">العنوان</span>
                    <span class="info-value">{{ $busStop->address ?? 'غير محدد' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">ساعات العمل</span>
                    <span class="info-value">{{ $busStop->operating_hours }}</span>
                </div>
            </div>

            <!-- Location Information -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-map-pin fa-lg"></i>
                    <h3 class="info-card-title">معلومات الموقع</h3>
                </div>
                <div class="info-item">
                    <span class="info-label">خط العرض</span>
                    <span class="info-value">{{ $busStop->latitude }}°</span>
                </div>
                <div class="info-item">
                    <span class="info-label">خط الطول</span>
                    <span class="info-value">{{ $busStop->longitude }}°</span>
                </div>
                <div class="info-item">
                    <span class="info-label">حالة المحطة</span>
                    <span class="info-value">
                        @if($busStop->status == 'active')
                            نشطة وتعمل بشكل طبيعي
                        @elseif($busStop->status == 'maintenance')
                            قيد الصيانة - خدمة محدودة
                        @else
                            مغلقة مؤقتاً
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">تاريخ آخر تحديث</span>
                    <span class="info-value">{{ $busStop->updated_at->format('Y-m-d') }}</span>
                </div>
            </div>
        </div>

        <!-- Map Container -->
        <div class="map-container">
            <div class="map-header">
                <i class="fas fa-map"></i>
                موقع المحطة على الخريطة
            </div>
            <div class="map-placeholder">
                <div>
                    <i class="fas fa-map fa-3x mb-3" style="color: var(--light-aqua-line);"></i>
                    <br>
                    <strong>سيتم عرض الخريطة التفاعلية هنا</strong>
                    <br>
                    <small style="color: #999;">يمكن دمج Google Maps أو OpenStreetMap لاحقاً</small>
                </div>
            </div>
            <div class="coordinates">
                <i class="fas fa-crosshairs"></i>
                الإحداثيات: {{ $busStop->latitude }}, {{ $busStop->longitude }}
            </div>
        </div>

        <!-- Share and Actions Section -->
        <div class="share-section">
            <h3 class="share-title">
                <i class="fas fa-share-alt"></i>
                مشاركة والوصول للمحطة
            </h3>
            <div class="action-buttons">
                <a href="https://www.google.com/maps?q={{ $busStop->latitude }},{{ $busStop->longitude }}" 
                   target="_blank" class="action-btn maps-btn">
                    <i class="fab fa-google"></i>
                    فتح في Google Maps
                </a>
                <button class="action-btn" onclick="copyCoordinates()">
                    <i class="fas fa-copy"></i>
                    نسخ الإحداثيات
                </button>
                <button class="action-btn" onclick="shareLocation()">
                    <i class="fas fa-share"></i>
                    مشاركة الموقع
                </button>
                <a href="https://waze.com/ul?q={{ $busStop->latitude }},{{ $busStop->longitude }}" 
                   target="_blank" class="action-btn" style="background: #33ccff;">
                    <i class="fas fa-route"></i>
                    فتح في Waze
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Copy coordinates to clipboard
        function copyCoordinates() {
            const coordinates = "{{ $busStop->latitude }}, {{ $busStop->longitude }}";
            navigator.clipboard.writeText(coordinates).then(function() {
                showMessage('تم نسخ الإحداثيات بنجاح!', 'success');
            }).catch(function() {
                showMessage('حدث خطأ في نسخ الإحداثيات', 'error');
            });
        }

        // Share location
        function shareLocation() {
            const shareData = {
                title: 'موقع المحطة - {{ $busStop->stop_name }}',
                text: 'موقع محطة {{ $busStop->stop_name }} في {{ $busStop->area ?? "عمان" }}',
                url: `https://www.google.com/maps?q={{ $busStop->latitude }},{{ $busStop->longitude }}`
            };

            if (navigator.share) {
                navigator.share(shareData);
            } else {
                // Fallback for browsers that don't support Web Share API
                const url = `https://www.google.com/maps?q={{ $busStop->latitude }},{{ $busStop->longitude }}`;
                navigator.clipboard.writeText(url).then(function() {
                    showMessage('تم نسخ رابط الموقع بنجاح!', 'info');
                });
            }
        }

        // Show message function
        function showMessage(message, type) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-info';
            const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-info-circle';
            
            const alert = document.createElement('div');
            alert.className = `alert ${alertClass} alert-dismissible fade show`;
            alert.innerHTML = `
                <i class="${icon} me-2"></i>
                ${message}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            
            document.querySelector('.main-container').insertBefore(alert, document.querySelector('.breadcrumb-nav'));
            
            // Auto dismiss after 4 seconds
            setTimeout(() => {
                if (alert.parentElement) {
                    alert.remove();
                }
            }, 4000);
        }

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.breadcrumb-nav, .header-section, .info-card, .map-container, .share-section');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });
    </script>
</body>
</html>