# Dự án 1 PRO1014

## Hướng dẫn setup

### Yêu cầu:

- Hiểu biết PHP, JavaScript, Laravel
- Biết sử dụng Composer, NPM.
- PHP >= 8.1, MySQL.

### Cài đặt

- Clone repo này về local và trỏ đến thư mục dự án
- Chạy lệnh `composer install` và `npm install` để cài đặt PHP và NPM dependencies
- Chạy lệnh `npm run dev` hoặc `npm run build` để complied file js, css
- Copy mới file `.env.example` và đổi tên thành `.env`
- Chạy lệnh `php artisan key:generate`
- Cấu hình thông tin database và chạy lệnh `php artisan migrate --seed` để tạo bảng và seeder
