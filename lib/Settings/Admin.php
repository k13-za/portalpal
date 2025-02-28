<?php

/**
 * 
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
 *
 */

namespace OCA\PortalPal\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IL10N;
use OCP\IConfig;
use OCP\Settings\ISettings;
use OCP\AppFramework\Services\IInitialState;

use OCA\PortalPal\AppInfo\Application;

class Admin implements ISettings
{
    /** @var IConfig */
    private $config;

    /** @var IL10N */
    private $l;

    /**
     * Admin constructor.
     *
     * @param IConfig $config
     * @param IL10N $l
     */
    public function __construct(
        IConfig       $config,
        IL10N         $l,
        IInitialState $initialStateService
    ) {
        $this->config = $config;
        $this->l = $l;
        $this->initialStateService = $initialStateService;
    }

    /**
     * @return TemplateResponse
     */
    public function getForm(): TemplateResponse
    {
        $widgetTitle = $this->config->getAppValue(Application::APP_ID, 'widgetTitle', '#000000');
        $extraWide = $this->config->getAppValue(Application::APP_ID, 'extraWide', false);
        $maxSize = $this->config->getAppValue(Application::APP_ID, 'maxSize', false);
        $showFiles = $this->config->getAppValue(Application::APP_ID, 'showFiles', false);
        $iconColorMode = $this->config->getAppValue(Application::APP_ID, 'iconColorMode', "DEFAULT");
        $customIconColor = $this->config->getAppValue(Application::APP_ID, 'customIconColor', '');

        $adminConfig = [
            'widgetTitle' => $widgetTitle,
            'extraWide' => $extraWide,
            'maxSize' => $maxSize,
            'showFiles' => $showFiles,
            'iconColorMode' => $iconColorMode,
            'customIconColor' => $customIconColor
        ];
        $this->initialStateService->provideInitialState('admin-config', $adminConfig);
        return new TemplateResponse(Application::APP_ID, 'adminSettings');
    }

    public function getSection(): string
    {
        return 'portalpal';
    }

    public function getPriority(): int
    {
        return 10;
    }
}
