<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            max-width: 180px;
        }
        .serial-container {
            position: relative;
            margin: 30px 0;
            text-align: center;
        }
        .serial-bg {
            background-image: url('cid:background.png');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            padding: 60px 20px;
            position: relative;
        }
        .serial-bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255,255,255,0.7);
            border-radius: 10px;
        }
        .brand-name {
            font-size: 28px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 15px;
            position: relative;
        }
        .serial-number {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 3px;
            color: #2b6cb0;
            margin: 20px 0;
            padding: 15px;
            background-color: rgba(255,255,255,0.9);
            border-radius: 8px;
            display: inline-block;
            position: relative;
        }
        .serial-label {
            font-size: 18px;
            color: #4a5568;
            margin-top: 10px;
            position: relative;
        }
        .footer {
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        .action-buttons {
            margin-top: 30px;
            position: relative;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            background-color: #4299e1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #2b6cb0;
        }
        .serial-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo">
            <img src="cid:logo.png" alt="OMSETin Logo">
        </div>
        
        <div class="serial-container">
            <div class="serial-bg">
                <div class="serial-bg-overlay"></div>
                <div class="serial-content">
                    <div class="brand-name">OMSETin</div>
                    <div class="serial-number">{{ $serialNumber }}</div>
                    <div class="serial-label">Serial Number</div>
                </div>
            </div>
            
<div class="serial-container">
    <div class="serial-bg" style="background-image: url('cid:background.png'); background-size: cover; background-position: center; border-radius: 10px; padding: 60px 20px;">
        <div class="serial-content">
            <div class="brand-name">OMSETin</div>
            <div class="serial-number">{{ $serialNumber }}</div>
            <div class="serial-label">Serial Number</div>
        </div>
    </div>
</div>  
        
        <div class="footer">
            <p>© 2023 OMSETin. All rights reserved.</p>
            <p>support@omsetin.com</p>
        </div>
    </div>
</body>
</html>