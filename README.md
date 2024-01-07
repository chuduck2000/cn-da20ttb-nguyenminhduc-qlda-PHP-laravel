**Thông tin tác giả:**
- Họ và tên: Nguyễn Minh Đức
- Mã số sinh viên: 110120020
- Lớp: Công nghệ thông tin
- Mã lớp: DA20TTB
- Số điện thoại: 0918586877

composer create-project laravel/laravel ChuyenNganh   

php artisan make:view layouts                         

php artisan make:view layouts/app

php artisan make:view layouts/footer

php artisan make:view layouts/header

php artisan make:view admin

php artisan make:view auth/login

php artisan make:middleware AdminMiddleware

php artisan make:middleware SinhvienMiddleware

php artisan make:middleware GiangvienMiddleware

php artisan make:middleware CommonMiddleware

php artisan make:controller AuthController

php artisan make:controller TrangchuController

php artisan make:controller LopController

php artisan make:controller DoanController

php artisan make:controller SinhvienController

php artisan make:controller GiangvienController

php artisan make:controller NamhocController

php artisan make:controller UserController

php artisan make:controller ChatController

php artisan make:view admin/trangchu

php artisan make:view admin/lop/add

php artisan make:view admin/lop/edit

php artisan make:view admin/sinhvien/list

php artisan make:view admin/sinhvien/add

php artisan make:view admin/sinhvien/edit

php artisan make:view admin/sinhvien/list

php artisan make:view admin/giangvien/edit

php artisan make:view admin/sinhvien/add

php artisan make:view admin/namhoc/list

php artisan make:view admin/namhoc/add

php artisan make:view admin/namhoc/edit

php artisan make:view giangvien/trangchu

php artisan make:view giangvien/doan/list

php artisan make:view giangvien/doan/add

php artisan make:view giangvien/doan/edit

php artisan make:view sinhvien/trangchu

php artisan make:view sinhvien/view

php artisan make:view giangvien/view

php artisan make:view chat/list

php artisan make:view chat/_user

php artisan make:view chat/_message

php artisan make:view chat/_header

php artisan make:view chat/_chat

php artisan make:view chat/_single

php artisan make:view sinhvien/giangvien

php artisan make:view sinhvien/xem_giangvien

php artisan make:view giangvien/XemSinhvien

php artisan make:view giangvien/xem_sinhvien

php artisan make:view sinhvien/xem_doan

php artisan make:model Lop

php artisan make:model Doan

php artisan make:model Sinhvien

php artisan make:model Giangvien

php artisan make:model Namhoc

php artisan make:model Chatmodel
