<?php
require_once( dirname(__FILE__) . '/wp-load.php' );
require_once( ABSPATH . 'wp-admin/includes/taxonomy.php' );
require_once( ABSPATH . 'wp-admin/includes/post.php' );

$filePath = __DIR__ . '/sonicerik2.csv';
$do_import = isset($_GET['import']) && $_GET['import'] == 1;

if (!file_exists($filePath)) {
    die("❌ CSV dosyası bulunamadı: $filePath");
}

if (($handle = fopen($filePath, "r")) !== FALSE) {
    $header = fgetcsv($handle, 10000, ",");
    $row_num = 0;

    echo "<pre>";

    while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {
        $row_num++;
        $data = array_combine($header, $row);

        // Boş satırları atla
        if (empty($data['EnglishTitle'])) continue;

        // Alan eşleştirmeleri
        $post_title   = trim($data['EnglishTitle']);
        $post_content = trim($data['EnglishDescription'] ?? '');
        $turkish_name = trim($data['OriginalTitle'] ?? '');
        $director     = $data['Director'] ?? '';
        $writer       = $data['Writer'] ?? '';
        $cast         = $data['Cast'] ?? '';
        $genre        = $data['Genre'] ?? '';
        $language     = $data['OriginalLanguage'] ?? '';
        $year         = $data['ProductionYear'] ?? '';
        $company      = $data['Producer'] ?? '';
        $presented    = $data['Host'] ?? '';
        $notes        = $data['Poster']." - ".$data['Promo']." - ".$data['Notlar']." - ".$data['PromoLink']?? '';
        $note1        = $data['notlar1'] ?? '';

        // Episodes x Duration alanından bölüm sayısını ayıkla
        $episode = "1 Season, ".$data['Episodes']."x".$data['Duration']." mins" ?? '';
        $existing = get_page_by_title($post_title, OBJECT, 'filim');
        //print_r($existing);
        
        // Verileri göster (önizleme)
        echo "-----------------------------------------\n";
        echo "Row: {$row_num} -> <a target='_blank' href=".$existing->guid."> Görüntüle</a>\n";
        echo '<a href="https://todstudio.thecode.com.tr/wp-admin/post.php?post='.$existing->ID.'&action=edit" target="_blank"> Düzenle </a>'."\n";
        echo "Title (English): {$post_title}\n";
        echo "desc (English): {$post_content}\n";
        echo "Turkish Name: <b>{$turkish_name}</b>\n";
        echo "Director: {$director}\n";
        echo "Writer: {$writer}\n";
        echo "Cast: {$cast}\n";
        echo "Genre: {$genre}\n";
        echo "Language: {$language}\n";
        echo "Episode: {$episode}\n";
        echo "Year: {$year}\n";
        echo "Company: {$company}\n";
        echo "Presented: ($presented)\n";
        echo "Notes: <b>{$note1}</b>\n";
        echo "-----------------------------------------\n\n";

        // Eğer ?import=1 parametresi varsa kayıt işlemini yap

         if(strpos($post_title ,"Season") !== false)
         {
            echo "season var kaydetme \n";
            continue;
         }
         //&& strpos($post_title,"Cooking by") !== false do_import
        if ($efess == 3213213211) {
         
            
            if ($existing) {
                // Güncelleme
                $post_id = $existing->ID;
                wp_update_post([
                    'ID'           => $post_id,
                    'post_content' => $post_content,
                    'post_status'  => 'publish',
                ]);
                echo "✅ {$post_title} güncellendi.\n";
            } else {
                // Yeni ekleme
                $post_id = wp_insert_post([
                    'post_title'   => $post_title,
                    'post_content' => $post_content,
                    'post_status'  => 'publish',
                    'post_type'    => 'filim',
                ]);
                echo "🆕 {$post_title} eklendi.\n";
            }

            if (is_wp_error($post_id)) {
                echo "❌ {$post_title} eklenemedi.\n";
                continue;
            }

            // 📂 Kategori atama işlemi
            $category_id = empty(trim($data['Type'])) ? 5 : 6;
            wp_set_post_terms($post_id, [$category_id], 'category', false);

            // ACF alanlarını güncelle
            //$writer = $row_num > 73?"-":$writer;
            update_field('turkish_name', $turkish_name, $post_id);
            update_field('director', $director, $post_id);
            update_field('scriprwriter', $writer, $post_id);
            update_field('cast', $cast, $post_id);
            update_field('genre', $genre, $post_id);
            update_field('language', $language, $post_id);
            update_field('episode', $episode, $post_id);
            update_field('year', $year, $post_id);
            update_field('company', $company, $post_id);
            update_field('presented', $presented, $post_id);
            update_field('notes', $notes, $post_id);

            //echo "✅ {$post_title} başarıyla eklendi.\n\n";
        }
    }

    echo "</pre>";
    fclose($handle);
}

if (!$do_import) {
    echo "<p style='color:green;font-weight:bold'>
    🔍 Önizleme modundasınız.<br>
    Kayıtları WordPress'e eklemek için URL'ye <code>?import=1</code> ekleyin.<br>
    Örnek: <code>https://alanadiniz.com/import-films-csv.php?import=1</code>
    </p>";
}