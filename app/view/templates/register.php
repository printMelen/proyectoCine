<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link href="app/view/css/dist/output.css" rel="stylesheet">
</head>
<body class="bg-back">
<div class="h-[516px] w-[500px] mx-auto bg-login backdrop-blur-[10px] rounded-[15px] flex flex-col justify-center">
    <a href="index.php?peticion=login"><img src="app/view/images/flechaIzq.svg" alt="" class="w-[50px] h-[35px] absolute ml-[17px]"></a>
    <div class="w-[300px] mx-auto text-white ">
                <h3 class="text-white text-30 font-600 pb-[12px]">Registro</h3>
                <form action="index.php?peticion=register" method="post">
                    <input type="text" placeholder="Nombre y apellidos" name="nombreApellidos" class="w-[100%] mb-[14px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="text" placeholder="NIF" name="nif" id="" class="w-[100%] mb-[14px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="email" placeholder="Email" name="email" id="" class="w-[100%] mb-[14px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="password" placeholder="Password" name="password" id="" class="w-[100%] mb-[14px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="password" placeholder="Confirmar password" name="confPassword" id="" class="w-[100%] mb-[10px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <label class="text-12 flex justify-end mb-[10px] items-center"><input type="checkbox" id="cbox1" value="acepta" class=" appearance-none w-3 h-3 rounded-sm bg-login backdrop-blur-[10px] checked:bg-pink mr-[2px]">He leido y acepto la &nbsp<a href="#" class="underline"> política de privacidad</a></label>
                    <input type="submit" value="Registrarme" class="bg-pink backdrop-blur-[10px] w-[100%] h-[50px] font-600 text-22 rounded-[10px]">
                </form>
            </div>
</div>
</body>
</html>