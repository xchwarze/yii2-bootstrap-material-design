<?php

namespace exocet\bootstrap5md;

class MaterialCompatibleAsset extends MaterialAsset
{
    /**
     * @inheritDoc
     */
    public function publish($am)
    {
        parent::publish($am);

        // I don't understand why they had the idea to break compatibility with the original bootstrap...
        $filePath = $am->getAssetPath($this, 'js/mdb.min.js');
        if (file_exists($filePath)) {
            $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
            file_put_contents($filePath, $content);
        }

        $filePath = $am->getAssetPath($this, 'css/mdb.min.css');
        if (file_exists($filePath)) {
            $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
            file_put_contents($filePath, $content);
        }
    }
}
