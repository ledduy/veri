<?php

require_once "kl-IOTools.php";

$imgDir = "image_query";
$inputDir = sprintf("/home/mmlab/veri/VeRi-Dataset/%s", $imgDir);

// collect files in one mysqli_fetch_field_direct

$arImgList = collectFilesInOneDir($inputDir, $szFilter="", $szExt=".jpg");

$nCount = 0;
$arOutput = array();
foreach($arImgList as $szImgName)
{
    printf("%d. %s\n", $nCount, $szImgName);

    $szImgPath = sprintf("../VeRi-Dataset/%s/%s.jpg", $imgDir, $szImgName);
    $szURL = sprintf("<IMG SRC='%s' WIDTH=%d>\n", $szImgPath, $nThumbWidth=150);
    printf("%s\n", $szURL);

    $arOutput[] = $szURL;

    if($nCount %5 == 0)
    {
        $arOutput[] = "<BR>";
    }
    $nCount++;
}

$szOutputFN = sprintf("%s.htm", $imgDir);
saveDataFromMem2File($arOutput, $szOutputFN);



?>
