English | [中文](README-ZH.md)

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><b align="center">plus</b> </p>

![php-badge](https://img.shields.io/badge/php-%3E%3D%207.3-8892BF.svg)
![laravel-badge](https://img.shields.io/badge/Laravel%20-%3E%3D8.0-red.svg)
[![Build Status](https://api.travis-ci.org/ElapseAnnals/Laravel-Plus.svg)](https://travis-ci.org/ElapseAnnals/Laravel-Plus)
[![License](https://poser.pugx.org/elapse-annals/laravel-plus/license)](LICENSE)
[![composer.lock](https://poser.pugx.org/elapse-annals/laravel-plus/composerlock)](https://packagist.org/packages/elapse-annals/laravel-plus)

## 介绍

[LaravelPlus](https://github.com/ElapseAnnals/Laravel-plus) 基于 [Laravel](https://github.com/laravel/laravel)
增加部分软件包初始安装和进行业务使用功能改动，来创建一个开箱即用的应用.

## 目的

- 增加基于模型 CURD 生成工具
- 自动 Laravel 与 Vue/Element UI 基于基础模型的代码生成器。
- 环境配置切换

## 运行环境要求

- PHP
- composer
- MySQL ｜ PgSQL

## 项目使用

#### 0.配置镜像

配置 composer aliyun 镜像

 ```php
 $ composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
 ```

#### 1.下载项目

```php
$ git clone https://github.com/ElapseAnnals/laravel-plus.git
```

#### 2.创建新项目

```php
//  A.在当前目录运行自动复制脚本 （ 推荐）
// YourProject 需要创建的项目名
$ php LaravelPlus/create YourProject
```

#### 3.新项目初始化

```php
$ cd YourProject //  进入 YourProject 项目中
$ cp .env.example .env
$ composer update   // 安装依赖软件包 （请先已安装 composer ）
$ php artisan key:generate    // 更新 key
$ php artisan vendor:publish // 发布扩展包的资源 - 选择 0
$ php artisan migrate  // 迁移数据库
```

####    

```php
// 以下非必须
$ php artisan storage:link // 图片资源软连接映射
$ php artisan clear-compiled // 清理编译
$ php artisan ide-helper:generate // 生成 ide 辅助提示（电脑配置足够不建议使用，与vendor混淆）
$ php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config // 加入配置
$ php artisan ide-helper:meta  // 生成 PHPStorm 辅助提示(重启 PHPStorm)
$ php artisan ide-helper:models //  生成模型辅助提示(需链接数据库)
```

##### 4。本地服务开启

```php
php artisan serve
```

Tips：

##### 更新 YourProject 项目（插件有改动时在上级目录中使用）

```shell script
php LaravelPlus/update YourProject
``` 

<hr>

## 功能使用说明

##### 创建分层脚本和[资源映射:想法来源](https://learnku.com/docs/laravel/5.8/controllers/1296#resource-controllers)

framework 脚本创建内容：

- Controller, Service, Repository 等文件和对应关联关系
- Route 资源路由增加
- Controller 中资源类型代码和模型数据处理

模型生成工具

```php
php artisan code:models --table=tb_name   // 指定表
php artisan code:models --connection=mysql  // 指定数据库连接
php artisan code:models --connection=mysql --table=tb_name   // 指定连接和指定表
```

使用 framework 功能 （Tmpls 是对应模型复数名称）

```
 $ php artisan make:framework Tmpls  // 创建分层结构（推荐）
 $ php artisan make:framework Tmpls --D // 删除分层结构 
  $ php artisan make:framework Tmpls --F // 强制生成分层结构 
```

效果图：
![image](https://github.com/ElapseAnnals/LaravelPlus/tree/master/storage/app/public/images/readme/frameworrk_index.png)

Tips:

- 注意文件被其它服务占用问题，可进行重启尝试 （Failed to clear cache. Make sure you have the appropriate permissions.）
- 使用导出需要在 web.php 中 export 注册路由

##### 热切换配置使用（config/dynamic/）

在 .env 中设置 ENABLE_HOT_SWITCHING=true 后，会在 AppServiceProvider 进行 dynamic 映射（对性能有一定影响，慎用）

使用方式:

```php
<?php
$env = config('dynamic.env');
```

dynamic 目录文件说明

- production 生产环境 (必须配置)
- develop 开发环境 (必须配置，以下配置继承 develop 配置)
    - test 测试环境
    - local 本地环境
    - simulation 仿真环境

Tips：

1. .env 配置 DYNAMIC_IS_STRICT 控制热配是否严格模式（默认 false 关闭）
    - 严格模式下不会继承 production/develop，完全采用当前环境配置
2. 默认在继承基础上有重复属性，会覆盖继承项
3. 继承基础特有属性会被携带至当前配置
4. config/dynamic.php 为 IDEA 提示文件，使用空 key 即可

优化默认路由中闭包

- 路由中禁止使用闭包，如有需要请在 ClosureController 中注册

##### 缓存清理

- php artisan optimize:clear // (慎用）
    - php artisan view:clear
    - php artisan cache:clear // 应用程序缓存清理(慎用- 会清理 config.cache 中启用缓存(file/db/redis 等))
    - php artisan route:cache
    - php artisan config:clear
    - php artisan clear-compiled // 清理编译 php artisan debug:clear

## 性能优化（只建议生产环境使用）

- php artisan optimize // 类映射加载优化（该命令会自动缓存 config/route）
    - php artisan config:cache // 配置缓存
    - php artisan route:cache // 路由
- php artisan view:cache // 视图缓存
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
    var mixinSlot = {
        data: {},
        methods: {}
    }
</script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
```

##### 路由 web/api 使用区别和场景

web 经过权限，csrf 等中间件和 Session api token 维护使用 auth:api
中间件或 [barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors)
若非单纯 api ，建议使用 web

<hr />

### [改动内容](https://github.com/ElapseAnnals/LaravelPlus/wiki/3.-%E6%94%B9%E5%8A%A8%E5%86%85%E5%AE%B9)

- 设置日志打印默认按天执行（.env::LOG_CHANNEL）
- 增加默认加载软件包
    - production 生产环境
        - [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel) 增加 excel 组件

    - develop 开发环境
        - [reliese/laravel](https://github.com/reliese/laravel)
        - [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)   debuger 工具
        - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)   ide 辅助工具   
          ```php artisan ide-helper:generate```

-推荐扩展

- [php-ext-xlswriter](https://github.com/viest/php-ext-xlswriter) excel 处理扩展，性能强劲（30万行 4 s）


- 推荐软件包列表
    - [PHP_XLSXWriter](https://github.com/mk-j/PHP_XLSXWriter) 简单强力的 excel 扩展
        - [overtrue/laravel-query-logger](https://github.com/overtrue/laravel-query-logger)       日志工具
    - [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)          统计检测项目问题（类似 PHPCS）
- [overtrue/laravel-lang](https://github.com/overtrue/laravel-lang) 多语言本地化 i18n
    - [laravel/socialite] () 社会化登陆包【注意配置代理或更改底层路由请求】 - 替代方案  [overtrue/socialite](https://github.com/overtrue/socialite)
      包含国内社会化登陆

    - [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer) 日志展示 [访问 host/logs]
    - [respect/validation](https://github.com/Respect/Validation) 验证包

    - [react/react](https://github.com/reactphp/react) ReactPHP 多进程异步扩展（手动,引入后 Process 才可使用） - react/child-process -
      react/event-loop - 引入 ElasticSearch For scout - [laravel/scout](https://github.com/laravel/scout) (手动)
        - [tamayo/laravel-scout-elastic](https://github.com/ErickTamayo/laravel-scout-elastic)(手动)

    - [elastic/elasticsearch-php](https://github.com/elastic/elasticsearch-php) 原生 ElasticSearch (手动)
        - rabbitMQ 扩展 - vladimir-yuldashev/laravel-queue-rabbitmq
        - php-amqplib/php-amqplib 原生(手动)

    - [predis/predis](https://github.com/nrk/predis) Redis 插件（建议使用 php-redis 扩展）

    - [php-tool/laravel-plus-make](https://github.com/PHPTool/LaravelPlusMake) Laravel Plus Make 自动生成 framework 代码插件软件包(
      手动)
    - [darkaonline/l5-swagger]() swagger 文档生成
    - [mpociot/laravel-apidoc-generator]() api doc 文档生成
    - [nunomaduro/larastan]() 增加 laravel 静态检测工具

    - [guzzlehttp/guzzle]() Http 请求包

    - [ClassPreloader/ClassPreloader]() vendor preload 生成器       
      -[beyondcode/laravel-self-diagnosis]() laravel project diagnosisl
      -[beyondcode/laravel-dump-server](https://github.com/beyondcode/laravel-dump-server) that collects all your dump
      call outputs -[tightenco/jigsaw]() 主动静态化 -[spatie/laravel-responsecache]() 静态化 -[silber/page-cache]() 静态化
      -[barryvdh/laravel-httpcache]() 静态化


- 增加前端资源
    - element-ui 样式框架

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
- 设置默认 Schema index 长度

  使用 Schema 注意 MySQL 版本低于 5.7.7 需设置默认 index 长度小于 191
  ```php
  Schema::defaultStringLength(191);
  ```

## Stargazers over time

[![Stargazers over time](https://starchart.cc/ElapseAnnals/laravel-plus.svg)](https://starchart.cc/ElapseAnnals/laravel-plus)
