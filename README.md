# YoutubeList
O projeto se trata de um website para busca de vídeos no youtube.
<br>
## Objetivo
Consumir a <a href="https://developers.google.com/youtube/v3" target="_blank">Data API do youtube</a>.
<br>
## Funcionalidade
O usuário possui interação com o website através do campo de busca, no qual digitará o assunto e a escolherá a quantidade de vídeos que será renderizado. É realizada uma busca GET na <a href="https://developers.google.com/youtube/v3" target="_blank">Data API do youtube</a>, que retorna a lista em cards dos vídeos relacionados.
<br>
## Tecnologias
As tecnologias utilizadas no Frontend são HTML, CSS e a biblioteca CSS <a href="https://materializecss.com/" target="_blank">Materialize</a>.<br>
No Backend, para o consumo da API e renderização dos cards é utilizado o PHP.<br>
<br>
# Consumo da API
As informações completas e detalhads estão disponíveis na <a href="https://developers.google.com/youtube/v3/docs" target="_blank">documentação</a>.
## Passos
<ul>
  <li>Possuir conta no Google</li>
  <li>Gerar uma chave de API no <a href="https://code.google.com/apis/console/" target="_blank">console de api</a>
    <ul><li>Criar um Novo Projeto</li>
    <li>Uma nova notificação será gerada com a criação do projeto. Clicar no link 'Selecionar projeto'</li>
    <li>Escolher o link '+ Ativar APIs e Serviços'</li>
      <li>Procurar pela seção 'YouTube' e selcionar o card 'Youyube Data API v3'</li>
      <li>Clicar em 'Ativar'</li>
      <li>Na barra lateral, entrar em 'Credenciais'</li>
      <li>Selecionar '+ Criar Credenciais'</li>
      <li>Um menu dropdown será ativado com oções de <b>Chave de API</b>, <b>ID do cliente OAuth</b>, e <b>Ajude-me a escolher</b></li>
      <li>Para este projeto utilizamos somente a <b>Chave de API</b></li>
      <li>Copie a chave gerada</li>
    </ul>
  </li>
  <li>Com a chave em mãos, selecionar o tipo de recurso desejado.
    <ul><li>Para o projeto utilizamos o recurso <b>Search</b>, no qual o resultado da pesquisa contém informações sobre vídeo, canal ou playlist do YouTube</li></ul>
  </li>
  <li>Solicitação HTTP
    <ul><li>O GET é feito através da URL gerada: "https://youtube.googleapis.com/youtube/v3/search?key=[your_key]"</li>
      <li>Na documentação tem a lista de parâmetros que a consulta suporta, é possível através da URL solicitar somente os parâmetros desejados</li></ul></li>
</ul>
