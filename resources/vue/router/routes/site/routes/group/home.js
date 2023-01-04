export default [

	{
		path: '/',
		name: "Home",
		component: () => import(/* webpackChunkName: "HomeShowView"*/ "@views/site/home/ShowView.vue"),
		meta: {
			title: "Survey App",
		},
	}
	
];