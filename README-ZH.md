[English](README.md) | 中文

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><b align="center">Plus</b> </p>

![php-badge](https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg)
![laravel-badge](https://img.shields.io/badge/Laravel%20-%3E%3D6.2-red.svg)
[![Build Status](https://api.travis-ci.org/ElapseAnnals/LaravelPlus.svg)](https://travis-ci.org/ElapseAnnals/LaravelPlus)
<img class="latest_stable_version_img" title="latest stable version" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/stable">
<img class="total_img" title="total" src="https://poser.pugx.org/elapse-annals/laravel-plus/downloads">
<img class="latest_unstable_version_img" title="latest unstable version" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/unstable">
[![License](https://poser.pugx.org/elapse-annals/laravel-plus/license)](LICENSE)
[![composer.lock](https://poser.pugx.org/elapse-annals/laravel-plus/composerlock)](https://packagist.org/packages/elapse-annals/laravel-plus)

## 介绍
[LaravelPlus](https://github.com/ElapseAnnals/LaravelPlus) 基于 [Laravel](https://github.com/laravel/laravel) 增加部分软件包初始安装和进行业务使用功能改动，来创建一个开箱即用的应用.

拓展功能
- 自动 Laravel 与 Vue/Element UI 基于基础模型的代码生成器。
- 多进程使用
- 环境配置切换

## 目的
为了减少重复 CURD 和新项目的配置麻烦等问题，如：
* 现有的 infyomlabs/laravel-generator CODE 生成工具虽然好用，但是不太喜欢样式和代码结构。
* 有些本地，测试，线上的配置需要频繁改动的需要。
* 多个项目构建引入包，配置扩展等重复性操作
* 基于 ReactPHP 多进程使用
* Where 条件语句自动生成

## 版本基础

当前稳定版本：<img class="latest_stable_version_img" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/stable">

当前版本基于 

| PHP     | Laravel |
|:-------:|:-------:|
| >=7.2 | >=6.0    |

## 文档

具体 [Wiki](https://github.com/ElapseAnnals/LaravelPlus/wiki)  （待完善）


## 运行环境要求
- 已安装 PHP
- 脚本运行前置要求（任意一种）
    - [homestead](https://learnku.com/docs/laravel/5.5/homestead/1285) 中(推荐)
    - *unix 环境
    - Windows 下安装 [cmder](https://cmder.net/) - [下载地址](https://cmder.en.softonic.com/)
    - cmd 运行未进行兼容（现有异常会不过滤和清理部分文件） (不推荐)

## 项目使用

#### 1.下载项目
```php
// A. github （推荐）
$ git clone https://github.com/ElapseAnnals/laravel-plus.git   
$ git checkout 5.8.0 // 切换至当前最新稳定版本
```
或
```php
// B. composer
$ composer create-project elapse-annals/laravel-plus
$ mv laravel-plus  LaravelPlus
```
 #### 2.创建新项目 
 
```php
//  A.在当前目录运行自动复制脚本 （ 推荐）
$ php LaravelPlus/create YourProject
```
 或 
```
//  B.在当前目录手动复制项目至自身项目
$ cd LaravelPlus
$ rm composer.lock
$ rsync -av --exclude  . --exclude  .. --exclude  .git/ --exclude  vendor/ --exclude  .github/ LaravelPlus/* YourProject             
					//  为消除对称  */         
$ cd YourProject
$ rm composer.lock .env .travis
$ cp .env.example .env   
```
#### 3.新项目初始化
```php
$ cd YourProject //  进入 YourProject 项目中
$ composer install   // 安装依赖软件包 （请先已安装 composer ）
$ php artisan key:generate    // 更新 key
$ php artisan vendor:publish // 发布扩展包的资源
$ php artisan migrate  // 迁移数据库

// 以下非必须
$ php artisan storage:link // 图片资源软连接映射
$ php artisan clear-compiled // 清理编译
$ php artisan ide-helper:generate // 生成 ide 辅助提示
$ php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config // 加入配置
$ php artisan ide-helper:meta  // 生成 PHPStorm 辅助提示(重启 PHPStorm)
$ php artisan ide-helper:models //  生成模型辅助提示
```
Tips:
1. 兼容 laravel-plus 目录名

2. [Composer 镜像](https://learnku.com/composer/t/4484/composer-mirror-use-help)

 aliyun
 ```php
 $ composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
 ```
 
cnpkg
```php
 $ composer config -g repos.packagist composer https://php.cnpkg.org
 ```

3. Composer  加速工具 prestissimo 引入
```php
$ composer global require hirak/prestissimo
```
 
#### 4.更新项目
```shell script
php LaravelPlus/update YourProject
``` 


<hr>

## 功能使用说明

##### 创建分层脚本和[资源映射:想法来源](https://learnku.com/docs/laravel/5.8/controllers/1296#resource-controllers)

framework 脚本创建内容：
- Controller, Service, Repository 等文件和对应关联关系
- Route 资源路由增加
- Controller 中资源类型代码和模型数据处理（开发中）


直接使用本项目内容（推荐）
```
 $ php artisan make:framework Test  // 创建分层结构（推荐）
 $ php artisan make:framework Test --basis  // 创建系统分层和主要分层结构（Controller, Service, Repository）
 $ php artisan make:framework Test --D // 删除分层结构 
```

或引入 [php-tool/laravel-plus-make](https://github.com/PHPTool/LaravelPlusMake) Laravel Plus Make 插件软件包（更新进度慢）
```php
$ composer require php-tool/laravel-plus-make
```

效果图：
![image](https://github.com/ElapseAnnals/LaravelPlus/tree/master/storage/app/public/images/readme/frameworrk_index.png)

Tips:
- 注意文件被其它服务占用问题，可进行重启尝试
    （Failed to clear cache. Make sure you have the appropriate permissions.）
- 使用导出需要在 web.php 中 export 注册路由

##### 热切换配置使用（config/dynamic/）
在 .env 中设置 ENABLE_HOT_SWITCHING=true 后，会在   AppServiceProvider 进行 dynamic 映射（对性能有一定影响，慎用）

使用方式:
```php
<?php
$env = config('dynamic.env');
```
dynamic 目录文件说明
 -  production 生产环境 (必须配置)
 -  develop 开发环境 (必须配置，以下配置继承 develop 配置)
    -  test 测试环境
    -  local 本地环境
    -  simulation 仿真环境
    
Tips：
  
1. .env 配置 DYNAMIC_IS_STRICT 控制热配是否严格模式（默认 false 关闭）
    - 严格模式下不会继承 production/develop，完全采用当前环境配置
2. 默认在继承基础上有重复属性，会覆盖继承项 
3. 继承基础特有属性会被携带至当前配置 
4. config/dynamic.php 为 IDEA 提示文件，使用空 key 即可

优化默认路由中闭包
- 路由中禁止使用闭包，如有需要请在 ClosureController 中注册

##### 缓存清理
- php artisan optimize:clear     // (慎用）
    - php artisan view:clear
    - php artisan cache:clear    // 应用程序缓存清理(慎用- 会清理 config.cache 中启用缓存(file/db/redis 等))
    - php artisan route:cache
    - php artisan config:clear
    - php artisan clear-compiled    // 清理编译
 php artisan debug:clear

##### 本地服务开启
```php
php artisan serve
```

##### 数据库迁移
设置数据工厂填充中文配置
```php
use Faker\Factory as Factory;

$  $faker = Factory::create('zh_CN');
```

##### 多进程使用
通过 MainProcess 控制 ChildProcess 进程（仅能在 CLI 模式下运行）

定时执行在 Console/Kernel.php 中 schedule 配置

运行流程
```php
MainProcess(主进程调度) => MainProcessController（主进程执行任务，拆分子进程） => 
ChildProcess（子进程调度） => ChildProcessController （子进程任务） =>
  MainProcessController（接收子进程） => MainProcess（主进程结束）
```
业务任务名

$this->business_name 

主进程业务逻辑和数据请求
```php
（new \App\Http\Controllers\{$this->business_name}Action())->getData();

（new \App\Http\Controllers\{$this->business_name}Action())->run();
```

子进程运行业务逻辑
```php
(new \App\Http\Controllers\{$this->business_name}ProcessAction()->run();
``` 
## 测试驱动开发（TDD）
phpunit



dusk 浏览器测试
```php
composer require laravel/dusk --dev
php artisan dusk:install  // 需要翻墙
```


 [chromedriver 镜像](http://npm.taobao.org/mirrors/chromedriver/) 下载对应 Chrome 版本资源
手动重命名移动至 LaravelPlus/vendor/laravel/dusk/bin/chromedriver-mac



## 性能优化（只建议生产环境使用）
- php artisan optimize // 类映射加载优化（该命令会自动缓存 config/route）
    - php artisan config:cache  // 配置缓存
    - php artisan route:cache   // 路由
- php artisan view:cache  // 视图缓存
- composer dump-autoload --optimize //
- 开启 OpCache
    ```php
    $ sudo vim /etc/php/7.2/fpm/php.ini
    // set opcache.enable=1
    // ...
    $ sudo service php5.6-fpm restart
    $ sudo service nginx restart
    ```


## 前端处理
##### 资源构建

 ```php
npm run dev    // 本地开发,开启 debug 模式
npm run prod    // 线上部署（进行压缩资源）

npm run watch   // 监视编译（开发时启用）
```
##### 模板使用
使用 mixin 注入 vue 组件
```html
<script>
    var js_data = @json($js_data);
    var mixin = {
        data: {
        },
        methods: {
        }
    }
</script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
```
##### 路由 web/api 使用区别和场景
web 经过权限，csrf 等中间件和 Session
api token 维护使用 auth:api 中间件或 [barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors)
若非单纯 api ，建议使用 web

<hr />

### [改动内容](https://github.com/ElapseAnnals/LaravelPlus/wiki/3.-%E6%94%B9%E5%8A%A8%E5%86%85%E5%AE%B9)
- 设置日志打印默认按天执行（.env::LOG_CHANNEL）
- 增加默认加载软件包
    - production  生产环境
      
        - [overtrue/laravel-lang](https://github.com/overtrue/laravel-lang) 多语言本地化 i18n
       
        - [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel) 增加 excel 组件
    
    - develop     开发环境
      - [reliese/laravel](https://github.com/reliese/laravel)         模型生成工具 / phptool/laravel
      ```php
        php artisan code:models --table=tb_name   // 指定表 
        php artisan code:models --connection=mysql  // 指定数据库连接
        php artisan code:models --connection=mysql --table=tb_name   // 指定连接和指定表
      ```
      - [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)   debuger 工具
      - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)   ide 辅助工具   
            ```php artisan ide-helper:generate``` 
      - [overtrue/laravel-query-logger](https://github.com/overtrue/laravel-query-logger)       日志工具
      - [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)          统计检测项目问题（类似 PHPCS,需求版本 php 7.2.* ，请手动安装 composer require nunomaduro/phpinsights --dev）
     
      
  
  - 推荐软件包列表
  
      - [laravel/socialite] () 社会化登陆包【注意配置代理或更改底层路由请求】
                     - 替代方案  [overtrue/socialite](https://github.com/overtrue/socialite) 包含国内社会化登陆
      
      - [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer) 日志展示 [访问 host/logs]         
      - [respect/validation](https://github.com/Respect/Validation) 验证包   
      
       - [react/react](https://github.com/reactphp/react) ReactPHP 多进程异步扩展（手动,引入后 Process 才可使用）
                  - react/child-process
                  - react/event-loop
              - 引入 ElasticSearch For scout
                  - [laravel/scout](https://github.com/laravel/scout) (手动)
                  - [tamayo/laravel-scout-elastic](https://github.com/ErickTamayo/laravel-scout-elastic)(手动)
                  
        - [elastic/elasticsearch-php](https://github.com/elastic/elasticsearch-php) 原生 ElasticSearch (手动)
              - rabbitMQ 扩展
                  - vladimir-yuldashev/laravel-queue-rabbitmq         
                  - php-amqplib/php-amqplib 原生(手动)
              
         - [predis/predis](https://github.com/nrk/predis) Redis 插件（建议使用 php-redis 扩展）
          
         - [php-tool/laravel-plus-make](https://github.com/PHPTool/LaravelPlusMake) Laravel Plus Make 自动生成 framework 代码插件软件包(手动)    
    
         - [infyomlabs/laravel-generator](https://github.com/InfyOmLabs/laravel-generator)     Code 代码生成工具（可选）
       - [darkaonline/l5-swagger]() swagger 文档生成
       - [mpociot/laravel-apidoc-generator]() api doc 文档生成                  
       - [nunomaduro/larastan]() 增加 laravel 静态检测工具     

       - [guzzlehttp/guzzle]() Http 请求包
             
       - [ClassPreloader/ClassPreloader]() vendor preload 生成器       
             
                     
-  增加前端资源
    - element-ui 样式框架（可选方案 iview）
   
 - 增加默认图片存储目录（storage/app/public/images)
 
 - 扩展结构分层 [想法来源](https://learnku.com/articles/19452?order_by=created_at&)
    - 系统分层
        - Controllers 控制器层
    - 主要分层
        - Services 业务服务层（处理业务逻辑）
        - Repositories Repository 数据仓库层（处理数据库逻辑）
        - Models 模型层（无需创建，默认通过模型工具创建）
    - 扩展分层
        - Presenters 固定业务主持中控层(处理视图的逻辑：[参考](https://blog.csdn.net/markely/article/details/53000968),更适用于 blade)
            - 减少在 blade 用 @if...@else...@endif 
        - Transformers 转化层/筛选层（筛选后在选择输出）
        - Formatters 格式化层（对于输出数据进行格式化，服务于 view 层），便于前端模版展示
- 增加 redis 多语言配置读取
- 设置默认 Schema index 长度

    使用 Schema 注意 MySQL 版本低于 5.7.7 需设置默认 index 长度小于 191
  ```php
  Schema::defaultStringLength(191);
  ```

## 进展
- 开发 SwiftCMS 实际应用以进行完善

## 待办列表

[Projects](https://github.com/ElapseAnnals/LaravelPlus/projects)
