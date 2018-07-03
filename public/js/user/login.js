var login = {
    checkLoginUserName: function () {
        var uName = $("#login-account").val();
        if (uName == "") {
            util.layerTips("login-account", util.getLan("user.tips.1"));
            return false;
        }
        return true;
    },
    checkLoginPassword: function () {
        var password = $("#login-password").val();
        var des = util.isPassword(password);
        if (des != "") {
            util.layerTips("login-password", des);
            return false;
        }
        return true;
    },
    login: function () {
        if (login.checkLoginUserName() && login.checkLoginPassword()) {
            var url = "/user/login.html";
            var uName = $("#login-account").val();
            var pWord = $("#login-password").val();
            var remmeber = document.getElementById('remember').checked;
            if(remmeber){
                localStorage.setItem("uName",uName);
                localStorage.setItem("pWord",pWord);
            } else {
                localStorage.removeItem("uName");
                localStorage.removeItem("pWord");
            }
            var longLogin = 0;
            if (util.checkEmail(uName)) {
                longLogin = 1;
            }

            var param = {
                loginName: uName,
                password: pWord,
                type: longLogin
            };
            var callback = function (data) {
                var forwardUrl = util.getUrlParam('forwardUrl');
                // var exp = new Date();
                // exp.setTime(exp.getTime() + 2*60*60*1000);
                // document.cookie = 'token='+data.data +";expires="+exp.toGMTString();
                if (data.code != 200) {
                    util.layerTips("login-password", data.msg);
                    $("#login-password").val("");
                } else {
                    if (forwardUrl == null) {
                        window.location.href = "/main.html";
                    } else {
                        window.location.href = forwardUrl;
                    }

                }
            };
            util.network({btn: $("#login-submit")[0], url: url, param: param, success: callback, enter: true});
        }
    }
};

var loginType;
// $('#login-account').input(){
//
//     var username = this.value;
//     if(username.indexOf('@')>0){
//         loginType = 1;
//         $()
//     }else{
//         loginType = 0;
//     }
// }
$(function () {
    $("#login-password").on("focus", function () {
        util.callbackEnter(login.login);
    });
    $("#login-submit").on("click", function () {
        login.login();
    });
    var uName = localStorage.getItem('uName');
    console.log(uName);
    if('undefined'!=typeof(uName)){
        $('#login-account').val(uName);
        $("#login-password").val(localStorage.getItem('pWord'));
        $('#remember').attr('checked',true);
    }
});