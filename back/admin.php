<!-- 帳號管理 -->
<script>
    $.ajax({
        type:'POST',
        url:'http://127.0.0.1:8000/api/auth/showAllAdmin',
        dataType:'json',
        //headers: {"Authorization": 'Bearer' + res.access_token},
        success:function(res){
            //console.log(res);
            $.each(res, function(key,value){
                console.log(value.account);
                $.post("./api/show_all_admin.php",{key:value.id,account:value.account},function(){

                })
            })
        },
        error:function(err){
            console.log(err)
        },
    });       
</script>

<?php  
    //$rows = all('admin');//取所有admin內資料
?>

<div class="ct" >
    <button onclick="location.href='?do=add_admin'">新增管理員</button>    
</div>
<table class="all ct">
    <tr class="tt">
        <td>帳號</td>
        
        <td>管理</td>
    </tr>
    <?php
        foreach($_SESSION['show_admin_all'] as $key => $value){
    ?>

    <tr class="pp">
        <td><?= $value;?></td>
        
        <td>
            <?php
                if($value =='admin'){
                    echo "主管理員";
                }else{
            ?>

            <button onclick="location.href='?do=edit_admin&id=<?=$key;?>'">編輯</button>
            <!-- <button onclick="del('admin')">delete</button> -->
            
            <?php    
                }
            ?>
        </td>
    </tr>
    <?php
        }
       
    ?>
</table>

<?php
    unset($_SESSION['show_admin_all']);
?>


