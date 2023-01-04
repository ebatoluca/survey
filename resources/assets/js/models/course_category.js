const crudActions = () => {

	return [
		{
			id: 'create',
			name: 'Crear',
			callback: 'createCourseCategory',
			icon: 'fa-plus',
			route: true,
			policy: false,
			params: {
				to: {
					name: 'AdminCreateCourseCategory',
					params: {}
				}
			}
		},
		{
			id: 'export',
			name: 'Exportar',
			callback: 'exportCourseCategory',
			icon: 'fa-download',
			route: false,
			policy: false,
			params: {}
		}
	];

}

const dataTableHead = () => {

	return [
		{
			id: 'id',
			value: 'ID',
			sortable: true,
			html: false,
		},
		/*
		{
			id: 'column',
			value: 'Column',
			sortable: true,
			html: false,
			parser: (value) => {

				return value;

			}
		},
		*/
	];

}

const dataTableSort = () => {

	return {
		id: 'asc',
		// Añadir columnas ordenables
	};

}

const exportCourseCategory = (data) => { 

	return new Promise( (resolve, reject) => {

		Swal.fire({
			title: 'Confirmar operación',
			text: 'Desea confirmar la exportación de datos',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, continuar'
		}).then((result) => {

			if (result.isConfirmed) {

				axios.post(route.name('api.course_category.export'), {

			    	_token: csrf_token,

			    	...vm.$store.getters['admin/getCrudFilters']

			    }).then( res => {

			    	Swal.fire({
						title: 'Finalizado',
						text: 'En unos segundos recibirás un correo con el archivo de descarga',
					 	icon: 'success',
					  	showConfirmButton: false,
						timer: 1500
					});

					resolve({ message: 'En unos segundos recibirás un correo con el archivo de descarga' });

				}).catch( error => {

					reject({ message: error.response.data.message })

				});

			} else {

				Swal.fire(
					'Operación cancelada',
					'Se ha cancelado la operación',
					'error'
				);

			}

		});

	});

}

const deleteCourseCategory = (data) => { 

	return new Promise( (resolve, reject) => {

		Swal.fire({
			title: 'Confirmar operación',
			text: 'Esta acción no se puede revertir o deshacer',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar'
		}).then((result) => {

			if (result.isConfirmed) {

				axios.post(route.name('api.course_category.delete'), {

			    	_token: csrf_token,

			    	_method: 'DELETE',

			    	course_category_id: data.id

			    }).then( res => {

			    	Swal.fire({
						title: 'Registro eliminado',
						text: 'Se ha eliminado el registro exitosamente',
					 	icon: 'success',
					  	showConfirmButton: false,
						timer: 1500
					});

					resolve({ message: 'Operación exitosa' });

				}).catch( error => {

					reject({ message: error.response.data.message })

				});

			} else {

				Swal.fire(
					'Operación cancelada',
					'Se ha cancelado la operación',
					'error'
				);

			}

		});

	});

}

export { 
	crudActions,
	dataTableHead,
	dataTableSort,
	exportCourseCategory,
	deleteCourseCategory,
};