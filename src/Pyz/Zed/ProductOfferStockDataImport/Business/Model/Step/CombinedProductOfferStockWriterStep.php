<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\ProductOfferStockDataImport\Business\Model\Step;

use Pyz\Zed\ProductOfferStockDataImport\Business\Model\DataSet\CombinedProductOfferStockDataSetInterface;
use Spryker\Zed\ProductOfferStockDataImport\Business\Step\ProductOfferStockWriterStep;

class CombinedProductOfferStockWriterStep extends ProductOfferStockWriterStep
{
    protected const QUANTITY = CombinedProductOfferStockDataSetInterface::QUANTITY;

    protected const IS_NEVER_OUT_OF_STOCK = CombinedProductOfferStockDataSetInterface::IS_NEVER_OUT_OF_STOCK;

    /**
     * @var list<string>
     */
    protected const REQUIRED_DATA_SET_KEYS = [
        self::FK_STOCK,
        self::FK_PRODUCT_OFFER,
        self::QUANTITY,
        self::IS_NEVER_OUT_OF_STOCK,
    ];
}
