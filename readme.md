Form Generator
===
Information
---
* Problem number : 1
* Email : reza.smart306@gmail.com
* Programming Language : PHP
* Framework : Laravel

Requirements
---
1. PHP >= 5.6.4
2. MySql 5.1+
3. PHP extensions : GD2 , ZIP , OpenSSL , PDO , Mbstring , Tokenizer , XML
4. Composer

* من پروژه رو با ومپ اجرا کردم

_file folder inside project folder should has write premission_

Installation
---
1. first you must install project dependency with run this command inside project folder
	```

	composer install

	```
2. write your database connection information in `path/to/project/.env`
	```

	//path/to/project/.env
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=fanavardform
	DB_USERNAME=admin
	DB_PASSWORD=admin

	```
3. Run migration command with cmd go to project directory and run this command 
	```

	php artisan migrate

	```
4. Run Database seeder
	```

	php artisan db:seed

	```

How to use it
---
1. ابتدا وارد ادرس پوشه public شوید
2. اگر seeder را اجرا کرده باشید با نام کاربری زیر میتوانید وارد سیستم شوید در غیر این صورت میتوانید با کلیک بر روی ثبت نام و کامل کردن فرم , ثبت نام نمایید
	```

	username : admin
	password : 12345

	```
3. از منو روی فرم جدید کلیک کنید و فرم را پر نمایید
4. بعد از تکمیل فرم وارد مشخصات فرم میشوید که اینجا میتوانید فیلد ها را اضافه نمایید
5. چهار نوع فیلد متنی عدید تاریخی و انتخابی را میتوانید به فرم اضافه نمایید
6. وقتی فیلد ها را اضافه کردید در ابتدای صفحه روی لینک فرم کلیلک کنید تا بتوانید به فرم پاسخ دهید . این لینک را میتوانید انتشار دهید تا به فرم پاسخ داده شود
7. برای مشاهده نتایج به قسمت لیست فرمها بروید و روی فایل جوابها کلیلک کنید







