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
  table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #333;
    margin-bottom: 20px;
  }
  
  th, td {
    padding: 10px;
    text-align: left;
  }
  
  th {
    background-color: #333;
    color: #fff;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  tr:hover {
    background-color: #ccc;
  }
  a.button {
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

a.button:hover {
  background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
}

</style>

<h1>Listagem dos Suportes</h1>

<a href="{{ route('supports.create') }}" class="button">Criar Nova Dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>
                    @if ($support->status == 'a')
                        <span style="color: red;">Aberto</span>
                    @elseif ($support->status == 'p')
                        <span style="color: orange;">Pendente</span>
                    @else
                        <span style="color: green;">Concluído</span>
                    @endif
                </td>
                <td>{{ $support->body }}</td>
                <td><a href="{{ route('supports.show', $support->id) }}">Ver tudo</a></td>
            </tr>
        @endforeach
    </tbody>
</table>