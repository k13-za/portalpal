<?php

declare(strict_types=1);
//  Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>

// SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

require_once './vendor/autoload.php';

use Nextcloud\CodingStandard\Config;

$config = new Config();
$config
	->getFinder()
	->ignoreVCSIgnored(true)
	->notPath('build')
	->notPath('l10n')
	->notPath('src')
	->notPath('vendor')
	->in(__DIR__);
return $config;