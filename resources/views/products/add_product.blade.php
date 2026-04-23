<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.header')
</head>

<body>
    <div class="container mt-5 py-4 shadow-sm border rounded col-md-6">
        <h2 class="mb-4">Cadastro de produto</h2>
        <form>
            <div class="form-group mb-4">
                <label for="product_name" class="h5">Produto</label>
                <input type="text" class="form-control" id="product_name" placeholder="Digite o nome do produto">
            </div>
            <div class="form-group mb-4">
                <label for="product_type" class="h5">Tipo de produto</label>
                <select class="form-control" id="product_type">
                    <option>Selecione</option>
                    <option value="alimento">Alimento</option>
                    <option value="bebida">Bebidas</option>
                    <option value="eletrodomestico">Eletrodomésticos</option>
                    <option value="eletronico">Eletrônicos</option>
                    <option value="higiene">Higiene e cuidados pessoais</option>
                    <option value="pet">Produtos para pets</option>
                    <option value="saude">Saúde e bem-estar</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="product_value" class="h5">Preço</label>
                <input type="number" class="form-control" id="product_value" name="product_value" step="0.01" placeholder="Digite o preço do produto">
            </div>
            <div class="form-group mb-4">
                <label class="h5">Fornecedores</label>
                <div class="border rounded p-3" style="background-color: #ffffff;">
                    @foreach($suppliers as $supplier)
                    <div class="form-check mb-2">
                        <input class="form-check-input position-static"
                            type="checkbox"
                            name="suppliers[]"
                            value="{{ $supplier->suppliers_id }}" aria-label="
                        id=" supplier_{{ $supplier->suppliers_id }}">
                        <label class="form-check-label fs-5 ms-2" for="supplier_{{ $supplier->suppliers_id }}">{{ $supplier->suppliers_name }}</label>
                    </div>
                    @endforeach
                </div>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>

</html>