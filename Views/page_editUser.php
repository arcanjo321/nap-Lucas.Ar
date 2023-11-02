<?php 
	include('../Models/Nap.php');

	header("HTTP/1.0 404 Not Found");

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id']) || ($_SESSION['type'] !== 'adminNap')) {
        die("
            <script>window.location='../Views/pagerro.html'</script>
        ");
    }

    $sql = "SELECT * FROM login WHERE id=".$_REQUEST["id"];
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nap - Editar usuário</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		<link rel="stylesheet" href="../assets/css/page_register.css">
	</head>
	<body>
		<div class="container">
			<form action="../Controllers/Login.php" method="POST">
				<input type="hidden" name="acao" value="edit">
                <input type="hidden" name="id" value="<?php foreach ($result as $row) {echo $row->id;} ?>">
				<div>
					<img src="../assets/images/naplogo.jpg" width="200"> 
				</div>
				<br>
				<h2>Edição de usuário</h2>
				<div class="form-group">
					<label for="username">Usuário</label>
					<input required type="text" id="username" name="username" class="form-control" value="<?php foreach ($result as $row) {echo $row->username;}?>">
				</div>
				<div class="form-group">
					<label>Tipo de Usuário:</label>
					<div class="form-check">
						<input 
                            type="radio" 
                            id="adminNap" 
                            name="opcao" 
                            value="adminNap" 
                            class="form-check-input"
                            <?php foreach ($result as $row) {
                                if($row->type === 'adminNap') {
                                    echo 'checked';
                                }
                            }?>
                        >
						<label for="adminNap" class="form-check-label">Admin nap</label>
					</div>
					<div class="form-check">
						<input 
                            type="radio" 
                            id="admin" 
                            name="opcao" 
                            value="admin" 
                            class="form-check-input"
                            <?php foreach ($result as $row) {
                                if($row->type === 'admin') {
                                    echo 'checked';
                                }
                            }?>
                        >
						<label for="admin" class="form-check-label">Admin</label>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<div class="password-container">
						<input required type="password" id="password" name="password" class="form-control"
							value="<?php foreach ($result as $row) {echo $row->password;}?>">
						<span class="toggle-password" onclick="togglePasswordVisibility('password')">
							<i id="password-toggle-icon" class="fa fa-eye"></i>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="passwordConfirmation">Confirme a senha:</label>
					<div class="password-container">
						<input required type="password" id="passwordConfirmation" name="passwordConfirmation" class="form-control"
							value="<?php foreach ($result as $row) {echo $row->password;}?>">
						<span class="toggle-password" onclick="togglePasswordVisibility('passwordConfirmation')">
							<i id="passwordConfirmation-toggle-icon" class="fa fa-eye"></i>
						</span>
					</div>
				</div>
				<div class="buttons">
					<a href="./page_users.php?search2=" id="back">Voltar</a>
					<button type="submit" class="btn btn-primary">Editar</button>
				</div>
			</form>
		</div>
		<script src="../assets/js/togglePassword.js"></script>
	</body>
</html>