import routes from './routes'

export default [

	{
		path: '/survey',
		name: "Survey",
		component: () => import(/* webpackChunkName: "SurveyLayout"*/ "@layouts/survey/SurveyLayout.vue"),
		meta: {
			title: "Encuesta",
		},
		children: [...routes]
	}
	
];