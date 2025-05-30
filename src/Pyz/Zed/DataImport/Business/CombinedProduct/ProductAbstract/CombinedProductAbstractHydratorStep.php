<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\DataImport\Business\CombinedProduct\ProductAbstract;

use Pyz\Zed\DataImport\Business\Exception\InvalidDataException;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\ProductAbstractHydratorStep;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CombinedProductAbstractHydratorStep extends ProductAbstractHydratorStep
{
    /**
     * @var int
     */
    public const BULK_SIZE = 5000;

    /**
     * @var string
     */
    public const COLUMN_ABSTRACT_SKU = 'abstract_sku';

    /**
     * @var string
     */
    public const COLUMN_CONCRETE_SKU = 'concrete_sku';

    /**
     * @var string
     */
    public const COLUMN_CATEGORY_KEY = 'product_abstract.category_key';

    /**
     * @var string
     */
    public const COLUMN_CATEGORY_PRODUCT_ORDER = 'product_abstract.category_product_order';

    /**
     * @var string
     */
    public const COLUMN_URL = 'product_abstract.url';

    /**
     * @var string
     */
    public const COLUMN_COLOR_CODE = 'product_abstract.color_code';

    /**
     * @var string
     */
    public const COLUMN_TAX_SET_NAME = 'product_abstract.tax_set_name';

    /**
     * @var string
     */
    public const COLUMN_META_TITLE = 'product_abstract.meta_title';

    /**
     * @var string
     */
    public const COLUMN_META_KEYWORDS = 'product_abstract.meta_keywords';

    /**
     * @var string
     */
    public const COLUMN_META_DESCRIPTION = 'product_abstract.meta_description';

    /**
     * @var string
     */
    public const COLUMN_NEW_FROM = 'product_abstract.new_from';

    /**
     * @var string
     */
    public const COLUMN_NEW_TO = 'product_abstract.new_to';

    /**
     * @var string
     */
    public const COLUMN_NAME = 'product.name';

    /**
     * @var string
     */
    public const COLUMN_DESCRIPTION = 'product.description';

    /**
     * @var string
     */
    public const COLUMN_ASSIGNED_PRODUCT_TYPE = 'product.assigned_product_type';

    /**
     * @var string
     */
    protected const ASSIGNABLE_PRODUCT_TYPE_ABSTRACT = 'abstract';

    /**
     * @var string
     */
    protected const ASSIGNABLE_PRODUCT_TYPE_BOTH = 'both';

    /**
     * @var list<string>
     */
    protected const ASSIGNABLE_PRODUCT_TYPES = [
        self::ASSIGNABLE_PRODUCT_TYPE_ABSTRACT,
        self::ASSIGNABLE_PRODUCT_TYPE_BOTH,
    ];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $this->assertAssignableProductTypeColumn($dataSet);

        parent::execute($dataSet);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     * @throws \Pyz\Zed\DataImport\Business\Exception\InvalidDataException
     *
     * @return void
     */
    protected function assertAssignableProductTypeColumn(DataSetInterface $dataSet): void
    {
        if (empty($dataSet[static::COLUMN_ASSIGNED_PRODUCT_TYPE])) {
            throw new DataKeyNotFoundInDataSetException(sprintf(
                '"%s" must be defined in the data set. Given: "%s"',
                static::COLUMN_ASSIGNED_PRODUCT_TYPE,
                implode(', ', array_keys($dataSet->getArrayCopy())),
            ));
        }

        if (!in_array($dataSet[static::COLUMN_ASSIGNED_PRODUCT_TYPE], static::ASSIGNABLE_PRODUCT_TYPES, true)) {
            throw new InvalidDataException(sprintf(
                '"%s" must have one of the following values: %s. Given: "%s"',
                static::COLUMN_ASSIGNED_PRODUCT_TYPE,
                implode(', ', static::ASSIGNABLE_PRODUCT_TYPES),
                $dataSet[static::COLUMN_ASSIGNED_PRODUCT_TYPE],
            ));
        }
    }
}
