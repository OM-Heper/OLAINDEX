# OLAINDEX

✨ Another OneDrive Directory Index

[![Latest Stable Version](https://poser.pugx.org/wangningkai/olaindex/v/stable)](https://packagist.org/packages/wangningkai/olaindex)
[![GitHub stars](https://img.shields.io/github/stars/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/stargazers)
[![GitHub license](https://img.shields.io/github/license/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/blob/master/LICENSE)

> **[中文说明](README_CN.md)**

## Introduction

OLAINDEX is a sleek OneDrive directory index application built on Laravel framework, powered by Microsoft Graph API. It supports multiple account types, various themes, and rich file preview capabilities.

## Features

- 📁 OneDrive directory indexing with clean UI
- 👁️ Rich file preview (images, videos, audio, code, documents)
- 🔐 Password-protected directories & hidden paths
- 🔍 In-directory search (no API calls needed)
- 🔗 Short URL sharing mode
- 🚀 Resource preloading for faster access
- 🎨 Multiple themes (default Bootstrap & Material Design)
- 👥 Multi-account support

## Quick Start

```bash
# Clone repository
git clone https://github.com/WangNingkai/OLAINDEX.git
cd OLAINDEX

# Install dependencies
composer install

# Initialize application
composer run install-app

# Set permissions
chmod -R 755 storage
chown -R www:www *
```

## Requirements

- PHP >= 7.4
- OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo extensions
- Composer

## Documentation

Full documentation available at: [https://wangningkai.github.io/OLAINDEX](https://wangningkai.github.io/OLAINDEX)

- [Environment Requirements](https://wangningkai.github.io/OLAINDEX/#/env)
- [Installation Guide](https://wangningkai.github.io/OLAINDEX/#/install)
- [Account Setup](https://wangningkai.github.io/OLAINDEX/#/apply)
- [Configuration](https://wangningkai.github.io/OLAINDEX/#/other)
- [API Reference](https://wangningkai.github.io/OLAINDEX/#/api)
- [FAQ](https://wangningkai.github.io/OLAINDEX/#/question)

## Demo

- [https://demo.olaindex.com](https://demo.olaindex.com)

![Preview](https://ojpoc641y.qnssl.com/FpR4_obUhswLJXCEBgKOV4Pz7qg3.png)

## Support

- 📝 [GitHub Issues](https://github.com/WangNingkai/OLAINDEX/issues) - Bug reports
- 💬 [GitHub Discussions](https://github.com/WangNingkai/OLAINDEX/discussions) - Questions & ideas
- 📧 [i@ningkai.wang](mailto:i@ningkai.wang) - Email contact

## License

OLAINDEX is open-source software licensed under the [MIT license](LICENSE).

## Acknowledgments

This project was inspired by [oneindex](https://github.com/donwa/oneindex).

<a href="https://www.jetbrains.com/?from=OLAINDEX"><img src="https://user-images.githubusercontent.com/23030927/191397586-a30a6d12-578a-402d-8156-93c97651d084.png" height="120" alt="JetBrains"/></a>

---

Made with ❤️ and PHP