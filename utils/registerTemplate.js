const registerTemplate = ({ user, verificationCode }) => `<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>

    <div class="container">
    	 <h3>¡Hola ${user}. Gracias por registrarte!</h3>
         <a href=${process.env.DEV_URL}/auth/verificationCode/${verificationCode}>Click acá para confirmar la cuenta </a>
    	
    </div>
    <div class="container mt-5">
    	<img src="https://meliesvfxschool.com/wp-content/uploads/2020/10/GRACIAS-POR-REGISTRARTE-1024x576.jpg" alt="" style="width: 40%; height: 40%; position: relative; left:300px ; top: 80px" >
    </div>
		

	
</body>
</html>							`;

module.exports = { registerTemplate };
