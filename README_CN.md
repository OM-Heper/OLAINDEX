# OLAINDEX

✨ Yet Another OneDrive Directory Index

[![Latest Stable Version](https://poser.pugx.org/wangningkai/olaindex/v/stable)](https://packagist.org/packages/wangningkai/olaindex)
[![GitHub stars](https://img.shields.io/github/stars/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/stargazers)
[![GitHub license](https://img.shields.io/github/license/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/blob/master/LICENSE)

> **[English README](README.md)**

## 简介

OLAINDEX 是一款简洁优雅的 OneDrive 目录索引应用，基于 Laravel 框架开发，通过 Microsoft Graph API 获取数据展示。支持多种账号类型、多主题显示、丰富的文件预览功能。

## 功能特性

- 📁 OneDrive 文件目录索引，界面简洁美观
- 👁️ 丰富的文件预览（图片、视频、音频、代码、文档）
- 🔐 目录加密与路径隐藏功能
- 🔍 目录内搜索（无需调用 API）
- 🔗 短链分享模式，方便分享
- 🚀 资源预加载，加速访问
- 🎨 多主题支持（默认 Bootstrap & Material Design）
- 👥 多账号支持

## 快速开始

```bash
# 克隆仓库
git clone https://github.com/WangNingkai/OLAINDEX.git
cd OLAINDEX

# 安装依赖
composer install

# 初始化应用
composer run install-app

# 设置权限
chmod -R 755 storage
chown -R www:www *
```

## 环境要求

- PHP >= 7.4
- OpenSSL、PDO、Mbstring、Tokenizer、XML、Ctype、JSON、BCMath、Fileinfo 扩展
- Composer

## 帮助文档

完整文档地址：[https://wangningkai.github.io/OLAINDEX](https://wangningkai.github.io/OLAINDEX)

- [环境要求](https://wangningkai.github.io/OLAINDEX/#/env)
- [部署安装](https://wangningkai.github.io/OLAINDEX/#/install)
- [账号申请](https://wangningkai.github.io/OLAINDEX/#/apply)
- [其他配置](https://wangningkai.github.io/OLAINDEX/#/other)
- [开放接口](https://wangningkai.github.io/OLAINDEX/#/api)
- [常见问题](https://wangningkai.github.io/OLAINDEX/#/question)

## 演示站点

- [https://demo.olaindex.com](https://demo.olaindex.com)

![预览](https://ojpoc641y.qnssl.com/FpR4_obUhswLJXCEBgKOV4Pz7qg3.png)

## 问题反馈

反馈前请先阅读 [《提问的智慧》](https://github.com/ruby-china/How-To-Ask-Questions-The-Smart-Way/blob/master/README-zh_CN.md)

- 📝 [GitHub Issues](https://github.com/WangNingkai/OLAINDEX/issues) - 问题反馈
- 💬 [GitHub Discussions](https://github.com/WangNingkai/OLAINDEX/discussions) - 交流讨论
- 📧 [i@ningkai.wang](mailto:i@ningkai.wang) - 邮件联系

## 支持项目

如果这个项目对你有帮助，可以通过以下方式支持：

- ⭐ Star 并分享这个项目
- ☕ [PayPal 捐赠](https://www.paypal.me/wangningkai)
- 💰 [微信 & 支付宝](https://pay.ningkai.wang)

感谢！ ❤️

## 许可协议

OLAINDEX 基于 [MIT 协议](LICENSE) 开源。

## 致谢

本项目受 [oneindex](https://github.com/donwa/oneindex) 启发，感谢原作者的贡献。

<a href="https://www.jetbrains.com/?from=OLAINDEX"><img src="https://user-images.githubusercontent.com/23030927/191397586-a30a6d12-578a-402d-8156-93c97651d084.png" height="120" alt="JetBrains"/></a>

---

Made with ❤️ and PHP