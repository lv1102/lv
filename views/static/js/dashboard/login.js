define(["jquery","cookie"],function($) {
    $(function(){
        //1. 获取form表单,注册点击事件
        $("form").submit(function (e) {
            //1. 获取用户的输入信息
            var userName = $("#tc_name").val();
            var pass = $("#tc_pass").val();
    
            if(userName.trim() == ""){
                alert("请输入用户名");
                return false;
            }
            if(pass.trim() == ""){
                alert("请输入密码");
                return false;
            }
            // console.log(userName,pass);
            //2.要将数据发送给后台,让后台进行验证
            //2.1数据接口地址
            //2.2请求的方式是什么
            //2.3请求的参数是什么
            $.ajax({
                url:"/api/login",
                type:"post",
                data:{
                    tc_name : userName,
                    tc_pass : pass
                },
                success:function(data){
                    // console.log(data);
                    if(data.code== 200){
                        //登录成功之后
                        //现将后台返回的用户头像和姓名信息保存到cookie中
                        //为了让首页也能使用这个信息
    
                        //应该先将对象转成json格式的字符串,然后再存
                        $.cookie("userinfo",JSON.stringify(data.result),{expires :365, path:"/"});
                        //让用户跳转到首页
                        location.href = "/";
                    }
                }
            })
    
            
    
    
            //阻止表单默认的提交事件
            //e.preventDefault();
            return false;
        })
    })
});
