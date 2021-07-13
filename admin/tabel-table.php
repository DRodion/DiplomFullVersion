<?php
require '../config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment, };

$facu = filter_var(trim($_POST['faculty2']),FILTER_SANITIZE_STRING);
$kaf = filter_var(trim($_POST['department3']),FILTER_SANITIZE_STRING);
$period = filter_var(trim($_POST['period']),FILTER_SANITIZE_STRING);
$year = filter_var(trim($_POST['year']),FILTER_SANITIZE_STRING);
$date_now = date('d.m.Y');

if ($period == 'Январь'){
    $start = "01.01.$year";
    $gap = "15.01.$year";
    $end = "31.01.$year";
}
if ($period == 'Февраль'){
    $start = "01.02.$year";
    $gap = "15.02.$year";
    $end = "28.02.$year";
}
if ($period == 'Март'){
    $start = "01.03.$year";
    $gap = "15.03.$year";
    $end = "31.03.$year";
}
if ($period == 'Апрель'){
    $start = "01.04.$year";
    $gap = "15.04.$year";
    $end = "30.04.$year";
}
if ($period == 'Май'){
    $start = "01.05.$year";
    $gap = "15.05.$year";
    $end = "31.05.$year";
}
if ($period == 'Июнь'){
    $start = "01.06.$year";
    $gap = "15.06.$year";
    $end = "30.06.$year";
}
if ($period == 'Июль'){
    $start = "01.07.$year";
    $gap = "15.07.$year";
    $end = "31.07.$year";
}
if ($period == 'Август'){
    $start = "01.08.$year";
    $gap = "15.08.$year";
    $end = "31.08.$year";
}
if ($period == 'Сентябрь'){
    $start = "01.09.$year";
    $gap = "15.09.$year";
    $end = "30.09.$year";
}
if ($period == 'Октябрь'){
    $start = "01.10.$year";
    $gap = "15.10.$year";
    $end = "31.10.$year";
}
if ($period == 'Ноябрь'){
    $start = "01.11.$year";
    $gap = "15.11.$year";
    $end = "30.11.$year";
}
if ($period == 'Декабрь'){
    $start = "01.12.$year";
    $gap = "15.12.$year";
    $end = "31.012.$year";
}

//Создаем экземпляр класса электронной таблицы
$spreadsheet = new Spreadsheet();
//Получаем текущий активный лист
$sheet = $spreadsheet->getActiveSheet();
$styleFont = [
    'font' => [
        'name' => 'Verdana',
        'bold' => true,
        'italic' => false,
        'size'  => 20,
        'strikethrough' => false,
        'color' => [
            'rgb' => '02334a'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
        'wrapText' => true
    ]
];

$styleFont_1 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'size'  => 12,
        'strikethrough' => false,
        'color' => [
            'rgb' => '252b31'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
        'wrapText' => true
    ]
];

$styleFont_2 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'size'  => 14,
        'strikethrough' => false,
        'color' => [
            'rgb' => '252b31'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
        'wrapText' => true
    ]
];

$styleFont_3 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'size'  => 12,
        'strikethrough' => false,
        'color' => [
            'rgb' => '252b31'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_LEFT,
        'vertical' => Alignment::VERTICAL_TOP,
        'wrapText' => true
    ]
];

$styleFont_4 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'size'  => 12,
        'strikethrough' => false,
        'color' => [
            'rgb' => '252b31'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_LEFT,
        'vertical' => Alignment::VERTICAL_BOTTOM,
        'wrapText' => true
    ]
];

$styleFont_5 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'bold' => true,
        'size'  => 12,
        'strikethrough' => false,
        'color' => [
            'rgb' => '3e7319'
        ]
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => [
                'rgb' => '02334a'
            ]
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
        'wrapText' => true
    ]
];

$res = mysqli_query($conn, "SELECT * FROM faculty WHERE name_faculty = '$facu'");
If (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $id_fac = $row['id_faculty'];
}
$ress = mysqli_query($conn, "SELECT * FROM department WHERE name_department = '$kaf'");
If (mysqli_num_rows($ress) > 0) {
    $rows = mysqli_fetch_array($ress);
    $id_dep = $rows['id_department'];
}

$cus = mysqli_query($conn, "SELECT COUNT(id_professor) FROM cus_professor WHERE id_department = '$id_dep' AND id_faculty = '$id_fac'");
$rowws = mysqli_fetch_array($cus);
$ccount = $rowws['COUNT(id_professor)'];

if ($period == 'Январь' || $period == 'Март' || $period == 'Май' || $period == 'Июль' || $period == 'Август' || $period == 'Октябрь' || $period == 'Декабрь'){
    $sheet->setCellValue('A1', 'Табель №');
    $sheet->mergeCells('A1:AK3');
    $sheet->getStyle('A1')->applyFromArray($styleFont);

    $sheet->setCellValue('A4', 'Учреждение: ФГБОУ ВО "МГУ имени Н.П.Огарева"');
    $sheet->mergeCells('A4:AK5');

    $sheet->setCellValue('A6', 'Факультет: '.$facu.'');
    $sheet->mergeCells('A6:AK7');
    $sheet->setCellValue('A8', 'Кафедра: '.$kaf.'');
    $sheet->mergeCells('A8:AK9');
    $sheet->setCellValue('A10', 'Период: '.$start.' - '.$end.', дата загрузки: '.$date_now);
    $sheet->mergeCells('A10:AK11');
    $sheet->getStyle('A4:AK11')->applyFromArray($styleFont_2);

    $sheet->setCellValue('A12', 'Фамилия, имя, отчество');
    $sheet->mergeCells('A12:A16');
    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getStyle('A12:AK17')->applyFromArray($styleFont_1);

    $sheet->setCellValue('B12', 'Учетный номер');
    $sheet->getRowDimension('16')->setRowHeight(40);
    $sheet->getColumnDimension('B')->setWidth(10);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->mergeCells('B12:C13');

    $sheet->mergeCells('B14:B16');
    $sheet->mergeCells('C14:C16');

    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->setCellValue('D12', 'Должность');
    $sheet->mergeCells('D12:D16');

    $sheet->setCellValue('E12', 'Числа месяца');
    $sheet->mergeCells('E12:AK13');

    $cell1 = 14;
    $cell2 = 16;
    $cell3 = 18;

    $last_column = 'T';
    $j = 1;
    $date_start = strtotime($start) ;
    $date_end = strtotime($end);
    $date_gap = strtotime($gap);

    $k =  date("w",$date_start);
    $h = $date_start;

    for ($column = 'E'; $column != $last_column; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $cellll = $column.$cell3;
        $sheet->getColumnDimension("$column")->setWidth(6);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");

        $s = date("w",$h);
        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $h += 86400;

        $j++;
    }

    $sheet->mergeCells("T14:T16");
    $sheet->getColumnDimension("T")->setWidth(15);
    $sheet->setCellValue('T14', 'Итого дней (часов) явок (неявок) с 1 по 15');
    $last_column1 = 'AK';
    $j = 16;

    $n = $h;
    $k =  date("w",$n);

    for ($column = 'U'; $column != $last_column1; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $cellll = $column.$cell3;

        $sheet->getColumnDimension("$column")->setWidth(6);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");

        $s = date("w",$n);
        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $n += 86400;

        $j++;
    }
    $last_column = 'AL';
    $i = 1;
    for ($column = 'A'; $column != $last_column; $column++) {
        $sheet->setCellValue($column.'17', "$i");
        $i++;
    }
    $sheet->mergeCells("AK14:AK16");
    $sheet->getColumnDimension("AK")->setWidth(15);
    $sheet->setCellValue('AK14', 'Итого дней (часов) явок (неявок) за месяц');
}

if ($period == 'Апрель' || $period == 'Июнь' || $period == 'Сентябрь' || $period == 'Ноябрь'){
    $sheet->setCellValue('A1', 'Табель №');
    $sheet->mergeCells('A1:AJ3');
    $sheet->getStyle('A1')->applyFromArray($styleFont);

    $sheet->setCellValue('A4', 'Учреждение: ФГБОУ ВО "МГУ имени Н.П.Огарева"');
    $sheet->mergeCells('A4:AJ5');

    $sheet->setCellValue('A6', 'Факультет: '.$facu.'');
    $sheet->mergeCells('A6:AJ7');
    $sheet->setCellValue('A8', 'Кафедра: '.$kaf.'');
    $sheet->mergeCells('A8:AJ9');
    $sheet->setCellValue('A10', 'Период: '.$start.' - '.$end.', дата загрузки: '.$date_now);
    $sheet->mergeCells('A10:AJ11');
    $sheet->getStyle('A4:AJ11')->applyFromArray($styleFont_2);

    $sheet->setCellValue('A12', 'Фамилия, имя, отчество');
    $sheet->mergeCells('A12:A16');
    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getStyle('A12:AJ17')->applyFromArray($styleFont_1);

    $sheet->setCellValue('B12', 'Учетный номер');
    $sheet->getRowDimension('16')->setRowHeight(40);
    $sheet->getColumnDimension('B')->setWidth(10);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->mergeCells('B12:C13');

    $sheet->mergeCells('B14:B16');
    $sheet->mergeCells('C14:C16');

    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->setCellValue('D12', 'Должность');
    $sheet->mergeCells('D12:D16');

    $sheet->setCellValue('E12', 'Числа месяца');
    $sheet->mergeCells('E12:AJ13');

    $cell1 = 14;
    $cell2 = 16;
    $cell3 = 18;
    $last_column = 'T';
    $j = 1;
    $date_start = strtotime($start) ;
    $date_end = strtotime($end);
    $k =  date("w",$date_start);
    $h = $date_start;

    for ($column = 'E'; $column != $last_column; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $cellll = $column.$cell3;
        $sheet->getColumnDimension("$column")->setWidth(6);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");
        $s = date("w",$h);
        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $h += 86400;

        $j++;
    }
    $sheet->mergeCells("T14:T16");
    $sheet->getColumnDimension("T")->setWidth(15);
    $sheet->setCellValue('T14', 'Итого дней (часов) явок (неявок) с 1 по 15');
    $last_column1 = 'AJ';
    $j = 16;
    $n = $h;
    $k =  date("w",$n);

    for ($column = 'U'; $column != $last_column1; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $cellll = $column.$cell3;
        $sheet->getColumnDimension("$column")->setWidth(6);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");

        $s = date("w",$n);
        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $n += 86400;
        $j++;
    }
    $last_column = 'AK';
    $i = 1;
    for ($column = 'A'; $column != $last_column; $column++) {
        $sheet->setCellValue($column.'17', "$i");
        $i++;
    }
    $sheet->mergeCells("AJ14:AJ16");
    $sheet->getColumnDimension("AJ")->setWidth(15);
    $sheet->setCellValue('AJ14', 'Итого дней (часов) явок (неявок) за месяц');
}

if ($period == 'Февраль'){
    $sheet->setCellValue('A1', 'Табель №');
    $sheet->mergeCells('A1:AH3');
    $sheet->getStyle('A1')->applyFromArray($styleFont);

    $sheet->setCellValue('A4', 'Учреждение: ФГБОУ ВО "МГУ имени Н.П.Огарева"');
    $sheet->mergeCells('A4:AH5');

    $sheet->setCellValue('A6', 'Факультет: '.$facu.'');
    $sheet->mergeCells('A6:AH7');
    $sheet->setCellValue('A8', 'Кафедра: '.$kaf.'');
    $sheet->mergeCells('A8:AH9');
    $sheet->setCellValue('A10', 'Период: '.$start.' - '.$end.', дата загрузки: '.$date_now);
    $sheet->mergeCells('A10:AH11');
    $sheet->getStyle('A4:AH11')->applyFromArray($styleFont_2);

    $sheet->setCellValue('A12', 'Фамилия, имя, отчество');
    $sheet->mergeCells('A12:A16');
    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getStyle('A12:AH17')->applyFromArray($styleFont_1);

    $sheet->setCellValue('B12', 'Учетный номер');
    $sheet->getRowDimension('16')->setRowHeight(40);
    $sheet->getColumnDimension('B')->setWidth(10);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->mergeCells('B12:C13');

    $sheet->mergeCells('B14:B16');
    $sheet->mergeCells('C14:C16');

    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->setCellValue('D12', 'Должность');
    $sheet->mergeCells('D12:D16');

    $sheet->setCellValue('E12', 'Числа месяца');
    $sheet->mergeCells('E12:AH13');

    $cell1 = 14;
    $cell2 = 16;
    $cell3 = 18;

    $last_column = 'T';
    $j = 1;
    $date_start = strtotime($start) ;
    $date_end = strtotime($end);
    $k =  date("w",$date_start);
    $h = $date_start;
    for ($column = 'E'; $column != $last_column; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $sheet->getColumnDimension("$column")->setWidth(4);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");
        $cellll = $column.$cell3;

        $s = date("w",$h);

        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $h += 86400;

        $j++;
    }
    $sheet->mergeCells("T14:T16");
    $sheet->getColumnDimension("T")->setWidth(15);
    $sheet->setCellValue('T14', 'Итого дней (часов) явок (неявок) с 1 по 15');
    $last_column1 = 'AH';
    $j = 16;

    $n = $h;
    $k =  date("w",$n);

    for ($column = 'U'; $column != $last_column1; $column++) {
        $cell = $column.$cell1;
        $celll = $column.$cell2;
        $cellll = $column.$cell3;
        $sheet->getColumnDimension("$column")->setWidth(6);
        $sheet->mergeCells("$cell:$celll");
        $sheet->setCellValue("$cell", "$j");

        $s = date("w",$n);
        if ($s == 0){
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "В");
            }
        }else{
            for($ff = 18; $ff < (18 + $ccount); $ff++){
                $cello = $column.$ff;
                $sheet->getColumnDimension("$column")->setWidth(6);
                $sheet->setCellValue("$cello", "0");
            }
        }
        $k = $k + 1;
        if ($k > 7){
            $k = 1;
        }
        $n += 86400;

        $j++;
    }

    $last_column = 'AI';
    $i = 1;
    for ($column = 'A'; $column != $last_column; $column++) {
        $sheet->setCellValue($column.'17', "$i");
        $i++;
    }
    $sheet->mergeCells("AH14:AH16");
    $sheet->getColumnDimension("AH")->setWidth(15);
    $sheet->setCellValue('AH14', 'Итого дней (часов) явок (неявок) за месяц');
}

$date_gap = strtotime($gap);
$res = mysqli_query($conn, "SELECT * FROM faculty WHERE name_faculty = '$facu'");
If (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $id_fac = $row['id_faculty'];
}
$ress = mysqli_query($conn, "SELECT * FROM department WHERE name_department = '$kaf'");
If (mysqli_num_rows($ress) > 0) {
    $rows = mysqli_fetch_array($ress);
    $id_dep = $rows['id_department'];
}
$i = 18;
$cust = mysqli_query($conn, "SELECT * FROM cus_professor WHERE id_faculty = '$id_fac' AND id_department = '$id_dep' order by  id_professor");
If (mysqli_num_rows($cust) > 0){
    while($row = mysqli_fetch_assoc($cust)) {
        $data[] = $row;
    }
    for ($j = 0; $j < count($data); $j++){
        $id_pr = $data[$j]['id_professor'];
        $id_position = $data[$j]['id_position'];

        $cuss = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id_pr'");
        If (mysqli_num_rows($cuss) > 0) {
            $custom = mysqli_fetch_array($cuss);
            $fio = $custom['FIO'];
        }

        $poss = mysqli_query($conn, "SELECT * FROM position WHERE id_position = '$id_position'");
        If (mysqli_num_rows($poss) > 0) {
            $ppos = mysqli_fetch_array($poss);
            $pos_pr = $ppos['name_position'];
        }
        $d = $j + 1;
        $sheet->setCellValue("A$i", "$d.$fio");
        $sheet->setCellValue("D$i", "$pos_pr");

        $h = $date_start;
        $s = date("w",$h);
        $name_dis = mysqli_query($conn, "SELECT DISTINCT weekday FROM timetable_class WHERE distance = 1 and id_professor = '$id_pr'");
        If (mysqli_num_rows($name_dis) > 0){
            while($cla = mysqli_fetch_assoc($name_dis)) {
                $class[] = $cla;
            }
            //echo print_r($class);
            $last_column = 'T';
            for ($column = 'E'; $column != $last_column; $column++){
                for ($g = 0; $g < count($class); $g++) {
                    $celli = $column.$i;
                    $yes = $class[$g]['weekday'];
                    $ka = date('Y-m-d', $h);
                    if ($s == $yes){
                        $redir = mysqli_query($conn, "SELECT * FROM redirection WHERE id_cus = '$id_pr' and DATE_FORMAT(datetime_start,'%Y-%m-%d') = '$ka' and cross_over = 1 order by  datetime_start");
                        if (mysqli_num_rows($redir) == 0){
                            $kolvo = mysqli_num_rows($redir);
                            $para_pr = $kolvo * 2;
                            $itog_pr += $para_pr;
                        }
                        if (mysqli_num_rows($redir) == 1){
                            $kolvo = mysqli_num_rows($redir);
                            $para_pr = $kolvo * 2;
                            $itog_pr += $para_pr;
                        }
                        if (mysqli_num_rows($redir) > 1){
                            $kolvo = mysqli_num_rows($redir);
                            $para_pr = $kolvo * 2;
                            $itog_pr += $para_pr;

                        }
                        $prom_ito = $itog_pr;
                        $tclass = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 and id_professor = '$id_pr' and weekday = '$s'");
                        If (mysqli_num_rows($tclass) > 1){
                            $kolvo = mysqli_num_rows($tclass);
                            $pust = 2 * $kolvo;
                            $itog += $pust;
                        }
                        If (mysqli_num_rows($tclass) == 1){
                            $kolvo = mysqli_num_rows($tclass);
                            $pust = 2 * $kolvo;
                            $itog += $pust;
                        }
                        $promegutok = $itog;
                        $sheet->setCellValue("$column$i", "$para_pr ($pust)");
                        $sheet->setCellValue("T$i", "$itog_pr ($itog)");
                        $sheet->getStyle("E$i:T$i")->applyFromArray($styleFont_5);
                        //echo $yes.'=>'.$class[$g + 1]['weekday'].', ';
                        //$sheet->setCellValue("$column$i", "$pust");
                    }
                    //echo $s.'=>'.$yes.'=>'.$column.$i.', ';
                }
                $h += 86400;
                $s = date("w",$h);
            }unset($class);
        }
        $itog = 0;
        $itog_pr = 0;
        $h = $date_start;
        $date_gap = strtotime($gap);
        $p = $date_gap + 86400;
        $ss = date("w",$p);
        $name_diss = mysqli_query($conn, "SELECT DISTINCT weekday FROM timetable_class WHERE distance = 1 and id_professor = '$id_pr' ");
        If (mysqli_num_rows($name_diss) > 0){
            while($claa = mysqli_fetch_assoc($name_diss)) {
                $classIS[] = $claa;
            }
            //echo print_r($classIS);
            if ($period == 'Февраль'){
                $last_column1 = 'AH';
            }
            if ($period == 'Апрель' || $period == 'Июнь' || $period == 'Сентябрь' || $period == 'Ноябрь'){
                $last_column1 = 'AJ';
            }
            if ($period == 'Январь' || $period == 'Март' || $period == 'Май' || $period == 'Июль' || $period == 'Август' || $period == 'Октябрь' || $period == 'Декабрь') {
                $last_column1 = 'AK';
            }
                for ($columno = 'U'; $columno != $last_column1; $columno++) {
                for ($gg = 0; $gg < count($classIS); $gg++){
                    $cellis = $columno.$i;
                    $yess = $classIS[$gg]['weekday'];
                    $kaa = date('Y-m-d', $p);
                    if ($ss == $yess){
                        //echo $ss.'=>'.$yess.'=>'.$columno.$i.', ';
                        $redirs = mysqli_query($conn, "SELECT * FROM redirection WHERE id_cus = '$id_pr' and DATE_FORMAT(datetime_start,'%Y-%m-%d') = '$kaa' and cross_over = 1 ");
                        if (mysqli_num_rows($redirs) == 0){
                            $kolvos = mysqli_num_rows($redirs);
                            $para_pr = $kolvos * 2;
                            $prom_ito += $para_pr;
                        }
                        if (mysqli_num_rows($redirs) == 1){
                            $kolvos = mysqli_num_rows($redirs);
                            $para_pr = $kolvos * 2;
                            $prom_ito += $para_pr;
                        }
                        if (mysqli_num_rows($redirs) > 1){
                            $kolvos = mysqli_num_rows($redir);
                            $para_pr = $kolvos * 2;
                            $prom_ito += $para_pr;
                        }
                        $tclass = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 and id_professor = '$id_pr' and weekday = '$ss'");
                        If (mysqli_num_rows($tclass) > 1){
                            $kolvo = mysqli_num_rows($tclass);
                            $pust = 2 * $kolvo;
                            $promegutok += $pust;
                        }
                        If (mysqli_num_rows($tclass) == 1){
                            $kolvo = mysqli_num_rows($tclass);
                            $pust = 2 * $kolvo;
                            $promegutok += $pust;
                        }
                        $sheet->setCellValue("$columno$i", "$para_pr ($pust)");
                        if ($period == 'Февраль'){
                            $sheet->setCellValue("AH$i", "$prom_ito ($promegutok)");
                            $sheet->getStyle("U$i:AH$i")->applyFromArray($styleFont_5);
                        }
                        if ($period == 'Январь' || $period == 'Март' || $period == 'Май' || $period == 'Июль' || $period == 'Август' || $period == 'Октябрь' || $period == 'Декабрь') {
                            $sheet->setCellValue("AK$i", "$prom_ito ($promegutok)");
                            $sheet->getStyle("U$i:AK$i")->applyFromArray($styleFont_5);
                        }
                        if ($period == 'Апрель' || $period == 'Июнь' || $period == 'Сентябрь' || $period == 'Ноябрь'){
                            $sheet->setCellValue("AJ$i", "$prom_ito ($promegutok)");
                            $sheet->getStyle("U$i:AJ$i")->applyFromArray($styleFont_5);
                        }

                    }
                }
                $p += 86400;
                $ss = date("w",$p);
            }unset($classIS);
        }
        $promegutok = 0;
        $p = $date_gap + 86400;

        if ($period == 'Февраль'){
            $sheet->getStyle("A$i:C$i")->applyFromArray($styleFont_3);
            $sheet->getStyle("D$i")->applyFromArray($styleFont_4);
            $sheet->getStyle("E$i:AH$i")->applyFromArray($styleFont_3);
            //$sheet->setCellValue("AH$i", "=SUM(T$i:AG$i)");
        }
        if ($period == 'Апрель' || $period == 'Июнь' || $period == 'Сентябрь' || $period == 'Ноябрь'){
            $sheet->getStyle("A$i:C$i")->applyFromArray($styleFont_3);
            $sheet->getStyle("D$i")->applyFromArray($styleFont_4);
            $sheet->getStyle("E$i:AJ$i")->applyFromArray($styleFont_3);
            //$sheet->setCellValue("AJ$i", "=SUM(T$i:AI$i)");
        }
        if ($period == 'Январь' || $period == 'Март' || $period == 'Май' || $period == 'Июль' || $period == 'Август' || $period == 'Октябрь' || $period == 'Декабрь') {
            $sheet->getStyle("A$i:C$i")->applyFromArray($styleFont_3);
            $sheet->getStyle("D$i")->applyFromArray($styleFont_4);
            $sheet->getStyle("E$i:AK$i")->applyFromArray($styleFont_3);
            //$sheet->setCellValue("AK$i", "=SUM(T$i:AJ$i)");
        }
        $i++;
    }
}



$filename = date("Y-m-d");

$writer = new Xlsx($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения.
//Прописываем полный путь до папки и указываем имя файла
$writer->save('C:\Users\dasho\Downloads\Tabel_'.$period.'-'.$facu.'.xlsx');

echo '<script type="text/javascript">document.location.href="tabel.php"</script>';
