// UIkit

    import UIkit from 'uikit';
    
    import Icons from 'uikit/dist/js/uikit-icons';

    import CustomIcons from '@plugins/uikit/js/custom-icons.js'

    UIkit.use(Icons);

    UIkit.icon.add(CustomIcons.icons);

    window.UIkit = UIkit;

// LODASH

    import _ from 'lodash';
    
    window._ = _;

// AXIOS

    import axios from 'axios';

    window.axios = axios;

    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VUE

    import { createApp } from 'vue'

    import App from '@app/App.vue'

// Vue App

    window.app = createApp(App);

    window.vm = app.mount('#app');