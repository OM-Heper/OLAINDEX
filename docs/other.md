# 其他配置

## 后台管理

### 访问地址

- 默认地址：`https://your.domain/admin`
- 初始账号：`admin`
- 初始密码：`123456`

> ⚠️ 登录后请及时修改默认密码

### 修改后台路由

路由配置文件：`routes/web.php`

![路由配置](https://i.loli.net/2018/10/27/5bd47191e7a90.png)

## 特殊文件功能

> ⚠️ 不建议创建与特殊文件同名的文件夹或文件，否则会导致文件无法查看及下载

### README.md

在 OneDrive 文件夹中添加 `README.md` 文件，内容会显示在文件夹底部。

支持 Markdown 语法。

### HEAD.md

在 OneDrive 文件夹中添加 `HEAD.md` 文件，内容会显示在文件夹顶部。

支持 Markdown 语法。

## 缓存配置

### 默认缓存

OLAINDEX 默认使用文件缓存。

### 自定义缓存驱动

Laravel 支持多种缓存驱动：`apc`、`array`、`database`、`file`、`memcached`、`redis`

修改 `.env` 文件：

```env
# 缓存类型
CACHE_DRIVER=file

# Redis 配置（使用 Redis 缓存时需要）
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

> 💡 使用 Redis 缓存需要安装 PHP Redis 扩展

修改配置后执行：

```bash
php artisan config:cache
```

详细配置请参考 [Laravel 缓存系统文档](https://laravel.com/docs/8.x/cache)

## 版本升级

```bash
# 拉取最新代码
git pull

# 更新依赖
composer update -vvv

# 设置权限
chmod -R 755 storage
chown -R www:www *

# 清除缓存（可选）
php artisan config:cache
```