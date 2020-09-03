define(['fast', 'template', 'moment'], function (Fast, Template, Moment) {
    var Frontend = {
        api: Fast.api,
        init: function () {
            var si = {};
            //发送验证码
            $(document).on("click", ".btn-captcha", function (e) {
                var type = $(this).data("type") ? $(this).data("type") : 'mobile';
                var btn = this;
                Frontend.api.sendcaptcha = function (btn, type, data, callback) {
                    $(btn).addClass("disabled", true).text("发送中...");

                    Frontend.api.ajax({url: $(btn).data("url"), data: data}, function (data, ret) {
                        clearInterval(si[type]);
                        var seconds = 60;
                        si[type] = setInterval(function () {
                            seconds--;
                            if (seconds <= 0) {
                                clearInterval(si);
                                $(btn).removeClass("disabled").text("发送验证码");
                            } else {
                                $(btn).addClass("disabled").text(seconds + "秒后可再次发送");
                            }
                        }, 1000);
                        if (typeof callback == 'function') {
                            callback.call(this, data, ret);
                        }
                    }, function () {
                        $(btn).removeClass("disabled").text('发送验证码');
                    });
                };
                if (['mobile', 'email'].indexOf(type) > -1) {
                    var element = $(this).data("input-id") ? $("#" + $(this).data("input-id")) : $("input[name='" + type + "']", $(this).closest("form"));
                    var text = type === 'email' ? '邮箱' : '手机号码';
                    if (element.val() === "") {
                        Layer.msg(text + "不能为空！");
                        element.focus();
                        return false;
                    } else if (type === 'mobile' && !element.val().match(/^1[3-9]\d{9}$/)) {
                        Layer.msg("请输入正确的" + text + "！");
                        element.focus();
                        return false;
                    } else if (type === 'email' && !element.val().match(/^[\w\+\-]+(\.[\w\+\-]+)*@[a-z\d\-]+(\.[a-z\d\-]+)*\.([a-z]{2,4})$/)) {
                        Layer.msg("请输入正确的" + text + "！");
                        element.focus();
                        return false;
                    }
                    element.isValid(function (v) {
                        if (v) {
                            var data = {event: $(btn).data("event")};
                            data[type] = element.val();
                            Frontend.api.sendcaptcha(btn, type, data);
                        } else {
                            Layer.msg("请确认已经输入了正确的" + text + "！");
                        }
                    });
                } else {
                    var data = {event: $(btn).data("event")};
                    Frontend.api.sendcaptcha(btn, type, data, function (data, ret) {
                        Layer.open({title: false, area: ["400px", "430px"], content: "<img src='" + data.image + "' width='400' height='400' /><div class='text-center panel-title'>扫一扫关注公众号获取验证码</div>", type: 1});
                    });
                }
                return false;
            });
            //tooltip和popover
            if (!('ontouchstart' in document.documentElement)) {
                $('body').tooltip({selector: '[data-toggle="tooltip"]'});
            }
            $('body').popover({selector: '[data-toggle="popover"]'});
        }
    };
    $(".search-menu li").on('click',function () {
        var t = $(this).children('a').text();
        $(this).parent('ul').siblings('.dropdown-btn').children('.search-text').text(t);
    });
    // $("#toggle-href").on('click',function () {
    //     location.href = "/index/component";
    // });

    $(function(){
        $('.nav-item>a').on('click',function(){
            var url = $(this).children('.icon').css('background-image');
            if($(this).next().css('display')=="none"){
                $('.nav-item').children('ul').slideUp(300);
                $(this).next('ul').slideDown(300);
                // $(this).children('.icon').css("background-image",url);
                $(this).parent('li').addClass('nav-show').siblings('li').removeClass('nav-show');
            }else{
                $(this).next('ul').slideUp(300);
                // $(this).children('.icon').css("background-image",url);
                $('.nav-item.nav-show').removeClass('nav-show');
            }
            if($(this).parent('.nav-item').hasClass('nav-show')){
                $(this).children('.icon').css("background-image",url);
            }else{
                url = url.replace('-w','');
                $(this).children('.icon').css("background-image",url);
            }
            var url_w = $(this).parent('.nav-item').siblings('li');
            $.each(url_w,function(index,value){
                if(index != 0) {
                    console.log(url_w.eq(index));
                    if (url_w.eq(index).find(".icon").css("background-image").indexOf("-w") > 0) {
                        url_w.eq(index).find(".icon").css("background-image", url_w.eq(index).find(".icon").css("background-image").replace('-w', ''));
                    }
                }
            });
        });
    });

    Frontend.api = $.extend(Fast.api, Frontend.api);
    //将Template渲染至全局,以便于在子框架中调用
    window.Template = Template;
    //将Moment渲染至全局,以便于在子框架中调用
    window.Moment = Moment;
    //将Frontend渲染至全局,以便于在子框架中调用
    window.Frontend = Frontend;

    Frontend.init();
    return Frontend;
});
