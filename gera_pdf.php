<?php 
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

//session_start();

$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

// Incluindo o autoload do DOM PDF
require_once 'dompdf/autoload.inc.php';

require "db/configProgastro.php"; 

//Criando a instancia do Dom PDF.
//Criando o namespace para evitar erros
use Dompdf\Dompdf;

// Instanciando a classe do Dom DPF
$dompdf = new Dompdf();

/*session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];*/



$html= "<html>
<style>

body{font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:10px}
.text-center{text-align: center}

   
.border{border: 1px solid #000}

.titulo{font-size:18px; background-color: #6d6d6d; 
    padding: 5px 0; text-align: center; color:#ccc}
.content{padding: 0 20px;}

table{
    width:100%;
    table-layout:fixed;   
    border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

td {
   padding:5px
}


</style>";

$html .= "
<table style='margin-top:-20px; margin-bottom:20px; border:none !important' >
  <tbody>
    <tr style='border:none !important'>
        <td width='10%' style='border:none !important' >                
        <img src='http://localhost/sae_sollen/img/logo_sollen.png' width='70px' >
        </td>
        <td width='90%' style='border:none !important'>
        <div><h1 style='text-align:center; margin-right:50px'>SOLLEN</h1></div>
        </td>
    </tr>
  </tbody>
</table>";


/*Dados pessoais*/
$result = "SELECT * FROM sae_paciente WHERE cod_pac = $cod_pac AND num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
  $html .= "   
    <strong>Atendimento:</strong> $item->num_atd <br>
    <strong>Nome:</strong> $item->nome <br>
    <strong>Codigo do Paciente:</strong> $item->cod_pac <br>
    <strong>Idade:</strong> $item->idade anos <br>
    <strong>Exame:</strong> $item->exames <br> 
    <strong>Convênio:</strong> $item->convenio <br />
    <br />
    ";
}

/*Histórico Enfermagem*/
$result1 = "SELECT * FROM sae_enfermagem WHERE cod_pac = $cod_pac AND num_atd = $num_atd";

$sth3 = $dbo->prepare($result1);
$sth3->execute();
$dados1 = $sth3->fetchAll(PDO::FETCH_OBJ);

foreach ($dados1 as $item1) {
  if ($item1->historico == 1) {
    $historico = 'Internado';
  }
  if ($item1->historico == 2) {
    $historico = 'Ambulatorial';
  }

  $alergia          =  $item1->alergia;
  $alergia_desc     =  $item1->alergia_desc;
  $dor              =  $item1->dor;
  $dor_desc         =  $item1->dor_desc;
  $medicamento      =  $item1->medicamento;
  $medicamento_desc =  $item1->medicamento_desc;
  $fuma             =  $item1->fuma;
  $bebidas          =  $item1->bebidas;
  $cardiaco         =  $item1->cardiaco;
  $pulmonares       =  $item1->pulmonares;
  $andar            =  $item1->andar;
  $assinatura1        = $item1->assinatura;
}

/*Diagnostico*/

$result2 = "SELECT * FROM sae_diagnostico WHERE num_atd = $num_atd";

$sth4 = $dbo->prepare($result2);
$sth4->execute();
$dados2 = $sth4->fetchAll(PDO::FETCH_OBJ);

foreach ($dados2 as $item2) {
  $risco_hipoglicemia     = $item2->risco_hipoglicemia;
  $risco_desequilibrio    = $item2->risco_desequilibrio;
  $diarreia               = $item2->diarreia;
  $risco_sangramento      = $item2->risco_sangramento;
  $confusao               = $item2->confusao;
  $comunicacao_verbal     = $item2->comunicacao_verbal;
  $risco_infeccao         = $item2->risco_infeccao;
  $risco_quedas           = $item2->risco_quedas;
  $dor                    = $item2->dor;
  $nutricao_alterada      = $item2->nutricao_alterada;
  $padrao_respiratorio    = $item2->padrao_respiratorio;
  $mobilidade_fisica      = $item2->mobilidade_fisica;
  $assinatura2             = $item2->assinatura;
}

/*Pre atendimento*/
$result3 = "SELECT * FROM sae_pre_atendimento WHERE num_atd = $num_atd";

$sth3 = $dbo->prepare($result3);
$sth3->execute();
$dados3 = $sth3->fetchAll(PDO::FETCH_OBJ);

foreach ($dados3 as $item3) {
  $acomodar_paciente       = $item3->acomodar_paciente;
  $manter_cabeceira        = $item3->manter_cabeceira;
  $puncionar_acesso        = $item3->puncionar_acesso;
  $retirar_proteses        = $item3->retirar_proteses;
  $verificar_sinais        = $item3->verificar_sinais;
  $elevar_grades           = $item3->elevar_grades;
  $transportar_paciente    = $item3->transportar_paciente;
  $hora_preparo            = $item3->hora_preparo;
  $pre_pa1                 = $item3->pre_pa1;
  $pre_pa2                 = $item3->pre_pa2;
  $pre_fc                  = $item3->pre_fc;
  $pre_fr                  = $item3->pre_fr;
  $pre_sat02               = $item3->pre_sat02;
  $assinatura3              = $item3->assinatura;
}

/*Sala de Exames*/

$result4 = "SELECT * FROM sae_exames WHERE num_atd = $num_atd";

$sth4 = $dbo->prepare($result4);
$sth4->execute();
$dados4 = $sth4->fetchAll(PDO::FETCH_OBJ);

foreach ($dados4 as $item4) {
  $posicionar_pacientes       = $item4->posicionar_pacientes;
  $instalar_oximetria         = $item4->instalar_oximetria;
  $instalar_o2                = $item4->instalar_o2;
  $administrar_medicamentos   = $item4->administrar_medicamentos;
  $verificar_sinais           = $item4->verificar_sinais;
  $encaminhar_paciente        = $item4->encaminhar_paciente;
  $inicio_exame               = $item4->inicio_exame;
  $termino_exame              = $item4->termino_exame;
  $exame_pa1                  = $item4->exame_pa1;
  $exame_pa2                  = $item4->exame_pa2;
  $exame_fc                   = $item4->exame_fc;
  $exame_fr                   = $item4->exame_fr;
  $exame_sat02                = $item4->exame_sat02;
  $assinatura4                 = $item4->assinatura;
}

/*Recuperação*/
$result5 = "SELECT * FROM sae_recuperacao WHERE num_atd = $num_atd";

$sth5 = $dbo->prepare($result5);
$sth5->execute();
$dados5 = $sth5->fetchAll(PDO::FETCH_OBJ);

foreach ($dados5 as $item5) {
  $manter_paciente    = $item5->manter_paciente;
  $manter_o2          = $item5->manter_o2;
  $levantar_paciente  = $item5->levantar_paciente;
  $retirar_acesso     = $item5->retirar_acesso;
  $preencher_estatus  = $item5->preencher_estatus;
  $liberar_paciente   = $item5->liberar_paciente;
  $rec_pa1            = $item5->pre_pa1;
  $rec_pa2            = $item5->pre_pa2;
  $rec_fc             = $item5->pre_fc;
  $rec_fr             = $item5->pre_fr;
  $rec_sat02          = $item5->pre_sat02;
  $assinatura5         = $item5->assinatura;
}

/*Endoscopia*/

$result6 = "SELECT * FROM sae_endoscopia WHERE num_atd = $num_atd";

$sth6 = $dbo->prepare($result6);
$sth6->execute();
$dados6 = $sth6->fetchAll(PDO::FETCH_OBJ);

foreach ($dados6 as $item6) {

  $frasco1      = $item6->frasco1;
  $frasco2      = $item6->frasco2;
  $frasco3      = $item6->frasco3;
  $frasco4      = $item6->frasco4;
  $ligadura     = $item6->ligadura;
  $dilatacao    = $item6->dilatacao;
  $balao_gastro = $item6->balao_gastro;
  $argonio      = $item6->argonio;
  $observacoes  = $item6->observacoes;
  $assinatura6  = $item6->assinatura;
}

/*Colonoscopia*/
$result7 = "SELECT * FROM sae_colonoscopia WHERE num_atd = $num_atd";

$sth7 = $dbo->prepare($result7);
$sth7->execute();
$dados7 = $sth7->fetchAll(PDO::FETCH_OBJ);

foreach ($dados7 as $item7) {

  $frasco1      = $item7->frasco1;
  $frasco2      = $item7->frasco2;
  $frasco3      = $item7->frasco3;
  $frasco4      = $item7->frasco4;
  $frasco5      = $item7->frasco5;
  $frasco6      = $item7->frasco6;
  $observacoes2 = $item7->observacoes;
  $assinatura7  = $item7->assinatura;
}

$result8 = "SELECT * FROM sae_prescricao WHERE num_atd = $num_atd";

$sth8 = $dbo->prepare($result8);
$sth8->execute();
$dados8 = $sth8->fetchAll(PDO::FETCH_OBJ);

foreach ($dados8 as $item8) {
  $fentanil            = $item8->fentanil;
  $dormonid            = $item8->dormonid;
  $propofol            = $item8->propofol;
  $hioscina            = $item8->hioscina;
  $narcan              = $item8->narcan;
  $flumazenil          = $item8->flumazenil;
  $ondasedrona         = $item8->ondasedrona;
  $dipirona            = $item8->dipirona;
  $solucao_fisiologica = $item8->solucao_fisiologica;
  $glicose             = $item8->glicose;
  $lote_sedativos      = $item8->lote_sedativos;
  $medico_prescritor   = $item8->medico_prescritor;
  $assinatura8         = $item8->assinatura;
}

/*Intercorrencias*/

$result9 = "SELECT * FROM sae_intercorrencias WHERE num_atd = $num_atd";

$sth9 = $dbo->prepare($result9);
$sth9->execute();
$dados9 = $sth9->fetchAll(PDO::FETCH_OBJ);

foreach ($dados9 as $item9) {
  $intercorrencia = $item9->intercorrencia;
  $medico         = $item9->medico;
  $assinatura9    = $item9->assinatura;
}

/*Liberação*/
$result10 = "SELECT * FROM sae_liberacao WHERE num_atd = $num_atd";

$sth30 = $dbo->prepare($result10);
$sth30->execute();
$dados10 = $sth30->fetchAll(PDO::FETCH_OBJ);

foreach ($dados10 as $item10) {
  if ($item10->condicoes_alta == 1) {
    $condicoes_alta = 'BOA';
  }
  if ($item10->condicoes_alta == 2) {
    $condicoes_alta = 'RAZOÁVEL';
  }
  if ($item10->alta_para == 1) {
    $alta_para = 'CASA';
  }
  if ($item10->alta_para == 2) {
    $alta_para = 'HOSPITAL';
  }
  if ($item10->qual_forma == 1) {
    $qual_forma = 'CAMINHANDO';
  }
  if ($item10->qual_forma == 2) {
    $qual_forma = 'CADEIRA DE RODAS';
  }
  if ($item10->qual_forma == 3) {
    $qual_forma = 'MACA';
  }


  $dentaduras_devolvidas  = $item10->dentaduras_devolvidas;
  $retirado_acesso        = $item10->retirado_acesso;
  $condicoes_alta         = $item10->condicoes_alta;
  $alta_para              = $item10->alta_para;
  $qual_forma             = $item10->qual_forma;
  $acordado_alerta        = $item10->acordado_alerta;
  $quente_seco            = $item10->quente_seco;
  $move_membros           = $item10->move_membros;
  $lib_pa1                = $item10->pre_pa1;
  $lib_pa2                = $item10->pre_pa2;
  $lib_fc                 = $item10->pre_fc;
  $lib_fr                 = $item10->pre_fr;
  $lib_sat02              = $item10->pre_sat02;
  $evolucao_enfermagem    = $item10->evolucao_enfermagem;
  $assinatura10           = $item10->assinatura10;
  $horario_alta           = $item10->horario_alta;
}

  $html .= "
    <div class='titulo'>SISTEMATIZAÇÃO DA ASSISTÊNCIA DA ENFERMAGEM</div>
  ";



$html .= "    
    <table>
        <tbody>
            <tr>
                <td width='50%' class='br'>
        <div>
            <h4 class='text-center'>HISTÓRICO DE ENFERMAGEM</h4>
              <strong>$historico</strong> <br /><br />
              Alergia Medicamentosa: " . simnao($alergia) .' '.$alergia_desc."<br />
              <br />
              Queixa de dor: " . simnao($dor) . ' '.$dor_desc. "<br />
              <br />
              Uso de medicamento: " . simnao($medicamento) . ' ' . $medicamento_desc. "<br />
              <br />
              Fuma: " . simnao($fuma) . "<br />
              Ingestão de bebidas alcoólicas: " . simnao($bebidas) . "<br /> 
              Problemas cardíacos: " . simnao($cardiaco) . "<br />
              Problemas pulmonares: " . simnao($pulmonares) . "<br />
              Dificuldade para andar: " . simnao($andar) . "<br />
              <br />
              Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
        </div>
        </td>
        <td width='50%'>        
        <div>
            <h4 class='text-center'>DIAGNÓSTICO DE ENFERMAGEM</h4>
            Risco de hipoglicemia relacionada ao preparo: " . simnao($risco_hipoglicemia) . "<br />
            Risco de desequilíbrio hidroeletrolítico relacionada ao preparo: " . simnao($risco_desequilibrio) . "<br />
            Diarréia: " . simnao($diarreia) . "<br />
            Risco de sangramento: " . simnao($risco_sangramento) . "<br />
            Confusão crônica: " . simnao($confusao) . "<br />
            Comunicação verbal prejudicada: " . simnao($comunicacao_verbal) . "<br />
            Risco de infecção devido procedimento invasivo: " . simnao($risco_infeccao) . "<br />
            Risco de quedas : " . simnao($risco_quedas) . "<br />
            Dor aguda: " . simnao($dor) . "<br />
            Nutrição alterada mais que as necessidades corporais: " . simnao($nutricao_alterada) . "<br />
            Nutrição alterada menos que as necessidades corporais: " . simnao($nutricao_alterada) . "<br />
            Padrão respiratório ineficaz: " . simnao($padrao_respiratorio) . "<br />
            Mobilidade física prejudicada: " . simnao($mobilidade_fisica) . "<br />
            <br />
           Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
        </div>
        </td>
        </tr>
        </tbody>
    </table>

    <div class='titulo'>EXECUÇÃO DA PRESCRIÇÃO DE ENFERMAGEM</div>

     <table>
        <tbody>
            <tr>
                <td width='33%' class='br'>
                  <div>
                      <h4 class='text-center'>Sala de pré atendimento</h4>                      
                      Acomodar paciente na maca: " . simnao($acomodar_paciente) . "<br />
                      Manter cabeceira elevada: " . simnao($manter_cabeceira) . "<br />
                      Puncionar acesso venoso em MMSS: " . simnao($puncionar_acesso) . "<br />
                      Retirar próteses e aparelhos dentários: " . simnao($retirar_proteses) . "<br />
                      Verificar sinais vitais: " . simnao($verificar_sinais) . "<br />
                      Elevar grades da maca: " . simnao($transportar_paciente) . "<br />
                      Transportar paciente para sala de exames: " . simnao($hora_preparo) . "<br /> 
                      <br>
                      Hora do preparo: " . $hora_preparo . "<br />
                      <br />
                      <b>Sinais Vitais</b> <br>
                      PA: " . $pre_pa1 . "X" . $pre_pa2 . "<br />
                      FC: " . $pre_pa2 . "<br />
                      FR: " . $pre_fc . "<br />
                      SatO2: " . $pre_sat02 . "<br />
                      <br />
                      Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
                  </div>
                </td>
                <td width='33%' class='br'>
                  <div>
                      <h4 class='text-center'>Sala de exames</h4>                    
                      Posicionar paciente para exames: " . simnao($posicionar_pacientes) . "<br />
                      Instalar oximetria contínua: " . simnao($instalar_oximetria) . "<br />
                      Instalar o2: " . simnao($instalar_o2) . "<br />
                      Administrar medicamentos sedativos conforme prescrição médica: " . simnao($administrar_medicamentos) . "<br />
                      Verificar sinais vitais: " . simnao($verificar_sinais) . "<br />
                      Após exame, encaminhar paciente para recuperação com grades elevadas: " . simnao($encaminhar_paciente) . "<br />
                      <br>
                      Hora do inicio do exame: " .$inicio_exame . "<br />
                      Hora do final do exame: " . $termino_exame . "<br />
                      <br />
                      <b>Sinais Vitais</b> <br>
                      PA: " . $exame_pa1 . "X" . $exame_pa2 . "<br />
                      FC: " . $exame_fc . "<br />
                      FR: " . $exame_fr . "<br />
                      SatO2: " . $exame_sat02 . "<br />
                      <br />
                      Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
                  </div>
                </td>
                <td width='33%'>
                  <div>
                      <h4 class='text-center'>Recuperação</h4>
                      Manter paciente em oximetria até bem acordado:  " . simnao($manter_paciente) . "<br />
                      Manter o2 se saturação < 90%:  " . simnao($manter_o2) . "<br />
                      Levantar paciente somente quando bem acordado:  " . simnao($levantar_paciente) . "<br />
                      Retirar acesso venoso:  " . simnao($retirar_acesso) . "<br />
                      Preencher estatus de alta/ níveis de sedação e escala de dor:  " . simnao($preencher_estatus) . "<br />
                      Liberar paciente somente com autorização do anestesista:  " . simnao($liberar_paciente) . "<br />
                      <br />
                      <b>Sinais Vitais</b> <br>
                      PA: " . $rec_pa1 . "X" . $rec_pa2 . "<br />
                      FC: " . $rec_fc . "<br />
                      FR: " . $rec_fr . "<br />
                      SatO2: " . $rec_sat02 . "<br />
                      <br />
                      Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
                  </div>
                </td>
          </tr>
        </tbody>
      </table>
    </div>   

    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class='titulo'>PROCEDIMENTO REALIZADO</div> 
        <h4 class='text-center'>ENDOSCOPIA</h4>  
        <table>
          <tbody>       
              <tr><td>Frasco 1 </td><td>" . endoscopia($frasco1) .  "</td></tr>
              <tr><td>Frasco 2 </td><td> " . endoscopia($frasco2) . "</td></tr>
              <tr><td>Frasco 3 </td><td> " . endoscopia($frasco3) . "</td></tr>
              <tr><td>Frasco 4 </td><td> " . endoscopia($frasco4) . "</td></tr>
              <tr><td>Ligadura </td><td> " . simnao($ligadura) .    "</td></tr>
              <tr><td>Dilatação </td><td> " . simnao($dilatacao) .  "</td></tr>
              <tr><td>Balão Gástrico </td><td> " . simnao($balao_gastro). "</td></tr>
              <tr><td>Argônio </td><td> " . simnao($argonio) . "</td></tr>
        </tbody>
        </table>
        <br />
        Observações:" . $observacoes . "        


 
        <h4 class='text-center'>COLONOSCOPIA</h4>  
         <table>
          <tbody> 
              <tr><td>Frasco 1 </td><td>" . colonoscopia($frasco1) . "</td></tr>
              <tr><td>Frasco 2 </td><td> " . colonoscopia($frasco2) . "</td></tr>
              <tr><td>Frasco 3 </td><td> " . colonoscopia($frasco3) . "</td></tr>
              <tr><td>Frasco 4 </td><td> " . colonoscopia($frasco4) . "</td></tr>
              <tr><td>Frasco 5 </td><td> " . colonoscopia($frasco5) . "</td></tr>
              <tr><td>Frasco 6 </td><td> " . colonoscopia($frasco6) . "</td></tr>
          </tbody>
        </table>
        <br />
        Observações: " . $observacoes2 . "<br>


    <div class='titulo'>PRESCIÇÃO MÉDICA</div>

    <table>
      <tbody>
        <tr>
          <td class='br'>

            <div>
                <table width='100%'>
                    <thead>
                        <tr>
                        <th>Medicamento</th>
                        <th>Dose</th>
                        <th>Via</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Fentanil 0,05 mg/ml</td>
                            <td>$fentanil</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Dormonid 5mg/ml</td>
                            <td>$dormonid</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Propofol 50mg/10 ml</td>
                            <td>$propofol</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Hioscina 20mg/ml</td>
                            <td>$hioscina</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Narcan</td>
                            <td>$narcan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Flumazenil 0,1 mg/ml</td>
                            <td>$flumazenil</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ondasedrona</td>
                            <td>$ondasedrona</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Dipirona</td>
                            <td>$dipirona</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Solução fisiológica 0,9%</td>
                            <td>$solucao_fisiologica</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Glicose 25%</td>
                            <td>$glicose</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </td>
          <td>          
            <div class='col-12' style='border-bottom: 2px solid #ccc; height:160px'>
                <h4 class='text-center'>Lote dos sedativos:</h4>
            </div>
            <div class='col-12' style='height:60px'>
                <h4 class='text-center'>Médico Prescritor:</h4>
                <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
            </div>
          </td>
        </tr>
      </tbody>
    </table>   
    </div>
    </div>


    <div class='col-12' >
        <div class='titulo'>INTERCORRÊNCIAS</div>
        " . $intercorrencia . "<br>
        Médico responsável pela alta: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
    </div>

    <div class='col-12'>
        <div class='titulo'>LIBERAÇÃO DO PACIENTE PELA ENFERMAGEM</div>
        <br />
        Dentaduras e óculos devolvidos: " . simnao($dentaduras_devolvidas) . "<br />
        Retirado o acesso venoso:" . simnao($retirado_acesso) . "<br />
        Condições de Alta: " . $condicoes_alta . "<br>
        Alta para: " . $alta_para . "<br>
        Qual forma: " . $qual_forma . "<br>
        Nivel de Sedação<br>
        Acordado e Alerta: " . simnao($retirado_acesso) . "<br />
        Status do Paciente <br>
        Quente / Seco: " . simnao($retirado_acesso) . "<br />
        Move os 4 membros: " . simnao($retirado_acesso) . "<br />
        <br />
        <b>Sinais Vitais</b> <br />
        PA: " . $lib_pa1 . "X" . $lib_pa2 . "<br />
        FC: " . $lib_fc . "<br />
        FR: " . $lib_fr . "<br />
        SatO2: " . $lib_sat02 . "<br />
        <br />
        Evolução enfermagem:<br>
        " . $evolucao_enfermagem . "<br />
        Horário de Alta:".$horario_alta."<br />
        Assinatura: <img src='$assinatura1'/ width='100px' style='margin-top:5px'>
    </div>

    

</html>";

/*SIM ou NÃO*/
function simnao($item)
{
  if ($item == 1) {
    return "SIM";
  } else {
    return "NÃO";
  }
}

function endoscopia($item)
{
  if ($item == 1) {
    return "ESÔFAGO";
  }
  if ($item == 2) {
    return "FUNDO";
  }
  if ($item == 3) {
    return "MUCOSA ESTOMACA";
  }
  if ($item == 4) {
    return "CORPO";
  }
  if ($item == 5) {
    return "PILORO";
  }
  if ($item == 6) {
    return "ANTRO";
  }
  if ($item == 7) {
    return "DUODENO";
  }
}

function colonoscopia($item)
{
  if ($item == 1) {
    return  "ÂNGULO HEPÁTICO";
  }
  if ($item == 2) {
    return "ÂNGULO ESPLÊNICO";
  }
  if ($item == 3) {
    return "TRANSVERSO";
  }
  if ($item == 4) {
    return "ASCENDENTE";
  }
  if ($item == 5) {
    return "DESCENDENTE";
  }
  if ($item == 6) {
    return "ÍLEO";
  }
  if ($item == 7) {
    return "CECO";
  }
  if ($item == 8) {
    return "SIGMÓIDE";
  }
  if ($item == 9) {
    return "RETO";
  }
}

//Criando o código HTML que será transformado em pdf
$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', TRUE);

//Define o tipo de papel de impressão (opcional)
//tamanho (A4, A3, A2, etc)
//oritenação do papel:'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'portrait');

// Vai renderizar o HTML como PDF
$dompdf->render();

// Saída do pdf para a renderização do navegador.
//Coloca o nome que deseja que seja renderizado.
//$dompdf->stream("pdfs/relatorio.pdf", array(true)); 
$output = $dompdf->output([ 'isRemoteEnabled' => true ]);
file_put_contents("pdfs/$num_atd.pdf", $output);

echo "<a href='http://localhost/sae_sollen/pdfs/$num_atd.pdf'>Abrir</a>";



?>


