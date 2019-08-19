import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
// import common from './common/common.js'
export default new Vuex.Store({
    state: {
        crumbs: []
    },
    mutations: {
        setCrumbs (state, {crumbs}) {
            state.crumbs = crumbs
        }
    },
    actions: {
    }
})
