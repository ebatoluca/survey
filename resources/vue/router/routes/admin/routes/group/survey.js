import * as middleware from '@router/middleware'

export default [
	{
		path: 'survey',
		name: "AdminSurveys",
		component: () => import (/* webpackChunkName: "AdminSurveys"*/ "@views/admin/survey/AdminSurveys.vue"),
		meta: {
			title: 'Admin Surveys',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateSurvey",
				component: () => import (/* webpackChunkName: "CreateSurvey"*/ "@views/admin/survey/CreateSurvey.vue"),
				meta: {
					title: 'Survey | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowSurvey",
				component: () => import (/* webpackChunkName: "ShowSurvey"*/ "@views/admin/survey/ShowSurvey.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditSurvey",
				component: () => import (/* webpackChunkName: "EditSurvey"*/ "@views/admin/survey/EditSurvey.vue"),
				meta: {
					title: 'Survey | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]