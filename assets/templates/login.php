<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link href="../css/dist/output.css" rel="stylesheet">
</head>
<body class="bg-back">
            <div class="w-[300px] mx-auto text-white">
                <h3 class="text-white text-30 font-600 pb-[12px]">Login</h3>
                <form action="index.php?peticion=login" method="post">
                    <input type="email" placeholder="Email" name="" id="" class="w-[100%] mb-[17px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="password" placeholder="Password" name="" id="" class="w-[100%] mb-[27px] h-[50px] rounded-[10px] bg-backInputs pl-[21px] backdrop-blur-[10px]">
                    <input type="submit" value="Entrar" class="bg-pink backdrop-blur-[10px] w-[100%] h-[50px] font-600 text-22 rounded-[10px]">
                </form>
                <a href="#" class="flex justify-end pt-[7px] font-400 text-12">¿Has olvidado tu contraseña?</a>
            </div>
</body>
</html>