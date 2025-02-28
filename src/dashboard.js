/*
* Copyright (c) 2025 Kudala IoT <kieron@kudalaiot.com>
 *
 * SPDX-FileCopyrightText: 2025 Kudala IoT <kieron@kudalaiot.com>
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

import Vue from 'vue'

import Dashboard from './Dashboard.vue'

import '../css/dashboard.scss'

Vue.prototype.$OC = OC
Vue.prototype.$OCA = OCA
Vue.prototype.$appVersion = '1.2.0'

document.addEventListener('DOMContentLoaded', () => {
	OCA.Dashboard.register('portalpal', (el) => {
		const View = Vue.extend(Dashboard)
		const vm = new View({
			propsData: {},
		}).$mount(el)
		return vm
	})
})
