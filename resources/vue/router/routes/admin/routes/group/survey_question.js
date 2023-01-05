import * as middleware from '@router/middleware'

export default [
	{
		path: 'survey_question',
		name: "AdminSurveyQuestions",
		component: () => import (/* webpackChunkName: "AdminSurveyQuestions"*/ "@views/admin/survey_question/AdminSurveyQuestions.vue"),
		meta: {
			title: 'Admin SurveyQuestions',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateSurveyQuestion",
				component: () => import (/* webpackChunkName: "CreateSurveyQuestion"*/ "@views/admin/survey_question/CreateSurveyQuestion.vue"),
				meta: {
					title: 'SurveyQuestion | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowSurveyQuestion",
				component: () => import (/* webpackChunkName: "ShowSurveyQuestion"*/ "@views/admin/survey_question/ShowSurveyQuestion.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditSurveyQuestion",
				component: () => import (/* webpackChunkName: "EditSurveyQuestion"*/ "@views/admin/survey_question/EditSurveyQuestion.vue"),
				meta: {
					title: 'SurveyQuestion | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]