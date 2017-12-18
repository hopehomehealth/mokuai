<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 10:46:53
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/public_share.html" */ ?>
<?php /*%%SmartyHeaderCode:993694664584cbe1d24de75-61207647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '615467c5749521ea1a4473fd59dcec4479d2e874' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/public_share.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '993694664584cbe1d24de75-61207647',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584cbe1d273697_15284060',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584cbe1d273697_15284060')) {function content_584cbe1d273697_15284060($_smarty_tpl) {?><style type = "text/css">
    button {
        width: 100% ;
        text-align: center;
        border-radius: 3px;
    }
    .button2 {
        font-size: 16px;
        line-height: 30px;
        border: 1px solid #adadab;
        color: #000000;
        background-color: #e8e8e8;
        background-image: linear-gradient(to top, #dbdbdb, #f4f4f4);
        background-image: -webkit-gradient(linear, 0 100% , 0 0, from(#dbdbdb), to(#f4f4f4));
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.45),
        inset 0 1px 1px#efefef;
        text-shadow: 0.5px 0.5px 1px #ffffff;
    }
    .button2:active {
        background-color: #dedede;
        background-image: linear-gradient(to top, #cacaca, #e0e0e0);
        background-image: -webkit-gradient(linear, 0 100%, 0 0, from(#cacaca), to(#e0e0e0));
    }
    #mess_share {
        margin: 0 0 15px;
    }
    #share_1 {
        float: left;
        width: 49% ;
    }
    #share_2 {
        float: right;
        width: 49% ;
    }
    #mess_share img {
        width: 30px;
        height: 30px;
        vertical-align: middle;
    }
    #cover {
        display: none;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1000;
        background-color: #000000;
        opacity: 0.7;
    }
    #guide {
        display: none;
        position: fixed;
        right: 18px;
        top: 5px;
        z-index: 2000;
    }
    #guide img {
        width: 260px;
        height: 180px;
    }
</style>
<script type="text/javascript ">
    var _system = {
        $: function(id) {
            return document.getElementById(id);
        },
        _client: function() {
            return {
                w: document.documentElement.scrollWidth,
                h: document.documentElement.scrollHeight,
                bw: document.documentElement.clientWidth,
                bh: document.documentElement.clientHeight
            };
        },
        _scroll: function() {
            return {
                x: document.documentElement.scrollLeft ? document.documentElement.scrollLeft: document.body.scrollLeft,
                y: document.documentElement.scrollTop ? document.documentElement.scrollTop: document.body.scrollTop
            };
        },
        _cover: function(show) {
            if (show) {
                this.$("cover").style.display = "block";
                this.$("cover").style.width = (this._client().bw > this._client().w ? this._client().bw: this._client().w) + "px";
                this.$("cover").style.height = (this._client().bh > this._client().h ? this._client().bh: this._client().h) + "px";
            } else {
                this.$("cover").style.display = "none";
            }
        },
        _guide: function(click) {
            this._cover(true);
            this.$("guide").style.display = "block";
            this.$("guide").style.top = (_system._scroll().y + 5) + "px";
            window.onresize = function() {
                _system._cover(true);
                _system.$("guide").style.top = (_system._scroll().y + 5) + "px";
            };
            if (click) {
                _system.$("cover").onclick = function() {
                    _system._cover();
                    _system.$("guide").style.display = "none";
                    _system.$("cover").onclick = null;
                    window.onresize = null;
                };
            }
        },
        _zero: function(n) {
            return n < 0 ? 0 : n;
        }
    };
</script>
<div id="cover" style="display: none;"></div>
<div id="guide" style="display: none;"><img src="/style/images/wxshare/guide1.png "></div><?php }} ?>