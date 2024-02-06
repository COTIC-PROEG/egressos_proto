<?php

if (isset($_POST['botaoConfirmar'])) {
    session_start();
    extract($_POST);
    //LOCALHOST
    $servername = "servidor";
    $username = "d";
    $password = "";
    $dbname = "egressos";
   
    //PRODUÇÃO
//     $servername = "localhost";
//     $username = "egressos";
//     $password = "Wt9ltlkqdody0yJ";
//     $dbname = "egressos";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
 
    
    $sql = "insert into egresso 
    (
        cpf, 
        nome, 
        email, 
        dataNascimento, 
        idade,
        faixaEtaria, 
        genero, 
        cor, 
        curso, 
        anoIngresso,
        anoFormatura,
        unidadeAcademica, 
        campus,
        formaIngresso,
        cota,
        bolsa, 
        tipoBolsa, 
        atividadesExtracurriculares,
        tipoAtividadeExtra,
        atividadeRemunerada,
        cursoPosGraduacao,
        posGraduacaoUfpa,
        inseridoNoMercado,
        tipoDeEmprego,
        tempoFormaturaEmprego,
        faixaSalarial,
        recebeuOrientacao,
        estagioContribuiuEmprego,
        resumoSituacaoProfissional,
        mobilidadeAcademica,
        satisfacaoComUFPA,
        satisfacaoCurso,
        melhorarApectos,
        outrosApectos,
        recomendacao,
        comentaRecomendacao,
        relacaoUfpa,
        utilidade,
        preparado,
        motivo,
        dataResposta
    ) values 
    (
        '" . $_SESSION['cpf'] . "', 
        '" . $_SESSION['nome'] . "', 
        '" . $email . "',
        '" . $_SESSION['dataNascimento'] . "', 
        '" . $_SESSION['idade'] . "',
        '" . $_SESSION['faixaEtaria'] . "',
        '" . $genero . "',
        '" . $_SESSION['cor'] . "', 
        '" . $_SESSION['curso'] . "', 
        '" . $_SESSION['anoIngresso'] . "',
        '" . $_SESSION['anoFormatura'] . "',
        '" . $_SESSION['unidadeAcademica'] . "',
        '" . $_SESSION['campus'] . "',
        '" . $_SESSION['formaIngresso'] . "',
        '" . $_SESSION['cota'] . "', 
        '" . $bolsa . "',
        '" . (
                (isset($iniciacaoCientifica) ? "Bolsa de Iniciação Científica; " : "")
                . (isset($extensao) ? "Bolsa de Extensão; " : "")
                . (isset($iniciacaoDocencia) ? "Bolsa de Iniciação à Docência; " : "")
                . (isset($residenciaPedagogica) ? "Residência Pedagógica; " : "")
                . (isset($pet) ? "PET; " : "")
                . (isset($monitoria) ? "Monitoria; " : "")
                . (isset($tutoria) ? "Tutoria; " : "")
                . (isset($assitenciaEstudantil) ? "Bolsa de assistência estudantil (auxílio moradia, permanência, etc); " : "")
                . (isset($bolsaEstagio) ? "Bolsa de estágio; " : "")
                . (isset($outras) ? "Outras bolsas; " : "")
            ) . "',
        '" . $atividadeExtracurriculares . "',
        '" . (
                (isset($iniciacaoCientifica2) ? "Iniciação Científica; " : "")
                . (isset($monitoria2) ? "Monitoria; " : "")
                . (isset($pet2) ? "PET; " : "")
                . (isset($pibid2) ? "PIBID; " : "")
                . (isset($pibex2) ? "PIBEX; " : "")
                . (isset($residenciaPedagogica2) ? "Residência Pedagógica; " : "")
                . (isset($estagioNaoObrigatorio2) ? "Estágio Não Obrigatório pertinente ao curso; " : "")
                . (isset($atividadeComunidade2) ? "Atividade Curricular em Comunidade; " : "")
                . (isset($participouDeEventos2) ? "Eventos: Congressos, Seminários, etc; " : "")
                . (isset($empresaJunior2) ? "Empresa Júnior; " : "")
                . (isset($diretorioAcademico2) ? "Diretório Acadêmico; " : "")
                . (isset($outrasAtividades2) ? "Outras Atividades; " : "")
            ) . "',
        
        '" . $atividadeRemunerada . "',
        '" . $cursoPosGraduacao . "',
        '" . ($cursoPosGraduacao == "Nenhum" ? "" : $posGraduacaoUfpa) . "',
        '" . $inseridoNoMercado . "',
        '" . ($inseridoNoMercado == "Não, e nunca exerci" ? "" : $tipoDeEmprego) . "',
        '" . ($inseridoNoMercado == "Não, e nunca exerci" ? "" : $tempoFormaturaEmprego) . "',
        '" . ($inseridoNoMercado == "Não, e nunca exerci" ? "" : $faixaSalarial) . "',
        '" . ($inseridoNoMercado == "Não, e nunca exerci" ? "" : $recebeuOrientacao) . "',
        '" . ($inseridoNoMercado == "Não, e nunca exerci" ? "" : $estagioContribuiuEmprego) . "',
        '" . $resumoSituacaoProfissional . "',    
        '" . $mobilidadeAcademica . "',
        '" . $satisfacaoComUFPA . "',
        '" . $satisfacaoCurso . "',
        '" . (
              (isset($melhorarAspectos1) ? "Recursos didáticos-pedagógico; " : "")
            . (isset($melhorarAspectos2) ? "Conteúdos Curriculares; " : "")
            . (isset($melhorarAspectos3) ? "Metodologia de Ensino; " : "")
            . (isset($melhorarAspectos4) ? "Atualização do acervo da biblioteca; " : "")
            . (isset($melhorarAspectos5) ? "Carga horária do curso; " : "")
            . (isset($melhorarAspectos6) ? "Qualidade do corpo docente; " : "")
            . (isset($melhorarAspectos7) ? "Espaço Físico; " : "")
            . (isset($melhorarAspectos8) ? "Recursos audiovisuais e tecnológicos; " : "")
            . (isset($melhorarAspectos9) ? "Laboratórios de ensino; " : "")
            . (isset($melhorarAspectos10) ? "Melhor preparação para o mundo do trabalho; " : "")
            . (isset($melhorarAspectos11) ? "Outros; " : "")
            ) . "',
        '" . $outrosApectos . "',
        '" . $recomendacao . "',
        '" . $comentaRecomendacao . "',
        '" . $relacaoUfpa . "',
        '" . $utilidade . "',
        '" . $preparado . "',
        '" . $motivo . "',
        '" . $_SESSION['dataResposta'] . "'        
    );";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

//     if ($conn->query($sql) === TRUE) {
//         echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
//         die();
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    
//     if ($conn->query($sql) === TRUE) {
//         echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
//         die();
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    if ($conn->query($sql) === TRUE) {
        $successMessage = "Dados salvos com sucesso!";
        echo "<script>alert('$successMessage');</script>";
        echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
        die();
    } else {
        $errorMessage = "Erro ao salvar dados: " . $conn->error;
        echo "<script>alert('$errorMessage');</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}

?>