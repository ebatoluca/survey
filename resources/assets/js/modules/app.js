import BreadcrumbComponent from '@components/utils/BreadcrumbComponent'
import BugReporter from '@components/plugins/bug_reporter/BugReporter'
import ShPre from '@components/utils/SyntaxHighlighter'
import UnderConstruction from '@components/utils/UnderConstruction'
import LvInput from 'lightvue/input' 
import LvButton from 'lightvue/button' 

const globalComponentRegistration = (app) => {

	app.component('BreadcrumbComponent', BreadcrumbComponent);

	app.component('BugReporter', BugReporter);

	app.component('ShPre', ShPre);

	app.component('UnderConstruction', UnderConstruction);

	app.component('LvInput', LvInput);

	app.component('LvButton', LvButton);

}

export {

	globalComponentRegistration

}