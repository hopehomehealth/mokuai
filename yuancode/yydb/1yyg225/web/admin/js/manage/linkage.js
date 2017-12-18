var linkage=function(){

};linkage.prototype={

    //菜单联动
    chang_parent:function(id,hidetop,field){
        id=id?parseInt(id):0;
        hidetop=hidetop?hidetop:0;
        field=field?field:'';

        if(id){
            $('#markTR').hide();
        }else{
            $('#markTR').css('display','');
        }

        var D={id:id,hidetop:hidetop,field:field};
        $post({
            url:'linkage/chang_parent',
            method:'post',
            newLink: true,
            data:D,
            callback:function(x){
                $('#select_linkage').html(x);
            }
        });
    }

};linkage = new linkage;

