<template>
	
	<form :id="formId" @submit.prevent="onSubmit">

        <!-- INPUTS -->
        <text-input-component
            custom-class="jsValidator"
            type="text"
            name="name"
            label="Name"
            placeholder="Name"
            validators="required length"
            min_length="3"
            max_length="100"
            v-model="name" />

        <button-component
            custom-class="uk-width-1-1"
            :disabled="disabled"
            value="Update" />
        
    </form>

</template>

<script>

    import TextInputComponent from '@components/forms/TextInputComponent'
    import ButtonComponent from '@components/forms/ButtonComponent'
	
	export default {

        components: {
            
            TextInputComponent,
            
            ButtonComponent,

        },

        props: {

            formId: {
                type: String,
                default: 'editCourseForm'
            },

            courseId: {
                type: [Number, String],
                required: true
            }

        },

        emits: ['submit'],

        mounted() {

            this.fetchData(); 

            this.JSValidator = new JSValidator(this.formId).init();

            this.JSValidator.status = true;

        },

        data() {

            return {

                course: {},

                // ...

                disabled: false,

                JSValidator: undefined,

                fetchCourseAttempts: 0,

            }

        },

        methods: {

            fetchData() {

                this.fetchCourse();

            },

            fetchCourse() {

                axios.post(route.name('api.course.show'), {

                    _token: csrf_token,

                    course_id: this.courseId

                }).then( res => {

                    this.fetchCourseAttempts = 0;

                    this.course = res.data;

                    // ...

                }).catch( error => {

                    if(this.fetchCourseAttempts <= 3) {

                        setTimeout( () => {

                            ++this.fetchCourseAttempts;

                            this.fetchCourse();

                        }, 1500);

                    }

                });

            },

            onSubmit() {

                if(this.JSValidator.status) {

                    this.disabled = true;

                    axios.put(route.name('api.course.update'), {

                        _token: csrf_token,

                        // Data

                        course_id: this.course.id
                        
                    }).then( res => {

                        this.$emit('submit', {
                            message: 'Guardado',
                            res: res
                        });

                        setTimeout(() => {

                            this.disabled = false;

                        }, 2500);

                    }).catch( error => {
                        
                        this.disabled = false;

                        UIkit.notification({
                            message: 'El formulario tiene errores. Revisa los campos para continuar.',
                            status: 'danger'
                        });

                        this.JSValidator.appendExternalErrors(error.response.data.errors);

                    });

                } else {

                    this.disabled = false;

                    UIkit.notification({
                        message: 'Ha ocurrido un error de validación',
                        status: 'danger'
                    });

                }

            }

        }

	}

</script>