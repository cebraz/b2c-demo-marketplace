<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Glue\WishlistsRestApi;

use Spryker\Glue\MerchantProductOfferWishlistRestApi\Plugin\Wishlist\ProductOfferRestWishlistItemsAttributesMapperPlugin;
use Spryker\Glue\ProductAvailabilitiesRestApi\Plugin\Wishlist\ProductAvailabilityRestWishlistItemsAttributesMapperPlugin;
use Spryker\Glue\ProductConfigurationWishlistsRestApi\Plugin\WishlistsRestApi\ProductConfigurationRestWishlistItemsAttributesMapperPlugin;
use Spryker\Glue\ProductConfigurationWishlistsRestApi\Plugin\WishlistsRestApi\ProductConfigurationWishlistItemRequestMapperPlugin;
use Spryker\Glue\ProductPricesRestApi\Plugin\Wishlist\ProductPriceRestWishlistItemsAttributesMapperPlugin;
use Spryker\Glue\WishlistsRestApi\WishlistsRestApiDependencyProvider as SprykerWishlistsRestApiDependencyProvider;

class WishlistsRestApiDependencyProvider extends SprykerWishlistsRestApiDependencyProvider
{
    /**
     * @return array<\Spryker\Glue\WishlistsRestApiExtension\Dependency\Plugin\RestWishlistItemsAttributesMapperPluginInterface>
     */
    protected function getRestWishlistItemsAttributesMapperPlugins(): array
    {
        return [
            new ProductPriceRestWishlistItemsAttributesMapperPlugin(),
            new ProductAvailabilityRestWishlistItemsAttributesMapperPlugin(),
            new ProductOfferRestWishlistItemsAttributesMapperPlugin(),
            new ProductConfigurationRestWishlistItemsAttributesMapperPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Glue\WishlistsRestApiExtension\Dependency\Plugin\WishlistItemRequestMapperPluginInterface>
     */
    protected function getWishlistItemRequestMapperPlugins(): array
    {
        return [
            new ProductConfigurationWishlistItemRequestMapperPlugin(),
        ];
    }
}
