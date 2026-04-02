<?php

namespace Tests\Unit\Service;

use App\Service\OneDrive;
use Tests\TestCase;

/**
 * OneDrive 服务测试
 */
class OneDriveTest extends TestCase
{
    /**
     * 测试服务实例化
     *
     * @return void
     */
    public function testCanBeInstantiated(): void
    {
        $service = new OneDrive('test-token', 'https://graph.microsoft.com/v1.0');

        $this->assertInstanceOf(OneDrive::class, $service);
    }

    /**
     * 测试 SharePoint 模式设置
     *
     * @return void
     */
    public function testSharePointModeCanBeSet(): void
    {
        $service = new OneDrive('test-token', 'https://graph.microsoft.com/v1.0');

        $result = $service->sharepoint(true, 'site-id');

        $this->assertInstanceOf(OneDrive::class, $result);
    }

    /**
     * 测试 SharePoint 模式关闭
     *
     * @return void
     */
    public function testSharePointModeCanBeDisabled(): void
    {
        $service = new OneDrive('test-token', 'https://graph.microsoft.com/v1.0');

        $result = $service->sharepoint(false);

        $this->assertInstanceOf(OneDrive::class, $result);
    }

    /**
     * 测试受限状态
     *
     * @return void
     */
    public function testIsBlockReturnsFalseByDefault(): void
    {
        $service = new OneDrive('test-token', 'https://graph.microsoft.com/v1.0');

        $this->assertFalse($service->isBlock());
    }

    /**
     * 测试受限重试时间
     *
     * @return void
     */
    public function testGetBlockTimeReturnsZeroByDefault(): void
    {
        $service = new OneDrive('test-token', 'https://graph.microsoft.com/v1.0');

        $this->assertEquals(0, $service->getBlockTime());
    }
}