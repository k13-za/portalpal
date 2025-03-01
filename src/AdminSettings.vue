<!--
Nextcloud - Portal Pal Dashboard
@author Tuomas Nurmi
@copyright 2022 Opinsys Oy <dev@opinsys.fi>
This library is free software; you can redistribute it and/or
modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
License as published by the Free Software Foundation; either
version 3 of the License, or any later version.
This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU AFFERO GENERAL PUBLIC LICENSE for more details.
You should have received a copy of the GNU Affero General Public
License along with this library. If not, see <http://www.gnu.org/licenses/>.

The Welcome widget ( https://github.com/julien-nc/welcome ) has been a very useful
guiding source for basic dashboard widget and configuration functionality.

 * Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
 *
 * SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
 * SPDX-License-Identifier: AGPL-3.0-or-later
-->

<template>
	<div id="portalpal_prefs" class="section">
		<div class="settings">
			<h2>
				Portal Pal settings
			</h2>
			<div class="setting">
				<label for="externaportal-widget-title">
					<span class="icon icon-file" />
					Widget Title
				</label>
				<input id="externaportal-widget-title"
					v-model="state.widgetTitle"
					type="text"
					:class="{ 'icon-loading-small': saving }"
					:placeholder="('Portal Pal')">
			</div>
			<div class="setting">
				<label for="extraWide">Make the widget wider when there are many links</label>
				<input v-model="state.extraWide" type="checkbox" name="extraWide">
			</div>
			<div class="setting">
				<label for="maxSize">Limit maximum icon size to to avoid over-stretching 32x32 pixmap icons</label>
				<input v-model="state.maxSize" type="checkbox" name="maxSize">
			</div>
			<div class="setting">
				<label for="showFiles">Show Files link for everyone</label>
				<input v-model="state.showFiles" type="checkbox" name="showFiles">
			</div>
			<div class="settings">
				<label for="iconColorMode">Icon Colors</label>
				<select v-model="state.iconColorMode" name="iconColorMode">
					<option value="THEMING">
						Use theme color
					</option>
					<option value="PRIMARY">
						Use text color
					</option>
					<option value="DEFAULT">
						Use icons as-is
					</option>
					<option value="CUSTOM">
						Use custom color
					</option>
				</select>
			</div>
			<div v-if="state.iconColorMode === 'CUSTOM'" class="setting">
				<ColorInputField label="Custom icon color"
					:value.sync="state.customIconColor" />
			</div>
			<div class="setting">
				<button color="primary" @click="saveSettings">
					Save
				</button>
			</div>
		</div>
		<div class="right-pane">
			<h2>Preview</h2>
			<div class="panel-wrapper">
				<div class="panel">
					<div class="panel--header">
						<h2>
							<div aria-labelledby="panel--header--icon--description"
								aria-hidden="true"
								class="icon-portalpal"
								role="img" />
							{{ state.widgetTitle || "Portal Pal" }}
						</h2>
						<span id="panel--header--icon--description" class="hidden-visually">
							{{ t('dashboard', '"{title} icon"', {title: state.widgetTitle || "Portal Pal"}) }}
						</span>
					</div>
					<div class="panel--content">
						<Dashboard ref="dashboard" :title="state.widgetTitle" />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { loadState } from '@nextcloud/initial-state'
import axios from '@nextcloud/axios'
import { generateUrl } from '@nextcloud/router'
import { showSuccess, showError } from '@nextcloud/dialogs'
import Dashboard from './Dashboard.vue'
import ColorInputField from './ColorInputField.vue'

export default {
	name: 'AdminSettings',
	components: {
		Dashboard,
		ColorInputField,
	},
	props: [],
	data() {
		return {
			state: loadState('portalpal', 'admin-config'),
			saving: false,
		}
	},
	methods: {
		async saveSettings() {
			this.saving = true
			const values = {
				widgetTitle: this.state.widgetTitle,
				maxSize: this.state.maxSize,
				extraWide: this.state.extraWide,
				showFiles: this.state.showFiles,
				iconColorMode: this.state.iconColorMode,
				customIconColor: this.state.customIconColor,
			}
			const req = {
				values,
			}
			const url = generateUrl('/apps/portalpal/admin-config')
			console.debug('"' + JSON.stringify(req) + '"')
			try {
				await axios.put(url, req)
			} catch (e) {
				showError(t('portalpal', 'Failed to save Portal Pal options') + `: ${e.response?.request?.responseText ?? ''}`)
				console.debug(e)
			}
			showSuccess(t('portalpal', 'Portal Pal options saved'))
			this.saving = false
			await this.$refs.dashboard.reload()
		},
	},
}
</script>

<style scoped>
#portalpal_prefs {
	display: flex;
	flex-direction: row;
	justify-content: space-evenly;
	flex-wrap: wrap;
}

.settings {
	display: flex;
	flex-direction: column;
	flex-shrink: 0;
}

.right-pane {
	margin: 16px;
}

.panel-wrapper {
	background-color: var(--color-background-plain, var(--color-main-background));
	padding: 16px;
}

.panel {
	width: 320px;
	max-width: 100%;
	background-color: var(--color-main-background-blur);
	box-sizing: border-box;
	backdrop-filter: var(--filter-background-blur);
	-webkit-backdrop-filter: var(--filter-background-blur);
	border-radius: var(--border-radius-large);
}

.panel--header {
	padding: 16px;
	cursor: grab;
}

.panel--content {
	margin: 0 16px 16px 16px;
	height: 424px;
	overflow: visible;
	box-sizing: border-box;
}

.icon-portalpal {
	background-image: url('../img/portalpal-dark.svg');
	filter: var(--background-invert-if-dark);
	background-size: 32px;
	width: 32px;
	height: 32px;
	margin-right: 16px;
	background-position: center;
	float: left;
}

</style>
