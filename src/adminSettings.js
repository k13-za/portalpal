/*
 * Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
 *
 * SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

import Vue from 'vue'
import { translate as t, translatePlural as n } from '@nextcloud/l10n'

import AdminSettings from './AdminSettings.vue'

// Adding translations to the whole app
Vue.mixin({
	methods: {
		t,
		n,
	},
})

Vue.prototype.$OC = OC
Vue.prototype.$OCA = OCA
Vue.prototype.$appVersion = '1.2.0'

export default new Vue({
	el: '#portalpal_prefs',
	render: h => h(AdminSettings),
})
