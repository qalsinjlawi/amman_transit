<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية - Amman Transit</title>
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

        /* Header */
        .navbar {
            background: var(--white);
            box-shadow: 0 2px 10px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 15px 20px;
            border-radius: 0 0 15px 15px;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--light-aqua-line);
        }
.navbar-nav .nav-link i {
    margin-left: 5px;
    font-size: 1.1rem;
    vertical-align: middle;
}
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 80px 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px var(--shadow);
            border-right: 6px solid var(--deep-transit-green);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, var(--light-aqua-line) 20%, transparent 70%);
            opacity: 0.1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .hero-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
            color: var(--white);
            box-shadow: 0 6px 20px rgba(59, 180, 180, 0.3);
        }

        /* Section Titles */
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--deep-transit-green);
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Services Section */
        .services-section {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .service-card {
            background: var(--background-sandstone);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .service-icon {
            font-size: 2.8rem;
            color: var(--light-aqua-line);
            margin-bottom: 15px;
        }

        .service-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .service-desc {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #ede8e0 100%);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .feature-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .feature-icon {
            font-size: 2.8rem;
            color: var(--light-aqua-line);
            margin-bottom: 15px;
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .feature-desc {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* About Section */
        .about-section {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .about-desc {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        /* Featured Stations Section */
        .stations-section {
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #ede8e0 100%);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .stations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .station-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .station-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .station-icon {
            font-size: 2.8rem;
            color: var(--light-aqua-line);
            margin-bottom: 15px;
        }

        .station-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .station-desc {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* News Section */
        .news-section {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .news-card {
            background: var(--background-sandstone);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--light-aqua-line);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        .news-icon {
            font-size: 2.8rem;
            color: var(--light-aqua-line);
            margin-bottom: 15px;
        }

        .news-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--deep-transit-green);
            margin-bottom: 10px;
        }

        .news-desc {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .news-date {
            font-size: 0.9rem;
            color: #888;
        }

        /* FAQ Section */
        .faq-section {
            background: linear-gradient(135deg, var(--background-sandstone) 0%, #ede8e0 100%);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: right;
        }

        .accordion-item {
            background: var(--white);
            border: none;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .accordion-button {
            background: var(--white);
            color: var(--deep-transit-green);
            font-weight: 600;
            font-family: 'Cairo', sans-serif;
            border-radius: 10px;
            padding: 15px;
        }

        .accordion-button:not(.collapsed) {
            background: var(--light-aqua-line);
            color: var(--white);
        }

        .accordion-body {
            color: #666;
            font-size: 1rem;
            line-height: 1.7;
            padding: 20px;
        }

        /* Contact Section */
        .contact-section {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
            font-family: 'Cairo', sans-serif;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--light-aqua-line);
            box-shadow: 0 0 8px rgba(59, 180, 180, 0.3);
        }

        .contact-btn {
            background: var(--light-aqua-line);
            color: var(--white);
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            background: #2A8A8A;
            transform: translateY(-2px);
        }

        .contact-info {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            color: var(--deep-transit-green);
        }

        /* Footer */
        .footer {
            background: var(--deep-transit-green);
            color: var(--white);
            padding: 40px 20px;
            text-align: center;
            border-top: 4px solid var(--light-aqua-line);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--white);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--light-aqua-line);
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-icon {
            color: var(--white);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: var(--light-aqua-line);
        }

        .footer-copy {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Floating Action Button */
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
            box-shadow: 0 6px 20px var(--shadow);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        .floating-action.visible {
            opacity: 1;
            visibility: visible;
        }

        .floating-action:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px var(--shadow-hover);
        }

        /* Animations */
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-in {
            animation: slideInUp 0.6s ease forwards;
        }

        @media (max-width: 992px) {
            .main-container {
                padding: 15px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.3rem;
            }

            .services-grid, .features-grid, .stations-grid, .news-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 20px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .floating-action {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-bus"></i>
                    Amman Transit
                </a>
                <div class="navbar-nav d-flex flex-row">
                    <a class="nav-link" href="/">الرئيسية</a>
                    <a class="nav-link" href="/stations">المحطات</a>
                    <a class="nav-link" href="#about">من نحن</a>
                    <a class="nav-link" href="#contact">تواصل معنا</a>
                    <a class="nav-link" href="/login">
        <i class="fas fa-sign-in-alt"></i>
        تسجيل الدخول
    </a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero-section">
            <h1 class="hero-title animate-in">مرحبًا بك في Amman Transit</h1>
            <p class="hero-subtitle animate-in">
                استمتع بتجربة نقل عام سلسة في عمان. ابحث عن المحطات القريبة منك، خطط لرحلتك بدقة، وتابع مواعيد الحافلات بسهولة وسرعة لضمان تنقل مريح وفعال في جميع أنحاء المدينة.
            </p>
            <a href="/stations" class="hero-btn animate-in">
                <i class="fas fa-search"></i>
                اكتشف المحطات
            </a>
        </div>
<!-- Featured Stations Section -->
        <div class="stations-section">
            <h2 class="section-title animate-in">
                <i class="fas fa-map-marked-alt"></i>
                محطات مميزة
            </h2>
            <div class="stations-grid">
                @foreach ($stations->take(4) as $station)
                    <div class="station-card animate-in">
                        <i class="fas fa-map-marker-alt station-icon"></i>
                        <h3 class="station-title">{{ $station->stop_name }}</h3>
                        <p class="station-desc">
                            {{ $station->address ?? 'محطة رئيسية في منطقة ' . ($station->area ?? 'عمان') }}
                        </p>
                        <a href="/stations/{{ $station->id }}" class="hero-btn">
                            <i class="fas fa-eye"></i>
                            عرض التفاصيل
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Services Section -->
        <div class="services-section">
            <h2 class="section-title animate-in">
                <i class="fas fa-cogs"></i>
                خدماتنا
            </h2>
            <div class="services-grid">
                <div class="service-card animate-in">
                    <i class="fas fa-map-marker-alt service-icon"></i>
                    <h3 class="service-title">البحث عن محطة</h3>
                    <p class="service-desc">ابحث عن مواقع محطات النقل العام في عمان بسهولة وسرعة للوصول إلى وجهتك.</p>
                </div>
                <div class="service-card animate-in">
                    <i class="fas fa-route service-icon"></i>
                    <h3 class="service-title">تخطيط الرحلة</h3>
                    <p class="service-desc">صمم رحلتك باستخدام خطوط الباصات والجداول الزمنية الدقيقة لتوفير الوقت.</p>
                </div>
                <div class="service-card animate-in">
                    <i class="fas fa-calendar-alt service-icon"></i>
                    <h3 class="service-title">مواعيد الحافلات</h3>
                    <p class="service-desc">تابع مواعيد الحافلات لضمان رحلة سلسة ومريحة في أي وقت.</p>
                </div>
                <div class="service-card animate-in">
                    <i class="fas fa-bus-alt service-icon"></i>
                    <h3 class="service-title">استكشاف الخطوط</h3>
                    <p class="service-desc">تعرف على خطوط الحافلات المتاحة واختر الأنسب لرحلتك.</p>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <h2 class="section-title animate-in">
                <i class="fas fa-star"></i>
                مميزات المنصة
            </h2>
            <div class="features-grid">
                <div class="feature-card animate-in">
                    <i class="fas fa-bolt feature-icon"></i>
                    <h3 class="feature-title">سهولة الاستخدام</h3>
                    <p class="feature-desc">واجهة مستخدم بسيطة وسهلة التنقل تساعدك على إيجاد المعلومات بسرعة ودون تعقيد.</p>
                </div>
                <div class="feature-card animate-in">
                    <i class="fas fa-globe feature-icon"></i>
                    <h3 class="feature-title">تغطية شاملة</h3>
                    <p class="feature-desc">معلومات دقيقة وشاملة عن جميع محطات وخطوط النقل العام في عمان.</p>
                </div>
                <div class="feature-card animate-in">
                    <i class="fas fa-sync feature-icon"></i>
                    <h3 class="feature-title">تحديثات لحظية</h3>
                    <p class="feature-desc">ابقَ على اطلاع دائم بآخر تحديثات المواعيد والمحطات لضمان رحلة موثوقة.</p>
                </div>
                <div class="feature-card animate-in">
                    <i class="fas fa-mobile-alt feature-icon"></i>
                    <h3 class="feature-title">واجهة متجاوبة</h3>
                    <p class="feature-desc">استخدم المنصة من أي جهاز، سواء كنت على هاتفك أو جهازك اللوحي أو الحاسوب.</p>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="about-section" id="about">
            <h2 class="section-title animate-in">
                <i class="fas fa-info-circle"></i>
                من نحن
            </h2>
            <div class="about-content">
                <p class="about-desc animate-in">
                    Amman Transit هي منصة مخصصة لتسهيل تجربة النقل العام في مدينة عمان. نسعى لتوفير تجربة تنقل سلسة من خلال تقديم معلومات دقيقة ومحدثة عن مواقع المحطات، خطوط الحافلات، والجداول الزمنية. مهمتنا هي تمكين سكان عمان وزوارها من التنقل بسهولة وكفاءة، مع تعزيز استخدام النقل العام كوسيلة مستدامة وصديقة للبيئة. نؤمن بأن النقل العام هو شريان الحياة في المدينة، ونعمل على جعل كل رحلة تجربة مريحة وممتعة.
                </p>
                <p class="about-desc animate-in">
                    انضم إلينا اليوم واكتشف كيف يمكننا مساعدتك في استكشاف عمان بسهولة وثقة!
                </p>
                <a href="#about" class="hero-btn animate-in">
                    <i class="fas fa-book"></i>
                    تعرف علينا أكثر
                </a>
            </div>
        </div>

        

        <!-- News Section -->
        <div class="news-section">
            <h2 class="section-title animate-in">
                <i class="fas fa-bullhorn"></i>
                الأخبار والتحديثات
            </h2>
            <div class="news-grid">
                <!-- Dummy News Data -->
                <div class="news-card animate-in">
                    <i class="fas fa-bus news-icon"></i>
                    <h3 class="news-title">افتتاح خط حافلات جديد</h3>
                    <p class="news-desc">
                        تم إطلاق خط حافلات جديد يربط وسط عمان بالمناطق الشرقية، لتوفير تنقل أسرع وأكثر راحة.
                    </p>
                    <p class="news-date">30 يونيو 2025</p>
                    <a href="#news" class="hero-btn">
                        <i class="fas fa-book"></i>
                        اقرأ المزيد
                    </a>
                </div>
                <div class="news-card animate-in">
                    <i class="fas fa-calendar-alt news-icon"></i>
                    <h3 class="news-title">تحديث مواعيد الحافلات</h3>
                    <p class="news-desc">
                        تم تحديث الجداول الزمنية لضمان دقة أكبر وتلبية احتياجات المسافرين خلال ساعات الذروة.
                    </p>
                    <p class="news-date">28 يونيو 2025</p>
                    <a href="#news" class="hero-btn">
                        <i class="fas fa-book"></i>
                        اقرأ المزيد
                    </a>
                </div>
                <div class="news-card animate-in">
                    <i class="fas fa-tools news-icon"></i>
                    <h3 class="news-title">صيانة محطة مؤقتة</h3>
                    <p class="news-desc">
                        سيتم إغلاق إحدى المحطات الرئيسية مؤقتًا لأعمال الصيانة لتحسين تجربة المستخدمين.
                    </p>
                    <p class="news-date">25 يونيو 2025</p>
                    <a href="#news" class="hero-btn">
                        <i class="fas fa-book"></i>
                        اقرأ المزيد
                    </a>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="section-title animate-in">
                <i class="fas fa-question-circle"></i>
                الأسئلة الشائعة
            </h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item animate-in">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            كيف أجد أقرب محطة حافلات؟
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            يمكنك استخدام خاصية البحث عن المحطات في صفحة المحطات. أدخل موقعك الحالي، وستظهر لك قائمة بالمحطات القريبة مرتبة حسب المسافة.
                        </div>
                    </div>
                </div>
                <div class="accordion-item animate-in">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            كيف أخطط لرحلتي باستخدام Amman Transit؟
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            اختر نقطة البداية والنهاية في قسم تخطيط الرحلة، وسيقترح النظام أفضل خطوط الحافلات والمواعيد المناسبة.
                        </div>
                    </div>
                </div>
                <div class="accordion-item animate-in">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            هل مواعيد الحافلات محدثة؟
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            نعم، نحن نحرص على تحديث الجداول الزمنية بانتظام لضمان دقة المعلومات وتلبية احتياجات المستخدمين.
                        </div>
                    </div>
                </div>
                <div class="accordion-item animate-in">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            ماذا أفعل إذا واجهت مشكلة في الموقع؟
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            يمكنك التواصل مع فريق الدعم عبر نموذج التواصل في قسم "تواصل معنا" أو عبر البريد الإلكتروني.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section" id="contact">
            <h2 class="section-title animate-in">
                <i class="fas fa-envelope"></i>
                تواصل معنا
            </h2>
            <div class="contact-form">
                <form action="/contact" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="رسالتك" required></textarea>
                    </div>
                    <button type="submit" class="contact-btn">إرسال الرسالة</button>
                </form>
            </div>
            <div class="contact-info animate-in">
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>support@ammantransit.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+962 123 456 789</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div>
                <h3 class="footer-title">روابط سريعة</h3>
                <ul class="footer-links">
                    <li><a href="/">الرئيسية</a></li>
                    <li><a href="/stations">المحطات</a></li>
                    <li><a href="#about">من نحن</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer-title">تواصل معنا</h3>
                <ul class="footer-links">
                    <li><a href="mailto:support@ammantransit.com">support@ammantransit.com</a></li>
                    <li><a href="tel:+962123456789">+962 123 456 789</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer-title">تابعنا</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div>
                <h3 class="footer-title">موارد النقل العام</h3>
                <ul class="footer-links">
                    <li><a href="#">دليل المسافر</a></li>
                    <li><a href="#">نصائح التنقل</a></li>
                    <li><a href="#">خريطة الخطوط</a></li>
                </ul>
            </div>
        </div>
        <p class="footer-copy">© 2025 Amman Transit. جميع الحقوق محفوظة.</p>
    </footer>

    <!-- Floating Action Button -->
    <button class="floating-action" onclick="scrollToTop()" title="العودة للأعلى">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll-to-Top Button
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/Hide Floating Button
        window.addEventListener('scroll', () => {
            const button = document.querySelector('.floating-action');
            if (window.pageYOffset > 300) {
                button.classList.add('visible');
            } else {
                button.classList.remove('visible');
            }
        });

        // Page Load Animation
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.hero-section, .services-section, .features-section, .about-section, .stations-section, .news-section, .faq-section, .contact-section, .service-card, .feature-card, .station-card, .news-card, .accordion-item');
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Form Submission Feedback
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    alert('تم إرسال رسالتك بنجاح! سنتواصل معك قريبًا.');
                    form.reset();
                });
            }
        });
    </script>
</body>
</html>