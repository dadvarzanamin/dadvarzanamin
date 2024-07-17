/*
 notifyMe jQuery Plugin v1.0.0
 Copyright (c)2014 Sergey Serafimovich
 Licensed under The MIT License.
*/
(function(e) {
    e.fn.notifyMe = function(t) {
        var r = e(this);
        var i = e(this).find("input[name=email]");
        var s = e(this).attr("action");
        var o = e(this).find(".note");
        e(this).on("submit", function(t) {
            t.preventDefault();
            var h = i.val();
            var p = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (p.test(h)) {
                $(".message").removeClass("error bad-email success-full");
                $(".message").hide().html('').fadeIn();
                $(".fa-spinner").addClass("fa-spin").removeClass("opacity-0");
                o.show();
                e.ajax({
                    type: "POST",
                    url: s,
                    data: {
                        email: h
                    },
                    dataType: "json",
                    error: function(e) {
                        o.hide();
                        $(".fa-spinner").addClass("opacity-0").removeClass("fa-spin");
                        $(".block-message").addClass("show-block-error").removeClass("show-block-valid");
                        if (e.status == 404) {
                            $(".message").html('<p class="notify-valid">خدمات در این لحظه قابل دسترس نمی باشد<br>لطفا ارتباط اینترنت خود را بررسی نمایید و یا بعدا تلاش کنید</p>').fadeIn();
                        } else {
                            $(".message").html('<p class="notify-valid">خطایی پیش آمده است<br>لطفا بعدا تلاش کنید</p>').fadeIn();
                        }
                    }
                }).done(function(e) {
                    o.hide();
                    if (e.status == "success") {
                        $(".fa-spinner").addClass("opacity-0").removeClass("fa-spin");
                        $(".message").removeClass("bad-email").addClass("success-full");
                        $(".block-message").addClass("show-block-valid").removeClass("show-block-error");
                        $(".message").html('<p class="notify-valid">تبریک! ایمیل شما ثبت شد<br>به محض افتتاح سایت شما را مطلع خواهیم ساخت</p>').fadeIn();
                    } else {
                        if (e.type == "ValidationError") {
                            $(".fa-spinner").addClass("opacity-0").removeClass("fa-spin");
                            $(".message").html('<p class="notify-valid">ایمیل وارد شده نامعتبر است<br>لطفا یک ایمیل صحیح وارد نمایید</p>').fadeIn();
                        } else {
                            $(".fa-spinner").addClass("opacity-0").removeClass("fa-spin");
							$(".message").html('<p class="notify-valid">خطایی پیش آمده است<br>لطفا بعدا تلاش کنید</p>').fadeIn();
                        }
                    }
                })
            } else {
                $(".fa-spinner").addClass("opacity-0").removeClass("fa-spin");
                $(".message").addClass("bad-email").removeClass("success-full");
                $(".block-message").addClass("show-block-error").removeClass("show-block-valid");
				$(".message").html('<p class="notify-valid">ایمیل وارد شده نامعتبر است<br>لطفا یک ایمیل صحیح وارد نمایید</p>').fadeIn();
                o.hide();
            }

            // Reset and hide all messages on .keyup()
            $("#notifyMe input").on('keyup keypress', function(e) {
                var code = e.keyCode || e.which;

                if (code == 13) { 
                    e.preventDefault();
                    $("#notifyMe").submit();

                } else {

                    $(".block-message").addClass("").removeClass("show-block-valid show-block-error");
                    $(".message").fadeOut();
                }
                
            });
        })
    }

    

})(jQuery)