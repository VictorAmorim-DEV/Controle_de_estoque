<div class="container mt-5 py-4 rounded col-md-8">
  <div class="card-header mb-2">
    <h3> Lista de produtos
      <a href="{{ url('produtos/adicionar') }}" class="btn btn-primary float-end">Adicionar produto</a>
    </h3>
  </div>
</div>
<div class="container mt-5 py-4 shadow-sm border rounded col-md-8">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome do produto</th>
        <th scope="col">Tipo de produto</th>
        <th scope="col">Valor do produto</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>33</td>
        <td>Antonio</td>
        <td>
          <a href="" class="btn btn-outline-primary">Editar</a>
          <form action="" method="POST" class="d-inline">
            <button type="button" class="btn btn-outline-danger">Excluir</button>
        </td>
      </tr>
      <!--
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
    -->
    </tbody>
  </table>
</div>