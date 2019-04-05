## About

使用 laravel5.8, bootstrap4, jquery 搭建的简洁后台

## 安装

```
git clone https://github.com/jzfan/admin.git
cd admin
composer install
//配置数据库...
php artisan migrate
php db:seed
```

## 登录

```
url: /admin
email: admin@admin.com
password: 123
```

## 特性

1. 通知
```
// php
session('notice', 'some message');
// js
flash('some message')
// ajax: 删除按钮, 添加 .btn-delete 样式
<button type="button" class="btn btn-danger btn-delete">
```
2. form表单错误提示，添加 .show-errors 样式
```
<form action='/some/path' method="POST" class="show-errors">
```
3. Excel数据导出
4. 数据库导出，带命令行运行，可配置计划任务

## 插件
1. Chartjs
2. Pikaday
3. WangEditor


## 界面

![show](http://un-sv.com/img/github/all.gif)


// ToDo
1. DB export
9. select2
11. 404, 500 page

## License

The JzAdmin is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
