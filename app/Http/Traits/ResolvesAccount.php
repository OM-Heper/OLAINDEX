<?php

namespace App\Http\Traits;

use App\Helpers\HashidsHelper;
use App\Models\Account;

/**
 * Trait ResolvesAccount
 *
 * 统一账号解析逻辑，消除 Controller 中的重复代码
 */
trait ResolvesAccount
{
    /**
     * 根据 hash 解析账号
     *
     * @param string|null $hash
     * @return Account
     */
    protected function resolveAccount(?string $hash): Account
    {
        if (!$hash) {
            $accountId = setting('primary_account', 0);
        } else {
            $accountId = HashidsHelper::decode($hash);
        }

        if (!$accountId) {
            abort(404, '尚未设置账号！');
        }

        $account = Account::find($accountId);
        if (!$account) {
            abort(404, '账号不存在！');
        }

        return $account;
    }

    /**
     * 根据请求解析账号（支持单账号模式）
     *
     * @param mixed $request
     * @return Account
     */
    protected function resolveAccountFromRequest($request): Account
    {
        // 单账号模式直接使用主账号
        if (setting('single_account_mode', 1)) {
            $accountId = setting('primary_account', 0);
            if (!$accountId) {
                abort(404, '尚未设置账号！');
            }

            $account = Account::find($accountId);
            if (!$account) {
                abort(404, '账号不存在！');
            }

            return $account;
        }

        // 多账号模式根据 hash 解析
        $hash = $request->get('hash', '');
        return $this->resolveAccount($hash);
    }

    /**
     * 解析账号并返回 hash
     *
     * @param mixed $request
     * @param string|null $hash
     * @return array{account: Account, hash: string}
     */
    protected function resolveAccountWithHash($request, ?string $hash = null): array
    {
        // 单账号模式
        if (setting('single_account_mode', 1)) {
            $queryHash = $hash;
            $hash = $request->get('hash', '');

            if ($hash) {
                $accountId = HashidsHelper::decode($hash);
            } else {
                $accountId = setting('primary_account', 0);
                $hash = HashidsHelper::encode($accountId);
            }
        } else {
            // 多账号模式
            if (!$hash) {
                $hash = $request->get('hash', '');
                if ($hash) {
                    $accountId = HashidsHelper::decode($hash);
                } else {
                    $accountId = setting('primary_account', 0);
                    $hash = HashidsHelper::encode($accountId);
                }
            } else {
                $accountId = HashidsHelper::decode($hash);
                if (null === $accountId) {
                    $accountId = setting('primary_account', 0);
                    $hash = HashidsHelper::encode($accountId);
                }
            }
        }

        if (!$accountId) {
            abort(404, '尚未设置账号！');
        }

        $account = Account::find($accountId);
        if (!$account) {
            abort(404, '账号不存在！');
        }

        return [
            'account' => $account,
            'hash' => $hash,
        ];
    }
}