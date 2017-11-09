// $(document).ready(toggle());

// function toggle(){
// 	var hide = true;
//     $('.custom-toggle').on('click', function (event){
//     	if (hide) {
//             $('#sidebar').css({'margin-left' : '-210px'});
//             // $('#sidebar span').css({'margin-left' : '-210px'});
//             $('.main-content').addClass('animation');
//             $('.main-content').removeClass('reverse-animation');
//             $('.hidden-toggle').css({'display' : 'block'});
//     		hide = false;
//     	} else {
//             $('#sidebar').css({'margin-left' : '0px'});
//             // $('#sidebar span').css({'margin-left' : '0px'});
//             $('.main-content').removeClass('animation');
//             $('.main-content').addClass('reverse-animation');
//             $('.hidden-toggle').css({'display' : 'none'});
//     		hide = true;
//     	}
// 	});
// }

function browserWidth(){
    var width = $(window).width();
    var height = $(window).height();

    return width;
};

function toggle(){
    var hide = true;
    $(".custom-toggle").click(function() {
        if(browserWidth() < 768) {
            if (hide) {
                $('#sidebar').css({'margin-left' : '0px'});
                hide = false;
            } else {
                $('#sidebar').css({'margin-left' : '-210px'});
                hide = true;
            }
        } else {
            if (hide) {
                $('#sidebar').css({'margin-left' : '-210px'});
                $('.main-content').css({'margin-left' : '0px'});
                $('.hidden-toggle').css({'display' : 'block'});
                hide = false;
            } else {
                $('#sidebar').css({'margin-left' : '0px'});
                $('.main-content').css({'margin-left' : '210px'});
                $('.hidden-toggle').css({'display' : 'none'});
                hide = true;
            }
        }
    });
}

$(document).ready(toggle());

$(window).resize(function() {
    if(browserWidth() < 768) {
        $('#sidebar').css({'margin-left' : ''});
        $('.main-content').css({'margin-left' : ''});
        $('.hidden-toggle').css({'display' : ''});
    } else {
        // $('#sidebar').css({'margin-left' : ''});
        // $('.main-content').css({'margin-left' : ''});
    }

    toggle();
});

$(function () {
    $('.btn-danger').popover({
      container: 'body'
    })
})

// $(function() {  
//     $("#sidebar").niceScroll({styler:"fb", cursorcolor:"#4D648D", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});
// });