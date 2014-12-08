<?php

/*
 * This file is part of the json-schema bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$loader = @include __DIR__ . '/../vendor/autoload.php';

if (!$loader) {
    die(<<<'EOT'
You must set up the project dependencies, run the following commands:

wget http://getcomposer.org/composer.phar
php composer.phar install

EOT
    );
}
