<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\UrlRewrite\Test\Block\Adminhtml\Catalog\Category;

use Magento\Catalog\Test\Fixture\CatalogCategory;
use Mtf\Block\Block;
use Mtf\Client\Element\Locator;

/**
 * Class Tree
 * Categories tree block
 */
class Tree extends Block
{
    /**
     * Locator value for skip category button
     *
     * @var string
     */
    protected $skipCategoryButton = '[data-ui-id$="skip-categories"]';

    /**
     * Select category by its name
     *
     * @param string|CatalogCategory $category
     * @return void
     */
    public function selectCategory($category)
    {
        $categoryName = $category->getName();
        if ($categoryName) {
            $this->_rootElement->find("//a[contains(text(),'{$categoryName}')]", Locator::SELECTOR_XPATH)->click();
        } else {
            $this->skipCategorySelection();
        }
    }

    /**
     * Skip category selection
     *
     * @return void
     */
    protected function skipCategorySelection()
    {
        $this->_rootElement->find($this->skipCategoryButton, Locator::SELECTOR_CSS)->click();
    }
}
