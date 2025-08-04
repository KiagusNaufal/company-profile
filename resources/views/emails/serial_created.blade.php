<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your OMZETin Serial Number</title>
    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
            line-height: 1.6;
        }
        
        /* Email Container */
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        /* Header Section */
        .email-header {
            padding: 40px 20px 20px;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .logo-container {
            margin-bottom: 15px;
        }
        
.logo {
    height: 120px;  /* Diubah dari 60px/200px menjadi 120px */
    width: auto;
    max-width: 100%;  /* Memastikan logo tidak melebihi container */
}

/* Untuk versi mobile */
@media only screen and (max-width: 600px) {
    .logo {
        height: 100px;  /* Diubah dari 60px menjadi 100px untuk mobile */
    }
}
        
        .product-name {
            margin: 15px 0 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #2d3748;
        }
        
        /* Content Section */
        .email-content {
            padding: 30px;
        }
        
        .serial-container {
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .serial-image {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .serial-number {
            font-size: 22px;
            font-weight: 600;
            color: #2d3748;
            margin: 10px 0;
            letter-spacing: 1px;
        }
        
        .password-container {
            background-color: #edf2f7;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            text-align: center;
            font-size: 16px;
        }
        
        .password-label {
            display: block;
            font-size: 14px;
            color: #718096;
            margin-bottom: 5px;
        }
        
        .password-value {
            font-weight: 600;
            color: #2d3748;
            font-size: 18px;
        }
        
        /* Links Section */
        .action-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }
        
        .action-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4f46e5;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .action-button:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }
        
        .action-button.secondary {
            background-color: #e2e8f0;
            color: #2d3748 !important;
        }
        
        .action-button.secondary:hover {
            background-color: #cbd5e0;
        }
        
        /* Footer Section */
        .email-footer {
            text-align: center;
            padding: 20px;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #718096;
        }
        
        .footer-links {
            margin-top: 10px;
        }
        
        .footer-link {
            color: #4f46e5;
            text-decoration: none;
            margin: 0 10px;
        }
        
        .footer-link:hover {
            text-decoration: underline;
        }
        
        /* Responsive Adjustments */
        @media only screen and (max-width: 600px) {
            .action-links {
                flex-direction: column;
                gap: 10px;
            }
            
            .action-button {
                display: block;
                text-align: center;
            }
            
            .email-content {
                padding: 20px;
            }
            
            .logo {
                height: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Clean Header with Logo -->
        <div class="email-header">
<div class="logo-container">
    @if($hasLogoImage)
        <img src="cid:logo.png" alt="OMSETin Logo" class="logo" style="width: 200px; height: auto;">
    @endif
            </div>
            <h1 class="product-name">{{ $productName }}</h1>
        </div>
        
        <!-- Main Content -->
        <div class="email-content">
            <h2 style="text-align: center; color: #2d3748; margin-bottom: 25px;">Your Serial Number Information</h2>
            
            <!-- Serial Number Image -->
            <div class="serial-container">
                @if($hasSerialImage)
                    <img src="cid:serial_image.png" alt="Your Serial Number" class="serial-image">
                @endif
              
              <div class="password-container">
                    <span class="password-label">Serial Number:</span>
                    <span class="password-value">{{ $serialNumber }}</span>
                </div>
                
                <div class="password-container">
                    <span class="password-label">Password:</span>
                    <span class="password-value">{{ $plainPassword }}</span>
                </div>
                
                <p style="text-align: center; margin-top: 20px; color: #4a5568;">
                Jaga selalu keamanan akun Anda. Setelah login, segera perbarui kata sandi Anda demi perlindungan yang lebih baik.
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="action-links">
                <a href="{{ $link_aplikasi }}" class="action-button" target="_blank">
                    Download Aplikasi
                </a>
                <a href="{{ $link_tutorial }}" class="action-button secondary" target="_blank">
                    Lihat Tutorial
                </a>
            </div>
            
            <p style="text-align: center; color: #718096; margin-top: 30px;">
                Butuh bantuan? Hubungi Kami <a href="mailto:support@omsetin.com" style="color: #4f46e5;">aeratek@gmail.com</a>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} OMZETin. All rights reserved.</p>
            <div class="footer-links">
                <a href="https://omsetin.com/privacy" class="footer-link" target="_blank">Privacy Policy</a>
                <a href="https://omsetin.com/terms" class="footer-link" target="_blank">Terms of Service</a>
                <a href="https://omsetin.com/contact" class="footer-link" target="_blank">Contact Us</a>
            </div>
        </div>
    </div>
</body>
</html>