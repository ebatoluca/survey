import * as middleware from '@router/middleware'

export default [
	{
		path: 'attempt',
		name: "AdminAttempts",
		component: () => import (/* webpackChunkName: "AdminAttempts"*/ "@views/admin/attempt/AdminAttempts.vue"),
		meta: {
			title: 'Admin Attempts',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateAttempt",
				component: () => import (/* webpackChunkName: "CreateAttempt"*/ "@views/admin/attempt/CreateAttempt.vue"),
				meta: {
					title: 'Attempt | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowAttempt",
				component: () => import (/* webpackChunkName: "ShowAttempt"*/ "@views/admin/attempt/ShowAttempt.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditAttempt",
				component: () => import (/* webpackChunkName: "EditAttempt"*/ "@views/admin/attempt/EditAttempt.vue"),
				meta: {
					title: 'Attempt | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]