<style>
    h1 {
    font-size: 2.5em; /* Tamanho da fonte */
    font-weight: bold; /* Peso da fonte (negrito) */
    text-align: center; /* Alinhamento de texto (centralizado) */
    color: #333; /* Cor do texto */
    text-transform: uppercase; /* Transformação de texto em maiúsculas */
    letter-spacing: 4px; /* Espaçamento entre letras */
    margin: 20px 0; /* Espaçamento nas margens superior e inferior */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra de texto */
    background-color: #f7f7f7; /* Cor de fundo */
    padding: 10px; /* Preenchimento interno */
    border: 2px solid #999; /* Borda */
    border-radius: 10px; /* Cantos arredondados */
  }
/* Estilo para a lista não ordenada (<ul>) */
    ul.my-list {
  list-style: none; /* Remove os marcadores padrão */
  padding: 0;
  margin: 0;
}

/* Estilo para os itens de lista (<li>) */
ul.my-list li {
  margin: 10px 0; /* Espaçamento vertical entre os itens da lista */
}

/* Estilo para os rótulos (<span> dentro dos <li>) */
ul.my-list li span.label {
  font-weight: bold;
  color: #007BFF; /* Cor do rótulo */
  display: inline-block;
  width: 100px; /* Largura do rótulo */
  text-align: right;
  margin-right: 10px; /* Espaço entre o rótulo e o texto */
}

/* Estilo para o texto associado (<span> dentro dos <li>) */
ul.my-list li span.text {
  color: #333; /* Cor do texto associado */
}
button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF; /* Cor de fundo do botão */
    color: #fff; /* Cor do texto do botão */
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 5px; /* Cantos arredondados */
    cursor: pointer;
    transition: background-color 0.3s; /* Transição suave de cor de fundo */
    margin-bottom: 20px;
  }

button:hover {
  background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
}

</style>
<h1>Detalhes da dúvida ID:{{ $support->id }}</h1>

<ul class="my-list">
    <li><span class="label">Assunto:</span> <span class="text">{{ $support->subject }}</span></li>
    <li><span class="label">Status:</span> <span class="text">{{ $support->status }}</span></li>
    <li><span class="label">Descrição:</span> <span class="text">{{ $support->body }}</span></li>
</ul>

<form action="{{ route('supports.destroy', $support->id )}}" method="post">
  @csrf
  @method('DELETE')
  <button type="submit">Apagar</button>
</form>