import * as middleware from '@router/middleware'

export default [
	{
		path: 'survey',
		name: "AdminSurveys",
		component: () => import (/* webpackChunkName: "AdminSurveys"*/ "@views/admin/survey/AdminSurveys"),
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
				component: () => import (/* webpackChunkName: "CreateSurvey"*/ "@views/admin/survey/CreateSurvey"),
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
				component: () => import (/* webpackChunkName: "ShowSurvey"*/ "@views/admin/survey/ShowSurvey"),
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
				component: () => import (/* webpackChunkName: "EditSurvey"*/ "@views/admin/survey/EditSurvey"),
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