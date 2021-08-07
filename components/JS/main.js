const load_emp =()=>{
    deptCode = $('#deptcode').val();
    handleEmp = $('#handleemp').val();
    $.ajax({
        url : '../function/controller.php' ,
        type: 'POST',
        cache: false,
        data:{
            method:'filter_emp',
            deptCode: deptCode,
            handleEmp:handleEmp
        },success:function(response){
            document.querySelector('#emp_data').innerHTML = response;
        }
    });
   
}