[English](./README-EN.md) | 中文

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><b align="center">Plus</b> </p>

![php-badge](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)
![laravel-badge](https://img.shields.io/badge/Laravel%20-%3E%3D5.8-red.svg)
[![Build Status](https://api.travis-ci.org/ElapseAnnals/LaravelPlus.svg)](https://travis-ci.org/ElapseAnnals/LaravelPlus)
<img class="latest_stable_version_img" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/stable">
<img class="total_img" src="https://poser.pugx.org/elapse-annals/laravel-plus/downloads">
<img class="latest_unstable_version_img" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/unstable">
[![License](https://poser.pugx.org/elapse-annals/laravel-plus/license)](LICENSE)
[![composer.lock](https://poser.pugx.org/elapse-annals/laravel-plus/composerlock)](https://packagist.org/packages/elapse-annals/laravel-plus)

## 介绍
[LaravelPlus](https://github.com/ElapseAnnals/LaravelPlus) 基于 [Laravel](https://github.com/laravel/laravel) 增加部分软件包初始安装和进行业务使用功能改动，来创建一个开箱即用的应用

## 目的
为了减少重复 CURD 和新项目的配置麻烦等问题，如：
* 现有的 infyomlabs/laravel-generator CODE 生成工具虽然好用，但是不太喜欢样式和代码结构。
* 有些本地，测试，线上的配置需要频繁改动的需要。
* 多个项目构建引入包，配置扩展等重复性操作

## 版本基础
待完成 Todo List 后,考虑与 Laravel 中版本号一致

当前稳定版本：<img class="latest_stable_version_img" src="https://poser.pugx.org/elapse-annals/laravel-plus/v/stable">

当前版本基于 

| PHP     | Laravel |
|:-------:|:-------:|
| >=7.1.3 | >=5.8    |

## 文档

具体 [Wiki](https://github.com/ElapseAnnals/LaravelPlus.wiki.git)  （待完善）

## 项目使用

#### 1.下载项目
```php
// A. github （推荐）
$ git clone https://github.com/ElapseAnnals/LaravelPlus.git   
$ git checkout v5.8.0 // 切换至当前最新稳定版本
```
或
```php
// B. composer
$ composer create-project elapse-annals/laravel-plus
$ mv laravel-plus  LaravelPlus
```
 #### 2.复制项目
```php
//  A.在当前目录运行自动复制脚本 (推荐)
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
#### 3.项目初始化
```php
$ cd YourProject //  进入 YourProject 项目中
$ composer install   // 更新软件包 （请先已安装 composer ）
$ php artisan key:generate    // 更新 key
$ php artisan vendor:publish // 发布扩展包的资源
$ php artisan migrate  // 迁移
$ php artisan storage:link // 图片资源软连接映射【非必须】
```
Tips:
1. 兼容 laravel-plus 目录名

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

或引入 [php-tool/laravel-plus-make](https://github.com/PHPTool/LaravelPlusMake) Laravel Plus Make 插件软件包（更新进度略慢本项目）
```php
$ composer require php-tool/laravel-plus-make
```

效果图：
![image](https://github.com/ElapseAnnals/LaravelPlus/tree/master/storage/app/public/images/readme/frameworrk_index.png)

Tips:
- 注意文件被其它服务占用问题，可进行重启尝试
    （Failed to clear cache. Make sure you have the appropriate permissions.）

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



##### 前端样式构建

 ```php
npm run dev    // 本地开发,开启 debug 模式

npm run prod    // 线上部署（进行压缩资源）

npm run watch   // 监视编译（开发时启用）
```

##### 本地服务开启
```php
php artisan serve
```

##### 数据库迁移
中文配置
```php
use Faker\Factory as Factory;

$  $faker = Factory::create('zh_CN');
```

<hr />

### [改动内容](https://github.com/ElapseAnnals/LaravelPlus/wiki/3.-%E6%94%B9%E5%8A%A8%E5%86%85%E5%AE%B9)
- 设置日志打印默认按天执行（.env::LOG_CHANNEL）
- 增加默认加载软件包
    - production  生产环境
        - [respect/validation](https://github.com/Respect/Validation) 验证包
        - [react/react](https://github.com/reactphp/react) ReactPHP 多进程异步扩展（可以移除）
        - 引入 ElasticSearch For scout
            - [laravel/scout](https://github.com/laravel/scout) 
            - [tamayo/laravel-scout-elastic](https://github.com/ErickTamayo/laravel-scout-elastic)
             - [elastic/elasticsearch-php](https://github.com/elastic/elasticsearch-php) 原生 ElasticSearch (可选)
        - rabbitMQ 扩展
            - vladimir-yuldashev/laravel-queue-rabbitmq          - php-amqplib/php-amqplib 原生（可选）
        - [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer) 日志展示 [访问 host/logs] 
        - [predis/predis](https://github.com/nrk/predis) Redis 插件（建议使用 php-redis 扩展）
        - [php-tool/laravel-plus-make](https://github.com/PHPTool/LaravelPlusMake) Laravel Plus Make 自动生成 framework 代码插件软件包（可单独引用）
        - [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) Http 请求包
        - [overtrue/laravel-lang](https://github.com/overtrue/laravel-lang) 多语言本地化 i18n
        - [doctrine/dbal](https://github.com/doctrine/dbal)   数据库抽象层

    - develop     开发环境
      - [reliese/laravel](https://github.com/reliese/laravel)         模型生成工具
      ```php
        php artisan code:models --table=tb_name
      ```
      - [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)   debuger 工具
      - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)   ide 辅助工具   
            ```php artisan ide-helper:generate``` 
      - [overtrue/laravel-query-logger](https://github.com/overtrue/laravel-query-logger)       日志工具
      - [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)          统计检测项目问题（类似 PHPCS,需求版本 php 7.2.* ，请手动安装 composer require nunomaduro/phpinsights --dev）
      - [infyomlabs/laravel-generator](https://github.com/InfyOmLabs/laravel-generator)     Code 代码生成工具（可选）
  
-  增加前端资源
    - element-ui 样式框架（可选方案 iview）
   
 - 增加默认图片存储目录（storage/app/public/images)
 
 - 扩展结构分层 [想法来源](https://learnku.com/articles/19452?order_by=created_at&)
    - 系统分层
        - Controllers 控制器层
    - 主要分层
        - Services 业务服务层
        - Repositories Repository 数据仓库层
        - Models 模型层（无需创建，默认通过模型工具创建）
    - 扩展分层
        - Presenters 固定业务主持中控层
        - Transformers 转化层/筛选层（筛选后在选择输出）
        - Formatters 格式化层（对于输出数据进行格式化，服务于 view 层），便于前端模版渲染与展示
- 增加 redis 多语言配置读取

## 待办

完善资源功能

增加多语言数据库，和迁移

增加动态视图模式和静态视图模式切换（渲染后生成 view）

简化介绍，完善 wiki

处理版本
