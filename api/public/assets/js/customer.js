var cityEdit = '';
var err;
$(document).ready(function() {
    getAllCustomers();
    getPlans();
    getAllState();

    $('#ModalForm').on('hidden.bs.modal', function(e) {
        getPlans();
        $('input').val('');
        $('option').attr('selected', false);
    });

    $('#state').on('change', function() {
        renderCity($(this).find(':selected').data('cod'));
    });

    $('.btn-save').on('click', function() {
        save($('.modal-body :input').serializeArray());
    });
    $('.btn-novo').on('click', function() {
        $('#ModalForm').modal('show');
    })
})

function save(data) {
    let urlResource = `/api/customers`;
    let verb = 'POST';
    if (data[0].value != "") {
        verb = 'PUT';
        urlResource = `/api/customers/${data[0].value}`;
    }
    var plansCustomer = $("input:checkbox:checked").map(function() { return $(this).val(); }).get();

    var config = {
        method: verb,
        url: urlResource,
        headers: {
            'Authorization': `Bearer ${JSON.parse(localStorage.getItem('origo@credential')).access_token}`
        },
        validateStatus: (status) => {
            return true; // I'm always returning true, you may want to do it depending on the status received
        },
        data: {
            "name": data[1].value,
            "email": data[2].value,
            "phone": data[3].value,
            "state": data[4].value,
            "city": data[5].value,
            "plans": plansCustomer.join(','),
            "birth_date": data[6].value,
        }
    };

    axios(config)
        .then(success => {
            getAllCustomers();
            $('.message').append(``);

            if (success.status === 200) {
                $('.message').append(`<div class="alert alert-success alert-dismissible" role="alert">
                                            Cliente ${data[1].value} <strong>atualizado!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>`);
                $('#ModalForm').modal('hide');
                $('input').val('');
                $('option').attr('selected', false);
            }
            if (success.status === 201) {
                $('.message').append(`<div class="alert alert-success alert-dismissible" role="alert">
                                            Cliente ${data[1].value} <strong>incluído!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>`);
                $('#ModalForm').modal('hide');
                $('input').val('');
                $('option').attr('selected', false);
            }

            if (success.status === 422) {
                let errors = '';
                $('.message_form').html('')
                err = success.data.errors;
                if (err.name != undefined) {
                    errors += `<small>${err.name[0]}</small><br/>`;
                }
                if (err.birth_date != undefined) {
                    errors += `<small>${err.birth_date[0]}</small><br/>`;
                }
                if (err.city != undefined) {
                    errors += `<small>${err.city[0]}</small><br/>`;
                }
                if (err.email != undefined) {
                    errors += `<small>${err.email[0]}</small><br/>`;
                }
                if (err.phone != undefined) {
                    errors += `<small>${err.phone[0]}</small><br/>`;
                }
                if (err.plans != undefined) {
                    errors += `<small>${err.plans[0]}</small><br/>`;
                }
                $('.message_form').append(`<div class="alert alert-danger alert-dismissible" role="alert">
                ${errors}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
            }
        })
}

function deleteCustomer(customerID) {
    var config = {
        method: 'delete',
        url: `/api/customers/${customerID}`,
        headers: {
            'Authorization': `Bearer ${JSON.parse(localStorage.getItem('origo@credential')).access_token}`
        },
        validateStatus: (status) => {
            return true; // I'm always returning true, you may want to do it depending on the status received
        },
    };
    axios(config)
        .then(response => {

            $('.message').append(``);
            if (response.status === 204) {
                getAllCustomers();

                $('.message').append(`<div class="alert alert-success alert-dismissible" role="alert">
                                            Cliente excluído com sucesso!!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>`);
            }
            if (response.status === 500) {
                $('.message').append(`<div class="alert alert-danger alert-dismissible" role="alert">
                                            ${response.data.error}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>`);
            }
        })
}

function getAllState() {
    var configState = {
        method: 'get',
        url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados'
    };

    axios(configState)
        .then(function(response) {
            $('#state').html('');
            $('#state').html('<option value="">Selecione</option>');
            response.data.forEach(obj => {
                $('#state').append(`<option value="${obj.nome}" data-cod=${obj.id}>${obj.nome}</option>`);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
}

function getAllCustomers() {
    var config = {
        method: 'get',
        url: '/api/customers',
        headers: {
            'Authorization': `Bearer ${JSON.parse(localStorage.getItem('origo@credential')).access_token}`
        }
    };

    axios(config)
        .then(function(response) {
            $('.body_customers').html('')
            response.data.data.forEach(obj => {

                $('.body_customers').append(`<tr>
                        <td>${obj.name}</td>
                        <td>${obj.email}</td>
                        <td>${obj.phone}</td>
                        <td>${obj.state}</td>
                        <td>${obj.city}</td>
                        <td>${obj.birth_date}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary btn-editar"  data-id="${obj.id}" >Editar</button>
                                <button type="button" class="btn btn-outline-danger  btn-excluir"   data-id="${obj.id}" >Excluir</button>
                            </div>
                        </td>
                    </tr>`)
            });
            $('.btn-editar').on('click', function() {
                renderCustomer($(this).data('id'));

            })
            $('.btn-excluir').on('click', function() {
                deleteCustomer($(this).data('id'));

            })
        })
        .catch(function(error) {
            console.log(error);
        });
}

function getPlans() {
    var config = {
        method: 'get',
        url: `/api/plans`,
        headers: {
            'Authorization': `Bearer ${JSON.parse(localStorage.getItem('origo@credential')).access_token}`
        }
    };
    axios(config)
        .then(response => {
            $('#plans').html('');
            response.data.data.forEach(obj => {
                $('#plans').append(`<div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="plans[]" value="${obj.id}" id="${obj.id}">
                                            <label class="form-check-label" for="${obj.id}">
                                                ${obj.name} - R$ ${parseFloat(obj.price).toFixed(2)}
                                            </label>
                                        </div>`);
            });

        })
        .catch(error => {})
}

function renderCustomer(customerId) {
    var config = {
        method: 'get',
        url: `/api/customers/${customerId}`,
        headers: {
            'Authorization': `Bearer ${JSON.parse(localStorage.getItem('origo@credential')).access_token}`
        }
    };
    axios(config)
        .then(success => {

            let customer = success.data.data;
            $('#clientID').val(customer.id);
            $('#name').val(customer.name);
            $('#email').val(customer.email);
            $('#phone').val(customer.phone);
            $('#state').val(customer.state);
            cityEdit = customer.city;
            $('#state').change();

            var data = moment(customer.birth_date, "DD/MM/YYYY");
            $('#birth_date').val(data.format("YYYY-MM-DD"));
            customer.plans.forEach(plan => {
                $(`#${plan.id}`).prop("checked", true);
            });
            $('#ModalForm').modal('show')
        })
        .catch(error => {})
}

function renderCity(stateId) {
    var configCity = {
        method: 'get',
        url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/distritos`
    };

    axios(configCity)
        .then(function(response) {
            $('#city').html('');
            $('#city').html('<option value="">Selecione</option>');
            response.data.forEach(obj => {
                $('#city').append(`<option value="${obj.nome}" data-cod=${obj.id}>${obj.nome}</option>`);
            });
            if (cityEdit != '') {
                $('#city').val(cityEdit);
            }

        })
        .catch(function(error) {
            console.log(error);
        });
}