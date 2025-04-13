## 🛠️ Installation Instructions

Follow the steps below to set up and run this Laravel + Livewire Modular project on your local environment:

### 📦 Requirements

Make sure you have the following installed:

- PHP >= 8.1  
- Composer  
- MySQL or other supported database  
- Node.js & npm (for assets)  
- Laravel CLI (`composer global require laravel/installer`)  
- Laravel Modules package (e.g., `nwidart/laravel-modules`)  

---

### 🚀 Step-by-Step Installation

1. **Clone the Repository**

   git clone https://github.com/your-username/your-project-name.git
   cd your-project-name

2. **Install PHP Dependencies**

   
   composer install

3. **Copy `.env` File and Set Configuration**

   
   cp .env.example .env

   - Edit `.env` and set your database credentials and other environment variables.

4. **Generate App Key**

   
   php artisan key:generate

5. **Run Migrations**

   
   php artisan migrate

6. **Install Node Modules and Compile Assets**

   
   npm install && npm run dev

7. **Set Storage Link (for image uploads, etc.)**

   
   php artisan storage:link

8. **Start the Development Server**

   
   php artisan serve

---

### 📁 Modules Structure

This project uses [nwidart/laravel-modules](https://nwidart.com/laravel-modules/) to organize code into separate modules like:

- `Modules/Administrator`
- `Modules/Common`
- `Modules/Core`
- etc.

Each module may contain its own controllers, models, views, Livewire components, etc.

---

### 🔐 Authentication

To enable user authentication:


php artisan migrate --seed

- This seeds default users and roles (customize as needed).

---
