<?php

namespace exocet\bootstrap5md\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @inheritDoc
 */
class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * @inheritDoc
     */
    public $linkContainerOptions = ['class' => 'page-item'];

    /**
     * @inheritDoc
     */
    public $linkOptions = ['class' => 'page-link'];
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

    /**
     * @inheritDoc
     */
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = $this->linkContainerOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, empty($class) ? $this->pageCssClass : $class);

        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag($linkWrapTag, Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }
}
