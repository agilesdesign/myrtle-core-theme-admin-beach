
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');

// require('jquery.turbolinks');

require('./bootstrap');

global.select2 = require('select2');

global.notie = require('notie');

global.geocomplete = require('geocomplete');

var Turbolinks = require('turbolinks');

var swal = require('sweetalert');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Turbolinks.start();


//     .bind('geocode:result', function(event, result){
//     console.log(result.formatted_address);
// });

$('form[data-confirm="delete-one"]').submit(function(e) {
    var form = this;
    e.preventDefault();
    swal({
            title: "Notice!",
            text: "Are you sure you would like to delete this item?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Confirmed!',
                    text: 'Your request is being processed',
                    type: 'success',
                    timer: 1000,
                    showConfirmButton: false
                }, function() {
                    form.submit();
                });
            } else {
                swal({
                    title: "Cancelled",
                    text: "The item will not deleted",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
});

$('form[data-confirm="disable-one"]').submit(function(e) {
    var form = this;
    e.preventDefault();
    swal({
            title: "Notice!",
            text: "Are you sure you would like to disable this item?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Confirmed!',
                    text: 'Your request is being processed',
                    type: 'success',
                    timer: 1000,
                    showConfirmButton: false
                }, function() {
                    form.submit();
                });
            } else {
                swal({
                    title: "Cancelled",
                    text: "The item will not be disabled",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
});

