$(document).ready(function(){

    $(".delete-trans").on("click",function(e){

        e.preventDefault();

        if(confirm("Seguro que desea eliminar la transaccion?")){

            let id = $(this).data("id");
        window.location.href= "estudiantes/delete.php?id=" + id;
    } 
    });
});