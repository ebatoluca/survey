import routes from './routes'

export default [

	{
		path: '/admin',
		name: "Admin",
		component: () => import(/* webpackChunkName: "AdminLayout"*/ "@layouts/admin/AdminLayout.vue"),
		meta: {
			title: "Administración",
		},
		children: [...routes]
	}
	
];