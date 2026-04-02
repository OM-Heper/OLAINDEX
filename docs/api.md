# 开放接口

> 版本 v4.0 后，添加第三方访问接口，目前支持图床接口，后续会支持更多接口。

## 接口认证

### 设置访问密钥

后台设置第三方访问密钥 `{access_token}`

### 请求头认证

在请求 Header 中添加认证信息：

```
Authorization: Bearer {access_token}
```

## 图床接口

### 接口信息

- **地址**：`{domain}/api/image`
- **方法**：POST
- **Content-Type**：`multipart/form-data`

### 请求参数

| 参数名 | 类型 | 必填 | 说明 |
|--------|------|------|------|
| olaindex_img | file | 是 | 图片文件 |

### 返回示例

```json
{
    "errno": 200,
    "data": {
        "id": "01FGBPEFYAMCC",
        "filename": "onedrive.png",
        "size": 32303,
        "time": "2019-06-14T03:15:08Z",
        "url": "http://{domain}/view/2019/06/14/UwNZdw2M/onedrive.svg.png",
        "delete": "http://{domain}/file/delete/eyJpdiI6IktZaVc0Z01OWU4wUzRuYXpuRjFBZVE9PSIsInZhbHVlIjoiWEFzTGtLWnhibUQxVWVxTlRoU3RYRmpuTE40YlwvVnJYdWhPUTJwcStSd1JaRGpGZ0hwMFpVTnd1QWU0NCtBcGhiZ011UnRwRnBac3Jjd2RHTGZ4clRHWUFIeWFpT2VqMTE3M2dDZk9ibkpaMjRxODBjdUhIRzBSd0VoRk9TMGRwQWNcL29TQ3lvbDR1U3hUcGE3QzVqQUZvZ1hLTmI2emlVbnNtaWdmMVJsQ1hUY096cFB1aFZKajNhOW41eEVHQ3ZONEJkM09wQXRORjVoWGtrZExzaHg3U0llbXFsa0VKQlwvR0pzVXBvd0YxNkpuVDVyYWhIeFI3UHFJK0szV09Gc3hyUlBTb2JyeG5XRTg4RFlnZjFQUnNZcDh3V0xDM1ZLOGRcL0QycUNjNk1acU1aQmhMbUZ6SFVuRU84MkwyXC9VOURKRit6TERBeEVZNHhPd1p6ZkhSOGpJNlNrTUp0cjU0MFRma25vVGxxemJTenFKclBjV1dCOGpSdEp2dU5TUG5wVFNxSzVqNWFvSXJ4M2hoNmNNNzhiS0dmbkRBVkhiSGdEbk1UIiwibWFjIjoiNWQzMjYyZjllMjhlMjVlZTViMjE5MTVlOGQzNTEzNjE4ZmE1ZTBjOTFjYzcxOTlkMTgxZTBjNjIzM2QyMTFhMyJ9"
    }
}
```

### 返回字段说明

| 字段 | 说明 |
|------|------|
| errno | 状态码，200 表示成功 |
| data.id | 文件 ID |
| data.filename | 文件名 |
| data.size | 文件大小（字节） |
| data.time | 上传时间 |
| data.url | 图片访问地址 |
| data.delete | 删除链接 |

## 示例代码

### PHP 示例

```php
<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "http://{domain}/api/image",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => [
        'olaindex_img' => new CURLFile('/path/to/image.png')
    ],
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer {access_token}"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
```

### JavaScript 示例

```javascript
const formData = new FormData();
formData.append('olaindex_img', fileInput.files[0]);

fetch('http://{domain}/api/image', {
    method: 'POST',
    headers: {
        'Authorization': 'Bearer {access_token}'
    },
    body: formData
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
```