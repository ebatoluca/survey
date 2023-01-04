import admin from './admin'
import site from './site'
import error from './error'
import survey from './survey'

const routes = [].concat(

		site,
	
		admin,

		error,

		survey,

	);

export default routes;