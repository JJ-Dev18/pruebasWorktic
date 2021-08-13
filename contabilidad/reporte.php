<?php


include "../db.php";
require "plantilla.php";
 
if (!empty($_POST)) {
    ob_start();
    $id = $_POST['id'];
    $db = new DB();
    $sql = "SELECT a.id, a.nombre, a.precio, t.tipo FROM articulos AS a INNER JOIN tipoarticulos AS t ON a.categoria=t.id WHERE t.id = $id";
    $query = $db->connect()->prepare($sql);
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_OBJ);
    print_r($rows);
    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(40, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(20, 5, "Precio", 1, 0, "C");
    $pdf->Cell(40, 5, "Categoria", 1, 0, "C");
    // $pdf->Cell(30, 5, "Grado", 1, 0, "C");
    // $pdf->Cell(50, 5, "Correo", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    foreach ($rows as $row) {
        $pdf->Cell(10, 5, $row->id, 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($row->nombre), 1, 0, "C");
        $pdf->Cell(20, 5, $row->precio, 1, 0, "C");
        $pdf->Cell(40, 5, $row->tipo, 1, 0, "C");
        // $pdf->Cell(30, 5, $fila['grado'], 1, 0, "C");
        // $pdf->Cell(50, 5, $fila['correo'], 1, 1, "C");
    }

    $pdf->Output();
     ob_end_flush(); 
}

?>