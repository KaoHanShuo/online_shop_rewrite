<!-- 會員登入 -->

<h1>會員登入</h1>

<table class='all'>
    <tr>
        <td class="ct ct_a">帳號</td>
        <td class="pp ct_a"><input type="text" name="acc" id="acc" ></td>
    </tr>
    <tr>
        <td class="ct ct_a">密碼</td>
        <td class="pp ct_a"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct ct_a">驗證碼</td>
        <td class="pp ct_a">
            <input type="text" name="ans" id="ans">
            <p><img id="imgcode" src="./api/create_captcha.php" onclick="refresh_code()"/>可點擊圖片刷新</p>
        </td>
        
    </tr>
    
</table>

<div class="ct">
    <a href="?do=reg"><button>註冊</button></a>|
    <button onclick="login()">確認</button>
</div> 

<script>
    function refresh_code(){ //驗證碼刷新
        document.getElementById("imgcode").src="./api/create_captcha.php"; 
    } 

    function login(){ //登入
        //取值
        let data={
        account:$("#acc").val(),
        password:$("#pw").val(),
        ans:$('#ans').val(),
        }
        //kevin
        //kevin123

        
        $.post("./api/check_captcha.php",{ans:data.ans},function(check){ //  ./api/check_captcha.php
            if(parseInt(check)){
                //alert("驗證碼正確");

                
                $.ajax({
                    url:"http://127.0.0.1:8000/api/auth/login",
                    type:"POST",
                    data:data,
                    //contentType:"application/json; charset=utf-8",
                    dataType:"json",
                    success: function(res){
                        console.log(res);
                        $.post("./api/get_session.php",{type:"get_token", token:res.access_token},function(){
                            //console.log(test);
                            $.ajax({
                                type:'GET',
                                url:'http://127.0.0.1:8000/api/auth/user-profile',
                                dataType:'json',
                                headers: {"Authorization": 'Bearer' + res.access_token},
                                success:function(resp){
                                    console.log(resp);
                                    $.post("./api/get_session.php",{type:"get_user",user:resp.name},function(){
                                        //console.log(resp.name);
                                        location.href='?do=index';
                                    })
                                    //console.log(res.name)
                                },
                                //error:function(err){console.log(err)},
                            });
                            //location.href='?do=index';
                        })
                    },
                    error: function(res){
                        console.log(res);
                    }
                })
            }else{
                alert("驗證碼錯誤");
            }
        })

        // $.post("./api/check_captcha.php",{ans:data.ans},function(check){ //  ./api/check_captcha.php
        //     if(parseInt(check)){
        //         //alert("驗證碼正確");
        //     $.post("http://127.0.0.1:8000/api/auth/login",{acc:data.acc, pw:data.pw},function(res){ //  ./api/check_pw.php
        //         if(parseInt(res)){
        //           location.href="./index.php";//假設登入成功跳轉
        //         }else{
        //             alert("帳號或密碼錯誤");
        //         }
        //     })
        // }else{
        //     alert("驗證碼輸入錯誤");
        // }
        // })
    }
</script>