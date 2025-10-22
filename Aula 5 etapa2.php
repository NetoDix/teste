<?php
session_start();

// Inicialização das variáveis de erro
$erros = [
    'cpf' => '', 'nome' => '', 'endereco' => '', 'cep' => '',
    'cidade' => '', 'estado' => '', 'sexo' => '', 'nasc' => '',
    'parentesco' => '', 'cor' => ''
];

// Inicialização das variáveis de campo
$valores = [
    'cpf' => '', 'nome' => '', 'endereco' => '', 'cep' => '',
    'cidade' => '', 'estado' => '', 'sexo' => '', 'nasc' => '',
    'parentesco' => '', 'cor' => ''
];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $houve_erro = false;

    // Validação para cada campo
    $campos = array_keys($valores);
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $erros[$campo] = "Este campo é obrigatório";
            $houve_erro = true;
        } else {
            $valores[$campo] = htmlspecialchars($_POST[$campo]);
        }
    }

    // Se não houver erros, salva na sessão e redireciona
    if (!$houve_erro) {
        $_SESSION['cliente'] = $valores;
        header("Location: Etapa - 2.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Dados do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            text-align: right;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .form-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }
        
        .error {
            color: #d9534f;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        .btn {
            background: #337ab7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
        
        .btn:hover {
            background: #286090;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Venda de Animes</h2>
        </div>
        
        <h1 class="form-title">Dados do Cliente</h1>
        
        <form method="POST" action="Etapa - 1.php">
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" maxlength="18" value="<?php echo $valores['cpf']; ?>">
                <span class="error"><?php echo $erros['cpf']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" maxlength="40" value="<?php echo $valores['nome']; ?>">
                <span class="error"><?php echo $erros['nome']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" maxlength="35" value="<?php echo $valores['endereco']; ?>">
                <span class="error"><?php echo $erros['endereco']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" maxlength="15" value="<?php echo $valores['cep']; ?>">
                <span class="error"><?php echo $erros['cep']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" maxlength="25" value="<?php echo $valores['cidade']; ?>">
                <span class="error"><?php echo $erros['cidade']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="estado">Estado (UF)</label>
                <input type="text" id="estado" name="estado" maxlength="2" value="<?php echo $valores['estado']; ?>">
                <span class="error"><?php echo $erros['estado']; ?></span>
            </div>
            
            <div class="form-group">
                <label>Sexo</label>
                <div class="radio-group">
                    <div>
                        <input type="radio" id="sexoM" name="sexo" value="Masculino" <?php if ($valores['sexo'] == "Masculino") echo "checked"; ?>>
                        <label for="sexoM">Masculino</label>
                    </div>
                    <div>
                        <input type="radio" id="sexoF" name="sexo" value="Feminino" <?php if ($valores['sexo'] == "Feminino") echo "checked"; ?>>
                        <label for="sexoF">Feminino</label>
                    </div>
                </div>
                <span class="error"><?php echo $erros['sexo']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="nasc">Data de Nascimento (DD/MM/AAAA)</label>
                <input type="text" id="nasc" name="nasc" maxlength="10" value="<?php echo $valores['nasc']; ?>">
                <span class="error"><?php echo $erros['nasc']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="parentesco">Nome da Mãe</label>
                <input type="text" id="parentesco" name="parentesco" maxlength="40" value="<?php echo $valores['parentesco']; ?>">
                <span class="error"><?php echo $erros['parentesco']; ?></span>
            </div>
            
            <div class="form-group">
                <label for="cor">Cor Favorita</label>
                <input type="text" id="cor" name="cor" maxlength="13" value="<?php echo $valores['cor']; ?>">
                <span class="error"><?php echo $erros['cor']; ?></span>
            </div>
            
            <a href = "Aula 5 etapa3.php" type="submit" class="btn">Próximo</a>
        </form>
    </div>
</body>
</html>