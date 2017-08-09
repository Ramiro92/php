<?php
	include 'crearpdf.php';
	require 'cone.php';
	
	$query = "SELECT * FROM users";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'CARNET',1,0,'C',1);
	$pdf->Cell(10,6,'ID',1,0,'C',1);
	$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(30,6,'APELLIDO',1,0,'C',1);
	
	$pdf->Cell(30,6,'TRAB',1,0,'C',1);
	$pdf->Cell(30,6,'EGRESO',1,0,'C',1);
	$pdf->Cell(30,6,'GRADUACION',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{		
		$pdf->Cell(30,6,utf8_decode($row['carnet']),1,0,'C');
		$pdf->Cell(10,6,utf8_decode($row['id']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['first_name']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['last_name']),1,0,'C');
		
		$pdf->Cell(30,6,utf8_decode($row['trabajograduacion']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['egreso']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['graduacion']),1,1,'C');
	}
	$pdf->Output();
?>