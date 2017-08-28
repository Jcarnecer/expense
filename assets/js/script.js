$(document).ready(toggle());

function toggle(){
	var hide = true;
    $('#nav-icon3').on('click',function (event){
    	if (hide) {
            $(this).toggleClass('open');
            // $('#sidebar').addClass("corp-show");
            $('.main-content').addClass("animation");
            $('.toggle-show').show();
    		hide = false;
    	} else {
            $(this).toggleClass('open');
            $('#sidebar').hide();
            $('#sidebar').removeClass("corp-show");
            // $('.main-content').css("");
    		hide = true;
    	}
	});
}

// $(document).ready(function(){
// 	$('#nav-icon3').click(function(){
// 		$(this).toggleClass('open');
// 	});
// });