import Vue from 'vue';
import Vuex from 'vuex'
import Axios from 'axios';
Vue.use(Vuex)


import team from './modules/team';
import coaches from './modules/coaches';
import players from './modules/players';

export const store = new Vuex.Store({

    modules:{
        team,
        coaches,
        players
    }

});


