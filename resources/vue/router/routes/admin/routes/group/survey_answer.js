import * as middleware from '@router/middleware'

export default [
	{
		path: 'survey_answer',
		name: "AdminSurveyAnswers",
		component: () => import (/* webpackChunkName: "AdminSurveyAnswers"*/ "@views/admin/survey_answer/AdminSurveyAnswers.vue"),
		meta: {
			title: 'Admin SurveyAnswers',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateSurveyAnswer",
				component: () => import (/* webpackChunkName: "CreateSurveyAnswer"*/ "@views/admin/survey_answer/CreateSurveyAnswer.vue"),
				meta: {
					title: 'SurveyAnswer | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowSurveyAnswer",
				component: () => import (/* webpackChunkName: "ShowSurveyAnswer"*/ "@views/admin/survey_answer/ShowSurveyAnswer.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditSurveyAnswer",
				component: () => import (/* webpackChunkName: "EditSurveyAnswer"*/ "@views/admin/survey_answer/EditSurveyAnswer.vue"),
				meta: {
					title: 'SurveyAnswer | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]