$(document).ready(function() {
    if(sessionStorage.getItem('popState') != 'shown'){
        setTimeout(function() {
            $('#modal-download-brochure').modal('show');
        }, 40000); // milliseconds
        sessionStorage.setItem('popState','shown')
    }
});