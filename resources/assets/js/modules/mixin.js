import dayjs from 'dayjs'
import { replaceWord, strlimit } from '@js/utils/string'
import { numberFormat } from '@js/utils/number'

export default {

	data() {

		return {

			AWS_URL: AWS_URL,

			itemTypes: {
				text: 'Texto corto',
		        number: 'Número',
		        date: 'Fecha',
		        time: 'Tiempo',
		        url: 'URL',
		        email: 'Email',
		        select: 'Selección',
		        radio: 'Opción múltiple',
		        checkbox: 'Caja de verificación',
		        file: 'Archivo',
		        editor: 'Editor de texto',
		        textarea: 'Texto largo',
			},

		}

	},

	methods: {

		alert(type = 'none', object = {}) {

			let data = replaceWord(type, {
				'save': {
					title: 'Guardado',
					text: 'Se ha guardado el registro',
					icon: 'success',
				},
				'update': {
					title: 'Actualizado',
					text: 'Se ha actualizado el registro',
					icon: 'success',
				},
				'delete': {
					title: 'Eliminado',
					text: 'Se ha eliminado el registro',
					icon: 'success',
				}, 
				'cancel': {
					title: 'Operación cancelada',
					text: 'Se ha cancelado la operación',
					icon: 'error',
				}, 
				'error': {
					title: 'Error',
					text: 'Ha ocurrido un error, favor de intentar más tarde.',
					icon: 'error',
				}, 
				'success': {
					title: 'Éxito',
					text: 'Operación realizada correctamente',
					icon: 'success',
				}, 
				'none': object,
			});

			Swal.fire({
				...data,
			 	toast: true,
			 	position: 'top-end',
			  	showConfirmButton: false,
				timer: 1500,
				timerProgressBar: true,
			});

		},

		getDisplayFileUrl(fileId) {

			return (!isNaN(fileId) && fileId > 0) ? route.name('file.display', fileId) : '/assets/images/utils/avatar.png';

		},

		showLoginModal() {

			UIkit.modal('#loginModal').show();

		},

		hideLoginModal() {

			UIkit.modal('#loginModal').hide();

		},

		getUuid() {

			return chance.guid();

		},

		getHash(length = 25, casing = 'lower') {

			return chance.hash({length: length, casing: casing});

		},

		randInt(min = -9007199254740991, max = 9007199254740991) {

			return chance.integer({ min: min, max: max });

		},

		showLoader(fn = null, props = {}) {

			let loader = this.$loading.show({
			    color: '#1e87f0',
			    width: 120,
			    height: 120,
			    backgroundColor: '#ffffff',
			    opacity: 0.5,
			    ...props
			});

			if(fn != null) fn();

			return loader;

		},

		hideLoader(loader, fn = null, delay = 1000) {

			setTimeout(() => {

				if(fn != null) fn();

				loader.hide();

			}, delay);

		},

		clearBreadcrums(data) {

			this.$store.dispatch('site/clearBreadcrums');

		},

		pushBreadcrumbPage(data) {

			this.$store.dispatch('site/pushBreadcrumbPage', data);

		},

		formatDate(date, format = 'MM/DD/YYYY', customParse = null) {

			let formatObject = {

				LT: 'h:mm A', // 8:02 PM
				
				LTS: 'h:mm:ss A', // 8:02:18 PM
				
				L: 'MM/DD/YYYY', // 08/16/2018
				
				LL: 'MMMM D, YYYY', // August 16, 2018
				
				LLL: 'MMMM D, YYYY h:mm A', // August 16, 2018 8:02 PM
				
				LLLL: 'dddd, MMMM D, YYYY h:mm A', // Thursday, August 16, 2018 8:02 PM
				
				l: 'M/D/YYYY', // 8/16/2018
				
				ll: 'MMM D, YYYY', // Aug 16, 2018
				
				lll: 'MMM D, YYYY h:mm A', // Aug 16, 2018 8:02 PM
				
				llll: 'ddd, MMM D, YYYY h:mm A', // Thu, Aug 16, 2018 8:02 PM
			
			}

			format = replaceWord(format, formatObject, format);

			return (customParse != null) ? dayjs(date, customParse).format(format) :  dayjs(date).format(format);

		},

		replaceWord(word, object, def = '') {

		    return replaceWord(word, object, def);

		},

		age(date) {

			return dayjs(date).fromNow(true);

		},

		fromNow(date) {

			return dayjs(date).fromNow();

		},

		strlimit(str, length = 45) {

			return strlimit(str, length);

		},

		getQr(url) {

			let qr = `https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=${encodeURIComponent(url)}&choe=UTF-8`;

			return qr;

		},

		itemTypesTxt(type) {

			return this.replaceWord(type, this.itemTypes);

		},

		openWindow(url, target = '_blanck') {

			window.open(url, target);

		},

		reloadPage() {

			location.reload();

		},

		btoa(string) {

			return btoa(string);

		},

		atob(base64) {

			return atob(base64);

		},

		numberFormat(amount, decimals) {

			return numberFormat(amount, decimals);

		},

	}

}
