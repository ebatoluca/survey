<template>
	
	<form :id="formId" @submit.prevent="onSubmit">      

        <!-- NAME INPUT -->
        <text-input-component
            custom-class="jsValidator"
            type="text"
            name="name"
            label="Name"
            placeholder="Write the name"
            validators="required length"
            min_length="3"
            max_length="100"
            v-model="name" />

        
        <button-component
            custom-class="uk-width-1-1"
            :disabled="disabled"
            value="Create SurveyCategory" />
        
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
        		default: 'createSurveyCategoryForm',
        	}

        },

        emits: ['submit'],

        data() {

            return {
                
                name: '',

                // Set more $data
                
                disabled: false,
                
                JSValidator: undefined,

            }

        },

        mounted() {

            this.fetchData();

            this.JSValidator = new JSValidator(this.formId).init();

        },

        methods: {

            fetchData() {

                // Fetch required data

            },

            onSubmit() {

                if(this.JSValidator.status) {

                    this.disabled = true;

                    axios.post(route.name('api.survey_category.create'), {

                        _token: csrf_token,

                        name: this.name,

                        // Send more data
                        
                    }).then( res => {

                        this.$emit('submit', {
                            message: 'SurveyCategory successfully created',
                            res: res
                        });

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