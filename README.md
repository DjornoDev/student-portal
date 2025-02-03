# 🎓 Student Portal Project

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
  <br>
  <strong>A Modern Student Management System Built with Laravel</strong>
</p>

<div align="center">

[![License](https://img.shields.io/github/license/DjornoDev/student-portal?color=blue&style=flat-square)](LICENSE)
[![GitHub Stars](https://img.shields.io/github/stars/DjornoDev/student-portal?style=social)](https://github.com/DjornoDev/student-portal/stargazers)
[![GitHub Issues](https://img.shields.io/github/issues/DjornoDev/student-portal?color=critical)](https://github.com/DjornoDev/student-portal/issues)
[![Build Status](https://img.shields.io/github/actions/workflow/status/DjornoDev/student-portal/tests.yml?label=Tests)](https://github.com/DjornoDev/student-portal/actions)

</div>

---

## 🌟 Features

🚀 **Core Functionality**
- 📅 Course Management System
- 📝 Student Enrollment Tracking
- 📊 Grade Management Interface
- 🔐 Role-based Access Control
- 📈 Real-time Analytics Dashboard

💎 **Technical Highlights**
- 🛠 Built with Laravel 10
- 🎨 Blade & Livewire Components
- 🗃 MySQL Database Architecture
- 📱 Responsive Design
- 🔄 RESTful API Endpoints

---

## 🚀 Quick Start

### Requirements
- PHP 8.1+
- Composer 2.5+
- MySQL 8.0+
- Node.js 18+

### Installation
```bash
# Clone repository
git clone https://github.com/DjornoDev/student-portal.git

# Install dependencies
composer install
npm install

# Configuration
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Start development server
php artisan serve