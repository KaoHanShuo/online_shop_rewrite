<h1>123</h1>








<script>
    $.ajax({
        type:'GET',
        url:'http://127.0.0.1:8000/api',
    
        dataType:'text',
    
    success:function(res){console.log(res)},
    error:function(err){console.log(err)},
    });

    // $.get("http://127.0.0.1:8000/api", function(result){
    //     console.log(result);
    //     //$("div").html(result);
    // });

//     $.ajax({
//   url: url,
//   data: data,
//   success: success,
//   dataType: dataType
// });
</script>