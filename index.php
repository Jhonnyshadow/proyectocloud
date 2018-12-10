<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">

        </script>
    </head>
    <body>
        <script type="text/javascript">
        function myFunction(){
  swal({
  title: "Bienvenido",
  text: "Accedera el la pagina Inicial",
  icon: "warning",
})
.then((willDelete) => {
  window.location.replace("http://proyectocloud1.herokuapp.com/view/");
});
}
 
myFunction(); 
</script>
    </body>
</html>
