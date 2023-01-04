export default [

	{
		path: 'dashboard',
		name: "Admin",
		component: () => import(/* webpackChunkName: "AdminShowView"*/ "@views/admin/dashboard/ShowView.vue"),
		meta: {
			title: "Panel de administración",
		},
	}
	
];