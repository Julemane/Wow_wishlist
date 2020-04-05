function createNoty(message, type) {
    var displayBanner = sessionStorage.getItem('displayBanner');
    console.log(displayBanner);
    if(displayBanner == "true"){
        var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert">';
        html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
        html += message;
        html += '</div>';
        $(html).hide().prependTo('#noty-holder').slideDown();
    }

};

function checkSession(){
    var data = sessionStorage.getItem('displayBanner');
    if (data === null){
        sessionStorage.setItem('displayBanner', 'true');
    }
};

let message = "Depuis le 16/03/2020 la community API battle.net a été déprécié, les fonctionnalités de Wow-Wishlist basées sur cette API ne sont plus fonctionnelles";
$(function(){
    checkSession();
    createNoty(message, 'warning');
    $('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
        sessionStorage.setItem('displayBanner', 'false');
    });
});
