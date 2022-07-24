//刪除
function del(table,id){
	$.post("api/delete_admin.php",{table,id},function(){ 
		location.reload();
	})
} 
//新增分類
function addCate(type){
    let primary,parent,secondary;
    switch(type){
        case "primary":
            primary=$("#primary").val()
            $.post("api/edit_category.php",{type,primary},function(){
                location.reload();
            })
        break;
        case "secondary":
            secondary=$("#secondary").val()
            primary=$("#parent").val()
            $.post("api/edit_category.php",{type,secondary,primary},function(){
                location.reload();
            })
        break;
    }
}
//更新分類
function editType(id){
	let update=1;
	let change=prompt("請輸入要修改的分類名稱",$("#t"+id).html());
	if(change!=null){
		$.post("api/edit_category.php",{id,"name":change,update},function(){
		$("#t"+id).html(change);
		})
	}
}

//即時更新商品分類api
function changeType(type){
    let primary,secondary;
    switch(type){
        case "primary":
            primary=$("#primary").val();
            $("#secondary").load("api/get_type.php",{type,primary},function(){
                changeType('secondary');
                //alert(primary);
            })
        break;
        case "secondary":
            primary=$("#primary").val();
            secondary=$("#secondary").val();
            $.post("api/get_type.php",{type,secondary,primary},function(res){
                $("#no").html(res+"<input type='hidden' name='no' value='"+res+"'>");
            })
        break;
    }
}

function upDown(id,sell_state){//商品上下架
    $.post("api/edit_item.php",{'id':id,'sell_state':sell_state,'logic':"upDown"},function(){
        location.reload();
    })
}

function minus(){// front/detail
    $number=$("#quantity").val();
    if($number>0){$number--;}
    //$number--;
    $("#quantity").val($number);
}
function plus(max){// front/detail
    $number=$("#quantity").val();
    if(max>$number){$number++;}
    $("#quantity").val($number);
}

function refresh_code(){ //驗證碼刷新
    document.getElementById("imgcode").src="./api/create_captcha.php"; 
} 

function editMember(){//fron/edit_member
    let data={
        id:$("#id").val(),
        name:$("#name").val(),
        addr:$("#addr").val(),
        tel:$("#tel").val(),
        email:$("#email").val(),
    }
    $.post("api/edit_member.php",data,function(res){ 
        if(res==0){//驗證成功
            alert("修改成功");
        }else if(res==1){
            alert("修改失敗");
            location.reload();
        }
    })
}

function logout(){
    $.post("api/get_session.php",{type:"get_token"},function(res){ 
        //console.log(res)
        $.ajax({
            type:'POST',
            url:'http://127.0.0.1:8000/api/auth/logout',
            dataType:'json',
            headers: {"Authorization": 'Bearer' + res},
            success:function(resp){
                console.log(resp)
            },
            error:function(err){console.log(err)},
        });
    })
    
}
