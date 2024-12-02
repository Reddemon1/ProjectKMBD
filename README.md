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
<br\>
```bash
npm install
```

<br\>
### 3. Setup Project
```bash
php artisan key:generate
```
<br\>
```bash
php artisan migrate:fresh --seed
```
<br\>
### 4. Run Project
```bash
php artisan serve
```
<br\>
```bash
npm run dev
```
 or 
 ```bash
npm run build
```
