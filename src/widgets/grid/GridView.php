<?php

namespace exocet\bootstrap5md\widgets\grid;

/**
 * @inheritDoc
 */
class GridView extends \yii\grid\GridView
{
    /**
     * @inheritDoc
     */
    public $tableOptions = ['class' => 'table table-striped table-hover'];

    /**
     * @inheritDoc
     */
    public $pager = [
        'class' => 'exocet\bootstrap5md\widgets\LinkPager',
    ];
}
