function showLoadingPopup(){
    swal({
        title: "<i class='fa fa-circle-o-notch fa-spin fa-2x'></i>",
        text: "Please wait... Processing...",
        html: true,
        showConfirmButton: false
    });
}

function hideLoadingPopup(){
    swal.close();
}

function reloadMe(time){
    window.setTimeout(function(){location.reload()},time);
}

function redirectTo(link,time){
    window.setTimeout(function(){window.location.href=link},time);
}