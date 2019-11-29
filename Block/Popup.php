<?php

namespace Mikielis\PopupPromo\Block;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface;
use Mikielis\PopupPromo\Helper\Data as DataHelper;

class Popup extends Template
{
    protected $dataHelper;

    public function __construct(
        DataHelper $dataHelper,
        Template\Context $context,
        array $data = []
    ) {
        $this->dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    /**
     * Is module enabled/disabled
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return (boolean) $this->dataHelper->getConfig('mikielis_popuppromo/functional/enable');
    }

    /**
     * Get display settings
     *
     * @return string
     */
    public function getDisplaySettings()
    {
        return $this->dataHelper->getConfig('mikielis_popuppromo/functional/display_settings');
    }

    /**
     * Get display settings
     *
     * @return integer
     */
    public function getDisplayDelay()
    {
        return (int)$this->dataHelper->getConfig('mikielis_popuppromo/functional/display_delay');
    }

    /**
     * Get block ID
     *
     * @return string|null
     */
    public function getBlockId()
    {
        return $this->dataHelper->getConfig('mikielis_popuppromo/content/block_id');
    }

    /**
     * Get coupon code
     *
     * @return string|null
     */
    public function getCouponCode()
    {
        return $this->dataHelper->getConfig('mikielis_popuppromo/content/coupon_code');
    }

    /**
     * Get regulations text
     *
     * @return string|null
     */
    public function getRequlationsText()
    {
        return $this->dataHelper->getConfig('mikielis_popuppromo/content/regulations/text');
    }

    /**
     * Get page URL
     *
     * @return string|null
     * @throws NoSuchEntityException
     */
    public function getPageUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_WEB) . $this->dataHelper->getConfig('mikielis_popuppromo/content/regulations/page');
    }

    /**
     * Get custom CSS
     *
     * @return string|null
     */
    public function getCustomCss()
    {
        return $this->dataHelper->getConfig('mikielis_popuppromo/design/custom_css');
    }
}
