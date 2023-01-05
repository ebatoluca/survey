<template>

    <transition appear :name="transitionName">

        <div 
            v-if="isOpen"
            :id="elementId"
            class="cookie" 
            :class="['cookie__' + type, 'cookie__' + type + '--' + position]">
    
            <div :class="'cookie__' + type + '__wrap'">

                <div 
                    :class="'cookie__' + type + '__content'">
                    
                    <slot name="message">
                    
                        <span class="uk-text-bold">
                            
                            ESTE SITIO WEB UTILIZA COOKIES

                        </span>

                        <span>
                            
                            Usamos cookies para personalizar el contenido y los anuncios, para proporcionar funciones de redes sociales y para analizar nuestro tráfico. También compartimos información sobre su uso de nuestro sitio con nuestros socios de redes sociales, publicidad y análisis, quienes pueden combinarla con otra información que les haya proporcionado o que hayan recopilado a partir de su uso de sus servicios. Usted acepta nuestras cookies si continúa utilizando nuestro sitio web.

                        </span>

                        <router-link to="/privacy/cookie-policy">Leer más...</router-link>

                    </slot>

                </div>

                <div :class="'cookie__' + type + '__buttons'">
                    
                    <button 
                        v-if="disableDecline === false" 
                        :class="['cookie__' + type + '__buttons__button', 'cookie__' + type + '__buttons__button--decline']"
                        @click="decline" >

                        <slot name="declineContent">
                        
                            Rechazar
                        
                        </slot>

                    </button>

                    <button 
                        :class="['cookie__' + type + '__buttons__button', 'cookie__' + type + '__buttons__button--accept']"
                        @click="accept" >
                        
                        <slot name="acceptContent">

                            Aceptar
                        
                        </slot>

                    </button>

                </div>

            </div>

        </div>
    
    </transition>

</template>

<script>

    import * as cookie from '@js/utils/cookie'

    export default {
        
        props: {

            transitionName: {
                type: String,
                default: 'slideFromBottom', // slideFromBottom, slideFromTop, fade
            },

            elementId: {
                type: [String,Number],
                default: 'cookieAcceptWrapper'
            },
            
            // floating, bar
            type: {
                type: String,
                default: 'floating'
            },
            
            // floating: bottom-left, bottom-right, top-left, top-rigt
            // bar:  bottom, top
            position: {
                type: String,
                default: 'bottom-left'
            },

            disableDecline: {
                type: Boolean,
                default: false
            },

        },

        emits: ['status', 'clicked-accept', 'clicked-decline','removed-cookie'],
        
        data () {
        
            return {
                
                isOpen: false,

                status: null,
        
            }
        
        },

        computed: {

            containerPosition () {
        
                return `cookie--${this.position}`
        
            },
            
            containerType () {
        
                return `cookie--${this.type}`
        
            }

        },

        mounted () {
        
            this.init()
        
        },
        
        methods: {

            init () {
                
                let visitedType = this.getCookieStatus();
                
                if (visitedType && (visitedType === 'accept')) {
                    
                    this.isOpen = false

                }
                
                if (!visitedType || visitedType == 'decline') {
                    
                    this.isOpen = true

                }
                
                this.status = visitedType
                
                this.$emit('status', visitedType)

            },

            setCookieStatus (type) {

                if (type === 'accept') {
                
                    cookie.setCookie(`cookie-accept-${this.elementId}`, 'accept', 3654)
                
                }
                
                if (type === 'decline') {
                
                    cookie.setCookie(`cookie-accept-${this.elementId}`, 'decline', 3654)
                
                }

            },

            getCookieStatus () {

                return cookie.getCookie(`cookie-accept-${this.elementId}`);

            },

            accept () {

                this.setCookieStatus('accept')
                
                this.status = 'accept'
                
                this.isOpen = false
                
                this.$emit('clicked-accept')

            },

            decline () {

                this.setCookieStatus('decline')

                this.status = 'decline'

                this.isOpen = false

                this.$emit('clicked-decline')

            },

            removeCookie () {

                cookie.deleteCookie(`cookie-accept-${this.elementId}`)

                this.status = null

                this.$emit('removed-cookie')

            }

        }

    }

</script>

<style scoped>

    .cookie__bar {
        -ms-overflow-style: none;
        position: fixed;
        overflow: hidden;
        box-sizing: border-box;
        z-index: 9999;
        width: 100%;
        background: #eee;
        padding: 20px 20px;
        align-items: center;
        box-shadow: 0 -4px 4px rgba(198, 198, 198, 0.05);
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        font-size: 1rem;
        font-family: Roboto, Oxygen, Ubuntu, Cantarell, “Fira Sans”, “Droid Sans”, “Helvetica Neue”, Arial, sans-serif;
        line-height: 1.5;
    }

    .cookie__bar--bottom {
        bottom: 0;
        left: 0;
        right: 0;
    }

    .cookie__bar--top {
        top: 0;
        left: 0;
        right: 0;
    }

    .cookie__bar__wrap {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    @media (min-width: 768px) {

        .cookie__bar__wrap {
            flex-direction: row;
        }

    }

    .cookie__bar__content {
        margin-right: 0;
        margin-bottom: 20px;
        font-size: 0.9rem;
        max-height: 103px;
        overflow: auto;
        width: 100%;
        -ms-flex: 1 1 auto;
    }

    @media (min-width: 768px) {

        .cookie__bar__content {
            margin-right: auto;
            margin-bottom: 0;
        }

    }

    .cookie__bar__buttons {
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    @media (min-width: 768px) {

        .cookie__bar__buttons {
            flex-direction: row;
            width: auto;
        }

    }

    .cookie__bar__buttons__button {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        border-radius: 3px;
        font-size: 0.9rem;
    }

    .cookie__bar__buttons__button:hover {
        cursor: pointer;
        text-decoration: none;
    }

    .cookie__bar__buttons__button--accept {
        -ms-flex: 1 1 auto;
        background: #4caf50;
        background: linear-gradient(#5cb860, #4caf50);
        color: #fff;
    }

    .cookie__bar__buttons__button--accept:hover {
        background: #409343;
    }

    .cookie__bar__buttons__button--decline {
        -ms-flex: 1 1 auto;
        background: #f44336;
        background: linear-gradient(#f55a4e, #f44336);
        color: #fff;
        margin-bottom: 10px;
    }

    .cookie__bar__buttons__button--decline:hover {
        background: #f21f0f;
    }

    @media (min-width: 768px) {

        .cookie__bar__buttons__button--decline {
            margin-bottom: 0;
            margin-right: 10px;
        }

    }

    .cookie__floating {
        -ms-overflow-style: none;
        position: fixed;
        overflow: hidden;
        box-sizing: border-box;
        z-index: 9999;
        width: 90%;
        background: #fafafa;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        box-shadow: 0 4px 8px rgba(198, 198, 198, 0.3);
        border: 1px solid #ddd;
        font-size: 1rem;
        font-family: Roboto, Oxygen, Ubuntu, Cantarell, “Fira Sans”, “Droid Sans”, “Helvetica Neue”, Arial, sans-serif;
        line-height: 1.5;
        border-radius: 6px;
        bottom: 10px;
        left: 0;
        right: 0;
        margin: 0 auto;
    }

    @media (min-width: 768px) {

        .cookie__floating {
            max-width: 300px;
        }

    }

    @media (min-width: 768px) {

        .cookie__floating--bottom-left {
            bottom: 20px;
            left: 20px;
            right: auto;
            margin: 0 0;
        }

    }

    @media (min-width: 768px) {

        .cookie__floating--bottom-right {
            bottom: 20px;
            right: 20px;
            left: auto;
            margin: 0 0;
        }

    }

    @media (min-width: 768px) {

        .cookie__floating--top-right {
            top: 20px;
            bottom: auto;
            right: 20px;
            left: auto;
            margin: 0 0;
        }

    }

    @media (min-width: 768px) {

        .cookie__floating--top-left {
            top: 20px;
            bottom: auto;
            right: auto;
            left: 20px;
            margin: 0 0;
        }

    }

    .cookie__floating__content {
        font-size: 0.95rem;
        margin-bottom: 5px;
        padding: 15px 20px;
        max-height: 105px;
        overflow: auto;
    }

    @media (min-width: 768px) {

        .cookie__floating__content {
            margin-bottom: 10px;
        }

    }

    .cookie__floating__buttons {
        transition: all 0.2s ease;
        display: flex;
        flex-direction: row;
        height: auto;
        width: 100%;
    }

    .cookie__floating__buttons__button {
        background-color: #eee;
        font-weight: bold;
        font-size: 0.9rem;
        width: 100%;
        min-height: 40px;
        white-space: nowrap;
        user-select: none;
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
        border-left: none;
        border-right: none;
        padding: 0.375rem 0.75rem;
    }

    .cookie__floating__buttons__button:first-child {
        border-right: 1px solid #ddd;
    }

    .cookie__floating__buttons__button:hover {
        cursor: pointer;
        text-decoration: none;
    }

    .cookie__floating__buttons__button--accept {
        color: #4caf50;
        -ms-flex: 1 1 auto;
    }

    .cookie__floating__buttons__button--accept:hover {
        background: #409343;
        color: #fff;
    }

    .cookie__floating__buttons__button--decline {
        color: #f44336;
        -ms-flex: 1 1 auto;
    }

    .cookie__floating__buttons__button--decline:hover {
        background: #f21f0f;
        color: #fff;
    }

    .slideFromBottom-enter, .slideFromBottom-leave-to {
        transform: translate(0px, 10em);
    }

    .slideFromBottom-enter-to, .slideFromBottom-leave {
        transform: translate(0px, 0px);
    }

    .slideFromBottom-enter-active {
        transition: transform 0.2s ease-out;
    }

    .slideFromBottom-leave-active {
        transition: transform 0.2s ease-in;
    }

    .slideFromTop-enter, .slideFromTop-leave-to {
        transform: translate(0px, -10em);
    }

    .slideFromTop-enter-to, .slideFromTop-leave {
        transform: translate(0px, 0px);
    }
    
    .slideFromTop-enter-active {
        transition: transform 0.2s ease-out;
    }
    
    .slideFromTop-leave-active {
        transition: transform 0.2s ease-in;
    }
    
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s;
    }
    
    .fade-enter, .fade-leave-to {   
        opacity: 0;
    }

</style>