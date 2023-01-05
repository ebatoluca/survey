<template>
	
	<span>
		
		<span>{{ timer }}</span>

	</span>

</template>

<script>

	import dayjs from 'dayjs'
	
	export default {

		props: {

			startTime: {
				type: String,
				required: true,
			}

		},

		data() {

			return {

				endTime: undefined,

				intervalKey: undefined,

				counter: 0,

			}

		},

		mounted () {

			this.SetCounter();

			this.setInterval();

		},

		computed: {

			timer() {

				let sec_num = parseInt(this.counter, 10); // don't forget the second param
			    let hours   = Math.floor(sec_num / 3600);
			    let minutes = Math.floor((sec_num - (hours * 3600)) / 60);
			    let seconds = sec_num - (hours * 3600) - (minutes * 60);

			    if (hours   < 10) {hours   = "0"+hours;}
			    if (minutes < 10) {minutes = "0"+minutes;}
			    if (seconds < 10) {seconds = "0"+seconds;}

			    return hours+':'+minutes+':'+seconds;

			}

		},

		methods: {

			SetCounter() {

				let startTime = dayjs(this.startTime);

				let endTime = dayjs();

				this.counter = endTime.diff(startTime, 'second');

			},

			setInterval() {

				this.intervalKey = setInterval(() => {

					++this.counter;

				}, 1000);

			},

			stopInterval() {
			
			    clearInterval(this.intervalKey);

			    this.intervalKey = undefined;

			},

		}

	}

</script>