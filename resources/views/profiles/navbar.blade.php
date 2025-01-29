<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* สไตล์ Navbar */
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2); /* Gradient สีฟ้า - ม่วง */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงาให้ดูมีมิติ */
            padding: 12px 20px;
        }

        /* สไตล์ Navbar Brand */
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff !important;
        }

        /* สไตล์ Navbar Items */
        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            transition: all 0.3s ease-in-out;
            margin-right: 15px;
        }

        /* Hover Effect */
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
            transform: scale(1.1);
        }

        /* ปุ่ม Toggler (สำหรับมือถือ) */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* เพิ่มขอบให้กับปุ่ม */
        .navbar-toggler:focus {
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }

        /* Disabled Link */
        .nav-link.disabled {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        /* ปรับให้ Navbar ติดขอบบน */
        .fixed-top {
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030; /* ให้ Navbar อยู่ด้านบนสุด */
        }

        /* ป้องกันเนื้อหาถูก Navbar ทับ */
        body {
            padding-top: 56px; /* ปรับตามความสูงของ Navbar */
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-fire"></i> Project
        </a>
        
        <!-- Toggler สำหรับมือถือ -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- เมนูหลัก -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Home</a>
                <a class="nav-link" href="#"><i class="fa-solid fa-star"></i> Features</a>
                <a class="nav-link" href="#"><i class="fa-solid fa-dollar-sign"></i> Pricing</a>
            </div>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>