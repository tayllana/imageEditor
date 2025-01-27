<?php
include_once 'config/conexao.php';
$conn = conexao();
$dados = sanitize();

if (isset($dados["method"])) {
    switch ($dados["method"]) {
        case 'savePost':
            savePost();
            break;
        default:
            break;
    }
    echo $dados['id'];
}

function savePost() {
    global $conn, $dados;
    try {
        foreach ($_FILES as $inputName => $arquivo) {
            $file_name = $dados['id'] . "_$inputName.".pathinfo($arquivo["name"], PATHINFO_EXTENSION);
            $arquivo_destino = __DIR__ . "/arquivos/$file_name";
            $arquivo_type = $arquivo["type"];
            $arquivo_size = $arquivo["size"];

            if (move_uploaded_file($arquivo["tmp_name"], $arquivo_destino)) {
                $stmt = $conn->prepare(
                    "INSERT INTO arquivos (id_pessoa, nome, documento, caminho_arquivo, tipo_arquivo, tamanho_arquivo, data_upload) 
                     VALUES ('{$dados['id']}', '$file_name', '$inputName', 'arquivos', '$arquivo_type', '$arquivo_size', NOW())");
                if (!$stmt) {
                    die('Erro na preparação da declaração: ' . $conn->error);
                }
                $stmt->execute();
            } else {
                throw new Exception("Erro no upload do arquivo $file_name");
            }
        }
        return true;
    } catch (Exception $e) {
        echo "Erro ao inserir registro: " . $e->getMessage();
    }
}
function getPost($id) {
    global $conn;

    $stmt = $conn->prepare(
      "SELECT *
         FROM arquivos
        WHERE id_pessoa = $id"
    );
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function sanitize(){
    $filters = array(
        'method' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    return filter_var_array($_POST, $filters);
}
?>

