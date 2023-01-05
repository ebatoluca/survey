import * as middleware from '@router/middleware'

export default [
	{
		path: 'course_category',
		name: "AdminCourseCategories",
		component: () => import (/* webpackChunkName: "AdminCourseCategories"*/ "@views/admin/course_category/AdminCourseCategories.vue"),
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
				component: () => import (/* webpackChunkName: "CreateCourseCategory"*/ "@views/admin/course_category/CreateCourseCategory.vue"),
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
				component: () => import (/* webpackChunkName: "ShowCourseCategory"*/ "@views/admin/course_category/ShowCourseCategory.vue"),
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
				component: () => import (/* webpackChunkName: "EditCourseCategory"*/ "@views/admin/course_category/EditCourseCategory.vue"),
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