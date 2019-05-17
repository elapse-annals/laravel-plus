<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><span align="center">Plus</span> </p>

#### About
[LaravelPlus](https://github.com/ElapseAnnals/LaravelPlus) 基于 Laravel 增加一部分软件包初始安装和进行实际业务使用功能调整

### 使用方式

```php
git clone https://github.com/ElapseAnnals/LaravelPlus.git   // clone 项目
复制项目方案：
    1.当前目录运行复制脚本(推荐)
    php LaravelPlus/copy.php YourProject
    
    2.复制项目至自身项目
        cd LaravelPlus & rm -rf .git
        cp LaravelPlus YourProject 
        cd YourProject
        rm composer.lock .env
        cp .env.example .env    // 复制配置

cd YourProject //  进入 YourProject 项目中
composer update   // 更新软件包 （请先已安装 composer ）
php artisan key:generate    // 更新 key

php artisan storage:link // 软连接映射【非必须】
```
[composer 国内地址](https://www.phpcomposer.com/)

创建分层脚本
```
 php artisan make:framework Test  // 创建分层结构
 php artisan make:framework Test --basis  // 创建系统分层和主要分层结构（Controller, Service, Repository）
 php artisan make:framework Test --D // 删除分层结构 
```


### 改动内容
- 设置日志打印默认按天执行（.env::LOG_CHANNEL）
- 增加默认加载软件包
    - develop
      - reliese/laravel         模型 code 代码生成包
      - barryvdh/laravel-debugbar   debuger 工具包
      - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)   ide 帮助包    
      - overtrue/laravel-query-logger       日志包
     - production
        - respect/validation 验证包
  
 - 增加热切换配置（config/dynamic）
 
   -  develop 开发/测试
        - stage 测试 
   -  local 本地
   -  production 生产
   
 - 增加默认图片存储目录（storage/app/public/images)
 - 扩展结构分层 [想法来源](https://learnku.com/articles/19452?order_by=created_at&)
    - 系统分层
        - controller 控制器层
    - 主要分层
        - Service 业务服务层
        - Repository 数据仓库层
    - 扩展分层
        - Presenter 固定业务中控层
        - Transformer 转化层/筛选层（筛选后在选择输出）
        - Formatter 格式化层（对于输出数据进行格式化，服务于 view 层），便于前端模版渲染与展示
          
     
   
  






#### Version
当前版本基于 5.8 改造

#### Todo

   
        
        
