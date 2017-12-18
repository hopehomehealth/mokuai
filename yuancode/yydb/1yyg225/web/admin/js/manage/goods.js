var goods=function(){
    this.allSpecItems = [];
    this.spData = {};
};
goods.prototype={

    create:function(){
        //检查一些数值,然后进行提交.
        G('goods-form').submit();
    },

    //删除规格
    delSpec:function(id){
        if(confirm('确定删除该规格?'))$post({
            url:'/goods/spec/del/'+id,
            callback:function(x){}
        });
    },
    //新增规格
    addspec:function(){
        var tb = G("specTable"),
            tbRows=tb.rows.length,
            tr = tb.insertRow(tbRows);//插入行

        var td1 = tr.insertCell(0);
        var td2 = tr.insertCell(1);
        var td3 = tr.insertCell(2);
        td1.innerHTML = '<input name="item[name]['+tbRows+']" class="form-i LH22 w140" />';
        td2.innerHTML = '<input name="item[order]['+tbRows+']" class="form-i LH22 w40" value="0" />';
        td3.innerHTML = '<a href="javascript:;" class="uiBtn BtnOrange e2-goods-rmSpecItem"><i class="iconfont">&#xe60b;</i></a>';

        $('input',td1)[0].focus();
    },
    //删除规格项
    rmSpecItem:function(id){
        if(typeof id=='undefined'){
            [this._self.parentNode.parentNode].remove();
            return false;
        }else{
            if(confirm('确定删除该规格?'))$post({
                url:'/goods/spec/rmSpecItem/'+id,
                method:'post',
                callback:function(x){
                }
            });
        }
    },

    //提交规格
    submitSpec:function(){
        var specId = G('specId').value;
        var specname = G('specName').value;
        var fields = 'id='+specId+'&name='+encodeURIComponent(specname);
        $('#specTable input').each(function(){
            fields+= '&'+this.name+'='+encodeURIComponent(this.value);
        });

        $post({
            url:'/goods/spec/create?'+fields,
            method: 'post',
            callback:function(x){
            }
        });
    },

    //选择产品规格
    selSpec:function(id){
        if(this._self.checked){
            $post({
                url:'/goods/spec/getSpecItem/'+id,
                dataType:'json',
                callback:function(data){
                    console.log(data);
                    var specBoxId = 'spec-box-'+data['id'];
                    var specbox = G(specBoxId);
                    if(specbox){
                        [specbox].show();
                    }else{
                        var specbox = document.createElement('div');
                        specbox.id = specBoxId;
                        specbox.className = 'f-unit spec-unit';
                         var html = '\
                            <label class="ui-label w60">'+data.name+'：</label>\
                            <div class="rule-box">',val;

                        for(var i=0; i<data.values.length; i++){
                            val = data.values[i];
                            html+='<label class="spec-item">' +
                                '<input class="e1-goods-setSpecVal-'+val.id+'" spenid="'+val.id+'" value="'+val.name+'"\ type="checkbox">' +
                                '<span>'+val.name+'</span>' +
                                '</label>';
                        }
                        html+= '</div>';

                        specbox.innerHTML = html;
                        $('#rule').after(specbox);
                    }

                }
            });
        }else{
            //hide.
        }

    },

    //点击checkbox,显示input框便于修改规格值.
    setSpecVal:function(id){
        var sf = this._self;
        var label = sf.parentNode;
        var span = $('span',label);
        if(sf.checked){
            span.html('<input class="spec-val form-i BtnSm w100" value="'+sf.value+'" onblur="goods.chSepcValue(this)" />');
            //同事显示对应的库存配置.
        }else{
            var val = $('input',span[0])[0].value;
            span.html(val);
        }
        this.setStock();
    },

    chSepcValue:function(obj){

        $('input',obj.parentNode.parentNode)[0].value = obj.value;

        if(obj.value==obj.defaultValue){

        }else{

            //change
        }

        this.setStock();
    },

    /**
     * 遍历规格结构
     * @param obj
     * @param index
     * @param names
     */
    deepShowSpec:function(obj,index,names){
        if(typeof obj[index]!='undefined'){
            var data = obj[index];
            names = names || [];

            for(var i=0;i<data.length;i++){
                var spec = data[i];

                var newSpec = names.concat([spec]);

                if(index==obj.length-1){
                    this.allSpecItems.push(newSpec);
                }
                this.deepShowSpec(obj,index+1,newSpec);
            }
        }
    },

    setStock:function(){
        var t=this;
        var spunit = $('#sp-box .spec-unit');
        var allUnit = [];
        var allSp = [];
        var specs = [];
        spunit.each(function(index){
            var spId = this.getAttribute('sp_id');
            var spName = this.getAttribute('sp_name');
            $('.spec-ckbox',this).each(function(){
                if(!this.checked)return;
                if(typeof allUnit[index]=='undefined'){
                    allUnit[index] = 1;
                    allSp[index] = [];
                }
                allSp[index].push({
                    spId:spId,
                    spName:spName,
                    name:this.value,
                    spItemId:this.getAttribute('spitem_id')
                });
            });
        });

        if(spunit.length==allUnit.length && spunit.length!=0){
            this.allSpecItems = [];
            this.deepShowSpec(allSp,0,[]);

            var html = '<table class="list">';
            var thead = [],tbody = '',stockItemId,spIndex,spValue,inputData;
            var priceData,stockData,serialData,priceIndex,stockIndex,serialIndex;
            var spSubIds;

            this.allSpecItems.each(function(i){
                if(i==0)thead+='<tr>';

                tbody+='<tr>';
                spSubIds = [];
                this.each(function(){
                    if(i==0)thead+= '<th>'+this.spName+'</th>';

                    tbody+='<td>'+this.name+'</td>';

                    spSubIds.push(this.spItemId);
                    //stockItemId = '['+this.spId+']['+this.spItemId+']';
                    //spIndex = this.spId+'-'+this.spItemId;
                });

                stockItemId = '['+spSubIds.join('-')+']';
                spIndex = spSubIds.join('-');
                priceIndex = 'price-'+spIndex;
                stockIndex = 'stock-'+spIndex;
                serialIndex = 'serial-'+spIndex;
                priceData = typeof t.spData[priceIndex]!='undefined' ? t.spData[priceIndex] : '';
                stockData = typeof t.spData[stockIndex]!='undefined' ? t.spData[stockIndex] : '';
                serialData = typeof t.spData[serialIndex]!='undefined' ? t.spData[serialIndex] : '';

                tbody+='<td><input type="text" class="spval_price form-i BtnSm w100" sp-index="'+priceIndex+'" name="sp_price'+stockItemId+'" value="'+priceData+'" onblur="goods.setCacheData(this)"></td>';//价格
                tbody+='<td><input type="text" class="spval_stock form-i BtnSm w100" sp-index="'+stockIndex+'" name="sp_stock'+stockItemId+'" value="'+stockData+'" onblur="goods.setCacheData(this)"></td>';//库存
                tbody+='<td><input type="text" class="spvl_serial form-i BtnSm w100" sp-index="'+serialIndex+'" name="sp_serial'+stockItemId+'" value="'+serialData+'" onblur="goods.setCacheData(this)"></td>';//货号
                tbody+='</tr>';

                if(i==0){
                    thead+="<th>价格</th><th>库存</th><th>货号</th></tr>";
                }
            });

            html+=thead+tbody+'</table>';

            $('#stock-box').html(html);
            $('#stock_config').show();
            G('real_price').setAttribute('readonly','readonly');
            G('goods_stock').setAttribute('readonly','readonly');
        }else{
            //隐藏库存配置
            G('real_price').removeAttribute("readonly");
            G('goods_stock').removeAttribute("readonly");
            $('#stock_config').hide();
        }
    },

    //统计数值,价格,库存
    countValues:function(type){
        if(type=='price'){
            //统计价格.
            var totalPrice = 0;
            var minPrice = 0,curPrice;
            $('#stock-box .spval_price').each(function(){
                curPrice = parseFloat(this.value);
                if(minPrice==0)minPrice = curPrice;
                if(curPrice < minPrice)minPrice = curPrice;
            });

            G('real_price').value = minPrice;
        }
        if(type=='stock'){
            //统计价格.
            var totalStock = 0;
            $('#stock-box .spval_stock').each(function(){
                totalStock+= parseFloat(this.value);
            });
            G('goods_stock').value = totalStock;
        }

    },
    //鼠标离开价格和库存输入框时,设置相关的最低价和总库存量
    setCacheData:function(obj){
        //console.log(obj);
        var spIndex = obj.getAttribute('sp-index');
        if(spIndex.indexOf('price-')===0){
            this.countValues('price');
        }

        if(spIndex.indexOf('stock-')===0){
            this.countValues('stock');
        }

        this.spData[spIndex] = obj.value;

    },


    addGoodsParam:function(){
        var tb = G('g-params-list');
        var tr = tb.insertRow(tb.rows.length);
        var td1 = tr.insertCell(0);
        var td2 = tr.insertCell(1);
        var td3 = tr.insertCell(2);
        td1.innerHTML = '<input name="params[name][]" class="form-i LH22 w160">';
        td2.innerHTML = '<input name="params[value][]" class="form-i LH22 w200">';
        td3.innerHTML = '<a href="javascript:;" class="uiBtn BtnOrange e2-goods-rmGoodsParam"><i class="iconfont">&#xe60b;</i></a>';
    },
    rmGoodsParam:function(){
        [this._self.parentNode.parentNode].remove();
    },


    //添加商品
    add:function(){
        $post({
            url:'/goods/spec/getPecList',
            callback:function(x){
                com.xshow('选择商品规格',x,{trueEvent:'e2-goods-gotoAddGoods'});
            }
        });

    },
    gotoAddGoods:function(){
        var spec = [];
        $('#goods-spec-list input').each(function(){
            if(this.type.toLowerCase()=='checkbox' && this.checked){
                spec.push(this.value);
            }
        });

        if(spec.length>0){
            location.href = '/manage#!goods/add?spec='+encodeURIComponent(spec.join(','));
        }else{
            //com.xtip('请选择产品规格',{type:2});
            //return false;
            location.href = '/manage#!goods/add';
        }
        com.xhide();
    },

    stuffSpecs:function(data){
        this.spData = data;
        this.setStock();

    },

    //商品分类管理.
    addCate:function(parent_id){
        if(typeof parent_id=='undefined'){
            parent_id = 0;
        }
        $post({
            url:'/goods/addCate/',
            data:{parent:parent_id},
            callback:function(x){
                com.xshow('添加分类',x,{trueEvent:'e2-goods-subCate'});
                G('gcate-name').focus();
            }
        });
    },
    delCate:function(cate_id){
        if(confirm("确定删除该分类?"))$post({
            url:'/goods/delCate/'+cate_id,
            callback:function(x){
                main.refresh();
            }
        });
    },
    editCate:function(cate_id){
        $post({
            url:'/goods/editCate/'+cate_id,
            callback:function(x){
                com.xshow('编辑分类',x,{trueEvent:'e2-goods-subCate'});
                G('gcate-name').focus();
            }
        });
    },
    subCate:function(){
        var D = xForm.getFormValues('gcate-form');

        $post({
            url:'/goods/subCate',
            data:D,
            callback:function(x){
                com.xhide();
                main.refresh();
            }
        })
    },
    upCateOrder:function(){
        var D={};
        var orderIpts = $('#gcate-list .cate-order');
        if(orderIpts.length==0)return;

        orderIpts.each(function(){
            D[this.name] =  this.value;
        });

        $post({
            url:'/goods/upCateOrder',
            data:D,
            callback:function(x){}
        });
    }

};goods=new goods;