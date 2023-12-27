<?php

namespace exocet\helper;

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
        include 'MaterialCompatiblePatch.php';
    }
}
