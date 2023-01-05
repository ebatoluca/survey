import * as middleware from '@router/middleware'

export default [
	{
		path: 'course',
		name: "AdminCourses",
		component: () => import (/* webpackChunkName: "AdminCourses"*/ "@views/admin/course/AdminCourses.vue"),
		meta: {
			title: 'Admin Courses',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateCourse",
				component: () => import (/* webpackChunkName: "CreateCourse"*/ "@views/admin/course/CreateCourse.vue"),
				meta: {
					title: 'Course | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowCourse",
				component: () => import (/* webpackChunkName: "ShowCourse"*/ "@views/admin/course/ShowCourse.vue"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditCourse",
				component: () => import (/* webpackChunkName: "EditCourse"*/ "@views/admin/course/EditCourse.vue"),
				meta: {
					title: 'Course | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]