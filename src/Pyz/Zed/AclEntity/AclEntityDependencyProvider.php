<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\AclEntity;

use Spryker\Zed\AclEntity\AclEntityDependencyProvider as SprykerAclEntityDependencyProvider;
use Spryker\Zed\AclMerchantPortal\Communication\Plugin\AclEntity\MerchantPortalConfigurationAclEntityMetadataConfigExpanderPlugin;
use Spryker\Zed\Console\Communication\Plugin\AclEntity\ConsoleAclEntityDisablerPlugin;

class AclEntityDependencyProvider extends SprykerAclEntityDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\AclEntityExtension\Dependency\Plugin\AclEntityMetadataConfigExpanderPluginInterface>
     */
    protected function getAclEntityMetadataCollectionExpanderPlugins(): array
    {
        return [
            new MerchantPortalConfigurationAclEntityMetadataConfigExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\AclEntityExtension\Dependency\Plugin\AclEntityDisablerPluginInterface>
     */
    protected function getAclEntityDisablerPlugins(): array
    {
        return [
            new ConsoleAclEntityDisablerPlugin(),
        ];
    }
}
