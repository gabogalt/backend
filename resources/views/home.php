<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
        <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        
        
        <style type="text/css">
            /* LOGIN */
        body {
            font-family: 'Overpass', sans-serif;
            font-weight: normal;
            font-size: 100%;
            color: #1b262c;

            margin: 0;
            /* background-color: #0f4c75;
             */
            background: url('https://www.shutterstock.com/image-illustration/abstract-background-star-warp-hyperspace-260nw-1035076279.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-y:hidden;

        }

        #contenedor {
            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0;
            padding: 0;
            min-width: 100vw;
            min-height: 100vh;
            width: 100%;
            height: 100%;
        }

        #central {
            max-width: 420px;
            width: 100%;
        }

        .titulo {
            font-size: 250%;
            color: #bbe1fa;
            text-align: center;
            margin-bottom: 20px;
        }

        #login {
            width: 100%;
            padding: 50px 30px;
            background-color: #3282b8;

            -webkit-box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.15);

            border-radius: 3px 3px 3px 3px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;

            box-sizing: border-box;
        }

        #login input {
            font-family: 'Overpass', sans-serif;
            font-size: 110%;
            color: #1b262c;

            display: block;
            width: 100%;
            height: 40px;

            margin-bottom: 10px;
            padding: 5px 5px 5px 10px;

            box-sizing: border-box;

            border: none;
            border-radius: 3px 3px 3px 3px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;
        }

        #login input::placeholder {
            font-family: 'Overpass', sans-serif;
            color: #E4E4E4;
        }

        #login button {
            font-family: 'Overpass', sans-serif;
            font-size: 110%;
            color: #1b262c;
            width: 100%;
            height: 40px;
            border: none;

            border-radius: 3px 3px 3px 3px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;

            background-color: #bbe1fa;

            margin-top: 10px;
        }

        #login button:hover {
            background-color: #0f4c75;
            color: #bbe1fa;
        }

        .pie-form {
            font-size: 90%;
            text-align: center;
            margin-top: 15px;
        }

        .pie-form a {
            display: block;
            text-decoration: none;
            color: #bbe1fa;
            margin-bottom: 3px;
        }

        .pie-form a:hover {
            color: #0f4c75;
        }

        .inferior {
            margin-top: 10px;
            font-size: 90%;
            text-align: center;
        }

        .inferior a {
            display: block;
            text-decoration: none;
            color: #bbe1fa;
            margin-bottom: 3px;
        }

        .inferior a:hover {
            color: #3282b8;
        }

        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        }

        li {
        float: right;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        li a:hover {
        background-color: #111;
        }
        p {
            font-size: 20px;
            color: white;
        }
        </style>
        
    </head>
    
    <body>
        <nav>
            <ul>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li><a class="" href="/docs">Docs</a></li>
                <li><a class="active" href="/">Home</a></li>

            </ul>
        </nav>
        <div id="contenedor">
            
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Backend API
                    </div>
                    <p style="color:white">
                       Welcome to Backend API.
                    </p>
                    <p>
                        In our API you will find content about Star Wars.
                    </p>
                    <p>
                        It's important that you create an account because the API is managed with a security token, which is required to make your requests. You have two options to register, through our <a href="/register">Registration</a> page or directly through our <a href="/docs">API</a>.
                    </p>
                    <p>
                        "May the force be with you."
                    </p>
                    
                    <div class="pie-form">
                        <a href="/login">¿Do you hace account? Login</a>
                    </div>
                </div>
            </div>
        </div>
            
    </body>
</html>