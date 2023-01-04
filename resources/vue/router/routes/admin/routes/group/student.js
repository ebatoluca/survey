import * as middleware from '@router/middleware'

export default [
	{
		path: 'student',
		name: "AdminStudents",
		component: () => import (/* webpackChunkName: "AdminStudents"*/ "@views/admin/student/AdminStudents"),
		meta: {
			title: 'Admin Students',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateStudent",
				component: () => import (/* webpackChunkName: "CreateStudent"*/ "@views/admin/student/CreateStudent"),
				meta: {
					title: 'Student | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowStudent",
				component: () => import (/* webpackChunkName: "ShowStudent"*/ "@views/admin/student/ShowStudent"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditStudent",
				component: () => import (/* webpackChunkName: "EditStudent"*/ "@views/admin/student/EditStudent"),
				meta: {
					title: 'Student | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]