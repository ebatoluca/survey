import { createStore } from 'vuex'
import AdminModule from '@vuex/modules/AdminModule'
import SiteModule from '@vuex/modules/SiteModule'
import UserModule from '@vuex/modules/UserModule'

const store = createStore({

	modules: {

		admin: AdminModule,

		site: SiteModule,
		
		user: UserModule,

	},

});


export default store;