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
                default: 'editTeacherForm'
            },

            teacherId: {
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

                teacher: {},

                // ...

                disabled: false,

                JSValidator: undefined,

                fetchTeacherAttempts: 0,

            }

        },

        methods: {

            fetchData() {

                this.fetchTeacher();

            },

            fetchTeacher() {

                axios.post(route.name('api.teacher.show'), {

                    _token: csrf_token,

                    teacher_id: this.teacherId

                }).then( res => {

                    this.fetchTeacherAttempts = 0;

                    this.teacher = res.data;

                    // ...

                }).catch( error => {

                    if(this.fetchTeacherAttempts <= 3) {

                        setTimeout( () => {

                            ++this.fetchTeacherAttempts;

                            this.fetchTeacher();

                        }, 1500);

                    }

                });

            },

            onSubmit() {

                if(this.JSValidator.status) {

                    this.disabled = true;

                    axios.put(route.name('api.teacher.update'), {

                        _token: csrf_token,

                        // Data

                        teacher_id: this.teacher.id
                        
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