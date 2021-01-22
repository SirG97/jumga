$(document).ready(function(){

    $('#myCarousel').carousel({
        interval: 3000,
    })

});
document.addEventListener('DOMContentLoaded', (event) => {
    const hamburger = document.getElementById('hamburger');
    const main = document.getElementById('main');
    const sidebar = document.querySelector('.nav-sidebar');
    const profile = document.querySelector('.header-nav-item');
    const ndropdown = document.querySelector('.nav-dropdown');

    if (hamburger !== null) {
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('nav-sidebar-open');
        });
    }

    if (profile !== null) {
        profile.addEventListener('click', () => {
            ndropdown.classList.toggle('active');
        });
    }

    if (main !== null) {
        main.addEventListener('click', () => {
            // if(sidebar.classList.contains('nav-sidebar-open')){
            sidebar.classList.remove('nav-sidebar-open');

        });
    }

    const account = $("#account_number");
    const country = $("#country");
    country.on('change', ()=>{
        getBanksFromRiderCountry(country.val());
    });

    function getBanksFromRiderCountry(country){
        let d = new FormData();
        let select = $('#bank');
        // d.append('_token', $('#token').data('token'));
        d.append('country', country);

        $.ajax({
            url: '/admin/rider/banks',
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: d,
            beforeSend: function(){
                select.append(`<option value=""> Loading...</option>`);

                $('#countryHelpText').html(`<span class="text-primary">Fetching banks. Please wait... <span class="fas fa-circle-notch fa-spin"></span></i>`);
            },
            success: function (response) {


                console.log(response);
                if(response.status === 'success'){
                    $('#countryHelpText').html(`<span class="text-success">Success! ${response.message}</span>`);

                    select.find('option').remove();
                    $.each(response.data, function(key, value) {

                        select.append(`<option value="${value.code}"> ${value.name}</option>`);
                    });
                    // $('#account_name').val(response.data.account_name);
                    // $('#accountSaveBtn').attr('disabled', false);
                }else{
                    $('#countryHelpText').html(`<span class="text-danger">${response.message}</span>`);
                    // $('#account_name').val('');
                    // $('#accountSaveBtn').attr('disabled', true);
                }
            },
            error: function(request, error){
                account.attr('readonly', false);
                $('#countryHelpText').html(`<span class="text-danger">Sorry! an error occurred, please try again</span>`);
                // $('#account_name').val('');
                // $('#accountSaveBtn').attr('disabled', true);
            }
        });
    }

    account.on('keyup', ()=> {
        const account_number = account.val();
        if(account_number.length >= 10){
            resolveAccountNumber();
        }
    });

    $("#bank").on('change', () =>{
        if(account.val() !== '' && account.val().length >= 10){
            resolveAccountNumber();
        }
    });

    function resolveAccountNumber(){
        account.attr('readonly', true);
        let d = new FormData();

        // d.append('_token', $('#token').data('token'));
        d.append('account_number', $('#account_number').val());
        d.append('bank', $('#bank').val());
        $.ajax({
            url: '/admin/rider/account/resolve',
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: d,
            beforeSend: function(){
                $('#accountHelpText').html(`<span class="text-primary">Resolving account number. Please wait... <span class="fas fa-circle-notch fa-spin"></span></i>`);
            },
            success: function (response) {
                account.attr('readonly', false);

                console.log(response.status);
                if(response.status === 'success'){
                    $('#accountHelpText').html(`<span class="text-success">Success! ${response.message}</span>`);
                    $('#account_name').val(response.data.account_name);
                    $('#accountSaveBtn').attr('disabled', false);
                }else{
                    $('#accountHelpText').html(`<span class="text-danger">${response.message}</span>`);
                    $('#account_name').val('');
                    $('#accountSaveBtn').attr('disabled', true);
                }
            },
            error: function(request, error){
                account.attr('readonly', false);
                $('#accountHelpText').html(`<span class="text-danger">Sorry! an error occurred, please try again</span>`);
                $('#account_name').val('');
                $('#accountSaveBtn').attr('disabled', true);
            }
        });
    }


    const type = $("#type");
    type.on('change', () =>{
        if(type.val() === 'mobile_money_ghana'){

            $("#network_option").toggleClass('hideit');
            $("#phone_option").toggleClass('hideit');
        }

        if(type.val() === 'mpesa'){
            $("#network_option").addClass('hideit');
            $("#phone_option").removeClass('hideit');
        }
        if(type.val() === 'debit_uk_account' || type.val() === 'card'){
            $("#network_option").addClass('hideit');
            $("#phone_option").addClass('hideit');
        }
    });

});
