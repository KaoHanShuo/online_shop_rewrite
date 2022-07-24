<!-- 管理員登入 -->
<h1>管理員登入</h1>

<table class='all'>
   <tr>
      <td class="ct ct_a">帳號</td>
      <td class="pp ct_a"><input type="text" name="acc" id="acc"></td>
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
    <a href="?do=reg"><button>註冊</button></a>
    <button onclick="login()">確認</button>
</div> 

<script>
   function login(){ //帳號登入
      let data={
      account:$("#acc").val(),
      password:$("#pw").val(),
      ans:$('#ans').val(),
      }

      $.post("./api/check_captcha.php", {ans:data.ans},function(check){ //  ./api/check_captcha.php
         if (parseInt(check)) {
            //alert("驗證碼正確");
            $.ajax({
               type:'POST',
               url:'http://127.0.0.1:8000/api/auth/login/yo',
               data:data,
               dataType:'json',
               success:function(res){
                  console.log(res);
                  // $.post("./api/get_session_user.php",{user:res.name},function(){
                  //       //console.log(resp.name);
                  //       location.href='?do=index';
                  // })
               },
               error:function(res){
                  console.log(res);
               },
               //error:function(err){console.log(err)},
            });
            
         } else {
            alert("驗證碼輸入錯誤");
         }
      })
   }
</script> 