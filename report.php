<?php

session_start();
require('fpdf/fpdf.php');
require('connect.php');
require('./function.php');
define('FPDF_FONTPATH', 'fpdf/font/');
date_default_timezone_set("asia/bangkok");
$date = date("Y-m-d");
if ($_GET['id']) {
    
        $result = view("select SUBSTRING(withdraw_date,1,10) as withdraw_date from withdraw where withdraw_id= " . $_GET['id'] . " ");
        $pdf = new fpdf();
        $pdf->AddFont('angsana', '', 'angsa.php');
        $pdf->AddFont('angsana', 'B', 'angsab.php');
        $pdf->AddFont('angsana', 'I', 'angsai.php');
        $pdf->AddFont('angsana', 'BI', 'angsaz.php');

        $pdf->AddPage();
        $pdf->setXY(10, 10);
        $pdf->Image('img/logo1.jpg', 10, 10, 30);
        $pdf->setXY(45, 15);
        $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
        $pdf->setXY(45, 20);
        $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
        $pdf->setXY(45, 25);
        $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
        $pdf->setXY(45, 30);
        $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');


        $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
        $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "ใบเบิกอุปกรณ์"), 0, 1, 'C');

        $pdf->setXY(10, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
        $pdf->SetFont('angsana', '', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "วันที่เบิก : " . $result[0]['withdraw_date']), 0, 1, 'R');

        $pdf->setXY(10, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
        $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
        $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

        $pdf->setXY(30, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
        $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

        $pdf->setXY(120, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
        $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

        $setY = 70;
        $i = 1;
        $result = view("select * from product a,withdrawdetail b, brand c, model d, productdetail e ,withdraw f,employee g,category h where a.category_id = h.category_id and f.emp_id = g.emp_id and b.withdraw_id = f.withdraw_id and a.prod_id = e.prod_id and e.serial = b.serial and a.brand_id = c.brand_id and a.model_id = d.model_id and b.withdraw_id = " . $_GET['id'] . " order by h.category_name");
        foreach ($result as $data) {
            $txt = $data['detail'];
            $txt1 = $data['withdrawname'];
            $txt2 = $data['emp_fname'];
            if ($setY < 260) {
                $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', '', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", $data['brand_name'] . ' ' . $data['model_name']), 1, 0, 'C');

                $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", $data['serial']), 1, 0, 'C');

                $setY+=10;
                $i++;
            } else {
                $pdf->AddPage();

                $pdf->setXY(10, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                $pdf->setXY(30, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                $pdf->setXY(120, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

                $setY = 20;

                $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "" . $data['brand_name'] . " " . $data['model_name'] . ""), 1, 0, 'C');

                $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "" . $data['serial'] . ""), 1, 0, 'C');

                $setY+=10;
                $i++;
            }
        
    }
    $pdf->setXY(10, $setY + 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
    $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "หมายเหตุ : " . $txt), 0, 0, 'L');

    $pdf->setXY(10, $setY + 20); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
    $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "ผู้เบิก : " . $txt1), 0, 0, 'L');

    $pdf->setXY(10, $setY + 30); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
    $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "ผู้จ่าย : " . $txt2), 0, 0, 'L');

    $pdf->setXY(10, $setY + 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
    $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "ผู้อนุมัติ : "), 0, 0, 'L');

    $pdf->Output();
} else {
    if ($_GET['type'] == 1) {
        if ($_GET['order'] == 1) {
            $pdf = new fpdf();
            $pdf->AddFont('angsana', '', 'angsa.php');
            $pdf->AddFont('angsana', 'B', 'angsab.php');
            $pdf->AddFont('angsana', 'I', 'angsai.php');
            $pdf->AddFont('angsana', 'BI', 'angsaz.php');

            $pdf->AddPage();
            $pdf->setXY(10, 10);
            $pdf->Image('img/logo1.jpg', 10, 10, 30);
            $pdf->setXY(45, 15);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
            $pdf->setXY(45, 20);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
            $pdf->setXY(45, 25);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
            $pdf->setXY(45, 30);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');


            $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "รายงานสินค้าคงเหลือ วันที่ " . $date), 0, 1, 'C');

            $pdf->setXY(10, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

            $pdf->setXY(30, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

            $pdf->setXY(120, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

            $setY = 60;
            $i = 1;

            $result = view("SELECT * from product a,productdetail b,brand c,model d where a.brand_id = c.brand_id and a.model_id = d.model_id and a.prod_id = b.prod_id and b.status = 0 order by c.brand_name asc");
            foreach ($result as $data) {
                if ($setY < 260) {
                    $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "" . $data['brand_name'] . " " . $data['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "" . $data['serial'] . ""), 1, 0, 'C');

                    $setY+=10;
                    $i++;
                } else {
                    $pdf->AddPage();

                    $pdf->setXY(10, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                    $pdf->setXY(30, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                    $pdf->setXY(120, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

                    $setY = 35;

                    $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "" . $data['brand_name'] . " " . $data['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "" . $data['serial'] . ""), 1, 0, 'C');

                    $setY+=10;
                    $i++;
                }
            }

            $pdf->Output();
        } else {
            $pdf = new fpdf();
            $pdf->AddFont('angsana', '', 'angsa.php');
            $pdf->AddFont('angsana', 'B', 'angsab.php');
            $pdf->AddFont('angsana', 'I', 'angsai.php');
            $pdf->AddFont('angsana', 'BI', 'angsaz.php');
            $pdf->AddPage();
            $pdf->setXY(10, 10);
            $pdf->Image('img/logo1.jpg', 10, 10, 30);
            $pdf->setXY(45, 15);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
            $pdf->setXY(45, 20);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
            $pdf->setXY(45, 25);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
            $pdf->setXY(45, 30);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');

            $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "รายงานสินค้าคงเหลือ"), 0, 1, 'C');

            $pdf->setXY(30, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

            $pdf->setXY(50, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

            $pdf->setXY(115, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "จำนวน"), 1, 0, 'C');

            $setY = 60;
            $i = 1;



            $result1 = view("SELECT * from product a,brand c,model d, category e where a.brand_id = c.brand_id and a.model_id = d.model_id group by a.prod_id order by c.brand_name asc");
            foreach ($result1 as $data1) {
                $txt = $data['detail'];
                $txt1 = $data['withdrawname'];
                if ($setY < 260) {
                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(50, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(115, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['amount'] . ""), 1, 0, 'C');


                    $setY+=10;
                    $i++;
                } else {
                    $pdf->AddPage();

                    $pdf->setXY(10, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                    $pdf->setXY(30, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                    $pdf->setXY(95, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "จำนวน"), 1, 0, 'C');

                    $setY = 20;

                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(50, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(115, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['amount'] . ""), 1, 0, 'C');

                    $setY+=10;
                    $i++;
                }
            }
        }
        $pdf->Output();
    } else {
        if ($_GET['type'] == 1) {
            $pdf = new fpdf();
            $pdf->AddFont('angsana', '', 'angsa.php');
            $pdf->AddFont('angsana', 'B', 'angsab.php');
            $pdf->AddFont('angsana', 'I', 'angsai.php');
            $pdf->AddFont('angsana', 'BI', 'angsaz.php');

            $pdf->AddPage();
            $pdf->setXY(10, 10);
            $pdf->Image('img/logo1.jpg', 10, 10, 30);
            $pdf->setXY(45, 15);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
            $pdf->setXY(45, 20);
            $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
            $pdf->setXY(45, 25);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
            $pdf->setXY(45, 30);
            $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');


            $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "ใบเบิกอุปกณ์"), 0, 1, 'C');

            $pdf->setXY(10, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 16);
            $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "วันที่เบิกสินค้า : " . $date . " "), 0, 1, 'R');

            $pdf->setXY(10, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

            $pdf->setXY(30, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

            $pdf->setXY(120, 60); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
            $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

            $setY = 70;
            $i = 1;

            $result = view("select * from product a,productdetail b,withdraw c,withdrawdetail d,brand e,model f,category h where a.category_id = h.category_iad and a.brand_id = e.brand_id and a.model_id = f.model_id and a.prod_id = d.prod_id and b.serial = d.serial and c.withdraw_id = d.withdraw_id and c.withdraw_id = " . $_GET['id'] . " order by h.category_name asc");
            foreach ($result as $data) {
                if ($setY < 260) {
                    $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "" . $data['brand_name'] . " " . $data['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "" . $data['serial'] . ""), 1, 0, 'C');

                    $setY+=10;
                    $i++;
                } else {
                    $pdf->AddPage();

                    $pdf->setXY(10, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                    $pdf->setXY(30, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                    $pdf->setXY(120, 25); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

                    $setY = 35;

                    $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                    $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                    $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(90, 10, iconv("UTF-8", "TIS-620", "" . $data['brand_name'] . " " . $data['model_name'] . ""), 1, 0, 'C');

                    $pdf->setXY(120, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                    $pdf->Cell(80, 10, iconv("UTF-8", "TIS-620", "" . $data['serial'] . ""), 1, 0, 'C');

                    $setY+=10;
                    $i++;
                }
            }


            $pdf->Output();
        } else {
            if ($_GET['order'] == 1) {
                $pdf = new fpdf();
                $pdf->AddFont('angsana', '', 'angsa.php');
                $pdf->AddFont('angsana', 'B', 'angsab.php');
                $pdf->AddFont('angsana', 'I', 'angsai.php');
                $pdf->AddFont('angsana', 'BI', 'angsaz.php');

                $pdf->AddPage();
                $pdf->setXY(10, 10);
                $pdf->Image('img/logo1.jpg', 10, 10, 30);
                $pdf->setXY(45, 15);
                $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
                $pdf->setXY(45, 20);
                $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
                $pdf->setXY(45, 25);
                $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
                $pdf->setXY(45, 30);
                $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');


                $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "รายงานการเบิกอุปกณ์ วันที่ " . $_GET['datebegin'] . " ถึงวันที่ " . $_GET['dateend'] . " "), 0, 1, 'C');

                $pdf->setXY(10, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                $pdf->setXY(30, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                $pdf->setXY(95, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

                $pdf->setXY(160, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(40, 10, iconv("UTF-8", "TIS-620", "วันที่เบิก"), 1, 0, 'C');

                $setY = 60;
                $i = 1;

                $result = view("select * from withdraw where SUBSTRING(withdraw_date,1,10) >= '" . $_GET['datebegin'] . "' and SUBSTRING(withdraw_date,1,10) <= '" . $_GET['dateend'] . "' order by withdraw_id");
                foreach ($result as $data) {
                    $result1 = view("select * from product a,productdetail b,withdraw c,withdrawdetail d,brand e,model f where a.brand_id = e.brand_id and a.model_id = f.model_id and a.prod_id = d.prod_id and b.serial = d.serial and c.withdraw_id = d.withdraw_id and c.withdraw_id = " . $data['withdraw_id'] . " order by c.withdraw_date");
                    foreach ($result1 as $data1) {
                        $txt = $data['detail'];
                        $txt1 = $data['withdrawname'];
                        if ($setY < 260) {
                            $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                            $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                            $pdf->setXY(95, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['serial'] . ""), 1, 0, 'C');

                            $pdf->setXY(160, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(40, 10, iconv("UTF-8", "TIS-620", "" . $data1['withdraw_date'] . ""), 1, 0, 'C');

                            $setY+=10;
                            $i++;
                        } else {
                            $pdf->AddPage();

                            $pdf->setXY(10, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                            $pdf->setXY(30, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                            $pdf->setXY(95, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "Serial Number"), 1, 0, 'C');

                            $pdf->setXY(160, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(40, 10, iconv("UTF-8", "TIS-620", "วันที่เบิก"), 1, 0, 'C');

                            $setY = 20;

                            $pdf->setXY(10, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                            $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                            $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                            $pdf->setXY(95, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['serial'] . ""), 1, 0, 'C');

                            $pdf->setXY(160, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                            $pdf->Cell(40, 10, iconv("UTF-8", "TIS-620", "" . $data1['withdraw_date'] . ""), 1, 0, 'C');
                            ;

                            $setY+=10;
                            $i++;
                        }
                    }
                }
                $pdf->Output();
            } else {
                $pdf = new fpdf();
                $pdf->AddFont('angsana', '', 'angsa.php');
                $pdf->AddFont('angsana', 'B', 'angsab.php');
                $pdf->AddFont('angsana', 'I', 'angsai.php');
                $pdf->AddFont('angsana', 'BI', 'angsaz.php');

                $pdf->AddPage();
                $pdf->setXY(10, 10);
                $pdf->Image('img/logo1.jpg', 10, 10, 30);
                $pdf->setXY(45, 15);
                $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "บริษัท แทค อินโฟ จำกัด"), 0, 1, 'L');
                $pdf->setXY(45, 20);
                $pdf->SetFont('angsana', 'B', 18); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "TAC INFO CO., LTD."), 0, 1, 'L');
                $pdf->setXY(45, 25);
                $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "555 ถนน มวมินทร์ แขวง คลองกุ่ม กรุงทเพมหานคร 10240"), 0, 1, 'L');
                $pdf->setXY(45, 30);
                $pdf->SetFont('angsana', '', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "โทรศัพท์ 02-744-2222 โทรสาร 02-379-1111 : www.tacinfo.co.th"), 0, 1, 'L');


                $pdf->setXY(10, 40); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 20); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(0, 0, iconv("UTF-8", "TIS-620", "รายงานการเบิกอุปกณ์ วันที่ " . $_GET['datebegin'] . " ถึงวันที่ " . $_GET['dateend'] . " "), 0, 1, 'C');

                $pdf->setXY(30, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                $pdf->setXY(50, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                $pdf->setXY(115, 50); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "จำนวน"), 1, 0, 'C');

                $setY = 60;
                $i = 1;



                $result1 = view("select a.prod_id,COUNT(a.prod_id) as amount,e.brand_name,f.model_name from product a,productdetail b,withdraw c,withdrawdetail d,brand e,model f where SUBSTRING(c.withdraw_date,1,10) >= '" . $_GET['datebegin'] . "' and SUBSTRING(c.withdraw_date,1,10) <= '" . $_GET['dateend'] . "' and a.brand_id = e.brand_id and a.model_id = f.model_id and a.prod_id = d.prod_id and b.serial = d.serial and c.withdraw_id = d.withdraw_id group by a.prod_id order by e.brand_name asc");
                foreach ($result1 as $data1) {
                    $txt = $data['detail'];
                    $txt1 = $data['withdrawname'];
                    if ($setY < 260) {
                        $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                        $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                        $pdf->setXY(50, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                        $pdf->setXY(115, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['amount'] . ""), 1, 0, 'C');


                        $setY+=10;
                        $i++;
                    } else {
                        $pdf->AddPage();

                        $pdf->setXY(10, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                        $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", "ลำดับ"), 1, 0, 'C');

                        $pdf->setXY(30, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "อุปกรณ์/รุ่น"), 1, 0, 'C');

                        $pdf->setXY(95, 10); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "จำนวน"), 1, 0, 'C');

                        $setY = 20;

                        $pdf->setXY(30, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->SetFont('angsana', 'B', 16); //กำหนด font angsana ตัวหนา ขนาด 14 
                        $pdf->Cell(20, 10, iconv("UTF-8", "TIS-620", $i), 1, 0, 'C');

                        $pdf->setXY(50, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['brand_name'] . " " . $data1['model_name'] . ""), 1, 0, 'C');

                        $pdf->setXY(115, $setY); //แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
                        $pdf->Cell(65, 10, iconv("UTF-8", "TIS-620", "" . $data1['amount'] . ""), 1, 0, 'C');

                        $setY+=10;
                        $i++;
                    }
                }
            }
            $pdf->Output();
        }
    }
}
?>    
