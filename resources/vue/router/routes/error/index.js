import routes from './routes'

export default [

	{
		path: '/error',
		name: "Error",
		component: () => import(/* webpackChunkName: "ErrorLayout"*/ "@layouts/error/ErrorLayout.vue"),
		meta: {
			title: "Error",
		},
		children: [...routes]
	}
	
];