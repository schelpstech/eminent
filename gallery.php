<?php include 'inc/head.php'; ?>

<body>

    <?php include 'inc/header.php'; ?>

    <!-- breadcrumb area start -->
    <div class="rts-breadcrumb-area rts-section-gap bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main-wrapper">
                        <div class="pagination-wrapper">
                            <a href="index.php">Home</a>
                            <i class="fa-regular fa-chevron-right"></i>
                            <a class="active" href="gallery.php">Gallery</a>
                        </div>
                        <h2 class="title">Gallery</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <?php
    $gallerySections = [
        [
            'title' => "2025 Children's Day Celebration",
            'copy' => 'Celebrating the Eminent Kids in a fun-filled and memorable way.',
            'alt' => "Children's Day celebration at EKMS",
            'class' => 'section-bg2',
            'images' => [
                'gallery-childrens-01.jpg',
                'gallery-childrens-02.jpg',
                'gallery-childrens-03.jpg',
                'gallery-childrens-04.jpg',
                'gallery-childrens-05.jpg',
                'gallery-childrens-06.jpg',
                'gallery-childrens-07.jpg',
                'gallery-childrens-08.jpg',
            ],
        ],
        [
            'title' => "2025 Grandparents' Day Celebration",
            'copy' => 'Teaching the Eminent Kids about family, care, sacrifice and respect for older people.',
            'alt' => "Grandparents' Day celebration at EKMS",
            'class' => '',
            'images' => [
                'gallery-grandparents-01.jpg',
                'gallery-grandparents-02.jpg',
                'gallery-grandparents-03.jpg',
                'gallery-grandparents-04.jpg',
                'gallery-grandparents-05.jpg',
            ],
        ],
        [
            'title' => 'Mini Olympic Sports Day',
            'copy' => 'Colourful sports, teamwork and confidence-building moments from the EKMS mini olympic.',
            'alt' => 'Mini Olympic sports day at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-mini-olympic-01.jpg',
                'gallery-mini-olympic-02.jpg',
                'gallery-mini-olympic-03.jpg',
                'gallery-mini-olympic-04.jpg',
            ],
        ],
        [
            'title' => 'School Election',
            'copy' => 'Practical leadership, voting and public-speaking moments for confident learners.',
            'alt' => 'School election at EKMS',
            'class' => '',
            'images' => [
                'gallery-election-01.jpg',
                'gallery-election-02.jpg',
                'gallery-election-03.jpg',
                'gallery-election-04.jpg',
            ],
        ],
        [
            'title' => 'Welcome Back to School',
            'copy' => 'A cheerful return-to-school celebration with pupils, teachers and the EKMS community.',
            'alt' => 'Welcome back to school at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-welcome-back-01.jpg',
                'gallery-welcome-back-02.jpg',
                'gallery-welcome-back-03.jpg',
                'gallery-welcome-back-04.jpg',
            ],
        ],
        [
            'title' => 'Agape Day',
            'copy' => 'A joyful celebration of love, friendship, care and togetherness among learners.',
            'alt' => 'Agape Day celebration at EKMS',
            'class' => '',
            'images' => [
                'gallery-agape-01.jpg',
                'gallery-agape-02.jpg',
                'gallery-agape-03.jpg',
                'gallery-agape-04.jpg',
            ],
        ],
        [
            'title' => 'Independence Day Celebration',
            'copy' => 'Celebrating national identity, unity and citizenship in a child-friendly way.',
            'alt' => 'Independence Day celebration at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-independence-01.jpg',
                'gallery-independence-02.jpg',
                'gallery-independence-03.jpg',
            ],
        ],
        [
            'title' => 'Market Day',
            'copy' => 'Practical market activities where pupils learn trading, counting, responsibility and communication.',
            'alt' => 'Market Day practical learning at EKMS',
            'class' => '',
            'images' => [
                'gallery-market-day-01.jpg',
                'gallery-market-day-02.jpg',
                'gallery-market-day-03.jpg',
                'gallery-market-day-04.jpg',
            ],
        ],
        [
            'title' => 'Sports Activities',
            'copy' => 'Teamwork, coordination and healthy competition through colourful sports activities.',
            'alt' => 'Sports activities at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-sports-01.jpg',
                'gallery-sports-02.jpg',
                'gallery-sports-03.jpg',
            ],
        ],
        [
            'title' => 'Swimming Activity',
            'copy' => 'Guided physical-development moments that help pupils build confidence and discipline.',
            'alt' => 'Swimming activity at EKMS',
            'class' => '',
            'images' => [
                'gallery-swimming-01.jpg',
                'gallery-swimming-02.jpg',
                'gallery-swimming-03.jpg',
                'gallery-swimming-04.jpg',
            ],
        ],
        [
            'title' => 'Science & Creative Art Exhibition',
            'copy' => 'Hands-on science, anatomy, technology and creative presentation moments.',
            'alt' => 'Science and creative art exhibition at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-science-01.jpg',
                'gallery-science-02.jpg',
                'gallery-science-03.jpg',
                'gallery-science-04.jpg',
            ],
        ],
        [
            'title' => 'Mathspeed Competition',
            'copy' => 'Focused numeracy practice through speed, accuracy and healthy academic competition.',
            'alt' => 'Mathspeed competition at EKMS',
            'class' => '',
            'images' => [
                'gallery-mathspeed-01.jpg',
                'gallery-mathspeed-02.jpg',
            ],
        ],
        [
            'title' => 'Christmas Presentation',
            'copy' => 'Music, confidence and stage presentation moments from EKMS learners.',
            'alt' => 'Christmas presentation at EKMS',
            'class' => 'section-bg2',
            'images' => [
                'gallery-christmas-01.jpg',
                'gallery-christmas-02.jpg',
                'gallery-christmas-03.jpg',
                'gallery-christmas-04.jpg',
                'gallery-christmas-05.jpg',
                'gallery-christmas-06.jpg',
            ],
        ],
        [
            'title' => 'Excursion',
            'copy' => 'Learning outside the classroom through shared discovery and real-life experiences.',
            'alt' => 'EKMS excursion and real-life learning',
            'class' => '',
            'images' => [
                'gallery-excursion-01.jpg',
                'gallery-excursion-02.jpg',
                'gallery-excursion-03.jpg',
            ],
        ],
    ];

    function ekms_gallery_item($file, $alt)
    {
        $src = 'assets/images/eminent/' . $file;
        $safeSrc = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');
        $safeAlt = htmlspecialchars($alt, ENT_QUOTES, 'UTF-8');

        echo '<div class="ekms-gallery-image">';
        echo '<img src="' . $safeSrc . '" alt="' . $safeAlt . '" loading="lazy">';
        echo '<a href="' . $safeSrc . '" class="gallery-image"><div class="item-overlay"><span><i class="fa-light fa-plus"></i></span></div></a>';
        echo '<a href="' . $safeSrc . '" class="overlink gallery-image"></a>';
        echo '</div>';
    }
    ?>

    <?php foreach ($gallerySections as $section) : ?>
        <section class="rts-gallery-area rts-section-gap <?php echo htmlspecialchars($section['class'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="container">
                <div class="section-title-area text-center">
                    <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Gallery</p>
                    <h2 class="section-title"><?php echo htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="desc ekms-section-note"><?php echo htmlspecialchars($section['copy'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="section-inner">
                    <div class="row g-5">
                        <?php foreach ($section['images'] as $index => $image) : ?>
                            <div class="<?php echo $index === 0 ? 'col-lg-12' : 'col-lg-3 col-md-6'; ?>">
                                <?php ekms_gallery_item($image, $section['alt']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php include 'inc/footer.php'; ?>
