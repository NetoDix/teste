<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos - Etapa 2</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
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
        
        .form-title {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 24px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .produto-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 6px;
            border-left: 4px solid #3498db;
        }
        
        .produto-title {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .produto-title i {
            margin-right: 10px;
            color: #3498db;
        }
        
        .produto-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            align-items: center;
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
        
        .radio-group, .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
        }
        
        .radio-option, .checkbox-option {
            display: flex;
            align-items: center;
            gap: 10px;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .preco {
            color: #27ae60;
            font-weight: 600;
            margin-left: 5px;
        }
        
        @media (max-width: 768px) {
            .produto-grid {
                grid-template-columns: 1fr;
            }
            
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
            <div class="etapa-info">Etapa 2 de 3</div>
        </div>
        
        <h1 class="form-title">Selecione seus Produtos</h1>
        
        <div id="mensagem-erro" class="error" style="display: none;"></div>
        
        <form method="POST" action="processa_etapa2.php">
            <div class="produto-section">
                <div class="produto-title">
                    <i>📖</i> Livros
                </div>
                <div class="produto-grid">
                    <div class="form-group">
                        <label for="livro">Selecione um livro:</label>
                        <select id="livro" name="livro">
                            <option value="nenhum">Selecione um livro...</option>
                            <option value="Retorno de um herói esquecido">Retorno de um herói esquecido <span class="preco">(R$ 30,00)</span></option>
                            <option value="Como criar plantas carnívoras">Como criar plantas carnívoras <span class="preco">(R$ 20,00)</span></option>
                            <option value="As fórmulas do amor">As fórmulas do amor <span class="preco">(R$ 30,00)</span></option>
                            <option value="Revoluções pelo mundo">Revoluções pelo mundo <span class="preco">(R$ 35,00)</span></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="qtd_livro">Quantidade:</label>
                        <select id="qtd_livro" name="qtd_livro">
                            <option value="1">1 unidade</option>
                            <option value="2">2 unidades</option>
                            <option value="3">3 unidades</option>
                            <option value="4">4 unidades</option>
                        </select>
                    </div>
                </div>
                
                <div id="opcoes-capa" class="form-group" style="display: none;">
                    <label>Tipo de Capa:</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="capa_dura" name="tipo_capa" value="dura">
                            <label for="capa_dura">Capa Dura <span class="preco">(R$ 5,00 adicional)</span></label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="capa_normal" name="tipo_capa" value="normal" checked>
                            <label for="capa_normal">Capa Normal <span class="preco">(Grátis)</span></label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="produto-section">
                <div class="produto-title">
                    <i>🎵</i> Álbuns Musicais
                </div>
                <div class="produto-grid">
                    <div class="form-group">
                        <label for="album">Selecione um álbum:</label>
                        <select id="album" name="album">
                            <option value="nenhum">Selecione um álbum...</option>
                            <option value="Thriller">Thriller <span class="preco">(R$ 30,00)</span></option>
                            <option value="Back in Black">Back in Black <span class="preco">(R$ 25,00)</span></option>
                            <option value="The Dark Side of the Moon">The Dark Side of the Moon <span class="preco">(R$ 30,00)</span></option>
                            <option value="Bat Out of Hell">Bat Out of Hell <span class="preco">(R$ 20,00)</span></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="qtd_album">Quantidade:</label>
                        <select id="qtd_album" name="qtd_album">
                            <option value="1">1 unidade</option>
                            <option value="2">2 unidades</option>
                            <option value="3">3 unidades</option>
                            <option value="4">4 unidades</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="produto-section">
                <div class="produto-title">
                    <i>🎁</i> Bugigangas
                </div>
                <div class="produto-grid">
                    <div class="form-group">
                        <label for="bugiganga">Selecione uma bugiganga:</label>
                        <select id="bugiganga" name="bugiganga">
                            <option value="nenhum">Selecione uma bugiganga...</option>
                            <option value="Abridor de Cartas">Abridor de Cartas <span class="preco">(R$ 10,00)</span></option>
                            <option value="Imã de Clipes">Imã de Clipes <span class="preco">(R$ 5,00)</span></option>
                            <option value="Capinha de Nokia Tijolo">Capinha de Nokia Tijolo <span class="preco">(R$ 10,00)</span></option>
                            <option value="Porta Canetas do Garfield">Porta Canetas do Garfield <span class="preco">(R$ 20,00)</span></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="qtd_bugiganga">Quantidade:</label>
                        <select id="qtd_bugiganga" name="qtd_bugiganga">
                            <option value="1">1 unidade</option>
                            <option value="2">2 unidades</option>
                            <option value="3">3 unidades</option>
                            <option value="4">4 unidades</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="produto-section">
                <div class="produto-title">
                    <i>🎀</i> Brindes Adicionais
                </div>
                <div class="checkbox-group">
                    <div class="checkbox-option">
                        <input type="checkbox" id="marcador_pagina" name="brindes[]" value="marcador_pagina">
                        <label for="marcador_pagina">Marcador de Página Personalizado</label>
                    </div>
                    <div class="checkbox-option">
                        <input type="checkbox" id="adesivo" name="brindes[]" value="adesivo">
                        <label for="adesivo">Adesivo Exclusivo do nosso Mascote</label>
                    </div>
                    <div class="checkbox-option">
                        <input type="checkbox" id="embalagem_presente" name="brindes[]" value="embalagem_presente">
                        <label for="embalagem_presente">Embalagem para Presente</label>
                    </div>
                </div>
            </div>
            
            <div class="botoes">
                <a href="Aula 5 etapa2.php" class="btn btn-voltar">← Voltar</a>
                <a href="aula 5 etapa4.php" type="submit" class="btn btn-avancar">Avançar →</button>
            </div>
        </form>
    </div>

    <script>
        // Mostrar/ocultar opções de capa baseado na seleção de livro
        document.getElementById('livro').addEventListener('change', function() {
            const capaSection = document.getElementById('opcoes-capa');
            
            if (this.value !== 'nenhum') {
                capaSection.style.display = 'block';
            } else {
                capaSection.style.display = 'none';
            }
        });

        // Validação do formulário
        document.querySelector('form').addEventListener('submit', function(e) {
            const livro = document.getElementById('livro').value;
            const album = document.getElementById('album').value;
            const bugiganga = document.getElementById('bugiganga').value;
            const mensagemErro = document.getElementById('mensagem-erro');
            
            if (livro === 'nenhum' && album === 'nenhum' && bugiganga === 'nenhum') {
                e.preventDefault();
                mensagemErro.textContent = 'Você precisa selecionar pelo menos um produto!';
                mensagemErro.style.display = 'block';
                
                // Rolar para a mensagem de erro
                mensagemErro.scrollIntoView({ behavior: 'smooth' });
            } else {
                mensagemErro.style.display = 'none';
            }
            
            // Validar tipo de capa se livro foi selecionado
            if (livro !== 'nenhum') {
                const tipoCapaSelecionado = document.querySelector('input[name="tipo_capa"]:checked');
                if (!tipoCapaSelecionado) {
                    e.preventDefault();
                    mensagemErro.textContent = 'Por favor, selecione um tipo de capa para o livro!';
                    mensagemErro.style.display = 'block';
                    mensagemErro.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    </script>
</body>
</html>