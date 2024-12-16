# Project Setup Guide

## Prerequisites

Before you start, ensure you have the following installed:

### 1. PHP
Ensure you have **PHP 8.3.11** or higher installed.  
Verify by running the following command in your terminal:
```bash
php -v
```

### 2. Install depedency
```bash
composer install
```

```bash
npm install
```

### 3. Setup Project
```bash
php artisan key:generate
```
```bash
php artisan migrate:fresh --seed
```
```bash
php artisan storege:link
```

### 4. Run Project Laravel
```bash
php artisan serve
```

### 5. Run Frontend Processing
```bash
npm run dev
```
 or 
 ```bash
npm run build
```
<h1>NOTE : PLEASE ADD THE NEW DATA FROM ADMIN</h1>
