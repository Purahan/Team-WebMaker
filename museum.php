<?php
    // Session Start
    session_start();
?>
<?php
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    if(!isset($_GET['museum'])){
        header("Location: book.php");
    }
?>
<?php
    if($_GET['museum']==1) {
        header("Location: https://artsandculture.google.com/streetview/the-natural-history-museum/JQF3coVswSVUVw?sv_lng=-0.1763095666940444&sv_lat=51.49585077079966&sv_h=349.7214560100194&sv_p=7.317086054834945&sv_pid=JjkDPElblDKT7EbT7wN9dw&sv_z=1.6578940231750074");
    }
    else {
        header("Location: https://artsandculture.google.com/streetview/van-gogh-museum-groundfloor/2QHwyv_Y6gueAw?sv_lng=4.881116679300609&sv_lat=52.35827690478066&sv_h=339.39457660908386&sv_p=-2.2390664344936795&sv_pid=XgEzf7Uj1a2wDLc0p6yh3w&sv_z=1.0000000000000002");
    }
?>