<?php
function resizeImagesInFolder($folderPath)
{
    $maxFileSize = 10 * 1024 * 1024; // 1.5 MB in bytes
    $maxWidth = 1920;
    $maxHeight = 1200;

    $files = glob($folderPath . "/*.{jpg,jpeg,png}", GLOB_BRACE);

    foreach ($files as $file) {
        if (filesize($file) <= $maxFileSize) {
            echo "Bu dosya küçük: $file <br>\n ";
            continue; // Küçük dosyalara dokunma
        }

        [$width, $height, $type] = getimagesize($file);

        if (!$width || !$height) {
             echo "Geçersiz resim : $file <br>\n ";
            continue; // Geçersiz resim
        }

        // Resmi aç
        switch ($type) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($file);
                break;
            default:
                continue 2; // desteklenmiyor
        }

        // Yeni boyut oranı hesapla
        if ($width >= $height) {
            // yatay
            if ($width > $maxWidth) {
                $ratio = $maxWidth / $width;
            } else {
                $ratio = 1;
            }
        } else {
            // dikey
            if ($height > $maxHeight) {
                $ratio = $maxHeight / $height;
            } else {
                $ratio = 1;
            }
        }

        $newWidth = (int)($width * $ratio);
        $newHeight = (int)($height * $ratio);

        // Yeni boş resim oluştur
        $dst = imagecreatetruecolor($newWidth, $newHeight);

        // PNG için transparanlık
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }

        // Resize işlemi
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Aynı dosyaya kaydet
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($dst, $file, 85); // kalite %85
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($dst, $file, 6); // sıkıştırma seviyesi
        }

        imagedestroy($src);
        imagedestroy($dst);

        echo "Resized: $file <br>\n ";
    }
}
resizeImagesInFolder(__DIR__ . '/../../uploads/2025/09/');