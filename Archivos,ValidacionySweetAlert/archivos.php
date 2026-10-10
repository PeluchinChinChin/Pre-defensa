<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <form action="uno.php" method="post" onsubmit="return validar()">
        <label for="">NOMBRE: </label>
        <input type="text" name="nombre" id="nom">
        <label for="">ASUNTO: </label>
        <input type="text" name="asunto">
        <label for="">COMENTARIO: </label>
        <textarea name="come" id="come"></textarea>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
    <script>
        function validar(){
            var n=document.getElementById("nom");
            if(n.value==""){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo a sucedido!",
                });
                n.focus();
                return false;
            } if(n.value.length>15){
                alert("El comentario no puede exceder los 15 caracteres");
                n.focus();
                return false;
            }
        }
    </script>
</body>
</html>