import * as middleware from '@router/middleware'

export default [
	{
		path: 'course_category',
		name: "AdminCourseCategories",
		component: () => import (/* webpackChunkName: "AdminCourseCategories"*/ "@views/admin/course_category/AdminCourseCategories"),
		meta: {
			title: 'Admin CourseCategories',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateCourseCategory",
				component: () => import (/* webpackChunkName: "CreateCourseCategory"*/ "@views/admin/course_category/CreateCourseCategory"),
				meta: {
					title: 'CourseCategory | Create',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/show',
				name: "AdminShowCourseCategory",
				component: () => import (/* webpackChunkName: "ShowCourseCategory"*/ "@views/admin/course_category/ShowCourseCategory"),
				meta: {
					title: undefined,
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id/edit',
				name: "AdminEditCourseCategory",
				component: () => import (/* webpackChunkName: "EditCourseCategory"*/ "@views/admin/course_category/EditCourseCategory"),
				meta: {
					title: 'CourseCategory | Edit',
					middleware: [
						middleware.auth
					]
				}
			},
		]
	},
]