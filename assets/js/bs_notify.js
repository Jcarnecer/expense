function bs_notify(message,type,placement_from,placement_align){
    $.notify({
        message: message
    },{
        type: type,
        allow_dismiss: false,
        placement: {
            from: placement_from, // top or bottom
            align: placement_align //left or right
        },
        delay: 4000,
        animate: {
            enter: 'animated fadeInUp',
            exit: 'animated fadeOutDown'
        }
    })
}