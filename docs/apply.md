# 账号申请与绑定

## 回调地址配置

### HTTPS 回调（推荐）

- 格式：`https://your.domain/callback`
- 要求：域名必须配置 SSL 证书

### 中转域名回调

- 通过 `https://olaindex.ningkai.wang` 申请密钥
- 可不使用 HTTPS 协议
- 需在安装时填写正确的绑定域名

### 本地开发回调

- 默认地址：`http://localhost:8000/callback`

## 国际版账号申请

### 一键申请（推荐）

> ⚠️ **建议使用个人账号注册应用，企业账号绑定网盘，避免同一账号导致登录异常**

#### 步骤一：进入安装页面

![安装页面](https://i.loli.net/2018/10/27/5bd46f7f160a6.png)

#### 步骤二：获取密钥

![获取密钥](https://i.loli.net/2018/10/27/5bd47070cd1b0.png)

#### 步骤三：获取 Client ID

![获取 ID](https://i.loli.net/2018/10/27/5bd470721f1a3.png)

#### 步骤四：保存提交

![保存提交](https://i.loli.net/2018/10/27/5bd470719602a.png)

## 世纪互联账号申请

> ⚠️ **初始安装页面一键申请方法与世纪互联申请方法不兼容，需要单独到 Azure 申请**

参考：[Issue #40](https://github.com/WangNingkai/OLAINDEX/issues/40)

### 权限要求

申请密钥时需要添加以下 Graph API 权限：

- 文件读写权限
- 基本个人信息读取权限

## 错误处理

### 重置应用

如果填写过程出现错误，可以执行以下命令重置：

```bash
composer run uninstall-app
```

此操作会重置配置文件到初始化状态。

### 重新绑定

也可以通过页面的返回修改重置数据，并进行再一次绑定。

## 公共测试账号

暂不提供公共测试账号