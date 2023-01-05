import * as middleware from '@router/middleware'

export default [
	{
		path: 'survey_category',
		name: "AdminSurveyCategories",
		component: () => import (/* webpackChunkName: "AdminSurveyCategories"*/ "@views/admin/survey_category/AdminSurveyCategories.vue"),
		meta: {
			title: 'Admin SurveyCategories',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateSurveyCategory",
				component: () => import (/* webpackChunkName: "CreateSurveyCategory"*/ "@views/admin/survey_category/CreateSurveyCategory.vue"),
				meta: {
					title: 'SurveyCategory | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowSurveyCategory",
				component: () => import (/* webpackChunkName: "ShowSurveyCategory"*/ "@views/admin/survey_category/ShowSurveyCategory.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditSurveyCategory",
				component: () => import (/* webpackChunkName: "EditSurveyCategory"*/ "@views/admin/survey_category/EditSurveyCategory.vue"),
				meta: {
					title: 'SurveyCategory | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]