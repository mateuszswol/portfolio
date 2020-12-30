if(document.getElementById('form')){
    const form = document.getElementById('form');
    form.addEventListener('submit', function(event){
        event.preventDefault();
        const formattedFormData = new FormData(form);
        postData(formattedFormData);
    });

    form.addEventListener('click', function(event){
        document.getElementById('recaptcha').setAttribute('src','https://www.google.com/recaptcha/api.js?render=6Ler1RkaAAAAAD4wSmQIM5XMQDYyfI3XVntJbsCJ');
        setTimeout(function(){load_captcha()},1000);
    })
}

function load_captcha(){
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ler1RkaAAAAAD4wSmQIM5XMQDYyfI3XVntJbsCJ', {action: 'form'}).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });;
    });
}

async function postData(formattedFormData){
    const response = await fetch('/contact.php',{
        method: 'POST',
        body: formattedFormData
    });
    const data = await response.text();
    document.getElementsByClassName('contact-form__confirmation')[0].innerHTML = data;
};
