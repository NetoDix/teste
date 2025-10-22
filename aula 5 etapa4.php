<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento e Entrega - Etapa Final</title>
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
            max-width: 800px;
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
        
        .form-title {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 24px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .form-section {
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
        
        .opcoes-group {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .opcao {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .opcao:hover {
            border-color: #3498db;
            background: #e8f4fd;
        }
        
        .opcao input[type="radio"] {
            margin-right: 12px;
        }
        
        .opcao-detalhes {
            flex-grow: 1;
        }
        
        .opcao-titulo {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .opcao-descricao {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .opcao-preco {
            color: #27ae60;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }
        
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: block;
            padding: 10px;
            background: #ffeaea;
            border-radius: 4px;
            border-left: 4px solid #e74c3c;
        }
        
        .botoes {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-voltar {
            background: #95a5a6;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-voltar:hover {
            background: #7f8c8d;
        }
        
        .btn-avancar {
            background: #3498db;
            color: white;
        }
        
        .btn-avancar:hover {
            background: #2980b9;
        }
        
        .parcelamento {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: #e8f4fd;
            border-radius: 6px;
            border-left: 4px solid #3498db;
        }
        
        @media (max-width: 768px) {
            .botoes {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="titulo-loja">📚 Venda de Animes</div>
            <div class="etapa-info">Etapa 4 de 4</div>
        </div>
        
        <div class="progresso">
            <div class="etapa">
                <div class="bolha">1</div>
                <div>Dados Pessoais</div>
            </div>
            <div class="etapa">
                <div class="bolha">2</div>
                <div>Produtos</div>
            </div>
            <div class="etapa">
                <div class="bolha ativa">3</div>
                <div>Pagamento</div>
            </div>
            <div class="etapa">
                <div class="bolha">4</div>
                <div>Confirmação</div>
            </div>
        </div>
        
        <h1 class="form-title">Pagamento e Entrega</h1>
        
        <form id="form-pagamento" action="javascript:void(0);">
            <div class="form-section">
                <div class="section-title">
                    <i>💳</i> Forma de Pagamento
                </div>
                
                <div class="opcoes-group">
                    <label class="opcao">
                        <input type="radio" name="fpagto" value="avista">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">À Vista <span class="opcao-preco">(9% de desconto)</span></div>
                            <div class="opcao-descricao">Pagamento com dinheiro, PIX ou transferência bancária</div>
                        </div>
                    </label>
                    
                    <label class="opcao">
                        <input type="radio" name="fpagto" value="aprazo">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">À Prazo <span class="opcao-preco">(11% de acréscimo)</span></div>
                            <div class="opcao-descricao">Pagamento em 30, 60 ou 90 dias</div>
                        </div>
                    </label>
                    
                    <label class="opcao">
                        <input type="radio" name="fpagto" value="cartao" id="cartao">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">Cartão de Crédito <span class="opcao-preco">(15% de acréscimo)</span></div>
                            <div class="opcao-descricao">Parcele em até 12x no cartão</div>
                        </div>
                    </label>
                </div>
                
                <div id="erro-pagto" class="error" style="display: none;"></div>
                
                <div id="parcelamento" class="parcelamento">
                    <label for="parcelas">Parcelamento:</label>
                    <select id="parcelas" name="parcelas">
                        <option value="1">1x</option>
                        <option value="2">2x</option>
                        <option value="3">3x</option>
                        <option value="4">4x</option>
                        <option value="5">5x</option>
                        <option value="6">6x</option>
                    </select>
                </div>
            </div>
            
            <div class="form-section">
                <div class="section-title">
                    <i>🚚</i> Opções de Frete
                </div>
                
                <div class="opcoes-group">
                    <label class="opcao">
                        <input type="radio" name="frete" value="economico">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">Econômico <span class="opcao-preco">(R$ 15,00)</span></div>
                            <div class="opcao-descricao">Entrega em até 10 dias úteis</div>
                        </div>
                    </label>
                    
                    <label class="opcao">
                        <input type="radio" name="frete" value="padrao">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">Padrão <span class="opcao-preco">(R$ 25,00)</span></div>
                            <div class="opcao-descricao">Entrega em até 5 dias úteis</div>
                        </div>
                    </label>
                    
                    <label class="opcao">
                        <input type="radio" name="frete" value="expresso">
                        <div class="opcao-detalhes">
                            <div class="opcao-titulo">Expresso <span class="opcao-preco">(R$ 40,00)</span></div>
                            <div class="opcao-descricao">Entrega em até 2 dias úteis</div>
                        </div>
                    </label>
                </div>
                
                <div id="erro-frete" class="error" style="display: none;"></div>
            </div>
            
            <div class="botoes">
                <a href="Aula 5 etapa3.php" class="btn btn-voltar">← Voltar</a>
                <a href="Aula 5 confirmação.php" type="submit" class="btn btn-avancar">Finalizar Compra →</button>
            </div>
        </form>
    </div>

    <script>
        // Mostrar/ocultar opções de parcelamento
        document.querySelectorAll('input[name="fpagto"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const parcelamento = document.getElementById('parcelamento');
                if (this.value === 'cartao') {
                    parcelamento.style.display = 'block';
                } else {
                    parcelamento.style.display = 'none';
                }
            });
        });

        // Validação do formulário
        document.getElementById('form-pagamento').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validar forma de pagamento
            const fpagtoSelecionado = document.querySelector('input[name="fpagto"]:checked');
            const erroPagto = document.getElementById('erro-pagto');
            
            if (!fpagtoSelecionado) {
                erroPagto.textContent = 'Selecione uma forma de pagamento';
                erroPagto.style.display = 'block';
                isValid = false;
            } else {
                erroPagto.style.display = 'none';
            }
            
            // Validar frete
            const freteSelecionado = document.querySelector('input[name="frete"]:checked');
            const erroFrete = document.getElementById('erro-frete');
            
            if (!freteSelecionado) {
                erroFrete.textContent = 'Selecione uma opção de frete';
                erroFrete.style.display = 'block';
                isValid = false;
            } else {
                erroFrete.style.display = 'none';
            }
            
            // Se o formulário for válido, prosseguir
            if (isValid) {
                alert('Formulário validado com sucesso! Em uma implementação real, os dados seriam enviados para o servidor.');
                // Em uma implementação real, aqui você enviaria os dados para o servidor
                // window.location.href = 'confirma.html';
            }
        });

        // Inicializar estado do parcelamento
        document.addEventListener('DOMContentLoaded', function() {
            const cartao = document.getElementById('cartao');
            const parcelamento = document.getElementById('parcelamento');
            
            if (cartao.checked) {
                parcelamento.style.display = 'block';
            }
        });
    </script>
</body>
</html>