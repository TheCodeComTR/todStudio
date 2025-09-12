// Search Result Page Functionality
$(document).ready(function() {
    // Mock data - arama sonuçları
    const mockSearchResults = [
        {
            title: "TELLUS EGET ODIO",
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
        },
        {
            title: "MASSA ALIQUAM",
            description: "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        {
            title: "JUSTO DIAM",
            description: "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."
        },
        {
            title: "NUNC VELIT",
            description: "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet."
        },
        {
            title: "CONSECTETUR ADIPISCING",
            description: "Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam."
        },
        {
            title: "ELIT SED DO",
            description: "Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit."
        },
        {
            title: "EIUSMOD TEMPOR",
            description: "Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit."
        },
        {
            title: "INCIDIDUNT UT",
            description: "Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore."
        },
        {
            title: "LABORE ET DOLORE",
            description: "Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
        },
        {
            title: "MAGNA ALIQUA",
            description: "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat."
        },
        {
            title: "UT ENIM AD",
            description: "Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
        },
        {
            title: "QUIS NOSTRUD",
            description: "Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat."
        },
        {
            title: "EXERCITATION ULLAMCO",
            description: "Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident."
        },
        {
            title: "LABORIS NISI",
            description: "Ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa."
        },
        {
            title: "UT ALIQUIP",
            description: "Ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia."
        },
        {
            title: "EX EA COMMODO",
            description: "Consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt."
        },
        {
            title: "CONSEQUAT DUIS",
            description: "Aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit."
        },
        {
            title: "AUTE IRURE",
            description: "Dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim."
        },
        {
            title: "DOLOR IN",
            description: "Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id."
        },
        {
            title: "REPREHENDERIT IN",
            description: "Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est."
        },
        {
            title: "VOLUPTATE VELIT",
            description: "Esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        {
            title: "ESSE CILLUM",
            description: "Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis."
        },
        {
            title: "DOLORE EU",
            description: "Fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde."
        },
        {
            title: "FUGIAT NULLA",
            description: "Pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis."
        },
        {
            title: "PARIATUR EXCEPTEUR",
            description: "Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste."
        },
        {
            title: "SINT OCCAECAT",
            description: "Cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus."
        },
        {
            title: "CUPIDATAT NON",
            description: "Proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error."
        },
        {
            title: "PROIDENT SUNT",
            description: "In culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit."
        },
        {
            title: "IN CULPA",
            description: "Qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem."
        },
        {
            title: "QUI OFFICIA",
            description: "Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium."
        },
        {
            title: "DESERUNT MOLLIT",
            description: "Anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque."
        },
        {
            title: "ANIM ID EST",
            description: "Laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium."
        }
    ];

    // Sayfalama ayarları
    const itemsPerPage = 10;
    let currentPage = 1;
    let totalPages = Math.ceil(mockSearchResults.length / itemsPerPage);

    // Sayfa yüklendiğinde ilk sayfayı göster
    displayPage(1);

    // Sayfa gösterimi fonksiyonu
    function displayPage(pageNumber) {
        currentPage = pageNumber;
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageResults = mockSearchResults.slice(startIndex, endIndex);

        // Sonuçları HTML'e ekle
        const resultsContainer = $('.results-list');
        resultsContainer.empty();

        pageResults.forEach(function(result) {
            const resultHtml = `
                <div class="result-item">
                    <h3>${result.title}</h3>
                    <p>${result.description}</p>
                </div>
            `;
            resultsContainer.append(resultHtml);
        });

        // Sayfalama butonlarını güncelle
        updatePagination();
        
        // Sonuç sayısını güncelle
        updateResultCount();
    }

    // Sayfalama butonlarını güncelle
    function updatePagination() {
        const paginationContainer = $('.pagination');
        paginationContainer.empty();

        // Sayfa numaraları
        for (let i = 1; i <= totalPages; i++) {
            const activeClass = i === currentPage ? 'active' : '';
            paginationContainer.append(`
                <button class="page-btn ${activeClass}" data-page="${i}">${i}</button>
            `);
        }
    }

    // Sonuç sayısını güncelle
    function updateResultCount() {
        const totalResults = mockSearchResults.length;
        const startResult = (currentPage - 1) * itemsPerPage + 1;
        const endResult = Math.min(currentPage * itemsPerPage, totalResults);
        
        $('.result-count').text(totalResults);
        $('.search-query').text('Zamanın Kapıları');
    }

    // Sayfa butonlarına tıklama olayı
    $(document).on('click', '.page-btn', function() {
        const pageNumber = parseInt($(this).data('page'));
        if (pageNumber && pageNumber !== currentPage) {
            displayPage(pageNumber);
            
            // Sayfa başına scroll
            $('html, body').animate({
                scrollTop: $('.search-results-list').offset().top - 100
            }, 500);
        }
    });

    // Arama butonuna tıklama olayı
    $('.search-btn').click(function() {
        const searchQuery = $('.search-input').val().trim();
        if (searchQuery) {
            // Arama işlemi burada yapılabilir
            console.log('Arama yapılıyor:', searchQuery);
            // Şimdilik sadece mevcut sonuçları göster
            displayPage(1);
        }
    });

    // Enter tuşu ile arama
    $('.search-input').keypress(function(e) {
        if (e.which === 13) { // Enter tuşu
            $('.search-btn').click();
        }
    });
});
