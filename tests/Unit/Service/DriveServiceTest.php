<?php

namespace Tests\Unit\Service;

use App\Helpers\HashidsHelper;
use App\Models\Account;
use App\Service\DriveService;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

/**
 * DriveService 服务测试
 *
 * 注意：这些测试只验证不依赖 OneDrive API 调用的方法
 */
class DriveServiceTest extends TestCase
{
    /**
     * 测试路径解析 - 根路径
     *
     * @return void
     */
    public function testParseQueryPathRoot(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $result = $service->parseQueryPath('');

        $this->assertEquals('/', $result['query']);
        $this->assertEquals([], $result['path']);
    }

    /**
     * 测试路径解析 - 子目录
     *
     * @return void
     */
    public function testParseQueryPathSubdirectory(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $result = $service->parseQueryPath('test/folder');

        $this->assertStringContainsString('test', $result['query']);
        $this->assertEquals(['test', 'folder'], $result['path']);
    }

    /**
     * 测试路径解析 - URL 编码路径
     *
     * @return void
     */
    public function testParseQueryPathUrlEncoded(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $result = $service->parseQueryPath(rawurlencode('测试文件夹'));

        $this->assertIsArray($result);
        $this->assertArrayHasKey('query', $result);
        $this->assertArrayHasKey('path', $result);
    }

    /**
     * 测试隐藏路径检测 - 空配置
     *
     * @return void
     */
    public function testIsHiddenPathWithEmptyConfig(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $this->assertFalse($service->isHiddenPath('test/path'));
    }

    /**
     * 测试隐藏路径检测 - 匹配路径
     *
     * @return void
     */
    public function testIsHiddenPathWithMatchingPath(): void
    {
        $account = $this->createMockAccount(['hide_path' => 'secret']);
        $service = new DriveService($account);

        $this->assertTrue($service->isHiddenPath('secret'));
        $this->assertTrue($service->isHiddenPath('secret/file.txt'));
        $this->assertFalse($service->isHiddenPath('public'));
    }

    /**
     * 测试加密路径检测 - 空配置
     *
     * @return void
     */
    public function testCheckEncryptedPathWithEmptyConfig(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $result = $service->checkEncryptedPath('test/path');

        $this->assertFalse($result['need_password']);
    }

    /**
     * 测试加密路径检测 - 匹配路径
     *
     * @return void
     */
    public function testCheckEncryptedPathWithMatchingPath(): void
    {
        $account = $this->createMockAccount(['encrypt_path' => 'private:123456']);
        $service = new DriveService($account);

        $result = $service->checkEncryptedPath('private');

        $this->assertTrue($result['need_password']);
        $this->assertEquals('123456', $result['password']);
    }

    /**
     * 测试缓存键构建
     *
     * @return void
     */
    public function testBuildCacheKey(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $key = $service->buildCacheKey('item', '/test/path');

        $this->assertStringStartsWith('d:item:', $key);
        $this->assertStringContainsString(md5('/test/path'), $key);
    }

    /**
     * 测试格式化文件项
     *
     * @return void
     */
    public function testFormatItemsFile(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $item = [
            'name' => 'test.txt',
        ];

        $result = $service->formatItems($item, true);

        $this->assertEquals('txt', $result['ext']);
    }

    /**
     * 测试获取账号 ID
     *
     * @return void
     */
    public function testGetAccountId(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $this->assertEquals(1, $service->getAccountId());
    }

    /**
     * 测试获取 Hash
     *
     * @return void
     */
    public function testGetHash(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $this->assertNotEmpty($service->getHash());
    }

    /**
     * 测试搜索过滤
     *
     * @return void
     */
    public function testSearchItems(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $list = collect([
            ['name' => 'test.txt'],
            ['name' => 'document.pdf'],
            ['name' => 'test_doc.doc'],
        ]);

        $result = $service->searchItems($list, 'test');

        $this->assertCount(2, $result);
    }

    /**
     * 测试系统文件过滤
     *
     * @return void
     */
    public function testFilterSystemItems(): void
    {
        $account = $this->createMockAccount();
        $service = new DriveService($account);

        $list = collect([
            ['name' => 'README.MD'],
            ['name' => 'HEAD.MD'],
            ['name' => '.PASSWORD'],
            ['name' => 'normal.txt'],
            ['name' => 'document.pdf'],
        ]);

        $result = $service->filterSystemItems($list);

        $this->assertCount(2, $result);
    }

    /**
     * 创建模拟账号
     *
     * @param array $config
     * @return Account
     */
    private function createMockAccount(array $config = []): Account
    {
        $account = new Account();
        $account->id = 1;
        $account->config = $config;

        return $account;
    }
}