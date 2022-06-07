<?php         
            $limit                 = 6; // Tek sayfa için gösterme limiti
            @$url1=$_SERVER['REQUEST_URI'];
            $parca=explode("pge=",$url1);


            $pge                = @$parca[1];  

            if(($pge=="") or !is_numeric($pge)) { $pge = 1; }
            $satirsayisi         = $mysqli->query("SELECT * from $yourTableName")->num_rows; 
            $toplamsayfa         = ceil($satirsayisi/$limit);
            $baslangic          = ($pge-1)*$limit;
?>


<!-- Çoğaltılacak HTML kodu  -->


<ul class="pagination float-end">
                            
                         
                          
<?php
if ($toplamsayfa > 1) {
    $forlimit = 1;

    if ($pge > 1) {
        echo ' <li class="page-item"><a class="page-link" href="' . $katurl . '?pge=' . ($pge - 1) . '"><i class="fas fa-angle-left"></i></a>
        </li>';
    }
    for ($y = $pge - $forlimit; $y <= $pge + $forlimit + 1; $y++) {
        if ($y > 0 && $y <= $toplamsayfa) {
            if ($y == $pge) {
                echo '<li class="page-item active"><a class="page-link" >' . $y . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="' . $katurl . '?pge=' . $y . '">' . $y . '</a></li>';
            }
        }
    }
    if ($pge != $toplamsayfa) {
        echo '<li class="page-item"><a class="page-link" href="' . $katurl . '?pge=' . ($pge + 1) . '"><i class="fas fa-angle-right"></i></a>
        </li>';
    }
}
?>
</ul>
