<?php

declare(strict_types=1);
/**
*  Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
*
* SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
* SPDX-License-Identifier: AGPL-3.0-or-later
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
 *
 */

namespace OCA\PortalPal\Dashboard;

use OCA\PortalPal\AppInfo\Application;
use OCP\Dashboard\IWidget;
use OCP\IConfig;
use OCP\IL10N;

//boilerplate structure from https://docs.nextcloud.com/server/latest/developer_manual/digging_deeper/dashboard.html
class PortalPalWidget implements IWidget
{
    private IL10N $l10n;

    public function __construct(
        IL10N $l10n,
        IConfig $config
    ) {
        $this->l10n = $l10n;
        $this->config = $config;
    }

    /**
     * @return string Unique id that identifies the widget, e.g. the app id
     */
    public function getId(): string
    {
        return 'portalpal';
    }

    /**
     * @return string User facing title of the widget
     */
    public function getTitle(): string
    {
        $widgetTitle = $this->config->getAppValue(Application::APP_ID, 'widgetTitle', 'Portal Pal');
        return $widgetTitle ?: 'Portal Pal';
    }

    /**
     * @return int Initial order for widget sorting
     *   in the range of 10-100, 0-9 are reserved for shipped apps
     */
    public function getOrder(): int
    {
        return 0;
    }

    /**
     * @return string css class that displays an icon next to the widget title
     */
    public function getIconClass(): string
    {
        return 'icon-portalpal';
    }

    /**
     * @return string|null The absolute url to the apps own view
     */
    public function getUrl(): ?string
    {
        return null;
    }

    /**
     * Execute widget bootstrap code like loading scripts and providing initial state
     */
    public function load(): void
    {
        \OCP\Util::addScript('portalpal', 'portalpal-dashboard');
    }
}
