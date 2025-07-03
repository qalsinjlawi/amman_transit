<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا - مواصلات عمان</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #F3EEE7 0%, #e8e0d5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            direction: rtl;
        }

        .contact-container {
            background: #F3EEE7;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(31, 89, 74, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
        }

        .contact-info {
            background: linear-gradient(135deg, #1F594A 0%, #2a6b5b 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 180, 180, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .contact-info h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .contact-info p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .welcome-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            fill: #3BB4B4;
            opacity: 0.9;
        }

        .form-section {
            padding: 60px 40px;
            background: #F3EEE7;
        }

        .form-section h3 {
            color: #1F594A;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .form-section .subtitle {
            color: #1F594A;
            opacity: 0.7;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #1F594A;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(31, 89, 74, 0.1);
            border-radius: 10px;
            font-size: 1rem;
            background: white;
            transition: all 0.3s ease;
            font-family: inherit;
            direction: rtl;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3BB4B4;
            box-shadow: 0 0 0 3px rgba(59, 180, 180, 0.1);
            transform: translateY(-2px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #3BB4B4 0%, #2a9999 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: right 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(59, 180, 180, 0.3);
        }

        .submit-btn:hover::before {
            right: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
            
            .contact-info,
            .form-section {
                padding: 40px 30px;
            }
            
            .contact-info h2 {
                font-size: 2rem;
            }
            
            .form-section h3 {
                font-size: 1.5rem;
            }
        }

        .success-message {
            background: linear-gradient(135deg, #3BB4B4, #2a9999);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
            animation: slideIn 0.5s ease;
        }

        .error-message {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .field-error {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-info">
            <div class="welcome-content">
                <svg class="welcome-icon" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <h2>تواصل معنا</h2>
                <p>مستعدون لتحويل تجربة النقل العام؟ نحن نحب أن نسمع منك. تواصل معنا لمناقشة الشراكات، الدعم، أو أي أسئلة حول مواصلات عمان.</p>
            </div>
        </div>
        
        <div class="form-section">
            <h3>إرسال رسالة</h3>
            <p class="subtitle">املأ النموذج أدناه وسنعاود الاتصال بك خلال 24 ساعة.</p>
            
            @if(session('success'))
                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-message">
                    يرجى تصحيح الأخطاء أدناه ومحاولة مرة أخرى.
                </div>
            @endif
            
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">الاسم الكامل</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="subject">الموضوع</label>
                    <select id="subject" name="subject" required>
                        <option value="">اختر موضوعاً</option>
                        <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>استفسار عام</option>
                        <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>دعم العملاء</option>
                        <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>شراكة</option>
                        <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>تعليقات</option>
                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>أخرى</option>
                    </select>
                    @error('subject')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="message">رسالتك</label>
                    <textarea id="message" name="message" placeholder="أخبرنا كيف يمكننا مساعدتك..." required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="submit-btn">إرسال الرسالة</button>
            </form>
        </div>
    </div>

    <script>
        // Add smooth focus transitions
        document.querySelectorAll('input, textarea, select').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Auto-hide success message after 5 seconds
        const successMessage = document.querySelector('.success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 300);
            }, 5000);
        }
    </script>
</body>
</html>