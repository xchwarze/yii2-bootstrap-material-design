<?php

echo "Modifying files in dependency 'MDB UI Kit' to ensure compatibility with 'Yii2 Bootstrap 5'.\n";

/* js changes... */
$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/js/mdb.es.min.js';
if (file_exists($filePath)) {
    echo "File found: js/mdb.es.min.js\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}

$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/js/mdb.umd.min.js';
if (file_exists($filePath)) {
    echo "File found: js/mdb.umd.min.js\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}

/* css changes... */
$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/css/mdb.dark.min.css'
if (file_exists($filePath)) {
    echo "File found: css/mdb.dark.min.css\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}

$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/css/mdb.dark.rtl.min.css'
if (file_exists($filePath)) {
    echo "File found: css/mdb.dark.rtl.min.css\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}

$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/css/mdb.min.css'
if (file_exists($filePath)) {
    echo "File found: css/mdb.min.css\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}

$filePath = __DIR__ . '/../../../npm-asset/mdb-ui-kit/css/mdb.rtl.min.css'
if (file_exists($filePath)) {
    echo "File found: css/mdb.rtl.min.css\n";

    $content = str_replace('data-mdb-', 'data-bs-', file_get_contents($filePath));
    file_put_contents($filePath, $content);

    echo "Modifications applied successfully.\n";
}
