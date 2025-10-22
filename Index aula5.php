<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página sobre Animes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header, footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        main {
            width: 90%;           /* quase toda largura da tela */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        h1, h2, h3 {
            text-align: center;
        }

        /* Centralizar e padronizar imagens */
        #anime-list table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        #anime-list td {
            padding: 10px;
            text-align: center;
        }

        .anime-img {
            width: 200px;      
            height: 300px;     
            object-fit: cover; 
            display: block;
            margin: 0 auto;    
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        p {
            margin-bottom: 15px;
            text-align: justify; /* deixa o texto distribuído em toda a largura */
        }

        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Explorando Mundos e Emoções Animadas</h1>
    </header>
    <main>
        <section id="intro">
            <h3>O Mundo dos Animes</h3>
            <p>Os animes são formas populares de entretenimento que transcendem fronteiras culturais e conquistam corações em todo o mundo. Com suas narrativas envolventes, personagens cativantes e estilos de animação únicos, os animes têm a capacidade de transportar os espectadores para mundos imaginários repletos de aventura, emoção e reflexão.</p>
            <p>Desde suas origens no Japão até sua influência global, os animes se transformaram em um fenômeno cultural que transcende fronteiras geográficas e gerações. O surgimento dos animes remonta ao início do século 20, com obras como "Astro Boy" que pavimentaram o caminho para o desenvolvimento desse estilo distintivo de animação. No entanto, foi nas décadas seguintes que os animes começaram a ganhar maior reconhecimento internacional. A popularidade de séries como "Dragon Ball", "Naruto" e "Sailor Moon" na década de 1990 ajudou a estabelecer uma base de fãs global e a despertar o interesse por essa forma de entretenimento. A internet e a disseminação de plataformas de streaming permitiram que pessoas ao redor do mundo tivessem acesso a uma vasta gama de animes, independentemente de sua localização geográfica.</p>
        </section>

        <section id="anime-list">
            <h2>Animes Populares</h2>
            <table>
                <tr>
                    <td><img src="samurai.jpg" alt="Anime 1" class="anime-img"></td>
                    <td><img src="kaiju.jpg" alt="Anime 2" class="anime-img"></td>
                    <td><img src="golden.jpg" alt="Anime 3" class="anime-img"></td>
                </tr>
            </table>
        </section>

        <section id="outro">
            <p>Se você também é um entusiasta de animes, veio ao lugar certo! Nossa página é um santuário virtual dedicado a todos os apaixonados por essa forma única de entretenimento. Aqui, mergulharemos juntos em um oceano de narrativas envolventes, personagens memoráveis e estilos de animação que vão despertar sua imaginação. Explore nossa coleção cuidadosamente selecionada de resenhas, recomendações e análises aprofundadas das séries e filmes de anime mais impactantes. Quer você seja um novato curioso ou um veterano experiente, estamos aqui para compartilhar nossa paixão e conhecimento sobre o universo dos animes.</p>
        </section>
    </main>
    <footer>
        <a href="aula 5 etapa2.php">Compra de Produtos</a>
    </footer>
</body>
</html>
