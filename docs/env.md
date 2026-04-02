# 环境要求

## PHP 扩展要求

- PHP >= 7.4
- PHP OpenSSL 扩展
- PHP PDO 扩展
- PHP Mbstring 扩展
- PHP Tokenizer 扩展
- PHP XML 扩展
- PHP Ctype 扩展
- PHP JSON 扩展
- PHP BCMath 扩展
- PHP Fileinfo 扩展 ⚠️

> ⚠️ **Laravel 文件系统模块要求**：为保证成功安装，建议安装 `PHP Fileinfo 扩展`

## 推荐环境安装

推荐使用 [oneinstack](https://oneinstack.com/auto) 安装 PHP 环境。

### 一键安装 Nginx + PHP

```bash
wget http://mirrors.linuxeye.com/oneinstack-full.tar.gz && tar xzf oneinstack-full.tar.gz && ./oneinstack/install.sh --nginx_option 1 --php_option 7 --phpcache_option 1 --reboot
```

### 安装 Fileinfo 扩展

如果使用 oneinstack，可以通过以下步骤安装 fileinfo 扩展：

1. 进入 oneinstack 目录
2. 执行 `./addons.sh`
3. 选择安装 fileinfo 扩展

## PHP 函数配置

OLAINDEX 基于 Laravel 框架，需要开启部分被禁用的函数。

### oneinstack 环境

PHP 配置文件路径：`/usr/local/php/etc/php.ini`

找到 `disable_functions=` 配置项，删除以下函数：

- `proc_open`
- `proc_get_status`
- `putenv`

```bash
# 重启 PHP-FPM
sudo service php-fpm restart
```

## Composer 安装

Composer 是 PHP 的包管理器，安装步骤如下：

```bash
# 下载 Composer
curl -sS https://getcomposer.org/installer | php

# 全局安装
mv composer.phar /usr/local/bin/composer

# 更换为国内镜像（国内服务器推荐）
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer
```

> 💡 **提示**：国外服务器无需更换镜像源