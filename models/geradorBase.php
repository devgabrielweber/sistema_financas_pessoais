<?php
class geradorBase
{
    private $html = "";

    public function __construct()
    {
        $this->html = "<!DOCTYPE html> <html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tela de Cadastro</title>
    <style>
        /* Reset básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    height: 100vh;
    max-height: 100vh;
}

/* Menu lateral */
.sidebar {
     width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: fixed;
    height: 100vh;
}

.sidebar h2 {
    margin-bottom: 20px;
}

.sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.sidebar ul li {
    margin: 0;
}

.sidebar ul li:first-child {
    margin-top: 15px;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
}

/* Área principal */
.main-content {
    margin-left: 250px;
    flex-grow: 1;
    padding: 20px;
    background-color: #ecf0f1;
    display: flex;
    flex-direction: column;
}

.titulo {
    display: flex;
    flex-direction: row;
    padding: 5px;
}

.titulo h1{
    padding: 5px;
}

/* Tabela */
.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
}

th {
    background-color: #2c3e50;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

/* Botões de Ação */
.action-button {
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 2px;
}

.action-button.grid{
    padding: 5px;
}

.action-button:hover {
    background-color: #2980b9;
}

.action-button.salvar {
    background-color: #2ecc71;
}

.action-button.salvar:hover {
    background-color: #27ae60;
}

.action-button.fechar {
    background-color: #e74c3c;
}

.action-button.fechar:hover {
    background-color: #c0392b;
}

/* Botões do Header */
.header-buttons {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
    margin-bottom: 20px;
}

.header-buttons button {
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
}

/* Formulário */
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    display: flex;
    margin-bottom: 15px;
}

.form-group label {
    width: 200px;
    font-weight: bold;
    display: flex;
    align-items: center;
}

.form-group input,
.form-group select {
    flex-grow: 1;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-group input[type='radio'] {
    width: auto;
}

.form-group select {
    height: 35px;
}

.form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

.form-footer button {
    margin-left: 10px;
}

/* Estilos do menu lateral (botões) */
.menu-item {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.menu-item:hover {
    background-color: #34495e;
}

.menu-item span {
    margin-left: 10px;
    font-size: 16px;
}

/* Botões do menu lateral */
.menu-item {
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.menu-item:hover {
    background-color: #2980b9;
}

/* Estilos do formulário no corpo */
.form-group input,
.form-group select,
.form-group textarea {
    flex-grow: 1;
    padding: 8px; /* Espaçamento interno */
    font-size: 16px; /* Tamanho da fonte */
    border: 1px solid #ccc; /* Cor da borda */
    border-radius: 5px; /* Bordas arredondadas */
    box-shadow: none; /* Remover sombras */
    outline: none; /* Remover borda azul padrão ao focar */
    transition: border-color 0.3s, box-shadow 0.3s; /* Transição suave */
}

textarea {
    resize: vertical;
}

/* Botões de ação no corpo (salvar, fechar) */
.header-buttons button {
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
}

.header-buttons button:hover {
    background-color: #2980b9;
}
    </style>
</head>";
    }

    public function geraSidebar($parametros)
    {
        $this->html .= "<body>
        <div class='sidebar'>
            <h2>Menu</h2>";

        foreach ($parametros['menu'] as $item => $parametro) {
            // Corrigindo a sintaxe do 'onclick' para garantir que as aspas não se sobreponham
            $this->html .= "<button class='menu-item' onclick=\"redirecionar('" . $parametro['rota'] . "')\"><span>" . $item . "</span></button>";
        }

        $this->html .= "</div>";
    }

    public function geraForm($parametros)
    {
        $this->html .= "<div class='main-content'>
                <div class='titulo'>
                    <h1>" . $parametros['titulo'] . "</h1>
                </div>
            <div class='header-buttons'>";
        foreach ($parametros['botoes'] as $botao => $parametro) {
            if ($parametro['tipo'] == "fechar") {
                $this->html .= "<div><button onclick=\"redirecionar('" . $parametro['rota'] . "')\">" . $botao . "</button></div>";
            } elseif ($parametro['tipo'] == "salvar") {
                $this->html .= "<button type='submit' form='formCadastro' >" . $botao . "</button>";
            } else {
                $this->html .= "<button onclick=\"redirecionar('" . $parametro['rota'] . "')\">" . $botao . "</button>";
            }
        }

        $this->html .= " </div> <div class='form-container'>
            <form id='formCadastro' method='POST'>";

        foreach ($parametros['campos'] as $campo => $parametro) {
            $this->html .= "<div class='form-group'>";

            if ($campo == 'id') {
                $this->html .= "<input type='hidden' name='id' value='" . $parametro['valor'] . "'>
                <label for='" . $campo . "'>" . ucfirst($campo) . "</label>
                <input type='text' name='id' value='" . $parametro['valor'] . "' disabled>";
            } elseif ($campo == 'rota') {
                $this->html .= "<input type='hidden' name='rota' value='" . $parametro['valor'] . "'>";
            } else {
                switch ($parametro['tipo']) {
                    case 'text':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='text' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'email':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='email' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'password':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='password' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'date':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='date' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'number':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='number' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "' step='" . (isset($parametro['step']) ? $parametro['step'] : '') . "'>";
                        break;

                    case 'tel':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='tel' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'checkbox':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='checkbox' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'radio':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='radio' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;

                    case 'select':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <select id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>";
                        foreach ($parametro['opcoes'] as $opcao => $parametro) {
                            $this->html .= "<option value='" . $parametro['id'] . "'" . ($parametro['selecionado'] == true ? 'selected' : '') . ">" . $opcao . "</option>";
                        }
                        $this->html .= "</select>";
                        break;

                    case 'textarea':
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <textarea id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . $parametro['valor'] . "</textarea>";
                        break;

                    default:
                        $this->html .= "
                    <label for='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "'>" . ucfirst($campo) . "</label>
                    <input type='text' id='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' name='" . (isset($parametro['nome_input']) ? $parametro['nome_input'] : $campo) . "' value='" . $parametro['valor'] . "'>";
                        break;
                }
            }
            $this->html .= "</div>";
        }

        $this->html .= "</form></div></div></body></html>";
        return $this->html;
    }

    public function geraGrid($parametros)
    {

        $this->html .= "";

        $this->html .= "
            <div class='main-content'>
                <div class='titulo'>
                    <h1>" . $parametros['titulo'] . "</h1>
                </div>
                <div class='header-buttons'>";
        foreach ($parametros['botoes'] as $botao => $rota) {
            $this->html .= "<div><button onclick=\"redirecionar('" . $rota . "')\">" . ucfirst($botao) . "</button></div>";
        }
        $this->html .= "        
        </div><div class=\"table-container\">
            <table>
                <thead>
                    <tr>";

        foreach ($parametros['dados'][0] as $coluna => $valor) {
            $this->html .= "<th>" . ucfirst($coluna) . "</th>";
        }
        $this->html .= "<th>Ações</th>";

        $this->html .= "
                    </tr>
                </thead>
                <tbody>
        ";
        foreach ($parametros['dados'] as $linha) {
            $this->html .= "<tr>";
            foreach ($linha as $coluna => $valor) {
                $this->html .= "
                    <td>" . $valor . "</td>
                ";
            }

            $this->html .= "<td>";
            foreach ($parametros['acoes'] as $acao => $rota) {
                $this->html .= "<button class='action-button grid' onclick=\"redirecionar('" . $rota . "'," . $linha['id'] . ")\">" . ucfirst($acao) . "</button>";

            }
            $this->html .= "</td>";
            $this->html .= "</tr>";
        }
        $this->html .= "</tbody>
                    </div>
                </div>
            </body>
            </html>";

        return $this->html;
    }
}
?>