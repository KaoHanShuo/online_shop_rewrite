<!-- 會員註冊 -->
<h1 class="">會員註冊</h1>

<table class="all" >
    <tr>
        <td class="tt ct ct_a">姓名</td>
        <td class="pp ct_a"><input type="text" name="name" id="name"><label><p id="valid_name"></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">帳號</td>
        <td class="pp ct_a">
            <input type="text" name="acc" id="acc">
            <button onclick="checkAcc()">檢測帳號</button>
            <label><p id="valid_acc"></p></label>
        </td>
    </tr>
    <tr>
        <td class="tt ct ct_a">密碼</td>
        <td class="pp ct_a"><input type="password" name="pw" id="pw">
            <label><p id="valid_pw"></p></label>
        </td>
        
    </tr>
    <tr>
        <td class="tt ct ct_a">確認密碼</td>
        <td class="pp ct_a"><input type="password" name="pw_comf" id="pw_comf">
        </td>
        
    </tr>
    <tr>
        <td class="tt ct ct_a">電話</td>
        <td class="pp ct_a"><input type="text" name="tel" id="tel">
            <label><p id="valid_tel"></p></label>
        </td>
    </tr>
    <tr>
        <td class="tt ct ct_a">住址</td>
        <td class="pp ct_a"><input type="text" name="addr" id="addr"><label><p id="valid_addr" ></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">電子信箱</td>
        <td class="pp ct_a"><input type="text" name="email" id="email"><label><p id="valid_email"></p></label></td>
    </tr>
</table>

<div class="ct">
    <button onclick="reg()">註冊</button>
</div> 


<!-- onclick反應,jqury -->
<script>
    // 檢測帳號
    function checkAcc(){
        $.post("http://127.0.0.1:8000/api/auth/accountCheck",{account:$("#acc").val()},function(check){ //  ./api/check_acc.php
            if(check==1 || $("#acc").val()=='admin'){ //if(check>0)
                alert("帳號已存在");
            }else{
                alert("此帳號沒有重複");
            }
        })
    }
    //註冊帳號
    function reg(){
        //取值
        let data={
            account:$("#acc").val(),
            name:$("#name").val(),
            password:$("#pw").val(),
            address:$("#addr").val(),
            telephone:$("#tel").val(),
            email:$("#email").val(),
            password_confirmation:$("#pw_comf").val(),
        }
        $.post("http://127.0.0.1:8000/api/auth/accountCheck",{data},function(check){ //  
            if(check==1 || data.account=='admin'){ //if(check>0)
                alert("帳號已存在");
            }else{
                $.ajax({
                    url:"http://127.0.0.1:8000/api/auth/register",
                    type:"POST",
                    data:data,
                    //contentType:"application/json; charset=utf-8",
                    dataType:"json",
                    success: function(res){
                       console.log(res);
                    },
                    error: function(res){
                        console.log(res);
                    }
                })
                // $.post("./api/reg.php",data,function(res){ //無法回傳物件
                // if(res==0){//驗證成功
                //     alert("註冊成功");
                //     location.href='?do=login';
                // }else if(res==1){
                //     alert("註冊失敗");
                // }
                // //typeof
                // })
            }
        })
    }
</script> 

