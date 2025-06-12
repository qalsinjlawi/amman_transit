<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محطات النقل العام - Amman Transit</title>
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

        .table-container {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px var(--shadow);
        }

        .table-header {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 20px 30px;
            text-align: center;
        }

        .table-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
        }

        .custom-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 18px 20px;
            text-align: right;
            font-weight: 600;
            font-size: 1rem;
            border: none;
        }

        .custom-table tbody td {
            padding: 18px 20px;
            border-bottom: 1px solid #E8E4DD;
            text-align: right;
            vertical-align: middle;
        }

        .custom-table tbody tr {
            transition: background-color 0.3s ease;
        }

        .custom-table tbody tr:hover {
            background-color: var(--background-sandstone);
        }

        .stop-name {
            font-weight: 600;
            color: var(--deep-transit-green);
            font-size: 1.1rem;
        }

        .status-badge {
            padding: 6px 14px;
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

        .view-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
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
            
            .custom-table {
                font-size: 0.9rem;
            }
            
            .custom-table thead th,
            .custom-table tbody td {
                padding: 12px 15px;
            }

            .custom-table thead th {
                font-size: 0.9rem;
            }

            .stop-name {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .custom-table thead th:nth-child(3),
            .custom-table tbody td:nth-child(3) {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">
                <i class="fas fa-bus"></i>
                محطات النقل العام
            </h1>
            <p class="page-subtitle">اكتشف جميع محطات النقل العام في  عمان ترانزيت</p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="ابحث عن محطة..." id="searchInput">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">
                    <i class="fas fa-list"></i>
                    قائمة المحطات المتاحة
                </h2>
            </div>
            
            @if($busStops->count() > 0)
                <table class="custom-table" id="stopsTable">
                    <thead>
                        <tr>
                            <th><i class="fas fa-map-marker-alt"></i> اسم المحطة</th>
                            <th><i class="fas fa-map-marked-alt"></i> المنطقة</th>
                            <th><i class="fas fa-home"></i> العنوان</th>
                            <th><i class="fas fa-signal"></i> الحالة</th>
                            <th><i class="fas fa-clock"></i> ساعات العمل</th>
                            <th><i class="fas fa-eye"></i> التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($busStops as $busStop)
                            <tr>
                                <td>
                                    <div class="stop-name">{{ $busStop->stop_name }}</div>
                                </td>
                                <td>{{ $busStop->area ?? 'غير محدد' }}</td>
                                <td>{{ $busStop->address ?? 'غير محدد' }}</td>
                                <td>
                                    <span class="status-badge status-{{ $busStop->status }}">
                                        @if($busStop->status == 'active')
                                            <i class="fas fa-check-circle"></i> نشطة
                                        @elseif($busStop->status == 'maintenance')
                                            <i class="fas fa-tools"></i> صيانة
                                        @else
                                            <i class="fas fa-times-circle"></i> مغلقة
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $busStop->operating_hours }}</td>
                                <td>
                                    <a href="{{ route('bus_stops.show', $busStop->id) }}" class="view-btn">
                                        <i class="fas fa-eye"></i>
                                        عرض
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- No Search Results Message -->
                <div class="no-results" id="noResults">
                    <i class="fas fa-search"></i>
                    <h4>لا توجد نتائج</h4>
                    <p>لم يتم العثور على محطات تطابق بحثك</p>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>لا توجد محطات حالياً</h3>
                    <p>سيتم إضافة المحطات قريباً</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const tableRows = document.querySelectorAll('#stopsTable tbody tr');
            const noResults = document.getElementById('noResults');
            let visibleRows = 0;
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleRows === 0 && searchTerm !== '') {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });

        // Add smooth animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.header-section, .search-section, .table-container');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });

            // Add hover effects for table rows
            const tableRows = document.querySelectorAll('.custom-table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>