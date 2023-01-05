import * as middleware from '@router/middleware'

export default [
	{
		path: 'user',
		name: "AdminUsers",
		component: () => import (/* webpackChunkName: "AdminUsers"*/ "@views/admin/user/AdminUsers.vue"),
		meta: {
			title: 'Admin Users',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateUser",
				component: () => import (/* webpackChunkName: "CreateUser"*/ "@views/admin/user/CreateUser.vue"),
				meta: {
					title: 'User | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowUser",
				component: () => import (/* webpackChunkName: "ShowUser"*/ "@views/admin/user/ShowUser.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditUser",
				component: () => import (/* webpackChunkName: "EditUser"*/ "@views/admin/user/EditUser.vue"),
				meta: {
					title: 'User | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]