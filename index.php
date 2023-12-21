<html>
<head>
    <title>Форма заполнения</title>
</head>
<body>
<form action="index.php" method="post">
    <label>
        <input type="text" name="text">
    </label>
    <input type="submit" value="Отправить">
</form>
</body>
</html>
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

$TestSlovo='four 52 along 96 25 gym root 15 hat 73 bank success 38 46';
if (isset($_POST["text"]))$TestSlovo=$_POST["text"];
SortBySvyatoslav($TestSlovo);
function OutSlovo($MassSlovo,$i)
{
    echo $i+1;
    foreach ($MassSlovo as $Slovo) echo " ".$Slovo;
    echo '</br>';
}

function SortBySvyatoslav(String $TestSlovo)
    {
        $MassSlovo=explode(" ",$TestSlovo);
        for($i=0; $i<count($MassSlovo); $i++)
        {
            $slovo="";
            $slovoI=-1;
            $num=0;
            $numI=0;
            for($j=$i;$j<count($MassSlovo);$j++)//для строк
            {
                if(!is_numeric($MassSlovo[$j]) && $MassSlovo[$j]!="")
                {
                    if($slovo=="") {$slovo=$MassSlovo[$j];$slovoI=$j;}
                    if(strcasecmp($MassSlovo[$j], $slovo )<=0 )
                    {
                        $slovo=$MassSlovo[$j];
                        $slovoI=$j;
                    }
                }
            }
            if($slovo!="")
            {
                unset($MassSlovo[$slovoI]);
                array_unshift($MassSlovo, $slovo);
            }
            for($jj=count($MassSlovo)-$i-1;$jj>=0;$jj--)//для цифр
            {
                if(is_numeric($MassSlovo[$jj]))
                {
                    if($num==0) {$num=intval($MassSlovo[$jj]); $numI=$jj;}
                    if(intval($MassSlovo[$jj])>= $num )
                    {
                        $num=intval($MassSlovo[$jj]);
                        $numI=$jj;
                    }
                }
            }
            if($num!=0)
            {
                unset($MassSlovo[$numI]);
                array_push($MassSlovo, $num);
            }
            if($slovo!="" || $num!=0) OutSlovo($MassSlovo,$i);
        }
    }
?>