# 安装部署

## 手动安装

> ⚠️ 以下命令需要逐步执行

```bash
# 进入网站目录
cd /your/web/directory

# 克隆项目
git clone https://github.com/WangNingkai/OLAINDEX.git tmp
mv tmp/.git .
rm -rf tmp
git reset --hard

# 安装依赖
composer install -vvv

# 设置权限
chmod -R 755 storage
chown -R www:www *   # 此处 www 根据服务器用户组而定

# 初始化应用
composer run install-app
```

## 自定义数据库安装

如果自动安装失败或需要自定义数据库，请参考以下步骤：

### 前置条件

- 已通过上述步骤安装依赖
- `storage` 目录有写入权限

### 安装步骤

```bash
# 1. 复制配置文件
cp .env.example .env

# 2. 修改数据库配置（编辑 .env 文件）
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=olaindex
# DB_USERNAME=root
# DB_PASSWORD=password

# 3. 生成应用密钥
php artisan key:generate

# 4. 执行数据库迁移
php artisan migrate --seed

# 5. 访问网站完成配置
```

## Docker 安装

### 从 DockerHub 拉取

```bash
docker run -d --init --name olaindex -p 80:8000 xczh/olaindex:6.0
```

访问 `http://YOUR_SERVER_IP/` 即可看到应用。

### 自行构建镜像

```bash
# 构建 Docker 镜像
docker build -t xczh/olaindex:dev .

# 运行容器
docker run -d --init --name olaindex -p 80:8000 xczh/olaindex:dev
```

## Web 服务器配置

应用的运行目录指向根目录下的 `public` 目录。

### Apache 配置

```apache
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

### Nginx 配置

```nginx
server {
    listen 80;
    server_name example.com;
    root /your/path/OLAINDEX/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Docker + Nginx 反向代理

> ⚠️ 使用 Nginx 反向代理时，`docker run` 命令无需带 `-p 80:8000` 参数

```nginx
server {
    listen 80;
    listen 443 ssl http2;

    server_name example.com;

    # SSL 配置（可选）
    ssl_certificate          example.com.cer;
    ssl_certificate_key      example.com.key;

    root /usr/share/nginx/html;

    location / {
        proxy_pass  http://CONTAINER_IP:8000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_set_header X-Forwarded-Port $server_port;
    }
}
```