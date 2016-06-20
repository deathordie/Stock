<?php
    require('mpdf/mpdf.php');
    echo "<table>";
    echo "<tr><td align='left'><img src='img/logo.png' height='80' width='80'></td>";
    echo "<td align='center'><h2>ใบเบิกอุปกรณ์</h2></td></tr>";
    echo "</table>";
    $html = ob_get_contents();
    ob_end_clean();
    $pdf = new mPDF('th', 'A4-L', '0', 'THSaraban');
    //$pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->WriteHTML($html, 2);
    $pdf->Output();

?>    

ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
    
