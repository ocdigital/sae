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

$html= '<html>
<style>
 table{margin:0px !important}

  body{font-size:14px}
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:10px;
  }

</style>';
/*Dados pessoais*/
$result = "SELECT * FROM sae_paciente WHERE cod_pac = $cod_pac AND num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {  
$html .= "


<table>
<tbody>
<tr><td colspan='2'>
<b>Dados do Atendimento</b>
Atendimento: $item->num_atd <br>
Nome: $item->nome <br>
Codigo do Paciente: $item->cod_pac <br>
Idade: $item->idade anos <br>
Exame: $item->exames <br> 
Convênio: $item->convenio <br>
</td>
</tr>
";
}

/*SIM ou NÃO*/
function simnao($item){
    if($item == 1){
        return "SIM";
    }else{
        return "NÃO";
    }
}

function endoscopia($item){
    if($item == 1){
      return "ESÔFAGO";  
    }
    if($item == 2){
      return "FUNDO";  
    }
    if($item == 3){
      return "MUCOSA ESTOMACA";  
    }
    if($item == 4){
      return "CORPO";  
    }
    if($item == 5){
      return "PILORO";  
    }
    if($item == 6){
      return "ANTRO";
    }
    if($item == 7){
      return "DUODENO";  
    }
}

function colonoscopia($item){
    if($item == 1){
      return  "ÂNGULO HEPÁTICO";
    }
    if($item == 2){
      return "ÂNGULO ESPLÊNICO";  
    }
    if($item == 3){
      return "TRANSVERSO";  
    }
    if($item == 4){
      return "ASCENDENTE";  
    }
    if($item == 5){
      return "DESCENDENTE";  
    }
    if($item == 6){
      return "ÍLEO";  
    }
    if($item == 7){
      return "CECO";  
    }
    if($item == 8){
      return "SIGMÓIDE";  
    }
    if($item == 9){
      return "RETO";  
    }
}

/*Histórico Enfermagem*/
$result1 = "SELECT * FROM sae_enfermagem WHERE cod_pac = $cod_pac AND num_atd = $num_atd";

$sth3 = $dbo->prepare($result1);
$sth3->execute();
$dados1 = $sth3->fetchAll(PDO::FETCH_OBJ);

foreach ($dados1 as $item1) {
    if($item1->historico == 1){
        $historico = 'Internado';
    }
    if($item1->historico == 2){
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

$html .= "<tr style='background-color:#665959; color:#fff'><td colspan='2'>SISTEMATIZAÇÃO DA ASSISTÊNCIA DA ENFERMAGEM</td></tr>
<tr ><td width='250px'>
<h4>Histórico de Enfermagem</h4>
$historico <br />
Alergia Medicamentosa: ".simnao($alergia). "<br />
Qual: $alergia_desc <br />
Queixa de dor: ".simnao($dor). "<br />
Onde: $dor_desc </br>
Uso de medicamento: ".simnao($medicamento)."<br />
Qual: $medicamento_desc </br>
Fuma: ".simnao($fuma)."<br />
Ingestão de bebidas alcoólicas: ".simnao($bebidas)."<br /> 
Problemas cardíacos: ".simnao($cardiaco)."<br />
Problemas pulmonares: ".simnao($pulmonares)."<br />
Dificuldade para andar: ".simnao($andar)."<br />
<hr>
Assinatura: <img src='$assinatura1'/ width='150px'>
</td>
";

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

$html .= "<td width='350px'>
<h4>Diagnóstico de Enfermagem</h4>
Risco de hipoglicemia relacionada ao preparo: ".simnao($risco_hipoglicemia)."<br />
Risco de desequilíbrio hidroeletrolítico relacionada ao preparo: ".simnao($risco_desequilibrio)."<br />
Diarréia: ".simnao($diarreia)."<br />
Risco de sangramento: ".simnao($risco_sangramento)."<br />
Confusão crônica: ".simnao($confusao)."<br />
Comunicação verbal prejudicada: ".simnao($comunicacao_verbal)."<br />
Risco de infecção devido procedimento invasivo: ".simnao($risco_infeccao)."<br />
Risco de quedas : ".simnao($risco_quedas)."<br />
Dor aguda: ".simnao($dor)."<br />
Nutrição alterada mais que as necessidades corporais: ".simnao($nutricao_alterada)."<br />
Nutrição alterada menos que as necessidades corporais: ".simnao($nutricao_alterada)."<br />
Padrão respiratório ineficaz: ".simnao($padrao_respiratorio)."<br />
Mobilidade física prejudicada: ".simnao($mobilidade_fisica)."<br />
<hr>
Assinatura: <img src='$assinatura2'/ width='150px'>
</td></tr>
</tbody></table>
";


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

$html .= "<table><tbody>
<tr style='background-color:#665959; color:#fff'><td colspan='3'>EXECUÇÃO DA PRESCRIÇÃO DE ENFERMAGEM</td></tr>
<tr><td width='200px'>
<h4>Sala de Pré atendimento</h4>

Acomodar paciente na maca: ".simnao($acomodar_paciente)."<br />
Manter cabeceira elevada: ".simnao($manter_cabeceira)."<br />
Puncionar acesso venoso em MMSS: ".simnao($puncionar_acesso)."<br />
Retirar próteses e aparelhos dentários: ".simnao($retirar_proteses)."<br />
Verificar sinais vitais: ".simnao($verificar_sinais)."<br />
Elevar grades da maca: ".simnao($transportar_paciente)."<br />
Transportar paciente para sala de exames: ".simnao($hora_preparo). "<br /> 
Hora do preparo: " . $hora_preparo."
<hr>
<b>Sinais Vitais</b> <br>
PA: ".$pre_pa1."X".$pre_pa2."<br />
FC: ".$pre_pa2."<br />
FR: ".$pre_fc."<br />
SatO2: ".$pre_sat02."<br />
<hr>
Assinatura: <img src='$assinatura3'/ width='150px'>
</td>";

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

$html .= "<td width='200px'>
<h4>Sala de Exames</h4>
Hora do inicio do exame: ".simnao($inicio_exame)."<br />
Hora do final do exame: ".simnao($termino_exame)."<br />
Posicionar paciente para exames: ".simnao($posicionar_pacientes)."<br />
Instalar oximetria contínua: ".simnao($instalar_oximetria)."<br />
Instalar o2: ".simnao($instalar_o2)."<br />
Administrar medicamentos sedativos conforme prescrição médica: ".simnao($administrar_medicamentos)."<br />
Verificar sinais vitais: ".simnao($verificar_sinais)."<br />
Após exame, encaminhar paciente para recuperação com grades elevadas: ".simnao($encaminhar_paciente). "<br />
<hr>
<b>Sinais Vitais</b> <br>
PA: ".$exame_pa1."X".$exame_pa2."<br />
FC: ".$exame_fc."<br />
FR: ".$exame_fr."<br />
SatO2: ".$exame_sat02."<br />
<hr>
Assinatura: <img src='$assinatura4'/ width='150px'>
</td>
";

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

$html .= "<td width='200px'>
<h4>Recuperação</h4>
Manter paciente em oximetria até bem acordado:  ".simnao($manter_paciente)."<br />
Manter o2 se saturação < 90%:  ".simnao($manter_o2)."<br />
Levantar paciente somente quando bem acordado:  ".simnao($levantar_paciente)."<br />
Retirar acesso venoso:  ".simnao($retirar_acesso)."<br />
Preencher estatus de alta/ níveis de sedação e escala de dor:  ".simnao($preencher_estatus)."<br />
Liberar paciente somente com autorização do anestesista:  ".simnao($liberar_paciente). "<br />
<hr>
<b>Sinais Vitais</b> <br>
PA: ".$rec_pa1."X".$rec_pa2."<br />
FC: ".$rec_fc."<br />
FR: ".$rec_fr."<br />
SatO2: ".$rec_sat02."<br />
<hr>
Assinatura: <img src='$assinatura5'/ width='150px'>
</td></tr></tbody></table>";

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

$html .= "
<table><tbody>
<tr style='background-color:#665959; color:#fff'><td colspan='2'>PROCEDIMENTO REALIZADO</td></tr>
<tr><td width='300px'>
<h4>Endoscopia</h4>
Frasco 1: ".endoscopia($frasco1)."<br>
Frasco 2: ".endoscopia($frasco2)."<br>
Frasco 3: ".endoscopia($frasco3)."<br>
Frasco 4: ".endoscopia($frasco4)."<br>
Ligadura: ".simnao($ligadura)."<br />
Dilatação: ".simnao($dilatacao)."<br />
Balão Gástrico: ".simnao($balao_gastro)."<br />
Argônio: ".simnao($argonio)."<br />
Observações: ".$observacoes."<br />  
</td>";

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

$html .= "<td width='300px'>
<h4>Colonoscopia ou Retosigmoidoscopia</h4>
Frasco 1: ".colonoscopia($frasco1)."<br>
Frasco 2: ".colonoscopia($frasco2)."<br>
Frasco 3: ".colonoscopia($frasco3)."<br>
Frasco 4: ".colonoscopia($frasco4)."<br>
Frasco 5: ".colonoscopia($frasco5)."<br>
Frasco 6: ".colonoscopia($frasco6)."<br>
Observações: ".$observacoes2."<br>
</td></tr>";

/*Prescrição*/



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

$html .= "
<tr style='background-color:#665959; color:#fff'><td colspan='2'>Prescrição Médica</td></tr>
  <tr>
  <td>
    Fentanil 0,05 mg/ml: ".$fentanil."<br>
    Dormonid 5mg/ml: ".$dormonid."<br>
    Propofol 50mg/10 ml: ".$propofol."<br>
    Hioscina 20mg/ml: ".$hioscina."<br>
    Narcan: ".$narcan."<br>
    Flumazenil 0,1 mg/ml: ".$flumazenil."<br>
    Ondasedrona: ".$ondasedrona."<br>
    Dipirona: ".$dipirona."<br>
    Solução fisiológica 0,9%: ".$solucao_fisiologica."<br>
    Glicose 25%: ".$glicose."<br> 
    teste   
  </td>
</td>
<td>
  <tr><td>Lote dos Sedativos</td></tr>
  <tr><td>Médico Prescritor</td></tr>
</td>
</tr>




</td><tr>
";

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

$html .= "<table><tbody>
<tr><td>
<h4>Intercorrências</h4>
".$intercorrencia."<br>
Médico responsável pela alta: ".$medico."<br>
</td></tr>
</tbody>
</table>";

/*Liberação*/
$result10 = "SELECT * FROM sae_liberacao WHERE num_atd = $num_atd";

$sth30 = $dbo->prepare($result10);
$sth30->execute();
$dados10 = $sth30->fetchAll(PDO::FETCH_OBJ);

foreach ($dados10 as $item10) {
    if($item10->condicoes_alta == 1){
        $condicoes_alta = 'BOA';
    }
    if($item10->condicoes_alta == 2){
        $condicoes_alta = 'RAZOÁVEL';
    }
    if($item10->alta_para == 1){
        $alta_para = 'CASA';
    }
    if($item10->alta_para == 2){
        $alta_para = 'HOSPITAL';
    }
    if($item10->qual_forma == 1){
        $qual_forma = 'CAMINHANDO';
    }
    if($item10->qual_forma == 2){
        $qual_forma = 'CADEIRA DE RODAS';
    }
    if($item10->qual_forma == 3){
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
    
}

$html .= "<table>
<tbody><tr><td>
<h4>Liberação do paciente pela enfermagem</h4>
Dentaduras e óculos devolvidos: ".simnao($dentaduras_devolvidas)."<br />
Retirado o acesso venoso:".simnao($retirado_acesso)."<br />
Condições de Alta: ".$condicoes_alta."<br>
Alta para: ".$alta_para."<br>
Qual forma: ".$qual_forma."<br>
Nivel de Sedação<br>
Acordado e Alerta: ".simnao($retirado_acesso)."<br />
Status do Paciente <br>
Quente / Seco: ".simnao($retirado_acesso)."<br />
Move os 4 membros: ".simnao($retirado_acesso)."<br />
PA: ".$lib_pa1."X".$lib_pa2."<br />
FC: ".$lib_fc."<br />
FR: ".$lib_fr."<br />
SatO2: ".$lib_sat02."<br />
Evolução enfermagem:<br>
".$evolucao_enfermagem ."<br>
Assinatura: <img src='$assinatura'/ width='150px'>
</td></tr></tbody></table></html>";

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


