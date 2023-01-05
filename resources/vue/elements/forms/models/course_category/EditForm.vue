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

    import TextInputComponent from '@components/forms/TextInputComponent.vue'
    import ButtonComponent from '@components/forms/ButtonComponent.vue'
	
	export default {

        components: {
            
            TextInputComponent,
            
            ButtonComponent,

        },

        props: {

            formId: {
                type: String,
                default: 'editCourseCategoryForm'
            },

            courseCategoryId: {
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

                courseCategory: {},

                // ...

                disabled: false,

                JSValidator: undefined,

                fetchCourseCategoryAttempts: 0,

            }

        },

        methods: {

            fetchData() {

                this.fetchCourseCategory();

            },

            fetchCourseCategory() {

                axios.post(route.name('api.course_category.show'), {

                    _token: csrf_token,

                    course_category_id: this.courseCategoryId

                }).then( res => {

                    this.fetchCourseCategoryAttempts = 0;

                    this.courseCategory = res.data;

                    // ...

                }).catch( error => {

                    if(this.fetchCourseCategoryAttempts <= 3) {

                        setTimeout( () => {

                            ++this.fetchCourseCategoryAttempts;

                            this.fetchCourseCategory();

                        }, 1500);

                    }

                });

            },

            onSubmit() {

                if(this.JSValidator.status) {

                    this.disabled = true;

                    axios.put(route.name('api.course_category.update'), {

                        _token: csrf_token,

                        // Data

                        course_category_id: this.courseCategory.id
                        
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