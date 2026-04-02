# OLAINDEX

✨ Another OneDrive Directory Index

[![Latest Stable Version](https://poser.pugx.org/wangningkai/olaindex/v/stable)](https://packagist.org/packages/wangningkai/olaindex)
[![GitHub stars](https://img.shields.io/github/stars/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/stargazers)
[![GitHub license](https://img.shields.io/github/license/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/blob/master/LICENSE)

> **[中文文档](https://wangningkai.github.io/OLAINDEX)**

## Introduction

OLAINDEX is a sleek OneDrive directory index application built on Laravel framework, powered by Microsoft Graph API.

## Features

- 📁 OneDrive directory indexing with clean UI
- 👁️ Rich file preview (images, videos, audio, code, documents)
- 🔐 Password-protected directories & hidden paths
- 🔍 In-directory search (no API calls needed)
- 🔗 Short URL sharing mode
- 🚀 Resource preloading for faster access
- 🎨 Multiple themes (default Bootstrap & Material Design)
- 👥 Multi-account support

## Demo

- [https://demo.olaindex.com](https://demo.olaindex.com)

![Preview](https://ojpoc641y.qnssl.com/FpR4_obUhswLJXCEBgKOV4Pz7qg3.png)

## Installation

> This project is based on Laravel framework. Please refer to Laravel documentation for environment requirements.

[View Full Documentation](https://wangningkai.github.io/OLAINDEX)

```bash
# Clone repository
git clone https://github.com/WangNingkai/OLAINDEX.git tmp
mv tmp/.git .
rm -rf tmp
git reset --hard

# Install dependencies
composer install -vvv

# Set permissions
chmod -R 755 storage
chown -R www:www *

# Initialize application
composer run install-app
```

## Requirements

- PHP >= 7.4
- OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo extensions
- Composer

## Support

- 📝 [GitHub Issues](https://github.com/WangNingkai/OLAINDEX/issues) - Bug reports
- 💬 [GitHub Discussions](https://github.com/WangNingkai/OLAINDEX/discussions) - Questions & ideas
- 📧 [i@ningkai.wang](mailto:i@ningkai.wang) - Email contact

## Notes

1. This software is for personal study only, not for commercial use.
2. Please comply with local laws when using this application.
3. If you use this application, please keep the copyright and share with others.

## License

OLAINDEX is open-source software licensed under the [MIT license](https://github.com/WangNingkai/OLAINDEX/blob/master/LICENSE).

## Acknowledgments

This project was inspired by [oneindex](https://github.com/donwa/oneindex).

<a href="https://www.jetbrains.com/?from=OLAINDEX"><img src="https://user-images.githubusercontent.com/23030927/191397586-a30a6d12-578a-402d-8156-93c97651d084.png" height="120" alt="JetBrains"/></a>

---

Made with ❤️ and PHP