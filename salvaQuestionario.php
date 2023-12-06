<?php

if (isset($_POST['botaoConfirmar'])) {
    session_start();
    extract($_POST);
    $servername = "servidor";
    $username = "a";
    $password = "";
    $dbname = "egressos";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "insert into egresso 
    (
        cpf, 
        nome, 
        email,
        telefone, 
        dataNascimento, 
        idade, 
        genero, 
        cor, 
        curso, 
        anoIngresso, 
        campus, 
        bolsa, 
        resumoBolsa, 
        atividadesExtracurriculares,
        atividadeRemunerada,
        cursoPosGraduacao,
        situacaoCursoPosGraduacao,
        posGraduacaoUfpa,
        inseridoNoMercado,
        tipoDeEmprego,
        tempoFormaturaEmprego,
        trabalhaNaAreaDeFormacao,
        faixaSalarial,
        relacaoCursoTrabalho,
        recebeuOrientacao,
        disciplinasForamUteis,
        estagioContribuiuEmprego,
        satisfacaoComCurso,
        resumoSatisfacaoComCurso,
        recomendaCurso,
        resumoRecomendacaoCurso,
        participaDeEventos,
        resumoEventosAtuais,
        participaDeProjeto,
        resumoProjetosAtuais,
        participaDeCurso,
        resumoCursosAtuais,
        resumoAtividadesInteresse,
        resumoSugestaoQuestionario
    ) values 
    (
        '" . $_SESSION['cpf'] . "', 
        '" . $_SESSION['nome'] . "', 
        '" . $email . "',
        '" . $telefone . "',
        '" . $_SESSION['dataNascimento'] . "', 
        '" . $_SESSION['idade'] . "', 
        '" . $genero . "',
        '" . $cor . "', 
        '" . $_SESSION['curso'] . "', 
        '" . $_SESSION['anoIngresso'] . "', 
        '" . $_SESSION['campus'] . "', 
        '" . $bolsa . "',
        '" . $resumoBolsa . "',
        '" . (
                (isset($iniciacaoCientifica) ? "Iniciação Científica; " : "")
                . (isset($monitoria) ? "Monitoria; " : "")
                . (isset($estagioNaoObrigatorio) ? "Estágio naõ obrigatório pertinente ao curso; " : "")
                . (isset($atividadeComunidade) ? "Atividade Curricular em Comunidade; " : "")
                . (isset($participouDeEventos) ? "Eventos: Congressos, Seminários e etc; " : "")
                . (isset($empresaJunior) ? "Empresa Júnior; " : "")
                . (isset($diretorioAcademico) ? "Diretório Acadêmico; " : "")
                . (isset($outrasAtividades) ? "Outras Atividades; " : "")
            ) . "',
        '" . $atividadeRemunerada . "',
        '" . $cursoPosGraduacao . "',
        '" . ($cursoPosGraduacao == "Nenhum" ? "" : $situacaoCursoPosGraduacao) . "',
        '" . ($cursoPosGraduacao == "Nenhum" ? "" : $posGraduacaoUfpa) . "',
        '" . $inseridoNoMercado . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $tipoDeEmprego) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $tempoFormaturaEmprego) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $trabalhaNaAreaDeFormacao) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $faixaSalarial) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $relacaoCursoTrabalho) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $recebeuOrientacao) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $disciplinasForamUteis) . "',
        '" . ($inseridoNoMercado == "Não" ? "" : $estagioContribuiuEmprego) . "',
        '" . $satisfacaoComCurso . "',
        '" . $resumoSatisfacaoComCurso . "',
        '" . $recomendaCurso . "',
        '" . $resumoRecomendacaoCurso . "',
        '" . $participaDeEventos . "',
        '" . ($participaDeEventos == "Não" ? "" : $resumoEventosAtuais) . "',
        '" . $participaDeProjeto . "',
        '" . ($participaDeProjeto == "Não" ? "" : $resumoProjetosAtuais) . "',
        '" . $participaDeCurso . "',
        '" . ($participaDeCurso == "Não" ? "" : $resumoCursosAtuais) . "',
        '" . $resumoAtividadesInteresse . "',
        '" . $resumoSugestaoQuestionario . "'
    );";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($conn->query($sql) === TRUE) {
        echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>