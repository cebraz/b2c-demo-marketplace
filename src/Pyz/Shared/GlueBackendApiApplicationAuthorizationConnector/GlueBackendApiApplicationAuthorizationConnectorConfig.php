<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Shared\GlueBackendApiApplicationAuthorizationConnector;

use Spryker\Shared\GlueBackendApiApplicationAuthorizationConnector\GlueBackendApiApplicationAuthorizationConnectorConfig as SprykerGlueBackendApiApplicationAuthorizationConnectorConfig;

class GlueBackendApiApplicationAuthorizationConnectorConfig extends SprykerGlueBackendApiApplicationAuthorizationConnectorConfig
{
    /**
     * @return array<string, mixed>
     */
    public function getProtectedPaths(): array
    {
        return [
            '/\/warehouse-user-assignments(?:\/[^\/]+)?\/?$/' => [
                'isRegularExpression' => true,
            ],
            '/push-notification-subscriptions' => [
                'isRegularExpression' => false,
            ],
            '/\/push-notification-providers.*/' => [
                'isRegularExpression' => true,
            ],
            '/warehouse-tokens' => [
                'isRegularExpression' => false,
                'methods' => [
                    'post',
                ],
            ],
            '/\/picking-lists.*/' => [
                'isRegularExpression' => true,
                'methods' => [
                    'patch',
                ],
            ],
            '/\/service-points.*/' => [
                'isRegularExpression' => true,
            ],
            '/\/shipment-types.*/' => [
                'isRegularExpression' => true,
            ],
            '/\/services.*/' => [
                'isRegularExpression' => true,
            ],
            '/\/service-types.*/' => [
                'isRegularExpression' => true,
            ],
        ];
    }
}
