/**
 * Created by Jasmine on 2016-6-6.
 */
function isEmpty(value) {
    return value === null || value === undefined || value == [] || value === '';
}

function isTelPhone(value) {
    return !(/^1[3|5|7|8]\d{9}$/.test(value));
}

function isPassword(value) {
    return !(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/.test(value));
}
$(document).ready(function() {
    $("#signup-form").submit(function() {
        var phone_number = $("#signup-phone_number").val();
        if (isEmpty(phone_number)) {
            $(".field-signup-phone_number>span").html("手机号码不能为空");
            $(".field-signup-phone_number>span").addClass("wowo-error");
            $("#signup-phone_number").focus();
            return false;
        } else if (isTelPhone(phone_number)) {
            $(".field-signup-phone_number>span").html("手机号码格式不正确");
            $(".field-signup-phone_number>span").addClass("wowo-error");
            $("#signup-phone_number").focus();
            return false;
        } else {
            $(".field-signup-phone_number>span").html("请输入手机号码");
            $(".field-signup-phone_number>span").removeClass("wowo-error");
        }
        var password = $("#signup-password").val();
        if (isEmpty(password)) {
            $(".field-signup-password>span").html("密码不能为空");
            $(".field-signup-password>span").addClass("wowo-error");
            $("#signup-password").focus();
            return false;
        } else if (isPassword(password)) {
            $(".field-signup-password>span").html("密码不符合规则");
            $(".field-signup-password>span").addClass("wowo-error");
            $("#signup-password").focus();
            return false;
        } else {
            $(".field-signup-password>span").html("请输入8-16位数字、大写字母和小写字母的组合");
            $(".field-signup-password>span").removeClass("wowo-error");
        }
        var v_code = $("#signup-v_code").val();
        if (isEmpty(v_code)) {
            $(".field-signup-v_code>span").html("验证码不能为空");
            $(".field-signup-v_code>span").addClass("wowo-error");
            $("#signup-v_code").focus();
            return false;
        } else if (!(/^\d{6}$/.test(v_code))) {
            $(".field-signup-v_code>span").html("验证码位6位数字");
            $(".field-signup-v_code>span").addClass("wowo-error");
            $("#signup-v_code").focus();
            return false;
        } else {
            $(".field-signup-password>span").html("输入手机验证码");
            $(".field-signup-password>span").removeClass("wowo-error");
        }
        var deal = $("#accept-deal");
        if (!deal.prop("checked")) {
            alert("您必须同意蜗蜗在线的服务协议");
            return false;
        }
    });
});