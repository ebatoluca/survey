import * as middleware from '@router/middleware'

export default [
	{
		path: 'period',
		name: "AdminPeriods",
		component: () => import (/* webpackChunkName: "AdminPeriods"*/ "@views/admin/period/AdminPeriods"),
		meta: {
			title: 'Admin Periods',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreatePeriod",
				component: () => import (/* webpackChunkName: "CreatePeriod"*/ "@views/admin/period/CreatePeriod"),
				meta: {
					title: 'Period | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowPeriod",
				component: () => import (/* webpackChunkName: "ShowPeriod"*/ "@views/admin/period/ShowPeriod"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditPeriod",
				component: () => import (/* webpackChunkName: "EditPeriod"*/ "@views/admin/period/EditPeriod"),
				meta: {
					title: 'Period | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]