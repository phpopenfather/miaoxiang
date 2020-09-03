define(['jquery', 'bootstrap', 'backend', 'table', 'form', 'upload'], function ($, undefined, Backend, Table, Form, Upload) {

    var Controller = {

        index: function (){

            // 全选操作
            $('.select-all').click(function(){
                if($(this).is(':checked')){
                    $(".select-all-span").css("background-image", "url('/assets/img/check-circle.png')");
                    $('input[class=checkbox-input]').each(function(){
                        $(this).prop("checked",true);
                        $(this).siblings('span').show();
                        $(this).siblings('span').css("background-image", "url('/assets/img/check-circle.png')");

                    });
                }else{
                    $(".select-all-span").css("background-image", "url('/assets/img/check-c23.png')");
                    $('input[class=checkbox-input]').each(function(){
                        $(this).prop("checked",false);
                        $(this).siblings('span').hide();
                        $(this).siblings('span').css("background-image", "url('/assets/img/check-c23.png')");

                    });
                }
            });
            // 鼠标移入移除
            $(".item-list-div").mouseover(function (){
                $(this).children('.checkbox-div').children('span').show();
                $(this).children('.edit-div').show();
            }).mouseout(function (){
                if(!$('.select-all').is(':checked')&&!$(this).children('.checkbox-div').children('.checkbox-input').is(':checked')){
                    $(this).children('.checkbox-div').children('span').hide();
                }
                $(this).children('.edit-div').hide();

            });
            $(".item-list-div").mouseleave(function(){
                $(this).children('.edit-text').hide();
            });
            $(".edit-div").on("click", function () {
                if($(this).siblings('.edit-text').is(":hidden")){
                    $(this).siblings('.edit-text').show();
                }else{
                    $(this).siblings('.edit-text').hide();
                }
            });
            // 点击单个
            $(".checkbox-input").on("click",function(){
                if($(this).is(':checked')){
                    $(this).siblings('span').show();
                    $(this).siblings('span').css("background-image", "url('/assets/img/check-circle.png')");
                }else{
                    // $(this).siblings('span').hide();
                    $(this).siblings('span').css("background-image", "url('/assets/img/check-c23.png')");
                }

            });
            // 删除
            $('.edit_del').on('click',function () {
                var add = $(this).attr("add");
                layer.confirm('删除后不可恢复，谨慎操作！', {icon: 7, title: '警告'}, function (index) {
                    //将获取的值存入数组
                    var checkData1 = new Array();
                    checkData1.push(add);
                    console.log("选中要删除的id值为:"+checkData1);
                    //提交数据到后台进行删除
                    $.ajax({
                        type:'POST',
                        url:'/api/component/delete',
                        dataType:'json',
                        data:{"idList":checkData1},
                        success:function(data){
                            Toastr.success("成功");
                            setTimeout(function () {
                                location.href = "/index/component/index";
                            }, 500);
                        },
                        error:function(data){
                            console.log(data.msg);
                        }
                    });

                });
            })
            $("#del").on("click", function(){

                var checks = $("input[name='checkbox-input']:checked");
                if(checks.length == 0){
                    layer.alert('未选中任何项！');
                    return false;
                }

                layer.confirm('批量删除后不可恢复，谨慎操作！', {icon: 7, title: '警告'}, function (index) {
                    //将获取的值存入数组
                    var checkData = new Array();
                    checks.each(function(){
                        checkData.push($(this).val());
                    });
                    console.log("选中要删除的id值为:"+checkData);
                    //提交数据到后台进行删除
                    $.ajax({
                        type:'POST',
                        url:'/api/component/delete',
                        dataType:'json',
                        data:{"idList":checkData},
                        success:function(data){
                            Toastr.success("成功");
                            setTimeout(function () {
                                location.href = "/index/component/index";
                            }, 500);
                        },
                        error:function(data){
                            console.log(data.msg);
                        }
                    });

                });

                // if(confirm('确定要删除所选吗?')){
                //     var checks = $("input[name='checkbox-input']:checked");
                //     if(checks.length == 0){ alert('未选中任何项！');return false;}
                //     //将获取的值存入数组
                //     var checkData = new Array();
                //     checks.each(function(){
                //         checkData.push($(this).val());
                //     });
                //     alert("选中要删除的id值为:"+checkData);
                //     console.log("选中要删除的id值为:"+checkData);
                //     //提交数据到后台进行删除
                //     $.ajax({
                //         type:'POST',
                //         url:'/api/component/delete',
                //         dataType:'json',
                //         data:{"idList":checkData},
                //         success:function(data){
                //             console.log(data);
                //         },
                //         error:function(e){
                //             console.log(e);
                //         }
                //     });
                // }
            })
            // 修改表单赋值
            $(".edit-btn").on("click",function(){
                $('#c-id').val($(this).siblings('.h-id').val());
                $('#c-name').val($(this).siblings('.h-name').val());
                $('#c-category_id').val($(this).siblings('.h-category_id').val());
                $('#c-category_child_id').val($(this).siblings('.h-category_child_id').val());
                $('#c-category_child_id_value').val($(this).siblings('.h-category_child_id').val());
                $('#c-description').val($(this).siblings('.h-description').val());
                $('#c-size').val($(this).siblings('.h-size').val());
                $('#c-rules').val($(this).siblings('.h-rules').val());
                $('#c-price').val($(this).siblings('.h-price').val());
                if($(this).siblings('.h-is_private').val() == 1){
                    $('#is_private-1').attr('checked', 'true')
                }else{
                    $('#is_private-2').attr('checked', 'true')
                }
                $("#c-category_child_id").removeAttr("disabled");


                // 分类数据整合
                var c_id = $(this).siblings('.h-category_id').val();
                var cc_id = $(this).siblings('.h-category_child_id').val();
                $("#c-category_child_id").removeAttr("disabled");
                $.ajax({
                    type:'GET',
                    url:'ajax/category?type=component&pid='+c_id,
                    dataType:'json',
                    success:function(data){
                        var option = '';
                        $.each(data.data, function(key, val) {
                            if(val.value == cc_id){
                                option+="<option selected value='"+val.value+"'>"+val.name+"</option>"
                            }else{
                                option+="<option value='"+val.value+"'>"+val.name+"</option>"
                            }

                        });
                        $("#c-category_child_id").html(option);
                    },
                    error:function(e){
                        console.log(e);
                    }
                });
            });
            // 开启模态框 初始化表单
            $('#myModal').on('show.bs.modal', function () {

                $('#edit-form').validator({
                    fields: {
                        'name': 'required',
                        'category_id': 'required;integer',
                        'category_child_id': 'required;integer',
                        'description': 'required',
                        'rules': 'required',
                        'is_private': 'required',
                    }
                });
                // $(".form-group").removeClass("has-success");
                // $(".form-group").removeClass("has-error");
            })
            Form.api.bindevent($("#edit-form"), function (data, ret) {
                setTimeout(function () {
                    location.href = ret.url ? ret.url : "/index/component/index";
                }, 1000);
            });
            // Controller.api.bindevent();

        },
        mylist: function () {
            // 全选
            $('#select-all').click(function(){
                $(this).toggleClass("is_all");
                if($(this).hasClass('is_all')){
                    $(".checkbox-div").addClass("checkbox-click");
                    $(".checkbox-div").addClass("checkbox-bg");
                    $(".checkbox-input").prop("checked",true);
                }else{
                    $(".checkbox-div").removeClass("checkbox-click");
                    $(".checkbox-div").removeClass("checkbox-bg");
                    $(".checkbox-input").prop("checked",false);
                }
            });

            // 鼠标移入移除
            $(".item-div").mouseover(function (){
                $(this).children('.checkbox-div').addClass("checkbox-click");
            }).mouseout(function (){
                if(!$('.select-all').hasClass("is_all")&&!$(this).children('.checkbox-div').children('.checkbox-input').is(':checked')){
                    $(this).children('.checkbox-div').removeClass("checkbox-click");
                }
            });

            // 单击选中
            $(".checkbox-input").on("click",function(){
                $(this).parent('.checkbox-div').toggleClass("checkbox-bg");
                if($(this).is(':checked')){
                    $(this).parent('.checkbox-div').addClass('checkbox-bg');
                }
            });

            // 删除
            $("#del").on("click", function(){
                var checks = $("input[name='checkbox-input']:checked");
                if(checks.length == 0){
                    layer.alert('未选中任何项！');
                    return false;
                }
                layer.confirm('批量删除后不可恢复，谨慎操作！', {icon: 7, title: '警告'}, function (index) {
                    //将获取的值存入数组
                    var checkData = new Array();
                    checks.each(function(){
                        checkData.push($(this).val());
                    });
                    console.log("选中要删除的id值为:"+checkData);
                    //提交数据到后台进行删除
                    $.ajax({
                        type:'POST',
                        url:'/api/component/delete',
                        dataType:'json',
                        data:{"idList":checkData},
                        success:function(data){
                            Toastr.success("成功");
                            setTimeout(function () {
                                location.href = "/index/component/mylist";
                            }, 500);
                        },
                        error:function(data){
                            console.log(data.msg);
                        }
                    });

                });
            })
            // 我的列表tab控制
            $(".tab").on("click",function(){
                var url = window.location.href;
                var cate = $(this).attr("val");
                url = url.split("?")[0];
                if(cate.length > 0) {
                    url = addParams({page: 1, category_id: cate}, url);
                }
                window.location.href=url;
            });



            // 添加URL参数
            function addParams(params,myurl) {
                var url = myurl || window.location.href; //页面url
                var arr = new Array()
                var nextUrl = ''
                Object.keys(params).map(item => {
                    arr.push(`${item}=${params[item]}`)
                })
                if(url.indexOf('?')>-1) {
                    nextUrl = "&" + arr.join("&");
                } else {
                    nextUrl = "?" + arr.join("&");
                }
                return url + nextUrl
            }


        },
        upload: function () {
            // 给上传按钮添加上传成功事件
            $("#plupload-img").data("upload-success", function (data) {
                var url = Fast.api.cdnurl(data.url);
                $(".upload-img-url").prop("src", url);
                $("#upload-img-text").css({ opacity: .6});
                $(".upload-bg").css({ "background-image":"none"});
                Toastr.success(__('Upload successful'));
            });
            $("#plupload-attachfile").data("upload-success", function (data) {
                var url = Fast.api.cdnurl(data.url);
                // $(".upload-img-url").prop("src", url);
                $(".file-text").css({ opacity: 1});
                $(".file-text").text(url);
                $("#upload-file-text").css({ opacity: .6});
                $(".upload-file-bg").css({ "background-image":"none"});
                Toastr.success(__('Upload successful'));
            });

            // 给表单绑定事件
            Form.api.bindevent($("#upload-form"), function (data, ret) {
                var url = Backend.api.cdnurl($("#c-image").val());
                // top.window.$(".user-panel .image img,.user-menu > a > img,.user-header > img").prop("src", url);
                setTimeout(function () {
                    location.href = ret.url ? ret.url : "/index/component/index";
                }, 1000);
            });
        },
        detail: function () {
            // 收藏功能
            $("#favorite").on('click',function () {
                var id = $(this).attr("idd");
                var t = $(this);
                $.ajax({
                    type:'POST',
                    url:'/api/favorite/add',
                    data:{"component_id":id},
                    success:function(data){
                        if(data.msg == '收藏成功！'){
                            t.addClass("detail-favorite");
                            t.text("已收藏");
                        }else{
                            t.removeClass("detail-favorite");
                            t.text("收藏");
                        }
                        Toastr.success(data.msg);
                    },
                    error:function(data){
                        Toastr.error('收藏失败！');
                        console.log(data.msg);
                    }
                });
            })
        }
    };
    return Controller;
});