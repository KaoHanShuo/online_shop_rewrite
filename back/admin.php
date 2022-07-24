<!-- 帳號管理 -->
<?php  
    //$rows = all('admin');//取所有admin內資料
?>

<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>    
</div>
<table class="all ct">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
        //foreach($rows as $row){
    ?>

    <tr class="pp">
        <td><?php echo 1;?></td>
        <td><?php echo 1;?></td>
        <td>
            <?php
                // if($row['acc']=='admin'){
                //     echo "主管理員";
                // }else{
            ?>

            <button onclick="location.href='?'">edit</button>
            <button onclick="del('admin')">delete</button>

            <?php    
            //    }
            ?>
        </td>
    </tr>
    <?php
       // }
    ?>
</table> 

