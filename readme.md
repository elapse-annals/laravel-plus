<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><span align="center">Plus</span> </p>

#### About
基于 Laravel 增加一部分软件包和进行实际业务使用功能调整

### 使用方式

```php
git clone https://github.com/ElapseAnnals/LaravelPlus.git   // clone 项目，移动到对于自身项目中功能
cp .env.example .env    // 复制配置
php artisan key:generate    // 更新 key
composer update   // 更新软件包 （默认已安装 composer ） 
```
[composer](https://www.phpcomposer.com/)

### 改动内容
- 设置日志打印默认按天执行（.env::LOG_CHANNEL）
- 增加加载软件包
 
  - respect/validation
  - barryvdh/laravel-debugbar
  - barryvdh/laravel-ide-helper
  - reliese/laravel
  - overtrue/laravel-query-logger"
  
 - 增加热切换配置（config/dynamic）
 
   -  develop 开发/测试
        - stage 测试 
   -  local 本地
   -  production 生产
   
 - 增加默认图片存储目录（storage/app/public/images)
   
  






#### Version
当前版本基于 5.8 改造
