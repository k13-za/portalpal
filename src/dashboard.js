import { translate as t, translatePlural as n } from '@nextcloud/l10n'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.prototype.t = t
Vue.prototype.n = n
Vue.prototype.$OC = OC
Vue.prototype.$OCA = OCA
Vue.prototype.$appVersion = "0.0.1"

import Dashboard from './Dashboard.vue'

document.addEventListener('DOMContentLoaded', () => {
  OCA.Dashboard.register('externalportal', (el) => {
    const View = Vue.extend(Dashboard)
    const vm = new View({
      propsData: {},
    }).$mount(el)
    return vm;
  })
})
