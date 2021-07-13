<?php

require '../config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Border, Alignment};

$id = $_GET['id'];

//Создаем экземпляр класса электронной таблицы
$spreadsheet = new Spreadsheet();
//Получаем текущий активный лист
$sheet = $spreadsheet->getActiveSheet();
//Стиль для шапки отчета
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
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ]
    ]
];
//Стиль для информации о профессоре
$styleFont_1 = [
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
//Стиль для вывода информации о дисциплинах
$styleFont_2 = [
    'font' => [
        'name' => 'Verdana',
        'italic' => false,
        'bold' => true,
        'size'  => 14,
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
$styleFont_3 = [
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
// Стиль для ИТОГО
$styleFont_4 = [
    'font' => [
        'name' => 'Verdana',
        'italic' => false,
        'bold' => true,
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
    'alignment' => array(
        'horizontal' => Alignment::HORIZONTAL_RIGHT,
        'vertical' => Alignment::VERTICAL_TOP,
        'wrapText' => true
    ),
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFFFFFFF',
        ],
        'endColor' => [
            'argb' => 'a9bcc6',
        ]
    ]
];

$styleFont_5 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'bold' => true,
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
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFFFFFFF',
        ],
        'endColor' => [
            'argb' => 'a9bcc6',
        ]
    ]
];

$styleFont_6 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'bold' => true,
        'size'  => 14,
        'strikethrough' => false,
        'color' => [
            'rgb' => '216100'
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

$styleFont_7 = [
    'font' => [
        'name' => 'Times New Roman',
        'italic' => false,
        'bold' => true,
        'size'  => 14,
        'strikethrough' => false,
        'color' => [
            'rgb' => 'fb4c1f'
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

// Записываем в ячейку A1 данные
$sheet->setCellValue('A1', 'Отчет о рабочем времени сотрудника');
$sheet->mergeCells('A1:H3');
$sheet->getStyle('A1')->applyFromArray($styleFont);

$res = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id' ");
If (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $name = $row['FIO'];
}
$result = mysqli_query($conn, "SELECT * FROM cus_professor WHERE id_professor = '$id' ");
If (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $id_fuc = $row['id_faculty'];
    $id_dep = $row['id_department'];
}
$faculty = mysqli_query($conn, "SELECT * FROM faculty WHERE id_faculty = '$id_fuc' ");
If (mysqli_num_rows($faculty) > 0){
    $row = mysqli_fetch_array($faculty);
    $name_fuc = $row['name_faculty'];
}
$departmet_pr = mysqli_query($conn, "SELECT * FROM department WHERE id_department = '$id_dep' ");
If (mysqli_num_rows($departmet_pr) > 0){
    $row = mysqli_fetch_array($departmet_pr);
    $name_dep = $row['name_department'];
}
$sem= mysqli_query($conn, "SELECT * FROM semester");
If (mysqli_num_rows($sem) > 0){
    $row = mysqli_fetch_array($sem);
    $start_sem = $row['date_start'];
}

$sheet->setCellValue('A4', $name);
$sheet->mergeCells('A4:H5');
$sheet->getStyle('A4:H5')->applyFromArray($styleFont_1);

$sheet->setCellValue('A6', $name_fuc);
$sheet->mergeCells('A6:H7');
$sheet->getStyle('A6:H7')->applyFromArray($styleFont_1);

$sheet->setCellValue('A8', $name_dep);
$sheet->mergeCells('A8:H9');
$sheet->getStyle('A8:H9')->applyFromArray($styleFont_1);

$sheet->setCellValue('A10', 'Период выгрузки: с '.date("d-m-Y",strtotime($start_sem)).' по '.date("d-m-Y"));
$sheet->mergeCells('A10:H11');
$sheet->getStyle('A10:H11')->applyFromArray($styleFont_1);

$sheet->setCellValue('A12', "Наименование дисциплины");
$sheet->getColumnDimension('A')->setWidth(23);
$sheet->getStyle('A12')->applyFromArray($styleFont_2);

$sheet->setCellValue('B12', "Группа");
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getStyle('B12')->applyFromArray($styleFont_2);

$sheet->setCellValue('C12', "Дата проведения пары");
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getStyle('C12')->applyFromArray($styleFont_2);

$sheet->setCellValue('D12', "Время начала");
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getStyle('D12')->applyFromArray($styleFont_2);

$sheet->setCellValue('E12', "Время окончания");
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getStyle('E12')->applyFromArray($styleFont_2);

$sheet->setCellValue('G12', "Длительность пары");
$sheet->getColumnDimension('G')->setWidth(25);
$sheet->getStyle('G12')->applyFromArray($styleFont_2);

$sheet->setCellValue('F12', "Статус ссылки");
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getStyle('F12')->applyFromArray($styleFont_2);

$sheet->setCellValue('H12', "Статус проведения пары");
$sheet->getColumnDimension('H')->setWidth(20);
$sheet->getStyle('H12')->applyFromArray($styleFont_2);

$date_e = date("Y-m-d");
$sem = mysqli_query($conn, "SELECT * FROM semester WHERE id_semester = 1 ");
$semes = mysqli_fetch_array($sem);
$date_sta = $semes['date_start'];

$date_start = strtotime($date_sta) ;
$date_end = strtotime($date_e);
$k =  date("w",$date_start);
$countPar = 0;
$prov = 0;
$timeProv = 0;
$d = 12;

for ($i = $date_start; $i <= $date_end; $i += 86400){
    $name_dis = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 AND weekday = '$k' and id_professor = '$id'");
    If (mysqli_num_rows($name_dis) > 0) {
        $row_1 = mysqli_fetch_array($name_dis);
        $ka =  date("w",$i);
        if ($ka = $row_1['weekday']){
            $s = date('Y-m-d', $i);
        }
        do{
            $id_dis = $row_1['name_discipline'];
            $result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
            If (mysqli_num_rows($result) > 0){
                $prr = mysqli_fetch_array($result);
                $disss = $prr['name_discipline'];
            }
            $para = $row_1['number_para'];

            $lin = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND number_para = '$para' AND date_para = '$s'AND date_para BETWEEN '$date_sta' AND '$date_e' ORDER BY date_para");
            If (mysqli_num_rows($lin) > 0){
                $link = mysqli_fetch_array($lin);
                $dateee = $link['date_para'];
                $link_disc = $link['link'];
                $stat = $link['status'];
            }

            $par = mysqli_query($conn, "SELECT * FROM timetable_call WHERE id_call = '$para'");
            If (mysqli_num_rows($par) > 0){
                $numPara = mysqli_fetch_array($par);
                $start = $numPara['time_start'];
                $stop = $numPara['time_stop'];
            }
            $redir = mysqli_query($conn, "SELECT * FROM redirection WHERE id_cus = '$id' and id_dis = '$id_dis' AND DATE_FORMAT(datetime_start,'%Y-%m-%d') = '$dateee' AND para = '$para'");
            If (mysqli_num_rows($redir) > 0){
                $row = mysqli_fetch_array($redir);
                $datetime_start = $row['datetime_start'];
                $start_date = date("Y-m-d",strtotime($datetime_start));
                $datetime_stop = $row['datetime_stop'];
                $gr = $row['number_group'];
                $time_para = $row['time_para'];
                $cross_over = $row['cross_over'];
                $para_red = $row['para'];
            }
$ttime_para = strtotime("01:20:00");
            $d++;
            if ($dateee == $s){
                if ($stat == 1){
                    If (mysqli_num_rows($redir) > 0){
                        if ($datetime_start == $datetime_stop){
                            $sheet->setCellValue("A$d", $disss);
                            $sheet->setCellValue("B$d", $row_1['group_kurs']);
                            $sheet->setCellValue("C$d", $s."(".$para.")");
                            $sheet->setCellValue("D$d", date('H:i:s', strtotime($datetime_start)));
                            $sheet->setCellValue("E$d", date('-----', strtotime($datetime_stop)));
                            $sheet->setCellValue("F$d", "Действительна");
                            $sheet->setCellValue("G$d", "-----");
                            $sheet->setCellValue("H$d", "Проводится");
                            $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_6);
                        }elseif ($ttime_para > strtotime($time_para)){
                            $sheet->setCellValue("A$d", $disss);
                            $sheet->setCellValue("B$d", $row_1['group_kurs']);
                            $sheet->setCellValue("C$d", $s."(".$para.")");
                            $sheet->setCellValue("D$d", date('H:i:s', strtotime($datetime_start)));
                            $sheet->setCellValue("E$d", date('H:i:s', strtotime($datetime_stop)));
                            $sheet->setCellValue("F$d", "Действительна");
                            $sheet->setCellValue("G$d", $time_para);
                            $sheet->setCellValue("H$d", "Не проведено");

                            $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_7);
                        }else{
                            $sheet->setCellValue("A$d", $disss);
                            $sheet->setCellValue("B$d", $row_1['group_kurs']);
                            $sheet->setCellValue("C$d", $s."(".$para.")");
                            $sheet->setCellValue("D$d", date('H:i:s', strtotime($datetime_start)));
                            $sheet->setCellValue("E$d", date('H:i:s', strtotime($datetime_stop)));
                            $sheet->setCellValue("F$d", "Действительна");
                            $sheet->getStyle("G$d")->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
                            $sheet->setCellValue("G$d", $time_para);
                            $sheet->setCellValue("H$d", "Проведено");
                            $sheet->setCellValue("S$d", "= TIMEVALUE(G$d)");
                            $sheet->getCell("S$d")->getCalculatedValue();
                            $sheet->getColumnDimension('S')->setVisible(false);

                            $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_6);
                            $prov += 1;
                            $part = explode(':', $time_para);
                            $a = $part[0]*3600 + $part[1]*60 + $part[2];
                            $timeProv = $timeProv + $a;
                        }
                    }
                    If (mysqli_num_rows($redir) == 0){
                        $sheet->setCellValue("A$d", $disss);
                        $sheet->setCellValue("B$d", $row_1['group_kurs']);
                        $sheet->setCellValue("C$d", $s."(".$para.")");
                        $sheet->setCellValue("D$d", date('H:i:s', strtotime($datetime_start)));
                        $sheet->setCellValue("E$d", date('H:i:s', strtotime($datetime_stop)));
                        $sheet->setCellValue("F$d", "Действительна");
                        $sheet->setCellValue("G$d", "00:00:00");
                        $sheet->setCellValue("H$d", "Не проведено");
                        $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_7);
                    }

                }else{
                    $sheet->setCellValue("A$d", $disss);
                    $sheet->setCellValue("B$d", $row_1['group_kurs']);
                    $sheet->setCellValue("C$d", $s."(".$para.")");
                    $sheet->setCellValue("D$d", "-----");
                    $sheet->setCellValue("E$d", "-----");
                    $sheet->setCellValue("F$d", "Не действительна");
                    $sheet->getStyle("G$d")->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
                    $sheet->setCellValue("G$d", "-----");
                    $sheet->setCellValue("H$d", "-----");

                    $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_7);
                }
            }else{
                $sheet->setCellValue("A$d", $disss);
                $sheet->setCellValue("B$d", $row_1['group_kurs']);
                $sheet->setCellValue("C$d", $s."(".$para.")");
                $sheet->setCellValue("D$d", $start);
                $sheet->setCellValue("E$d", $stop);
                $sheet->setCellValue("F$d", "Нет ссылки");
                $sheet->getStyle("G$d")->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
                $sheet->setCellValue("G$d", "00:00:00");
                $sheet->setCellValue("H$d", "Отсутстует");

                $sheet->getStyle("A$d:H$d")->applyFromArray($styleFont_3);
            }
            $countPar += 1;
        } while($row_1 = mysqli_fetch_array($name_dis));
    }
    $k = $k + 1;
    if ($k > 6 ){
        $i += 86400;
        $k = 1;
    }
}
    $d++;
    $j = $d + 1;
    $sheet->mergeCells("A$d:F$j");
    $sheet->setCellValue("A$d", 'Итого: ');
    $sheet->getStyle("A$d:F$j")->applyFromArray($styleFont_4);
    $sheet->getStyle("G$d:H$j")->applyFromArray($styleFont_5);


    function secondsToTime($seconds)
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a д., %H:%I:%S');
    }

    function secondsToTimee($seconds)
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%H:%I:%S');
    }

    $time_itog = '01:30:00';
    $part = explode(':', $time_itog);
    $a = $part[0] * 3600 + $part[1] * 60 + $part[2];
    //$ttime = date("d H:i:s", mktime(0, 0, $a * $countPar));
    //$ttime = date('H:i:s', $countPar * $a);
    $ttime = secondsToTime($a * $countPar);
    $timeProv1 = secondsToTimee($timeProv);

    $k = $d - 1;

    $sheet->mergeCells("G$d:G$j");
    $sheet->getStyle("G$d")->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_TIME8);
    $sheet->setCellValue("G$d","=SUM(S13:S$k)");
    $sheet->getCell("H$d")->getCalculatedValue();

    $sheet->mergeCells("H$d:H$j");
    $sheet->setCellValue("H$d", $prov.' / '.$countPar);
$filename = date("Y-m-d");

$writer = new Xlsx($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения.
//Прописываем полный путь до папки и указываем имя файла
$writer->save('C:\Users\dasho\Downloads\Otchet_'.$filename.'-'.$id.'.xlsx');

echo '<script type="text/javascript">document.location.href="repost_time_prof.php"</script>';