<?php

declare(strict_types=1);
/**
*  Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
*
* SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
* SPDX-License-Identifier: AGPL-3.0-or-later
*
*/
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\PortalPal\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */

return [
    'resources' => [
    ],
    'routes' => [
        ['name' => 'config#setAdminConfig', 'url' => '/admin-config', 'verb' => 'PUT'],
        ['name' => 'config#getConfig', 'url' => '/config', 'verb' => 'GET'],
    ]
];
