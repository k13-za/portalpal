<?php

/**
 * Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
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

use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\Settings\IIconSection;

class Section implements IIconSection
{
    private IL10N $l;
    private IURLGenerator $url;

    public function __construct(IURLGenerator $url, IL10N $l)
    {
        $this->url = $url;
        $this->l = $l;
    }

    public function getIcon(): string
    {
        return $this->url->imagePath('portalpal', 'portalpal-dark.svg');
    }

    public function getID(): string
    {
        return 'portalpal';
    }

    public function getName(): string
    {
        return $this->l->t('Portal Pal');
    }

    public function getPriority(): int
    {
        return 56; // externalsites is 55
    }
}
