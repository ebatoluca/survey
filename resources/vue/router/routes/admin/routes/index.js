import adminRoutes from './group/admin.js'
import attemptRoutes from './group/attempt'
import classroomRoutes from './group/classroom'
import courseCategoryRoutes from './group/course_category'
import courseRoutes from './group/course'
import periodRoutes from './group/period'
import studentRoutes from './group/student'
import surveyAnswerRoutes from './group/survey_answer'
import surveyCategoryRoutes from './group/survey_category'
import surveyQuestionRoutes from './group/survey_question'
import surveyRoutes from './group/survey'
import teacherRoutes from './group/teacher'
import userRoutes from './group/user'

export default [
	
	...adminRoutes,

	...attemptRoutes,

	...classroomRoutes,

	...courseCategoryRoutes,

	...courseRoutes,

	...periodRoutes,

	...studentRoutes,

	...surveyAnswerRoutes,

	...surveyCategoryRoutes,

	...surveyQuestionRoutes,

	...surveyRoutes,

	...teacherRoutes,

	...userRoutes,
	
]