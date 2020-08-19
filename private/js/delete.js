$(document).ready(function(){

    $(".delete").on("click", function(){
        var element = $(this);
        var delete_id = $(this).data('id');
        alert(delete_id);
    $.ajax({
    url:"delete.php",
    type: "POST",
    data: {id: delete_id},
    success:successFn,
    error:errorFn,
    complete:function(xhr, status){
        console.log("Ajax request completed");
       }


});
    });
    function successFn(result){
        if(result ==="1"){
         console.log("Staff record deleted successfully");
        }else{
            console.log("id is" + result);

        }
    }
    function errorFn(){
        console.log("Staff record failed to delete by ajax");
    }

});