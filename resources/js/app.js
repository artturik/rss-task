import EmailVerification from "./email-verification";

require('./bootstrap');

if(location.pathname === '/register'){
    const input = document.getElementById('email');
    new EmailVerification({
        input: input,
        client: axios,
        onValid: () => {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        },
        onInvalid: () => {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
    })
}
