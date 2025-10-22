<?php
session_start();

// Verificar se os dados da sessão existem
if (!isset($_SESSION['cliente']) || !isset($_SESSION['produtos']) || !isset($_SESSION['pagamento'])) {
    header("Location: Etapa - 1.php");
    exit();
}

// Dados do cliente
$cliente = $_SESSION['cliente'];

// Dados dos produtos
$produtos = $_SESSION['produtos'];

// Dados de pagamento e entrega
$pagamento = $_SESSION['pagamento'];

// Cálculos de preço
$preco_livro = 0;
$preco_album = 0;
$preco_bugiganga = 0;

// Calcular preço dos livros
if ($produtos['livro'] != 'nenhum') {
    switch ($produtos['livro']) {
        case 'Retorno de um herói esquecido':
            $preco_livro = 30.00;
            break;
        case 'Como criar plantas carnívoras':
            $preco_livro = 20.00;
            break;
        case 'As fórmulas do amor':
            $preco_livro = 30.00;
            break;
        case 'Revoluções pelo mundo':
            $preco_livro = 35.00;
            break;
    }
    
    // Adicionar custo da capa dura
    if (isset($produtos['tipo_capa']) && $produtos['tipo_capa'] == 'dura') {
        $preco_livro += 5.00;
    }
    
    $preco_livro *= $produtos['qtd_livro'];
}

// Calcular preço dos álbuns
if ($produtos['album'] != 'nenhum') {
    switch ($produtos['album']) {
        case 'Thriller':
            $preco_album = 30.00;
            break;
        case 'Back in Black':
            $preco_album = 25.00;
            break;
        case 'The Dark Side of the Moon':
            $preco_album = 30.00;
            break;
        case 'Bat Out of Hell':
            $preco_album = 20.00;
            break;
    }
    
    $preco_album *= $produtos['qtd_album'];
}

// Calcular preço das bugigangas
if ($produtos['bugiganga'] != 'nenhum') {
    switch ($produtos['bugiganga']) {
        case 'Abridor de Cartas':
            $preco_bugiganga = 10.00;
            break;
        case 'Imã de Clipes':
            $preco_bugiganga = 5.00;
            break;
        case 'Capinha de Nokia Tijolo':
            $preco_bugiganga = 10.00;
            break;
        case 'Porta Canetas do Garfield':
            $preco_bugiganga = 20.00;
            break;
    }
    
    $preco_bugiganga *= $produtos['qtd_bugiganga'];
}

// Calcular preço do frete
$preco_frete = 0;
switch ($pagamento['frete']) {
    case 'economico':
        $preco_frete = 15.00;
        break;
    case 'padrao':
        $preco_frete = 25.00;
        break;
    case 'expresso':
        $preco_frete = 40.00;
        break;
}

// Calcular subtotal
$subtotal = $preco_livro + $preco_album + $preco_bugiganga;

// Aplicar descontos/acréscimos conforme forma de pagamento
$total = $subtotal + $preco_frete;

switch ($pagamento['fpagto']) {
    case 'avista':
        $total *= 0.91; // 9% de desconto
        $parcelas = 1;
        $valor_parcela = $total;
        break;
    case 'aprazo':
        $total *= 1.11; // 11% de acréscimo
        $parcelas = 1;
        $valor_parcela = $total;
        break;
    case 'cartao':
        $total *= 1.15; // 15% de acréscimo
        $parcelas = $pagamento['parcelas'];
        $valor_parcela = $total / $parcelas;
        break;
}

// Formatar valores para exibição
function formatar_preco($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pedido - Venda de Animes</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }
        
        .titulo-loja {
            color: #4a4a4a;
            font-weight: 600;
            font-size: 22px;
        }
        
        .etapa-info {
            text-align: right;
            color: #7f8c8d;
        }
        
        .progresso {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .progresso:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #ddd;
            z-index: 1;
        }
        
        .etapa {
            text-align: center;
            position: relative;
            z-index: 2;
        }
        
        .bolha {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
        }
        
        .bolha.ativa {
            background: #2ecc71;
        }
        
        .bolha.completa {
            background: #2ecc71;
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 24px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .info-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #3498db;
        }
        
        .section-title {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: #3498db;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .info-item {
            margin-bottom: 10px;
        }
        
        .info-label {
            font-weight: 600;
            color: #555;
        }
        
        .info-value {
            color: #333;
        }
        
        .produto-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        
        .produto-nome {
            flex-grow: 1;
        }
        
        .produto-preco {
            color: #27ae60;
            font-weight: 600;
        }
        
        .resumo-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }
        
        .resumo-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-top: 2px solid #3498db;
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .btn-nova-venda {
            display: block;
            width: 100%;
            padding: 15px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
        
        .btn-nova-venda:hover {
            background: #2980b9;
        }
        
        .agradecimento {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background: #e8f4fd;
            border-radius: 8px;
            border-left: 4px solid #3498db;
        }
        
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="titulo-loja">📚 Venda de Animes</div>
            <div class="etapa-info">Confirmação de Pedido</div>
        </div>
        
        <div class="progresso">
            <div class="etapa">
                <div class="bolha completa">1</div>
                <div>Dados Pessoais</div>
            </div>
            <div class="etapa">
                <div class="bolha completa">2</div>
                <div>Produtos</div>
            </div>
            <div class="etapa">
                <div class="bolha completa">3</div>
                <div>Pagamento</div>
            </div>
            <div class="etapa">
                <div class="bolha ativa">4</div>
                <div>Confirmação</div>
            </div>
        </div>
        
        <h1 class="form-title">Confirmação do Pedido</h1>
        
        <div class="info-section">
            <div class="section-title">
                <i>👤</i> Dados do Cliente
            </div>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nome:</span>
                    <span class="info-value"><?php echo $cliente['nome']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">CPF:</span>
                    <span class="info-value"><?php echo $cliente['cpf']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Endereço:</span>
                    <span class="info-value"><?php echo $cliente['endereco']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">CEP:</span>
                    <span class="info-value"><?php echo $cliente['cep']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Cidade/UF:</span>
                    <span class="info-value"><?php echo $cliente['cidade'] . '/' . $cliente['estado']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Sexo:</span>
                    <span class="info-value"><?php echo $cliente['sexo']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Data de Nascimento:</span>
                    <span class="info-value"><?php echo $cliente['nasc']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Nome da Mãe:</span>
                    <span class="info-value"><?php echo $cliente['parentesco']; ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Cor Favorita:</span>
                    <span class="info-value"><?php echo $cliente['cor']; ?></span>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <div class="section-title">
                <i>🛒</i> Produtos Selecionados
            </div>
            
            <?php if ($produtos['livro'] != 'nenhum'): ?>
            <div class="produto-item">
                <div class="produto-nome">
                    <?php echo $produtos['livro']; ?> 
                    (<?php echo $produtos['qtd_livro']; ?> unidade(s))
                    <?php if (isset($produtos['tipo_capa']) && $produtos['tipo_capa'] == 'dura'): ?>
                    <br><small>Capa Dura (+ R$ 5,00)</small>
                    <?php endif; ?>
                </div>
                <div class="produto-preco"><?php echo formatar_preco($preco_livro); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if ($produtos['album'] != 'nenhum'): ?>
            <div class="produto-item">
                <div class="produto-nome">
                    <?php echo $produtos['album']; ?> 
                    (<?php echo $produtos['qtd_album']; ?> unidade(s))
                </div>
                <div class="produto-preco"><?php echo formatar_preco($preco_album); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if ($produtos['bugiganga'] != 'nenhum'): ?>
            <div class="produto-item">
                <div class="produto-nome">
                    <?php echo $produtos['bugiganga']; ?> 
                    (<?php echo $produtos['qtd_bugiganga']; ?> unidade(s))
                </div>
                <div class="produto-preco"><?php echo formatar_preco($preco_bugiganga); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if (isset($produtos['brindes']) && !empty($produtos['brindes'])): ?>
            <div class="produto-item">
                <div class="produto-nome">
                    Brindes:
                    <?php
                    $brindes_nomes = [];
                    if (in_array('marcador_pagina', $produtos['brindes'])) {
                        $brindes_nomes[] = "Marcador de Página";
                    }
                    if (in_array('adesivo', $produtos['brindes'])) {
                        $brindes_nomes[] = "Adesivo Exclusivo";
                    }
                    if (in_array('embalagem_presente', $produtos['brindes'])) {
                        $brindes_nomes[] = "Embalagem para Presente";
                    }
                    echo implode(", ", $brindes_nomes);
                    ?>
                </div>
                <div class="produto-preco">Grátis</div>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="info-section">
            <div class="section-title">
                <i>💰</i> Resumo do Pagamento
            </div>
            
            <div class="resumo-item">
                <span>Subtotal dos produtos:</span>
                <span><?php echo formatar_preco($subtotal); ?></span>
            </div>
            
            <div class="resumo-item">
                <span>Frete (<?php 
                switch ($pagamento['frete']) {
                    case 'economico': echo 'Econômico'; break;
                    case 'padrao': echo 'Padrão'; break;
                    case 'expresso': echo 'Expresso'; break;
                }
                ?>):</span>
                <span><?php echo formatar_preco($preco_frete); ?></span>
            </div>
            
            <?php if ($pagamento['fpagto'] == 'avista'): ?>
            <div class="resumo-item">
                <span>Desconto pagamento à vista (9%):</span>
                <span>-<?php echo formatar_preco($subtotal * 0.09); ?></span>
            </div>
            <?php elseif ($pagamento['fpagto'] == 'aprazo'): ?>
            <div class="resumo-item">
                <span>Acréscimo pagamento a prazo (11%):</span>
                <span>+<?php echo formatar_preco($subtotal * 0.11); ?></span>
            </div>
            <?php elseif ($pagamento['fpagto'] == 'cartao'): ?>
            <div class="resumo-item">
                <span>Acréscimo cartão de crédito (15%):</span>
                <span>+<?php echo formatar_preco($subtotal * 0.15); ?></span>
            </div>
            <?php endif; ?>
            
            <div class="resumo-item">
                <span>Forma de pagamento:</span>
                <span>
                    <?php
                    switch ($pagamento['fpagto']) {
                        case 'avista': echo 'À vista'; break;
                        case 'aprazo': echo 'A prazo'; break;
                        case 'cartao': echo 'Cartão de crédito (' . $parcelas . 'x de ' . formatar_preco($valor_parcela) . ')'; break;
                    }
                    ?>
                </span>
            </div>
            
            <div class="resumo-total">
                <span>TOTAL:</span>
                <span><?php echo formatar_preco($total); ?></span>
            </div>
        </div>
        
        <div class="agradecimento">
            <h3>Obrigado pela sua compra!</h3>
            <p>Seu pedido foi processado com sucesso e em breve será enviado.</p>
        </div>
        
        <a href="Etapa - 1.php" class="btn-nova-venda">Nova Venda</a>
    </div>
</body>
</html>