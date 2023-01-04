import * as middleware from '@router/middleware'

export default [
	{
		path: 'classroom',
		name: "AdminClassrooms",
		component: () => import (/* webpackChunkName: "AdminClassrooms"*/ "@views/admin/classroom/AdminClassrooms"),
		meta: {
			title: 'Admin Classrooms',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateClassroom",
				component: () => import (/* webpackChunkName: "CreateClassroom"*/ "@views/admin/classroom/CreateClassroom"),
				meta: {
					title: 'Classroom | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowClassroom",
				component: () => import (/* webpackChunkName: "ShowClassroom"*/ "@views/admin/classroom/ShowClassroom"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditClassroom",
				component: () => import (/* webpackChunkName: "EditClassroom"*/ "@views/admin/classroom/EditClassroom"),
				meta: {
					title: 'Classroom | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]