'use strict';

export default class EmailVerification {
    constructor(settings = {}) {
        if (!settings.input || !(settings.input instanceof Element)) {
            console.error('"input" config property must be present and must be Element');
            return;
        }

        if (!settings.client || !(settings.client.get instanceof Function)) {
            console.error('"client" config property must be present and must have get method');
            return;
        }

        let defaults = {
            url: '/verify',
            loadingImageUrl: '/images/load.svg',
            preValidate: true,
            emailRegex: /^[^@\s]+@[^@\s]+\.[^@\s]+$/,
            debounceWait: 500,
            onValid: ()=>{},
            onInvalid: ()=>{}
        };

        this.settings = { ...defaults, ...settings };
        this.valid = false;

        this.setupEventListeners();
    }

    setupEventListeners() {
        this.settings.input.addEventListener('keyup', _.debounce(
            () => this.validate(),
            this.settings.debounceWait,
            {leading:false, trailing:true})
        );
        this.settings.input.addEventListener('change', _.debounce(
            () => this.validate(),
            this.settings.debounceWait,
            {leading:false, trailing:true})
        );

        this.settings.input.form.addEventListener('submit', (event) => {
            console.log('submit');
            if(!this.valid){
                event.preventDefault();
            }
        });
    }

    validate(){
        console.log('validate');
        this.valid = false;
        const email = this.settings.input.value;
        if(!email){
            return;
        }

        console.log(email);
        if(this.settings.preValidate && !this.settings.emailRegex.test(email)){
            this.onInvalid();
            return;
        }

        this.settings.client.post(this.settings.url, {email: email})
            .then(response => {
                if(response.data.valid){
                    this.onValid();
                    return;
                }
                this.onInvalid();
            })
            .catch(error => console.log(error));
    }

    onValid() {
        console.log('valid');
        this.valid = true;
        this.settings.onValid();
    }

    onInvalid() {
        console.log('invalid');
        this.valid = false;
        this.settings.onInvalid();
    }
}
