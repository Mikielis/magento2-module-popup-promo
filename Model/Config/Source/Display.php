<?php

namespace Mikielis\PopupPromo\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Display implements OptionSourceInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'immediately', 'label' => 'Immediately'],
            ['value' => 'after_x_seconds', 'label' => 'After X seconds']
        ];
    }
}
