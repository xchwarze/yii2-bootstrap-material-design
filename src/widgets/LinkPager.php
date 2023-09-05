<?php

namespace exocet\bootstrap5md\widgets;

/**
 * @inheritDoc
 */
class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * @inheritDoc
     */
    protected function renderPageButtons()
    {
        $html = parent::renderPageButtons();
        if ($html === '') {
            return $html;
        }

        return "<nav>\n{$html}\n</nav>";
    }
}
