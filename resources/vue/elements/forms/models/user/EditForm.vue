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
                default: 'editUserForm'
            },

            userId: {
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

                user: {},

                // ...

                disabled: false,

                JSValidator: undefined,

                fetchUserAttempts: 0,

            }

        },

        methods: {

            fetchData() {

                this.fetchUser();

            },

            fetchUser() {

                axios.post(route.name('api.user.show'), {

                    _token: csrf_token,

                    user_id: this.userId

                }).then( res => {

                    this.fetchUserAttempts = 0;

                    this.user = res.data;

                    // ...

                }).catch( error => {

                    if(this.fetchUserAttempts <= 3) {

                        setTimeout( () => {

                            ++this.fetchUserAttempts;

                            this.fetchUser();

                        }, 1500);

                    }

                });

            },

            onSubmit() {

                if(this.JSValidator.status) {

                    this.disabled = true;

                    axios.put(route.name('api.user.update'), {

                        _token: csrf_token,

                        // Data

                        user_id: this.user.id
                        
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