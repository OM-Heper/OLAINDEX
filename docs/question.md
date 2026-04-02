# 常见问题

## 功能相关

### Q: 文件加密、隐藏功能在哪里？

**A:** 账号列表 → 操作 → 账号设置 → 加密隐藏

### Q: 路径兼容模式如何设置？

**A:** v6.0 集成了 v5.0 的多账号功能，为标识账号会在路径上加入账号标识字符。后台可直接开启路径兼容模式，开启后链接会加入 `?hash=xxx` 标识以兼容原先模式。

## 安装相关

### Q: 手动安装或自动安装失败如何解决？

**A:** 不通过 `composer run install-app` 方式的手动安装步骤：

```bash
# 克隆项目
cd /your/web/directory
git clone https://github.com/WangNingkai/OLAINDEX.git tmp
mv tmp/.git .
rm -rf tmp
git reset --hard

# 安装依赖
composer install -vvv

# 设置权限
chmod -R 755 storage
chown -R www:www *
```

然后执行：

1. 复制 `.env.example` 为 `.env`
2. 修改 `.env` 文件的数据库配置
3. 执行 `php artisan key:generate`
4. 执行 `php artisan migrate --seed`
5. 访问网站完成设置

### Q: 如何重置应用？

**A:** 删除以下文件/目录：

- `storage/install/install.lock`
- `storage/data/database.sqlite`（如果使用 SQLite）

## 性能相关

### Q: 国际版账号访问超时报错 500？

**A:** 适当调整连接超时时间和重试次数，修改以下文件：

- `app/Service/GraphClient.php` 第 121 行
- `app/Service/GraphRequest.php` 第 216-217 行

### Q: 如何提升访问速度？

**A:** 建议：

1. 开启 OPcache
2. 使用 Redis 缓存
3. 配置 CDN 加速静态资源
4. 开启资源预加载功能

## 其他问题

### Q: 支持哪些文件预览？

**A:** 支持以下类型：

- 🖼️ 图片：jpg, png, gif, bmp, svg, ico 等
- 🎬 视频：mp4, mkv, avi, mov 等（支持 DASH 流）
- 🎵 音频：mp3, wav, flac, aac 等
- 📄 文档：pdf, doc, docx, xls, xlsx, ppt, pptx 等
- 💻 代码：php, js, css, html, json, xml 等

### Q: 如何贡献代码？

**A:** 欢迎 Pull Request！

1. Fork 本仓库
2. 创建特性分支 (`git checkout -b feature/AmazingFeature`)
3. 提交更改 (`git commit -m 'feat: 添加某个功能'`)
4. 推送到分支 (`git push origin feature/AmazingFeature`)
5. 提交 Pull Request

---

> 更多问题请访问 [GitHub Issues](https://github.com/WangNingkai/OLAINDEX/issues)