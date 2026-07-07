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
                            <a class="active" href="events.php">Events</a>
                        </div>
                        <h2 class="title">Our Events</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <?php
    $events = [
        [
            'title' => 'School Election & Leadership Practice',
            'meta' => 'Practical Leadership',
            'image' => 'assets/images/eminent/event-leadership.jpg',
            'copy' => 'Learners experience voting, responsibility and public confidence through school leadership activities.'
        ],
        [
            'title' => 'Sports Activities',
            'meta' => 'Confidence & Teamwork',
            'image' => 'assets/images/eminent/event-fun-day.jpg',
            'copy' => 'Colourful sporting activities help pupils build courage, coordination, healthy competition and team spirit.'
        ],
        [
            'title' => 'Swimming Activity',
            'meta' => 'Physical Development',
            'image' => 'assets/images/eminent/event-swimming-day.jpg',
            'copy' => 'Guided swimming activities help learners build confidence, discipline and healthy physical development.'
        ],
        [
            'title' => 'Science & Creative Art Exhibition',
            'meta' => 'Discovery & Creativity',
            'image' => 'assets/images/eminent/event-science-day.jpg',
            'copy' => 'Learners present science, anatomy, technology and creative projects through hands-on exploration.'
        ],
        [
            'title' => 'Mathspeed Competition',
            'meta' => 'Numeracy Challenge',
            'image' => 'assets/images/eminent/event-mathspeed.jpg',
            'copy' => 'A focused numeracy event where pupils practise speed, accuracy, confidence and healthy academic competition.'
        ],
        [
            'title' => 'Christmas Presentation',
            'meta' => 'Music & Performance',
            'image' => 'assets/images/eminent/event-christmas-presentation.jpg',
            'copy' => 'Learners build stage confidence through music, presentation and creative performance.'
        ],
        [
            'title' => 'Market Day',
            'meta' => 'Practical Life Skills',
            'image' => 'assets/images/eminent/event-market-day.jpg',
            'copy' => 'Pupils learn communication, responsibility, trading, counting and real-world problem-solving through market activities.'
        ],
        [
            'title' => "Children's Day Celebration",
            'meta' => 'Celebration & Creativity',
            'image' => 'assets/images/eminent/event-childrens-day.jpg',
            'copy' => 'A fun-filled day where pupils celebrate friendship, creativity, confidence and school community.'
        ],
        [
            'title' => "Grandparents' Day",
            'meta' => 'Family & Values',
            'image' => 'assets/images/eminent/event-grandparents-day.jpg',
            'copy' => 'An intergenerational celebration that teaches children about family, care, sacrifice and respect.'
        ],
        [
            'title' => 'Agape Day',
            'meta' => 'Love & Community',
            'image' => 'assets/images/eminent/event-agape-day.jpg',
            'copy' => 'A warm school celebration where learners share joy, friendship and the values of care and togetherness.'
        ],
        [
            'title' => 'Welcome Back to School',
            'meta' => 'School Community',
            'image' => 'assets/images/eminent/event-welcome-back.jpg',
            'copy' => 'A cheerful return-to-school moment that strengthens belonging, confidence and excitement for learning.'
        ],
        [
            'title' => 'Independence Day Celebration',
            'meta' => 'Culture & Citizenship',
            'image' => 'assets/images/eminent/event-independence-day.jpg',
            'copy' => 'Pupils celebrate national identity while learning respect, unity and pride in their community.'
        ],
        [
            'title' => 'Excursion and Real-Life Learning',
            'meta' => 'Learning Outside the Classroom',
            'image' => 'assets/images/eminent/event-excursion.jpg',
            'copy' => 'Field trips and excursions help learners build real-life connections with topics introduced in class.'
        ],
    ];
    ?>

    <!-- events area start -->
    <section class="rts-events-area rts-section-gap">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">School Activities</p>
                <h2 class="section-title">Learning, leadership and community moments</h2>
                <p class="desc ekms-section-note">EKMS events support academic growth, character development, creativity and practical exposure.</p>
            </div>
            <div class="row g-5">
                <?php foreach ($events as $event) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ekms-feature-card">
                            <div class="ekms-event-image">
                                <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>" loading="lazy">
                            </div>
                            <p class="pre-title mb--10"><?php echo $event['meta']; ?></p>
                            <h4 class="title"><?php echo $event['title']; ?></h4>
                            <p class="desc"><?php echo $event['copy']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- events area end -->

    <!-- cta start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="ekms-cta-band">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="section-title">See more moments from EKMS</h2>
                            <p>Browse the gallery for sports, swimming, science exhibition, Mathspeed, Christmas presentations and other school memories.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a href="gallery.php" class="rts-btn btn-primary2">Open Gallery</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta end -->

    <?php include 'inc/footer.php'; ?>
