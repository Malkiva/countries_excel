	<?php

		require_once 'function.php';
		require_once 'get_countries.php';	
		require_once 'Classes/PHPExcel.php';




		$country = get_countries();

		$objphp = new PHPExcel();

		$objphp->setActiveSheetIndex(0);
/**/
		$active_sheet = $objphp->getActiveSheet();

		$active_sheet->getPageSetup()->
			setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$active_sheet->getPageSetup()->
			SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$active_sheet->getPageMargins()->
			setTop(0.5);
		$active_sheet->getPageMargins()->
			setRight(1);
		$active_sheet->getPageMargins()->
			setLeft(1);
		$active_sheet->getPageMargins()->
			setBottom(1);
		$active_sheet->setTitle("Страны");
		$active_sheet->getHeaderFooter()->
			setOddHeader("Страны Африки");

		$objphp->getDefaultStyle()->getFont()->setName('Arial');

		$active_sheet->mergeCells();
		$active_sheet->getRowDimension('1')->setRowHeight(30);
		$active_sheet->setCellValue('A1', 'id');
		$active_sheet->setCellValue('A2', 'name');

		$row_start = 2;
		$i = 0;
		foreach ($country as $item) {
			$row_next = $row_start + $i;		
			$active_sheet->setCellValue('A'.$row_next, $item['id'] );
			$active_sheet->setCellValue('B'.$row_next, $item['name'] );

			$i++;
		}



		header("Content-Type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename='first.xls'"); 

		$Writer = PHPExcel_IOFactory::createWriter($objphp, 'Excel2007');
		$Writer->save('php://output');

		exit();











	?>
