<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $station->stop_name }} - محطة شاملة - Amman Transit</title>
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
            --shadow-hover: rgba(31, 89, 74, 0.2);
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(243, 238, 231, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--light-aqua-line);
            border-top: 4px solid var(--deep-transit-green);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px var(--shadow);
            border-right: 6px solid var(--deep-transit-green);
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, var(--light-aqua-line) 20%, transparent 70%);
            opacity: 0.1;
        }

        .station-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .station-title-group {
            flex: 1;
            min-width: 300px;
        }

        .station-title {
            color: var(--deep-transit-green);
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .station-subtitle {
            color: #666;
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 400;
        }

        .station-badges {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .status-badge {
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-active {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .status-maintenance {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
        }

        .status-closed {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }

        .quick-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .quick-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .quick-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
            box-shadow: 0 6px 20px rgba(59, 180, 180, 0.3);
        }
        .stats-dashboard {
            background: var(--white);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px var(--shadow);
        }

        .stats-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .stats-title {
            color: var(--deep-transit-green);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-item {
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #ede8e0 100%);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--light-aqua-line) 0%, var(--deep-transit-green) 100%);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: var(--light-aqua-line);
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 8px;
            counter-reset: stat-counter;
        }

        .stat-label {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }

        .navigation-tabs {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 6px 20px var(--shadow);
        }

        .tabs-header {
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 25px;
        }

        .nav-tabs {
            border: none;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: -2px;
        }

        .nav-tab {
            background: transparent;
            border: 2px solid transparent;
            color: #666;
            padding: 15px 25px;
            border-radius: 15px 15px 0 0;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .nav-tab:hover {
            color: var(--light-aqua-line);
            background: rgba(59, 180, 180, 0.1);
        }

        .nav-tab.active {
            color: var(--deep-transit-green);
            background: var(--background-sandstone);
            border-color: var(--light-aqua-line);
            border-bottom-color: var(--background-sandstone);
        }

        .nav-tab.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--background-sandstone);
        }

        .badge {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .tab-content {
            min-height: 400px;
        }

        .tab-pane {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .tab-pane.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .section-title {
            color: var(--deep-transit-green);
            font-size: 1.6rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-family: 'Cairo', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn:hover {
            background: #2A8A8A;
            transform: translateY(-1px);
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
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-hover);
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
            border-bottom: 1px solid #f8f9fa;
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
            font-weight: 500;
            text-align: left;
        }

        .highlight-value {
            color: var(--light-aqua-line);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .coordinates-display {
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #ede8e0 100%);
            border-radius: 10px;
            padding: 15px;
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            color: var(--deep-transit-green);
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .coordinates-display:hover {
            background: linear-gradient(135deg, var(--light-aqua-line) 0%, #2A8A8A 100%);
            color: var(--white);
        }
        .lines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .line-card {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
            position: relative;
            overflow: hidden;
        }

        .line-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(59, 180, 180, 0.1) 0%, transparent 70%);
            transform: scale(0);
            transition: transform 0.5s ease;
        }

        .line-card:hover::before {
            transform: scale(1);
        }

        .line-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--shadow-hover);
        }

        .line-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
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
            font-size: 1.2rem;
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

        .schedules-timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            background: var(--white);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px var(--shadow);
            position: relative;
            border-left: 4px solid var(--light-aqua-line);
            transition: all 0.3s ease;
        }

        .timeline-item:hover {
            transform: translateX(10px);
            box-shadow: 0 6px 20px var(--shadow-hover);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            background: var(--light-aqua-line);
            border-radius: 50%;
            border: 3px solid var(--white);
        }

        .schedule-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .schedule-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .departure-time {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--light-aqua-line);
        }

        .schedule-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .direction-indicator {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .view-schedule-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .view-schedule-btn:hover {
            background: #2A8A8A;
            color: var(--white);
        }

        .schedule-day-title {
            color: var(--deep-transit-green);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .line-stops-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .line-stop-card {
            background: var(--white);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .line-stop-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .line-stop-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stop-order {
            background: var(--light-aqua-line);
            color: var(--white);
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .direction-badge {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .direction-forward {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .direction-backward {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .line-stop-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .line-stop-details {
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .images-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .image-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px var(--shadow);
            transition: all 0.3s ease;
        }

        .image-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px var(--shadow-hover);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .station-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            cursor: pointer;
        }

        .image-card:hover .station-image {
            transform: scale(1.1);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(31, 89, 74, 0.8) 0%, rgba(59, 180, 180, 0.8) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-card:hover .image-overlay {
            opacity: 1;
        }

        .overlay-text {
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
        }

        .image-info {
            padding: 15px;
        }

        .image-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 8px;
        }

        .image-caption {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .image-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: #666;
        }

        .user-info, .upload-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nearby-stations {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .nearby-card {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 3px 12px var(--shadow);
            transition: all 0.3s ease;
            border-top: 3px solid var(--light-aqua-line);
        }

        .nearby-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .distance-badge {
            background: linear-gradient(135deg, var(--light-aqua-line) 0%, #2A8A8A 100%);
            color: var(--white);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            float: left;
            margin-bottom: 10px;
        }

        .nearby-station-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 8px;
        }

        .nearby-station-area {
            color: #666;
            margin-bottom: 10px;
        }

        .nearby-details {
            margin-bottom: 15px;
        }

        .nearby-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .lightbox {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
        }

        .lightbox-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
            border-radius: 15px;
            overflow: hidden;
        }

        .lightbox img {
            width: 100%;
            height: auto;
            display: block;
        }

        .close-lightbox {
            position: absolute;
            top: 20px;
            right: 30px;
            color: var(--white);
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10001;
            transition: color 0.3s ease;
        }

        .close-lightbox:hover {
            color: var(--light-aqua-line);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--light-aqua-line);
            margin-bottom: 20px;
        }

        .empty-state h4 {
            margin-bottom: 10px;
            color: var(--deep-transit-green);
        }

        .floating-action {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, var(--deep-transit-green) 0%, var(--light-aqua-line) 100%);
            color: var(--white);
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(31, 89, 74, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-action:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(31, 89, 74, 0.4);
        }

        @media (max-width: 1200px) {
            .main-container {
                max-width: 100%;
                padding: 15px;
            }
        }

        @media (max-width: 768px) {
            .station-title {
                font-size: 2.2rem;
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .station-header {
                flex-direction: column;
                text-align: center;
            }

            .nav-tabs {
                flex-direction: column;
                gap: 5px;
            }

            .nav-tab {
                border-radius: 10px;
                justify-content: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .lines-grid {
                grid-template-columns: 1fr;
            }

            .images-gallery {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .floating-action {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .station-title {
                font-size: 1.8rem;
            }

            .stats-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="main-container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('stations.index') }}">
                        <i class="fas fa-map-marker-alt"></i> المحطات
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $station->stop_name }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="header-section">
            <div class="station-header">
                <div class="station-title-group">
                    <h1 class="station-title">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $station->stop_name }}
                    </h1>
                    <p class="station-subtitle">{{ $station->area ?? 'منطقة غير محددة' }} - {{ $station->address ?? 'عنوان غير محدد' }}</p>
                    
                    <div class="station-badges">
                        <span class="status-badge status-{{ $station->status }}">
                            @if($station->status == 'active')
                                <i class="fas fa-check-circle"></i> المحطة نشطة وتعمل
                            @elseif($station->status == 'maintenance')
                                <i class="fas fa-tools"></i> المحطة قيد الصيانة
                            @else
                                <i class="fas fa-times-circle"></i> المحطة مغلقة مؤقتاً
                            @endif
                        </span>
                        
                        <div class="coordinates-display" onclick="copyCoordinates()" title="انقر لنسخ الإحداثيات">
                            <i class="fas fa-crosshairs"></i>
                            {{ $station->latitude }}, {{ $station->longitude }}
                        </div>
                    </div>
                </div>

                <div class="quick-actions">
                    <a href="https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}" 
                       target="_blank" class="quick-btn">
                        <i class="fab fa-google"></i>
                        Google Maps
                    </a>
                    <button class="quick-btn" onclick="shareLocation()">
                        <i class="fas fa-share"></i>
                        مشاركة
                    </button>
                    <button class="quick-btn" onclick="getDirections()">
                        <i class="fas fa-directions"></i>
                        الاتجاهات
                    </button>
                    <a href="{{ route('stations.index') }}" class="quick-btn" style="background: #6c757d;">
                        <i class="fas fa-arrow-right"></i>
                        العودة
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Dashboard -->
        <div class="stats-dashboard">
            <div class="stats-header">
                <h2 class="stats-title">
                    <i class="fas fa-chart-bar"></i>
                    إحصائيات المحطة
                </h2>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <i class="fas fa-route stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['total_lines'] }}">{{ $stats['total_lines'] }}</div>
                    <div class="stat-label">خطوط الباصات</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-calendar-alt stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['active_schedules'] }}">{{ $stats['active_schedules'] }}</div>
                    <div class="stat-label">جداول نشطة</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-images stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['total_images'] }}">{{ $stats['total_images'] }}</div>
                    <div class="stat-label">صور المحطة</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-map-marked-alt stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['nearby_stations_count'] }}">{{ $stats['nearby_stations_count'] }}</div>
                    <div class="stat-label">محطات قريبة</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-arrow-right stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['forward_lines'] }}">{{ $stats['forward_lines'] }}</div>
                    <div class="stat-label">خطوط الذهاب</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-arrow-left stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['backward_lines'] }}">{{ $stats['backward_lines'] }}</div>
                    <div class="stat-label">خطوط العودة</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-clock stat-icon"></i>
                    <div class="stat-number" data-target="{{ $stats['peak_hours_schedules'] }}">{{ $stats['peak_hours_schedules'] }}</div>
                    <div class="stat-label">مواعيد الذروة</div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-business-time stat-icon"></i>
                    <div class="stat-number">{{ $station->operating_hours }}</div>
                    <div class="stat-label">ساعات العمل</div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="navigation-tabs">
            <div class="tabs-header">
                <div class="nav-tabs">
                    <button class="nav-tab active" data-tab="station-info">
                        <i class="fas fa-info-circle"></i>
                        معلومات المحطة
                    </button>
                    <button class="nav-tab" data-tab="bus-lines">
                        <i class="fas fa-route"></i>
                        الخطوط المرتبطة
                        <span class="badge">{{ $relatedLines->count() }}</span>
                    </button>
                    <button class="nav-tab" data-tab="schedules">
                        <i class="fas fa-calendar-alt"></i>
                        الجداول الزمنية
                        <span class="badge">{{ $schedules->count() }}</span>
                    </button>
                    <button class="nav-tab" data-tab="line-stops">
                        <i class="fas fa-map-marked"></i>
                        محطات الخطوط
                        <span class="badge">{{ $lineStops->count() }}</span>
                    </button>
                    <button class="nav-tab" data-tab="images-gallery">
                        <i class="fas fa-images"></i>
                        معرض الصور
                        <span class="badge">{{ $stationImages->count() }}</span>
                    </button>
                    <button class="nav-tab" data-tab="nearby-stations">
                        <i class="fas fa-map-marked-alt"></i>
                        المحطات القريبة
                        <span class="badge">{{ $nearbyStations->count() }}</span>
                    </button>
                </div>
            </div>

            <div class="tab-content" id="tabContent">
                <!-- Tab 1: Station Information -->
                <div class="tab-pane active" id="station-info">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            معلومات تفصيلية عن المحطة
                        </h3>
                        
                    </div>

                    <div class="info-grid">
                        <!-- Basic Information -->
                        <div class="info-card">
                            <div class="info-card-header">
                                <i class="fas fa-home fa-lg"></i>
                                <h4 class="info-card-title">المعلومات الأساسية</h4>
                            </div>
                            <div class="info-item">
                                <span class="info-label">اسم المحطة</span>
                                <span class="info-value highlight-value">{{ $station->stop_name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">المنطقة</span>
                                <span class="info-value">{{ $station->area ?? 'غير محدد' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">العنوان الكامل</span>
                                <span class="info-value">{{ $station->address ?? 'غير محدد' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">ساعات العمل</span>
                                <span class="info-value highlight-value">{{ $station->operating_hours }}</span>
                            </div>
                        </div>

                        <!-- Location Information -->
                        <div class="info-card">
                            <div class="info-card-header">
                                <i class="fas fa-map-pin fa-lg"></i>
                                <h4 class="info-card-title">معلومات الموقع</h4>
                            </div>
                            <div class="info-item">
                                <span class="info-label">خط العرض</span>
                                <span class="info-value">{{ $station->latitude }}°</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">خط الطول</span>
                                <span class="info-value">{{ $station->longitude }}°</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">حالة المحطة</span>
                                <span class="info-value">
                                    @if($station->status == 'active')
                                        <span style="color: #28a745;">نشطة وتعمل بشكل طبيعي</span>
                                    @elseif($station->status == 'maintenance')
                                        <span style="color: #ffc107;">قيد الصيانة - خدمة محدودة</span>
                                    @else
                                        <span style="color: #dc3545;">مغلقة مؤقتاً</span>
                                    @endif
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">تاريخ آخر تحديث</span>
                                <span class="info-value">{{ $station->updated_at->format('Y-m-d H:i') }}</span>
                            </div>
                        </div>

                        <!-- Service Information -->
                        <div class="info-card">
                            <div class="info-card-header">
                                <i class="fas fa-cogs fa-lg"></i>
                                <h4 class="info-card-title">معلومات الخدمة</h4>
                            </div>
                            <div class="info-item">
                                <span class="info-label">عدد الخطوط المرتبطة</span>
                                <span class="info-value highlight-value">{{ $stats['total_lines'] }} خط</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">الجداول النشطة</span>
                                <span class="info-value">{{ $stats['active_schedules'] }} جدول</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">اتجاه الذهاب</span>
                                <span class="info-value">{{ $stats['forward_lines'] }} خط</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">اتجاه العودة</span>
                                <span class="info-value">{{ $stats['backward_lines'] }} خط</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Bus Lines -->
                <div class="tab-pane" id="bus-lines">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-route"></i>
                            خطوط الباصات المرتبطة بالمحطة
                        </h3>
                        <div class="section-actions">
                            <button class="action-btn" onclick="refreshLines()">
                                <i class="fas fa-sync"></i>
                                تحديث
                            </button>
                        </div>
                    </div>

                    @if($relatedLines->count() > 0)
                        <div class="lines-grid">
                            @foreach($relatedLines as $line)
                                <div class="line-card">
                                    <div class="line-header">
                                        <div class="line-info">
                                            <span class="line-number">{{ $line->line_number }}</span>
                                            <span class="status-badge status-{{ $line->status }}">
                                                @if($line->status == 'active')
                                                    <i class="fas fa-check-circle"></i> نشط
                                                @elseif($line->status == 'maintenance')
                                                    <i class="fas fa-tools"></i> صيانة
                                                @else
                                                    <i class="fas fa-pause-circle"></i> معلق
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <h4 class="line-name">{{ $line->line_name }}</h4>

                                    <div class="route-info">
                                        <div class="route-station">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $line->start_station }}
                                        </div>
                                        <i class="fas fa-arrow-left route-arrow"></i>
                                        <div class="route-station">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $line->end_station }}
                                        </div>
                                    </div>

                                    <div class="line-details">
                                        <div class="detail-item">
                                            <span class="detail-label">سعر التذكرة</span>
                                            <span class="detail-value price-highlight">{{ $line->ticket_price }} دينار</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">التكرار</span>
                                            <span class="detail-value">كل {{ $line->frequency_minutes }} دقيقة</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">بداية التشغيل</span>
                                            <span class="detail-value">{{ date('H:i', strtotime($line->start_time)) }}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">نهاية التشغيل</span>
                                            <span class="detail-value">{{ date('H:i', strtotime($line->end_time)) }}</span>
                                        </div>
                                    </div>

                                    <div class="line-actions">
                                        <a href="{{ route('bus_lines.show', $line->id) }}" class="view-btn">
                                            <i class="fas fa-eye"></i>
                                            عرض تفاصيل الخط
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-route"></i>
                            <h4>لا توجد خطوط مرتبطة</h4>
                            <p>لم يتم ربط أي خطوط باصات بهذه المحطة بعد</p>
                        </div>
                    @endif
                </div>

                <!-- Tab 3: Schedules -->
                <div class="tab-pane" id="schedules">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-calendar-alt"></i>
                            الجداول الزمنية للمحطة
                        </h3>
                        <div class="section-actions">
                            <button class="action-btn" onclick="filterSchedules('weekday')">
                                <i class="fas fa-business-time"></i>
                                أيام العمل
                            </button>
                            <button class="action-btn" onclick="filterSchedules('friday')">
                                <i class="fas fa-mosque"></i>
                                الجمعة
                            </button>
                            <button class="action-btn" onclick="filterSchedules('saturday')">
                                <i class="fas fa-calendar-weekend"></i>
                                السبت
                            </button>
                        </div>
                    </div>

                    @if($schedules->count() > 0)
                        <div class="schedules-container">
                            <!-- Weekday Schedules -->
                            <div class="schedule-section" data-day="weekday">
                                <h4 class="schedule-day-title">
                                    <i class="fas fa-business-time"></i>
                                    جداول أيام العمل (الأحد - الخميس)
                                </h4>
                                <div class="schedules-timeline">
                                    @foreach($schedulesByDay['weekday'] as $schedule)
                                        <div class="timeline-item">
                                            <div class="schedule-info">
                                                <div class="schedule-header">
                                                    <span class="line-number">خط {{ $schedule->busLine->line_number }}</span>
                                                    <span class="departure-time">{{ date('H:i', strtotime($schedule->departure_time)) }}</span>
                                                </div>
                                                <div class="schedule-details">
                                                    <span class="line-name">{{ $schedule->busLine->line_name }}</span>
                                                    <span class="direction-indicator">
                                                        @if($schedule->direction == 'forward')
                                                            <i class="fas fa-arrow-left"></i> اتجاه الذهاب
                                                        @else
                                                            <i class="fas fa-arrow-right"></i> اتجاه العودة
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{ route('bus_schedules.show', $schedule->id) }}" class="view-schedule-btn">
                                                <i class="fas fa-eye"></i>
                                                عرض التفاصيل
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Friday Schedules -->
                            @if($schedulesByDay['friday']->count() > 0)
                            <div class="schedule-section" data-day="friday" style="display: none;">
                                <h4 class="schedule-day-title">
                                    <i class="fas fa-mosque"></i>
                                    جداول يوم الجمعة
                                </h4>
                                <div class="schedules-timeline">
                                    @foreach($schedulesByDay['friday'] as $schedule)
                                        <div class="timeline-item">
                                            <div class="schedule-info">
                                                <div class="schedule-header">
                                                    <span class="line-number">خط {{ $schedule->busLine->line_number }}</span>
                                                    <span class="departure-time">{{ date('H:i', strtotime($schedule->departure_time)) }}</span>
                                                </div>
                                                <div class="schedule-details">
                                                    <span class="line-name">{{ $schedule->busLine->line_name }}</span>
                                                    <span class="direction-indicator">
                                                        @if($schedule->direction == 'forward')
                                                            <i class="fas fa-arrow-left"></i> اتجاه الذهاب
                                                        @else
                                                            <i class="fas fa-arrow-right"></i> اتجاه العودة
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{ route('bus_schedules.show', $schedule->id) }}" class="view-schedule-btn">
                                                <i class="fas fa-eye"></i>
                                                عرض التفاصيل
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Saturday Schedules -->
                            @if($schedulesByDay['saturday']->count() > 0)
                            <div class="schedule-section" data-day="saturday" style="display: none;">
                                <h4 class="schedule-day-title">
                                    <i class="fas fa-calendar-weekend"></i>
                                    جداول يوم السبت
                                </h4>
                                <div class="schedules-timeline">
                                    @foreach($schedulesByDay['saturday'] as $schedule)
                                        <div class="timeline-item">
                                            <div class="schedule-info">
                                                <div class="schedule-header">
                                                    <span class="line-number">خط {{ $schedule->busLine->line_number }}</span>
                                                    <span class="departure-time">{{ date('H:i', strtotime($schedule->departure_time)) }}</span>
                                                </div>
                                                <div class="schedule-details">
                                                    <span class="line-name">{{ $schedule->busLine->line_name }}</span>
                                                    <span class="direction-indicator">
                                                        @if($schedule->direction == 'forward')
                                                            <i class="fas fa-arrow-left"></i> اتجاه الذهاب
                                                        @else
                                                            <i class="fas fa-arrow-right"></i> اتجاه العودة
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{ route('bus_schedules.show', $schedule->id) }}" class="view-schedule-btn">
                                                <i class="fas fa-eye"></i>
                                                عرض التفاصيل
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-calendar-alt"></i>
                            <h4>لا توجد جداول زمنية</h4>
                            <p>لم يتم إنشاء جداول زمنية لهذه المحطة بعد</p>
                        </div>
                    @endif
                </div>
                <!-- Tab 4: Line Stops -->
                <div class="tab-pane" id="line-stops">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-map-marked"></i>
                            محطات الخطوط المرتبطة
                        </h3>
                        <div class="section-actions">
                            <button class="action-btn" onclick="sortLineStops('order')">
                                <i class="fas fa-sort-numeric-down"></i>
                                ترتيب
                            </button>
                            <button class="action-btn" onclick="sortLineStops('direction')">
                                <i class="fas fa-exchange-alt"></i>
                                اتجاه
                            </button>
                        </div>
                    </div>

                    @if($lineStops->count() > 0)
                        <div class="line-stops-grid">
                            @foreach($lineStops as $lineStop)
                                <div class="line-stop-card" data-direction="{{ $lineStop->direction }}" data-order="{{ $lineStop->stop_order }}">
                                    <div class="line-stop-header">
                                        <div class="line-info">
                                            <span class="line-number">خط {{ $lineStop->busLine->line_number }}</span>
                                            <span class="stop-order">محطة رقم {{ $lineStop->stop_order }}</span>
                                        </div>
                                        <div class="direction-badge direction-{{ $lineStop->direction }}">
                                            @if($lineStop->direction == 'forward')
                                                <i class="fas fa-arrow-left"></i> ذهاب
                                            @else
                                                <i class="fas fa-arrow-right"></i> عودة
                                            @endif
                                        </div>
                                    </div>

                                    <h4 class="line-stop-title">{{ $lineStop->busLine->line_name }}</h4>

                                    <div class="line-stop-details">
                                        <div class="detail-row">
                                            <span class="detail-label">وقت الوصول المتوقع</span>
                                            <span class="detail-value">
                                                @if($lineStop->arrival_time_offset)
                                                    +{{ $lineStop->arrival_time_offset }} دقيقة
                                                @else
                                                    غير محدد
                                                @endif
                                            </span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">المسار</span>
                                            <span class="detail-value">
                                                @if($lineStop->direction == 'forward')
                                                    {{ $lineStop->busLine->start_station }} ← {{ $lineStop->busLine->end_station }}
                                                @else
                                                    {{ $lineStop->busLine->end_station }} ← {{ $lineStop->busLine->start_station }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <a href="{{ route('line_stops.show', $lineStop->id) }}" class="view-btn">
                                        <i class="fas fa-eye"></i>
                                        عرض التفاصيل
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-map-marked"></i>
                            <h4>لا توجد محطات خطوط</h4>
                            <p>لم يتم ربط هذه المحطة بأي خطوط بعد</p>
                        </div>
                    @endif
                </div>

                <!-- Tab 5: Images Gallery -->
                <div class="tab-pane" id="images-gallery">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-images"></i>
                            معرض صور المحطة
                        </h3>
                        <div class="section-actions">
                            <button class="action-btn" onclick="uploadImage()">
                                <i class="fas fa-upload"></i>
                                رفع صورة
                            </button>
                            <button class="action-btn" onclick="toggleGalleryView()">
                                <i class="fas fa-th"></i>
                                تغيير العرض
                            </button>
                        </div>
                    </div>

                    @if($stationImages->count() > 0)
                        <div class="images-gallery">
                            @foreach($stationImages as $image)
                                <div class="image-card">
                                    <div class="image-container">
                                        <img src="{{ $image->image_url }}" 
                                             alt="صورة {{ $station->stop_name }}" 
                                             class="station-image"
                                             onclick="openLightbox('{{ $image->image_url }}', '{{ $image->caption ?? '' }}')">
                                        <div class="image-overlay">
                                            <div class="overlay-text">
                                                <i class="fas fa-search-plus"></i>
                                                عرض بحجم كامل
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-info">
                                        <h5 class="image-title">{{ $station->stop_name }}</h5>
                                        @if($image->caption)
                                            <p class="image-caption">{{ $image->caption }}</p>
                                        @endif
                                        <div class="image-meta">
                                            <div class="user-info">
                                                <i class="fas fa-user"></i>
                                                <span>{{ $image->user->name }}</span>
                                            </div>
                                            <div class="upload-date">
                                                <i class="fas fa-calendar"></i>
                                                <span>{{ $image->created_at->format('Y-m-d') }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('stop_images.show', $image->id) }}" class="view-btn">
                                            <i class="fas fa-eye"></i>
                                            عرض التفاصيل
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-images"></i>
                            <h4>لا توجد صور</h4>
                            <p>لم يتم رفع أي صور لهذه المحطة بعد</p>
                            <button class="action-btn" onclick="uploadImage()" style="margin-top: 15px;">
                                <i class="fas fa-upload"></i>
                                كن أول من يرفع صورة
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Tab 6: Nearby Stations -->
                <div class="tab-pane" id="nearby-stations">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-map-marked-alt"></i>
                            المحطات القريبة جغرافياً
                        </h3>
                        <div class="section-actions">
                            <button class="action-btn" onclick="showOnMap()">
                                <i class="fas fa-map"></i>
                                عرض على الخريطة
                            </button>
                        </div>
                    </div>

                    @if($nearbyStations->count() > 0)
                        <div class="nearby-stations">
                            @foreach($nearbyStations as $nearbyStation)
                                <div class="nearby-card">
                                    <div class="distance-badge">
                                        {{ number_format($nearbyStation->distance, 1) }} كم
                                    </div>
                                    <h5 class="nearby-station-name">{{ $nearbyStation->stop_name }}</h5>
                                    <p class="nearby-station-area">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $nearbyStation->area ?? 'منطقة غير محددة' }}
                                    </p>
                                    <div class="nearby-details">
                                        <span class="status-badge status-{{ $nearbyStation->status }}">
                                            @if($nearbyStation->status == 'active')
                                                <i class="fas fa-check-circle"></i> نشطة
                                            @elseif($nearbyStation->status == 'maintenance')
                                                <i class="fas fa-tools"></i> صيانة
                                            @else
                                                <i class="fas fa-times-circle"></i> مغلقة
                                            @endif
                                        </span>
                                    </div>
                                    <div class="nearby-actions">
                                        <a href="{{ route('stations.show', $nearbyStation->id) }}" class="view-btn">
                                            <i class="fas fa-eye"></i>
                                            زيارة المحطة
                                        </a>
                                        <button class="action-btn" onclick="getDirectionsTo({{ $nearbyStation->latitude }}, {{ $nearbyStation->longitude }})">
                                            <i class="fas fa-directions"></i>
                                            الاتجاهات
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>لا توجد محطات قريبة</h4>
                            <p>لا توجد محطات أخرى في المنطقة المجاورة</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
        <div class="lightbox-content">
            <img id="lightbox-image" src="" alt="">
            <div id="lightbox-caption" style="color: white; text-align: center; padding: 10px; background: rgba(0,0,0,0.7); margin-top: 10px; border-radius: 5px;"></div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <button class="floating-action" onclick="scrollToTop()" title="العودة للأعلى">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global variables
        let currentTab = 'station-info';
        let isGalleryGridView = true;
        
        // Tab Management System
        function initializeTabs() {
            const tabButtons = document.querySelectorAll('.nav-tab');
            const tabPanes = document.querySelectorAll('.tab-pane');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    switchTab(targetTab);
                });
            });
        }

        function switchTab(tabName) {
            // Hide loading overlay
            hideLoading();
            
            // Update active tab button
            document.querySelectorAll('.nav-tab').forEach(btn => btn.classList.remove('active'));
            document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
            
            // Update active tab pane
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');
            
            currentTab = tabName;
            
            // Trigger animations for the new tab
            animateTabContent(tabName);
        }

        function animateTabContent(tabName) {
            const activePane = document.getElementById(tabName);
            const elements = activePane.querySelectorAll('.info-card, .line-card, .timeline-item, .image-card, .nearby-card, .line-stop-card');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        // Loading Management
        function showLoading() {
            document.getElementById('loadingOverlay').classList.add('active');
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').classList.remove('active');
        }

        // Coordinates and Location Functions
        function copyCoordinates() {
            const coordinates = "{{ $station->latitude }}, {{ $station->longitude }}";
            navigator.clipboard.writeText(coordinates).then(function() {
                showMessage('تم نسخ الإحداثيات بنجاح!', 'success');
            }).catch(function() {
                showMessage('حدث خطأ في نسخ الإحداثيات', 'error');
            });
        }

        function shareLocation() {
            const shareData = {
                title: 'موقع المحطة - {{ $station->stop_name }}',
                text: 'موقع محطة {{ $station->stop_name }} في {{ $station->area ?? "عمان" }}',
                url: `https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}`
            };

            if (navigator.share) {
                navigator.share(shareData);
            } else {
                const url = `https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}`;
                navigator.clipboard.writeText(url).then(function() {
                    showMessage('تم نسخ رابط الموقع بنجاح!', 'info');
                });
            }
        }

        function getDirections() {
            if (navigator.geolocation) {
                showLoading();
                showMessage('جاري تحديد موقعك...', 'info');
                
                navigator.geolocation.getCurrentPosition(function(position) {
                    hideLoading();
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    const destinationLat = {{ $station->latitude }};
                    const destinationLng = {{ $station->longitude }};
                    
                    const directionsUrl = `https://www.google.com/maps/dir/${userLat},${userLng}/${destinationLat},${destinationLng}`;
                    window.open(directionsUrl, '_blank');
                }, function(error) {
                    hideLoading();
                    showMessage('لم نتمكن من تحديد موقعك. سيتم فتح الخريطة بدلاً من ذلك.', 'warning');
                    window.open(`https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}`, '_blank');
                });
            } else {
                showMessage('المتصفح لا يدعم تحديد الموقع', 'error');
                window.open(`https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}`, '_blank');
            }
        }

        function getDirectionsTo(lat, lng) {
            if (navigator.geolocation) {
                showLoading();
                navigator.geolocation.getCurrentPosition(function(position) {
                    hideLoading();
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    const directionsUrl = `https://www.google.com/maps/dir/${userLat},${userLng}/${lat},${lng}`;
                    window.open(directionsUrl, '_blank');
                }, function(error) {
                    hideLoading();
                    window.open(`https://www.google.com/maps?q=${lat},${lng}`, '_blank');
                });
            } else {
                window.open(`https://www.google.com/maps?q=${lat},${lng}`, '_blank');
            }
        }

        // Schedule Functions
        function filterSchedules(dayType) {
            // Hide all schedule sections
            document.querySelectorAll('.schedule-section').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show selected day section
            const targetSection = document.querySelector(`[data-day="${dayType}"]`);
            if (targetSection) {
                targetSection.style.display = 'block';
                
                // Animate timeline items
                const timelineItems = targetSection.querySelectorAll('.timeline-item');
                timelineItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(-20px)';
                    
                    setTimeout(() => {
                        item.style.transition = 'all 0.5s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, index * 150);
                });
            }
            
            // Update active button
            document.querySelectorAll('.section-actions .action-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Line Stops Functions
        function sortLineStops(sortBy) {
            const container = document.querySelector('.line-stops-grid');
            const cards = Array.from(container.querySelectorAll('.line-stop-card'));
            
            cards.sort((a, b) => {
                if (sortBy === 'order') {
                    return parseInt(a.dataset.order) - parseInt(b.dataset.order);
                } else if (sortBy === 'direction') {
                    const directionOrder = { 'forward': 1, 'backward': 2 };
                    return directionOrder[a.dataset.direction] - directionOrder[b.dataset.direction];
                }
            });
            
            // Re-append sorted cards with animation
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    container.appendChild(card);
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        // Image Gallery Functions
        function openLightbox(imageSrc, caption = '') {
            document.getElementById('lightbox-image').src = imageSrc;
            document.getElementById('lightbox-caption').textContent = caption;
            document.getElementById('lightbox').style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            // Add escape key listener
            document.addEventListener('keydown', handleLightboxKeydown);
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Remove escape key listener
            document.removeEventListener('keydown', handleLightboxKeydown);
        }

        function handleLightboxKeydown(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        }

        function toggleGalleryView() {
            const gallery = document.querySelector('.images-gallery');
            isGalleryGridView = !isGalleryGridView;
            
            if (isGalleryGridView) {
                gallery.style.gridTemplateColumns = 'repeat(auto-fill, minmax(280px, 1fr))';
            } else {
                gallery.style.gridTemplateColumns = 'repeat(auto-fill, minmax(400px, 1fr))';
            }
        }

        // Message System
        function showMessage(message, type) {
            const alertClass = type === 'success' ? 'alert-success' : 
                             type === 'error' ? 'alert-danger' : 
                             type === 'warning' ? 'alert-warning' : 'alert-info';
            const icon = type === 'success' ? 'fas fa-check-circle' : 
                        type === 'error' ? 'fas fa-exclamation-circle' : 
                        type === 'warning' ? 'fas fa-exclamation-triangle' : 'fas fa-info-circle';
            
            const alert = document.createElement('div');
            alert.className = `alert-message ${alertClass}`;
            alert.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 10001;
                max-width: 400px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                padding: 15px 20px;
                display: flex;
                align-items: center;
                gap: 12px;
            `;
            alert.innerHTML = `
                <i class="${icon}"></i>
                <span>${message}</span>
                <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: inherit; margin-left: 10px; cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            document.body.appendChild(alert);
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                if (alert.parentElement) {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(100%)';
                    setTimeout(() => alert.remove(), 300);
                }
            }, 5000);
        }

        // Utility Functions
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function refreshLines() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showMessage('تم تحديث بيانات الخطوط', 'success');
            }, 1500);
        }
        // Advanced Functions
        function editStation() {
            showMessage('سيتم توجيهك لصفحة التعديل', 'info');
            setTimeout(() => {
                window.location.href = `{{ route('stations.edit', $station->id) }}`;
            }, 1000);
        }

        function uploadImage() {
            showMessage('ميزة رفع الصور ستكون متاحة قريباً', 'info');
        }

        function showOnMap() {
            const stations = [
                @foreach($nearbyStations as $nearby)
                {
                    name: "{{ $nearby->stop_name }}",
                    lat: {{ $nearby->latitude }},
                    lng: {{ $nearby->longitude }},
                    distance: {{ number_format($nearby->distance, 1) }}
                },
                @endforeach
            ];
            
            let mapUrl = `https://www.google.com/maps?q={{ $station->latitude }},{{ $station->longitude }}`;
            
            if (stations.length > 0) {
                const waypoints = stations.map(s => `${s.lat},${s.lng}`).join('|');
                mapUrl += `&waypoints=${waypoints}`;
            }
            
            window.open(mapUrl, '_blank');
        }

        // Statistics Animation
        function animateStats() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach(numberElement => {
                const target = parseInt(numberElement.getAttribute('data-target')) || parseInt(numberElement.textContent);
                if (isNaN(target)) return;
                
                let current = 0;
                const increment = Math.ceil(target / 50);
                const duration = 2000; // 2 seconds
                const stepTime = duration / (target / increment);
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        numberElement.textContent = target;
                        clearInterval(timer);
                    } else {
                        numberElement.textContent = current;
                    }
                }, stepTime);
            });
        }

        // Advanced Animations and Effects
        function initializeAdvancedEffects() {
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        
                        // Trigger specific animations based on element type
                        if (entry.target.classList.contains('stat-item')) {
                            setTimeout(() => animateStats(), 500);
                        }
                    }
                });
            }, observerOptions);

            // Observe all animatable elements
            document.querySelectorAll('.info-card, .line-card, .stat-item, .timeline-item, .image-card, .nearby-card').forEach(el => {
                observer.observe(el);
            });
        }

        // Keyboard Shortcuts
        function initializeKeyboardShortcuts() {
            document.addEventListener('keydown', (e) => {
                // Ctrl/Cmd + number keys for tab switching
                if ((e.ctrlKey || e.metaKey)) {
                    const tabs = ['station-info', 'bus-lines', 'schedules', 'line-stops', 'images-gallery', 'nearby-stations'];
                    const keyNum = parseInt(e.key);
                    
                    if (keyNum >= 1 && keyNum <= 6) {
                        e.preventDefault();
                        switchTab(tabs[keyNum - 1]);
                    }
                    
                    // Ctrl/Cmd + C to copy coordinates
                    if (e.key === 'c' && e.shiftKey) {
                        e.preventDefault();
                        copyCoordinates();
                    }
                    
                    // Ctrl/Cmd + S to share location
                    if (e.key === 's' && e.shiftKey) {
                        e.preventDefault();
                        shareLocation();
                    }
                    
                    // Ctrl/Cmd + D to get directions
                    if (e.key === 'd' && e.shiftKey) {
                        e.preventDefault();
                        getDirections();
                    }
                }
                
                // Arrow keys for tab navigation
                if (e.key === 'ArrowLeft' && e.altKey) {
                    e.preventDefault();
                    navigateTab('prev');
                }
                if (e.key === 'ArrowRight' && e.altKey) {
                    e.preventDefault();
                    navigateTab('next');
                }
            });
        }

        function navigateTab(direction) {
            const tabs = ['station-info', 'bus-lines', 'schedules', 'line-stops', 'images-gallery', 'nearby-stations'];
            const currentIndex = tabs.indexOf(currentTab);
            
            let nextIndex;
            if (direction === 'next') {
                nextIndex = (currentIndex + 1) % tabs.length;
            } else {
                nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
            }
            
            switchTab(tabs[nextIndex]);
        }

        // Enhanced User Experience Features
        function initializeUXEnhancements() {
            // Add tooltips to action buttons
            document.querySelectorAll('.quick-btn, .action-btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add ripple effect to cards
            document.querySelectorAll('.info-card, .line-card, .image-card, .nearby-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(59, 180, 180, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s ease-out;
                        pointer-events: none;
                        z-index: 1;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Add loading states to async actions
            document.querySelectorAll('[onclick*="refresh"], [onclick*="upload"], [onclick*="edit"]').forEach(btn => {
                const originalText = btn.innerHTML;
                btn.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التحميل...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 2000);
                });
            });
        }

        // Performance Optimizations
        function initializePerformanceOptimizations() {
            // Lazy load images
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });

            // Debounce scroll events
            let scrollTimeout;
            window.addEventListener('scroll', () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    const scrolled = window.pageYOffset;
                    const floatingBtn = document.querySelector('.floating-action');
                    
                    if (scrolled > 300) {
                        floatingBtn.style.opacity = '1';
                        floatingBtn.style.visibility = 'visible';
                    } else {
                        floatingBtn.style.opacity = '0';
                        floatingBtn.style.visibility = 'hidden';
                    }
                }, 100);
            });
        }

        // Main Initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Show loading initially
            showLoading();
            
            // Initialize all features
            initializeTabs();
            initializeAdvancedEffects();
            initializeKeyboardShortcuts();
            initializeUXEnhancements();
            initializePerformanceOptimizations();
            
            // Animate page load
            setTimeout(() => {
                hideLoading();
                
                const mainElements = document.querySelectorAll('.breadcrumb-nav, .header-section, .stats-dashboard, .navigation-tabs');
                mainElements.forEach((element, index) => {
                    element.style.opacity = '0';
                    element.style.transform = 'translateY(30px)';
                    
                    setTimeout(() => {
                        element.style.transition = 'all 0.8s ease';
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, index * 200);
                });
                
                // Animate initial tab content
                setTimeout(() => {
                    animateTabContent('station-info');
                    animateStats();
                }, 1000);
                
            }, 500);

            // Add CSS animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to { transform: scale(4); opacity: 0; }
                }
                
                .animate-in {
                    animation: slideInUp 0.6s ease forwards;
                }
                
                @keyframes slideInUp {
                    from { opacity: 0; transform: translateY(30px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                
                .nav-tab.active {
                    animation: tabActivate 0.3s ease;
                }
                
                @keyframes tabActivate {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                    100% { transform: scale(1); }
                }
                
                .floating-action {
                    opacity: 0;
                    visibility: hidden;
                    transition: all 0.3s ease;
                }
                
                .alert-success {
                    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
                    color: #155724;
                }
                
                .alert-info {
                    background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
                    color: #0c5460;
                }
                
                .alert-warning {
                    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
                    color: #856404;
                }
                
                .alert-danger {
                    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
                    color: #721c24;
                }
            `;
            document.head.appendChild(style);

            // Add helpful console messages
            console.log('%c🚌 Amman Transit Station Dashboard', 'color: #1F594A; font-size: 16px; font-weight: bold;');
            console.log('%cKeyboard Shortcuts:', 'color: #3BB4B4; font-weight: bold;');
            console.log('• Ctrl+1-6: Switch tabs');
            console.log('• Ctrl+Shift+C: Copy coordinates');
            console.log('• Ctrl+Shift+S: Share location');
            console.log('• Ctrl+Shift+D: Get directions');
            console.log('• Alt+Left/Right: Navigate tabs');

            // Show welcome message
            setTimeout(() => {
                showMessage('أهلاً بك في {{ $station->stop_name }}! استخدم التبويبات للتنقل بين الأقسام', 'info');
            }, 2000);
        });

        // Handle page visibility changes
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                console.log('Page hidden - pausing animations');
            } else {
                console.log('Page visible - resuming animations');
            }
        });

        // Error handling for global errors
        window.addEventListener('error', function(e) {
            console.error('Global error caught:', e.error);
            showMessage('حدث خطأ غير متوقع. يرجى تحديث الصفحة.', 'error');
        });
    </script>
</body>
</html>



