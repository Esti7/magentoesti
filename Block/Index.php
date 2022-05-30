<?php

namespace Esti\BrandModule\Block;

use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $product;

    public function __construct(
        Context $context, \Magento\Catalog\Model\Product $product,
        \Magento\Framework\Registry $registry,
        array   $data = []
    ) {
        $this->product = $product;
        $this->registry = $registry;
        parent::__construct($context, $data);

    }

    public function getProductAttributeValue()
    {

        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue = $this->product->getResource()->getAttribute('brand_name')->getFrontend()->getValue($product);

        return $productattributevalue;

    }

    public function getProductAttributeLabel()
    {

        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel = $this->product->getResource()->getAttribute('brand_name')->getFrontend()->getLabel();
        return $productattributelabel;

    }

}
