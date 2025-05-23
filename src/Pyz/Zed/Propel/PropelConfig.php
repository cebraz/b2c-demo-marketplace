<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\Propel;

use Spryker\Zed\Propel\PropelConfig as SprykerPropelConfig;

class PropelConfig extends SprykerPropelConfig
{
    /**
     * @return list<string>
     */
    public function getProjectPropelSchemaPathPatterns(): array
    {
        return array_merge(
            [APPLICATION_SOURCE_DIR . '/*/Zed/*/Persistence/Propel/Schema/'],
            parent::getProjectPropelSchemaPathPatterns(),
        );
    }
}
