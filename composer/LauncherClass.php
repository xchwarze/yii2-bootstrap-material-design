<?php

namespace exocet\composer;

use Composer\Script\Event;

class LauncherClass
{
    public static function postInstall(Event $event)
    {
        self::runScript();
    }

    public static function postUpdate(Event $event)
    {
        self::runScript();
    }

    private static function runScript()
    {
        echo "Modifying files in dependency 'MDB UI Kit' to ensure compatibility with 'Yii2 Bootstrap 5'.\n";

        self::modifyFile('js/mdb.min.js');
        self::modifyFile('css/mdb.dark.min.css');
        self::modifyFile('css/mdb.dark.rtl.min.css');
        self::modifyFile('css/mdb.min.css');
        self::modifyFile('css/mdb.rtl.min.css');
    }

    private static function modifyFile($relativePath)
    {
        $filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/' . $relativePath;

        if (file_exists($filePath)) {
            echo "File found: {$relativePath}\n";

            $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
            file_put_contents($filePath, $content);

            echo "Modifications applied successfully.\n\n";
        } else {
            echo "File not found: {$relativePath}\n\n";
        }
    }
}
