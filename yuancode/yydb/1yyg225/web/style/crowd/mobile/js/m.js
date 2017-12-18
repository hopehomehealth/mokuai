 
 


jQuery(document).ready(function() {
        var qcloud = {};
        $('[_t_nav]').hover(function() {
            var _nav = $(this).attr('_t_nav');		
            clearTimeout(qcloud[_nav + '_timer']);
            qcloud[_nav + '_timer'] = setTimeout(function() {
                $('[_t_nav]').each(function() {
                    //$(this)[_nav == $(this).attr('_t_nav') ? 'addClass': 'removeClass']('nav-zibg');
                });
				$('#a' + _nav).addClass("nav-zibg");
                $('#' + _nav).stop(true, true).fadeIn(100);
                $('#zt').addClass('mh')
            },
            300);
        },
        function() {
            var _nav = $(this).attr('_t_nav');
            clearTimeout(qcloud[_nav + '_timer']);
            qcloud[_nav + '_timer'] = setTimeout(function() {
                $('[_t_nav]').removeClass('nav-zibg');
                $('#' + _nav).stop(true, true).fadeOut(0);
                $('#zt').removeClass('mh')
            },
            300);
        });
});

 