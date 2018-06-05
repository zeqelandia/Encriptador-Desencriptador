<?php
	session_start();
	include_once("Encript.class.php");
			$mensaje = new Mensaje();
		if (isset($_POST['txtMensaje'])) {
			$_SESSION['txtMensaje'] = $mensaje->encriptar($_POST['txtMensaje'],$_SESSION['clave']);
		?>
	<!DOCTYPE html>
<html>
<head>
	<title>Mensaje</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<div class="titulo">
			<h1>2do Laboratorio</h1>
		</div>
	</header>
	<section>
		<article>
			<center><table>
				<tr>
					<td colspan="2">
						<h3>Mensaje Recibido!</h3>
					</td>
				</tr>
				<tr>
					<td>
						<div class="mensaje">
							<label id="lblMensaje">
								<?php
									echo $_SESSION['txtMensaje'];
								?>
							</label>
						</div>
					</td>
					<td>
						<form action="index.php" method="post">
							<input type="hidden" name="mensajeEncriptado" value="">
							<input type="submit" name="btnEnviar" value="Desencriptar" class="boton">
						</form>		
					</td>
				</tr>
			</table></center>
		</article>
	</section>
	<footer>
		<div class="pie">
			<p>Desarrollado por</p>
			<p>Brandon Urigo y Ezequiel Silvestre</p>
		</div>
	</footer>
</body>
</html>
<?php
		}else if (isset($_SESSION['txtMensaje']) && !($_SESSION['txtMensaje']=="")) {
			if(!(isset($_POST['mensajeEncriptado']))) {
				$_SESSION['txtMensaje'] = $mensaje->encriptar($_SESSION['txtMensaje'],$_SESSION['clave']);
			}else{
				$_SESSION['txtMensaje'] = $mensaje->desencriptar($_SESSION['txtMensaje'],$_SESSION['clave']);
			}
?>
	<!DOCTYPE html>
<html>
<head>
	<title>Mensaje</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<div class="titulo">
			<h1>2do Laboratorio</h1>
		</div>
	</header>
	<section>
		<article>
			<center><table>
				<tr>
					<td colspan="2">
						<h3>Mensaje Recibido!</h3>
					</td>
				</tr>
				<tr>
					<td>
						<div class="mensaje">
							<label id="lblMensaje">
								<?php
									echo utf8_decode($_SESSION['txtMensaje']);
								?>
							</label>
						</div>
					</td>
					<td>
						<form action="index.php" method="post">
							<input type="hidden" name="mensajeEncriptado" value="">
							<input type="submit" name="btnEnviar" value="Desencriptar" class="boton">
						</form>		
					</td>
				</tr>
			</table></center>
		</article>
	</section>
	<footer>
		<div class="pie">
			<p>Desarrollado por</p>
			<p>Brandon Urigo y Ezequiel Silvestre</p>
		</div>
	</footer>
</body>
</html>
<?php
			///echo $cc->desencriptarMSJ($_POST['txtMensaje'],$_SESSION['clave']);
		session_destroy();}else {
			$msj = "";
			$_POST['txtMensaje'] = "";
			$clave= rand(5,25);
			$_SESSION['clave'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <script src="../js/mensaje.js"></script>
</head>
<body>
	<header>
		<div class="titulo">
			<h1>2do Laboratorio</h1>
		</div>
	</header>
	<section>
		<article>
			<form action="index.php" method="post">
				<center><table>
					<tr>
						<td colspan="2">
							<h3>Envie su Mensaje</h3>
						</td>
					</tr>
					<tr>
						<td>
							<textarea autofocus="" maxlength="300" cols="30" rows="10"  name="txtMensaje" id="txtMensaje"></textarea>
						</td>
						<td>
							<input type="submit" name="btnEnviar" value="Enviar" class="boton">
						</td>
					</tr>
				</table></center>
			</form>
		</article>
	</section>
	<footer>
		<div class="pie">
			<p>Desarrollado por</p>
			<p>Brandon Urigo y Ezequiel Silvestre</p>
		</div>
	</footer>
</body>
    <?php
		
	}
    ?>
</html>