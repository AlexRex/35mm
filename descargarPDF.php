<?php
require_once("fpdf17/fpdf.php");
require_once('database/database.php');

session_start();
$host  = $_SERVER['HTTP_HOST'];
$user = 'No user';
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
else{
    $user = $_SESSION['usuarioSession'];
}
$albumID= $_GET["id"];

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos left outer join paises on fotos.Pais = paises.IdPais where fotos.Album = '.$albumID;
$sentencia2 = 'Select * from albumes left outer join paises on albumes.Pais = paises.IdPais where albumes.IdAlbum = '.$albumID;



$resultadoFotos = $db->get($sentencia);

$resultadoAlbum = $db->get($sentencia2);


$album = mysqli_fetch_assoc($resultadoAlbum);
$fotosEnAlbum = mysqli_num_rows($resultadoFotos);


if(!$album){
    $extra = '404.php';
    header("Location: http://$host$uri/$extra");
}

class MyFPDF extends FPDF
{
    function Header()
    {
        $this->SetFont("Arial", 'B', 15);
    // Se desplaza a la derecha 6 cm para que la cabecera
    // aparezca centrada
    $this->Cell(60);
    $this->Cell(70, 10, iconv('UTF-8', 'ISO-8859-2', "Álbum"), 1, 0, 'C');
    $this->Ln(20);
}
    function Footer()
    {
        // El pie está situado a 1 cm del final de la página,
        // es decir, dentro del margen inferior
        $this->SetY(-10);
        $this->SetFont("Arial", "I", 8);
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-2',"Página " . $this->PageNo() . '/{nb}'), 0, 0, "C");
    }
}



$pdf = new MyFPDF();
$pdf -> AliasNbPages();

$pdf->SetTitle("Descarga del álbum: ".$album['Titulo']." - 35mm");
$pdf->SetAuthor($album['NomUsuario']);
$pdf->SetCreator("FPDF, PHP & 35mm");
$pdf->SetSubject("Álbum descargado desde 35mm.");
$pdf->SetKeywords("álbum php fpdf 35mm fotos");

$pdf->AddPage();
$pdf->SetFont("Arial", "B", 16);
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2', "Título: ".$album['Titulo']."\n"));
$pdf->Write(7,"Fecha: ".$album['Fecha']."\n");
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2',"Usuario: ".$user['NomUsuario']."\n"));
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2',"Fecha creación del pdf: ".date("H:i:s d-m-Y")."\n"));

$pdf->AddPage();
$pdf->SetFont("Arial", "B", 16);
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2', "Título: ".$album['Titulo']."\n"));
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2', "Descripción: ".$album['Descripcion']."\n"));
$pdf->Write(7,"Fecha: ".$album['Fecha']."\n");
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2',"País: ".$album['NomPais']."\n"));
$pdf->Write(7,iconv('UTF-8', 'ISO-8859-2',"Fotografías en el álbum: ".$fotosEnAlbum."\n"));

$titulos = array();
while($foto = mysqli_fetch_assoc($resultadoFotos)){
    $pdf->AddPage();
    $pdf->SetFont("Arial", "", 14);
    $pdf->Image($foto['Fichero'], NULL, NULL, NULL, 100, 'jpg');
    $pdf->Write(7,iconv('UTF-8', 'ISO-8859-2', "Título: ".$foto['Titulo']."\n"));
    $pdf->Write(7,iconv('UTF-8', 'ISO-8859-2', "Descripción: ".$foto['Descripcion']."\n"));
    $pdf->Write(7,"Fecha: ".$foto['Fecha']."\n");
    $pdf->Write(7,iconv('UTF-8', 'ISO-8859-2',"País: ".$foto['NomPais']."\n"));
    array_push($titulos, $foto['Titulo']);
}

$pdf->AddPage();

foreach($titulos as $titulo){
    $pdf->Cell(0, 10, $titulo, 1, 1, "C");

}
$pdf->Output($album['Titulo']."_35mm.pdf", "I");


$db->close();




