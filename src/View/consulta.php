<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de CPF</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/script.js"></script>
    <script src="js/principal.js"></script>
    <link href="css/estilo.css" rel="stylesheet" />
</head>
<body>
    <div class="container" id='principal'>
        <h2>Rastreamento de entregas</h2>
        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" onchange="validaCPF(this.value)" placeholder="Digite o CPF" maxlength="14" />
                </div>
            </div>
            <div class="col-4" style='padding-top:31px'>
                <button type="submit" onclick="consultarCPF()" class="btn btn-primary w-100 inputBtn" >Consultar</button>
            </div>
        </div>
        
        <div id="resultado" class="mt-3"></div>
    </div>
</body>
</html>

<!-- Adicione os arquivos JavaScript do Bootstrap e do jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
