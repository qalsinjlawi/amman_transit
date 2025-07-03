<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الجداول الزمنية - Amman Transit</title>
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

        .day-type-badges {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .day-badge {
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--light-aqua-line);
            color: var(--light-aqua-line);
            background: var(--white);
        }

        .day-badge.active {
            background: var(--light-aqua-line);
            color: var(--white);
        }

        .day-badge:hover {
            transform: translateY(-2px);
        }

        .schedules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .schedule-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-right: 5px solid var(--light-aqua-line);
        }

        .schedule-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .schedule-header {
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
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .line-name {
            font-weight: 600;
            color: var(--deep-transit-green);
            font-size: 1.1rem;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .departure-time {
            font-size: 2rem;
            font-weight: 700;
            color: var(--light-aqua-line);
            text-align: center;
            margin-bottom: 15px;
        }

        .schedule-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            text-align: center;
            padding: 10px;
            background: var(--background-sandstone);
            border-radius: 10px;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 600;
            color: var(--deep-transit-green);
        }

        .direction-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
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
            
            .schedules-grid {
                grid-template-columns: 1fr;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .day-type-badges {
                flex-direction: column;
                align-items: center;
            }

            .schedule-details {
                grid-template-columns: 1fr;
            }

            .schedule-header {
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
                <i class="fas fa-calendar-alt"></i>
                الجداول الزمنية
            </h1>
            <p class="page-subtitle">مواعيد انطلاق جميع خطوط الباصات</p>
        </div>

        <!-- Day Type Selection -->
        <div class="day-type-badges">
            <div class="day-badge active" data-day="all">
                <i class="fas fa-calendar"></i> جميع الأيام
            </div>
            <div class="day-badge" data-day="weekday">
                <i class="fas fa-business-time"></i> أيام العمل
            </div>
            <div class="day-badge" data-day="friday">
                <i class="fas fa-mosque"></i> يوم الجمعة
            </div>
            <div class="day-badge" data-day="saturday">
                <i class="fas fa-calendar-weekend"></i> يوم السبت
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">البحث عن خط</label>
                    <input type="text" class="search-input" placeholder="ابحث عن رقم الخط أو اسمه..." id="searchInput">
                </div>
                <div class="filter-group">
                    <label class="filter-label">الاتجاه</label>
                    <select class="filter-select" id="directionFilter">
                        <option value="all">جميع الاتجاهات</option>
                        <option value="forward">الذهاب</option>
                        <option value="backward">العودة</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">الحالة</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="all">جميع الحالات</option>
                        <option value="active">نشط</option>
                        <option value="inactive">غير نشط</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Schedules Grid -->
        @if($busSchedules->count() > 0)
            <div class="schedules-grid" id="schedulesGrid">
                @foreach ($busSchedules as $schedule)
                    <div class="schedule-card" 
                         data-day="{{ $schedule->day_type }}" 
                         data-direction="{{ $schedule->direction }}"
                         data-status="{{ $schedule->is_active ? 'active' : 'inactive' }}">
                        
                        <div class="schedule-header">
                            <div class="line-info">
                                <span class="line-number">{{ $schedule->busLine->line_number }}</span>
                                <span class="line-name">{{ Str::limit($schedule->busLine->line_name, 20) }}</span>
                            </div>
                            <span class="status-badge status-{{ $schedule->is_active ? 'active' : 'inactive' }}">
                                @if($schedule->is_active)
                                    <i class="fas fa-check-circle"></i> نشط
                                @else
                                    <i class="fas fa-times-circle"></i> غير نشط
                                @endif
                            </span>
                        </div>

                        <div class="departure-time">
                            {{ date('H:i', strtotime($schedule->departure_time)) }}
                        </div>

                        <div class="direction-indicator">
                            @if($schedule->direction == 'forward')
                                <i class="fas fa-arrow-left direction-forward"></i>
                                <span class="direction-forward">اتجاه الذهاب</span>
                            @else
                                <i class="fas fa-arrow-right direction-backward"></i>
                                <span class="direction-backward">اتجاه العودة</span>
                            @endif
                        </div>

                        <div class="schedule-details">
                            <div class="detail-item">
                                <div class="detail-label">نوع اليوم</div>
                                <div class="detail-value">
                                    @if($schedule->day_type == 'weekday')
                                        أيام العمل
                                    @elseif($schedule->day_type == 'friday')
                                        يوم الجمعة
                                    @else
                                        يوم السبت
                                    @endif
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الخط</div>
                                <div class="detail-value">{{ $schedule->busLine->line_number }}</div>
                            </div>
                        </div>

                        <a href="{{ route('bus_schedules.show', $schedule->id) }}" class="view-btn">
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
                <p>لم يتم العثور على جداول تطابق معايير البحث</p>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-calendar-alt"></i>
                <h3>لا توجد جداول زمنية حالياً</h3>
                <p>سيتم إضافة الجداول الزمنية قريباً</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Day type filter
        document.querySelectorAll('.day-badge').forEach(badge => {
            badge.addEventListener('click', function() {
                // Remove active class from all badges
                document.querySelectorAll('.day-badge').forEach(b => b.classList.remove('active'));
                // Add active class to clicked badge
                this.classList.add('active');
                
                filterSchedules();
            });
        });

        // Search and filter functionality
        document.getElementById('searchInput').addEventListener('keyup', filterSchedules);
        document.getElementById('directionFilter').addEventListener('change', filterSchedules);
        document.getElementById('statusFilter').addEventListener('change', filterSchedules);

        function filterSchedules() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const selectedDay = document.querySelector('.day-badge.active').dataset.day;
            const selectedDirection = document.getElementById('directionFilter').value;
            const selectedStatus = document.getElementById('statusFilter').value;
            
            const scheduleCards = document.querySelectorAll('.schedule-card');
            const noResults = document.getElementById('noResults');
            let visibleCards = 0;
            
            scheduleCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                const dayType = card.dataset.day;
                const direction = card.dataset.direction;
                const status = card.dataset.status;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !text.includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Day filter
                if (selectedDay !== 'all' && dayType !== selectedDay) {
                    shouldShow = false;
                }
                
                // Direction filter
                if (selectedDirection !== 'all' && direction !== selectedDirection) {
                    shouldShow = false;
                }
                
                // Status filter
                if (selectedStatus !== 'all' && status !== selectedStatus) {
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

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .filters-section, .schedule-card');
            
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