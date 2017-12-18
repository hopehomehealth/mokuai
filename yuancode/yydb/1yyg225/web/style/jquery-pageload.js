/**
 * jquery pageload
 * suhafe
 */
(function($) {
    $.fn.pageload = function(options){
        var elements = $(this);
        var winHeight = $(window).height();
        var locked = false;
        var settings = {
            url : '/',            //异步加载地址
            trigger : '.getMore', //触发
            page : 1,             //默认加载的分页
            scroll : false,       //是否滚动加载
            loader : "more_loader_spinner",
            nomore : "没有更多了！"
        };
        if (options){
            $.extend(settings, options);
        }

        function load_data(){
            if($(settings.trigger).html()==settings.nomore) return;
            if($('.'+settings.loader).length>0){ $('.'+settings.loader).show(); }
            else $(settings.trigger).before('<div class="'+settings.loader+'"></div>');
            $(settings.trigger).hide();

            $.post(settings.url+'/'+settings.page,'ajaxcontent=1',function(data){
                if(data.content){
                    elements.append(data.content);
                    settings.page = settings.page+1;
                }else{
                    $(settings.trigger).html(settings.nomore);
                }
                $(settings.trigger).show();
                $('.'+settings.loader).hide();
            },'json')
        }

        //页面加载时
        $(function(){
            load_data();
        });

        //点击更多时
        $(settings.trigger).bind('click',function(){
            load_data();
        });

        //页面滚动时
        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop();
            var offset = $(elements).offset().top + $(elements).height() - (scrollTop + winHeight);
            if(offset < settings.offset && !locked){
                locked = true;
                load_data();
            }
        });
    };
})(jQuery);