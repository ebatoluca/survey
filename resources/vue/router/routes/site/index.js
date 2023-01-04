import routes from './routes'

export default [

	{
		path: '/',
		name: "Site",
		component: () => import(/* webpackChunkName: "SiteLayout"*/ "@layouts/site/SiteLayout.vue"),
		meta: {
			title: "Sitio",
		},
		children: [...routes]
	}
	
];