export default [

	{
		path: 'form',
		name: "SurveyForm",
		component: () => import(/* webpackChunkName: "SurveyFormShowView"*/ "@views/survey/form/ShowView.vue"),
		meta: {
			title: "Formulario de encuesta",
		},
	}
	
];