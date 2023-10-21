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
input[type="text"] {
    width: 30%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    font-size: 16px;
}

input[type="text"]:focus {
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
}
textarea {
  width: 30%;
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
  font-size: 16px;
}

textarea:focus {
  border-color: #007BFF;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
}
button[type="submit"] {
  padding: 10px 20px;
  background-color: #007BFF; /* Cor de fundo do botão de envio */
  color: #fff; /* Cor do texto do botão de envio */
  border: none;
  border-radius: 5px; /* Cantos arredondados */
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s; /* Transição suave de cor de fundo */
}

button[type="submit"]:hover {
  background-color: #0056b3; /* Cor de fundo do botão de envio ao passar o mouse */
}
/* Estiliza o elemento select */
select {
  width: 130px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  color: #333;
  outline: none;
  cursor: pointer;
}

/* Define um estilo para a seta suspensa do select */
select::-ms-expand {
  display: none;
}

/* Estiliza o select quando em foco */
select:focus {
  border-color: #007BFF;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
}

</style>

<h1>Nova dúvidas</h1>

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    @csrf
    <input type="text" placeholder="Digite o assunto aqui" name="subject">
    <div style="clear: both"></div>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <div style="clear: both"></div>
    <label for="status">Selecione o status:</label>
    <select id="status" name="status">
        <option value="a">Aberto</option>
        <option value="p">Pendente</option>
        <option value="c">Concluído</option>
    </select>
    <div style="clear: both"></div>
    <button type="submit">Enviar</button>
</form>