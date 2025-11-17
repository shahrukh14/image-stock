# 🎨 Image Stock – Images, Vectors & Videos Marketplace
Image Stock is a **Laravel + JavaScript** based platform for downloading and purchasing **images, vectors, and videos.**
It includes **subscription plans**, secure payment systems, user dashboards, and admin panel.

---

## 🚀 Features

- 🖼️ Browse & Download Free and Premium Images, Vectors, and Videos
- 💳 Secure Purchase System with Subscription Plans
- 🔐 Authentication with Roles (Admin / User)
- 🧾 Subscription Management
- 🛍️ Cart and Checkout Functionality
- 💾 Cloud or Local Storage Support for Assets
- ⚡ Fast & Responsive UI built with Bootstrap & JavaScript
- 📊 Admin Dashboard for Uploads, Plans & Transactions
- 📨 Email Notifications for Purchases and Renewals


## 🧠 Tech Stack

- Backend: Laravel 10
- Frontend: HTML5, CSS3, JavaScript & jQuery
- Database: MySQL / MariaDB
- Payments: Stripe / Razorpay / PayPal (Choose as configured)
- Storage: Local / AWS S3
  

## 🏗️ Installation

1. Clone the Repository
 ```bash
git clone https://github.com/shahrukh14/image-stock.git
cd image-stock
```

2. Install Dependencies
 ```bash
composer install
```

3. Configure Environment
   - Copy .env.example to .env and update the necessary fields.
   - Update values:

   - APP_NAME="ImageStock"
   - APP_URL=http://localhost:8000
    
   - DB_CONNECTION=mysql
   - DB_HOST=127.0.0.1
   - DB_PORT=3306
   - DB_DATABASE=imagestock
   - DB_USERNAME=root
   - DB_PASSWORD=
    
   - MAIL_MAILER=smtp
   - MAIL_HOST=smtp.gmail.com
   - MAIL_PORT=587
   - MAIL_USERNAME=your_email@gmail.com
   - MAIL_PASSWORD=your_password
   - MAIL_ENCRYPTION=tls

4. Generate App Key
```bash
php artisan key:generate
```

5. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

6. Serve The Project
```bash
php artisan serve
```
Visit: http://localhost:8000

