




$('.btn-signin').on('click',function(){

    var data = JSON.stringify({"grant_type":"password","client_id":2,"client_secret":"ekPN65wZLxGJRWUXniImkPqa3AhoAunyb1b5XY2y","username":$('#email').val(),"password":$('#password').val()});
    var config = {
        method: 'post',
        url: '/oauth/token',
        headers: { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        data : data
    };
    axios(config)
        .then(function (response) {
            console.log(response);
            $('.message').append(``);
            $('.message').append(`<div class="alert alert-success" role="alert">Acesso concedido você será redirecionado</div>`);
            localStorage.setItem("origo@credential",JSON.stringify(response.data));
            setTimeout(() =>{
                window.location.href = `/customers`;
            },5000);
        })
        .catch(function (error) {
            $('.message').append(`<div class="alert alert-warning" role="alert">Acesso informado inválido</div>`);
        });
});