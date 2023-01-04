import * as middleware from '@router/middleware'

export default [
	{
		path: 'teacher',
		name: "AdminTeachers",
		component: () => import (/* webpackChunkName: "AdminTeachers"*/ "@views/admin/teacher/AdminTeachers"),
		meta: {
			title: 'Admin Teachers',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateTeacher",
				component: () => import (/* webpackChunkName: "CreateTeacher"*/ "@views/admin/teacher/CreateTeacher"),
				meta: {
					title: 'Teacher | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowTeacher",
				component: () => import (/* webpackChunkName: "ShowTeacher"*/ "@views/admin/teacher/ShowTeacher"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditTeacher",
				component: () => import (/* webpackChunkName: "EditTeacher"*/ "@views/admin/teacher/EditTeacher"),
				meta: {
					title: 'Teacher | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]