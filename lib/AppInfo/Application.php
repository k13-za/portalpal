<?php

declare(strict_types=1);
/**
*  Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
*
* SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
* SPDX-License-Identifier: AGPL-3.0-or-later
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License as
* published by the Free Software Foundation, either version 3 of the
* License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the GNU Affero General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
*
*
*  Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
*
* SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
* SPDX-License-Identifier: AGPL-3.0-or-later
*
*/

namespace OCA\PortalPal\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCA\PortalPal\Dashboard\PortalPalWidget;

class Application extends App implements IBootstrap
{
    public const APP_ID = 'portalpal';

    public function __construct()
    {
        parent::__construct(self::APP_ID);
    }

    public function register(IRegistrationContext $context): void
    {
        $context->registerDashboardWidget(PortalPalWidget::class);
    }
    public function boot(IBootContext $context): void
    {
    }
}
