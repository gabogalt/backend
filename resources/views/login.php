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
                /* background-color: #0f4c75; */
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
                max-width: 320px;
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
            body {
                font-family: 'Overpass', sans-serif;
                font-weight: normal;
                font-size: 100%;
                color: #1b262c;

                margin: 0;
                background-color: #0f4c75;
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
                max-width: 320px;
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
        </style>
        
        <script type="text/javascript">
            window.onload = function(){
              
                document.getElementById('loginform').addEventListener('submit',(e)=>{
                    e.preventDefault()
                    const body = {
                        email: document.getElementById('email').value,
                        password: document.getElementById('password').value,
                    }
                    const url ='/api/login'
                  
                    fetch(url, {
                        method: 'POST', // or 'PUT'
                        body: JSON.stringify(body), // data can be `string` or {object}!
                        headers:{
                            'Content-Type': 'application/json'
                        }
                        }).then(res => res.json())
                        .catch(error => {
                              Swal.fire({
                                    title: 'Error!',
                                    text: `User and/or password wrong.`,
                                })
                        })
                        .then(response => {
                            console.log('Success:', response)
                            if(response.token){
                                document.getElementById('email').value = '';
                                document.getElementById('password').value = '';
                                Swal.fire({
                                    title: 'Successful validation!',
                                    text: `Your token is: "${response.token}"`,
                                })
                            }else{
                                {
                                      Swal.fire({
                                    title: 'Error!',
                                    text: `User and/or password wrong.`,
                                })
                                }
                            }
                        });
                    })  
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
        
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
                        Login 
                    </div>
                    <form id="loginform">
                        <input type="text"  id='email' name="email" placeholder="Email" required>
                        
                        <input type="password" id='password' placeholder="Password" name="password" required>
                        
                        <button type="submit" title="Login" name="Login">Login</button>
                    </form>
                    <div class="pie-form">
                        <!-- <a href="#">¿Perdiste tu contraseña?</a> -->
                        <a href="/register">Do you not have an account? Register</a>
                    </div>
                    
                </div>
            
            </div>
        </div>
            
    </body>
</html>