<?php include 'inc/head.php'; ?>

<body>

    <?php include 'inc/header.php'; ?>
    <?php
    $slides = [
        [
            'eyebrow' => 'Admissions Open',
            'title' => 'Learning that moulds future leaders at',
            'highlight' => 'Eminent Kids',
            'copy' => 'A world-class nursery and primary school in Mowe, Ogun State, committed to moulding confident, creative, morally sound learners.',
            'image' => 'assets/images/eminent/science_exhibition.jpg',
            'link' => 'admissions.php',
            'button' => 'Apply Now'
        ],
        [
            'eyebrow' => 'Montessori Learning',
            'title' => 'Montessori learning made practical at',
            'highlight' => 'EKMS',
            'copy' => 'Our Montessori approach helps children make real-life connections between abstract ideas and practical learning.',
            'image' => 'assets/images/eminent/hero-graduation.jpg',
            'link' => 'about.php',
            'button' => 'Discover EKMS'
        ],
        [
            'eyebrow' => 'Future Leaders',
            'title' => 'Academic excellence, morals and confidence',
            'highlight' => 'from the start',
            'copy' => 'From early literacy and numeracy to ICT skills and leadership opportunities, every child is guided to stand out.',
            'image' => 'assets/images/eminent/hero-primary.jpg',
            'link' => 'primary.php',
            'button' => 'Explore Primary'
        ],
    ];

    $programmes = [
        [
            'title' => 'Pre-School',
            'period' => 'Ages 1 - 5',
            'copy' => 'Specially created classes for infant and nursery learners, with focus on literacy, numeracy and social awareness.',
            'image' => 'assets/images/eminent/preschool_eminent.jpg',
            'link' => 'preschool.php'
        ],
        [
            'title' => 'Nursery School',
            'period' => 'Early years foundation',
            'copy' => 'A warm, safe environment where learners build confidence, creativity, morals, social habits and early academic skills.',
            'image' => 'assets/images/eminent/nursery_eminent.jpg',
            'link' => 'nursery.php'
        ],
        [
            'title' => 'Primary School',
            'period' => 'Primary classes',
            'copy' => 'Our primary school develops science, numeracy, literacy, moral, arts and social knowledge for secondary readiness.',
            'image' => 'assets/images/eminent/gallery-welcome-back-01.jpg',
            'link' => 'primary.php'
        ],
    ];

    $features = [
        ['title' => 'Montessori Teaching Methods', 'copy' => 'We help learners create real-life connections between abstract and conceptual learning so lessons are practical, fun and engaging.', 'icon' => 'fa-light fa-shapes'],
        ['title' => 'Conducive Learning Environment', 'copy' => 'The school is located in a serene environment with learning and recreation facilities readily available for pupils.', 'icon' => 'fa-light fa-school'],
        ['title' => 'Competent Teaching Faculty', 'copy' => 'We carefully screen teachers and sustain a work culture that retains, excites and develops excellent classroom practitioners.', 'icon' => 'fa-light fa-person-chalkboard'],
        ['title' => '21st Century Curriculum', 'copy' => 'Our curriculum develops learners in science, technology, engineering, arts, literacy and mathematics.', 'icon' => 'fa-light fa-atom-simple'],
        ['title' => 'ICT Facility & Skills Development', 'copy' => 'Learners receive computer literacy training and are guided to develop at least two sellable IT skills before graduation.', 'icon' => 'fa-light fa-computer']
    ];

    $testimonials = [
        [
            'name' => 'Akinola Emmanuel',
            'role' => 'Alumni, EKMS',
            'image' => 'assets/images/eminent/testimonial-akinola.jpg',
            'quote' => 'One of the things I enjoyed doing most was getting ready for school, because there was always something new to look out for. They are memories I will forever appreciate.'
        ],
        [
            'name' => 'Olunlade Eniola',
            'role' => 'Alumni, EKMS',
            'image' => 'assets/images/eminent/testimonial-eniola.jpg',
            'quote' => 'I improved not just academically but also morally, socially, spiritually and in all ramifications of life. The experiences I got at EKMS are what I will always cherish.'
        ],
        [
            'name' => 'Akintayo Ezekiel',
            'role' => 'Alumni, EKMS',
            'image' => 'assets/images/eminent/testimonial-ezekiel.jpg',
            'quote' => 'I came into the school as a shy person, but within a few weeks I became so bold that I was no longer afraid of facing a crowd.'
        ],
    ];
    ?>

    <!-- banner area start -->
    <section class="banner-area-three rts-shape-move">
        <div class="banner-slider-inner">
            <div class="swiper mySwiper-banner-2">
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $slide) : ?>
                        <div class="swiper-slide">
                            <div class="banner-wrapper-three">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="banner-content-three">
                                                <div class="inner">
                                                    <p class="pre-title">Eminent Kids <span><?php echo $slide['eyebrow']; ?></span></p>
                                                    <h1 class="title-banner">
                                                        <span class="color-four"><?php echo $slide['title']; ?></span>
                                                        <br><span class="school-name"><?php echo $slide['highlight']; ?></span>
                                                    </h1>
                                                    <p class="desc ekms-section-note"><?php echo $slide['copy']; ?></p>
                                                    <div class="banner-btn">
                                                        <a href="<?php echo $slide['link']; ?>" class="rts-btn btn-primary2"><?php echo $slide['button']; ?> <i class="fa-solid fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="banner-hero-image ekms-hero-image order-change2">
                                                    <img src="<?php echo $slide['image']; ?>" width="760" height="620" alt="<?php echo $slide['highlight']; ?>" loading="eager">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape-image">
                                    <img src="assets/images/banner/shape/banner-shape04.png" alt="">
                                    <img class="svg-shape1" src="assets/images/banner/blink-2.svg" alt="">
                                    <img class="svg-shape2" src="assets/images/banner/flower.svg" alt="">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-btn swiper-button-next3"><i class="fa-regular fa-arrow-right"></i></div>
            <div class="swiper-btn swiper-button-prev3"><i class="fa-regular fa-arrow-left"></i></div>
            <div class="shape-image">
                <div class="shape one" data-speed="0.04" data-revert="true"><img src="assets/images/banner/rainbow.svg" alt="shape_image"></div>
            </div>
        </div>
    </section>
    <!-- banner area end -->

    <!-- programmes area start -->
    <section class="rts-class-area rts-section-gapTop">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Our Classes</p>
                <h2 class="section-title">Learning Pathways at EKMS</h2>
                <p class="desc ekms-section-note">Our programmes are carefully structured to inspire growth, confidence and a lifelong love for learning.</p>
            </div>
            <div class="section-inner">
                <div class="row g-5">
                    <?php foreach ($programmes as $programme) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="ekms-feature-card ekms-link-card">
                                <div class="ekms-programme-image">
                                    <img src="<?php echo $programme['image']; ?>" alt="<?php echo $programme['title']; ?>" loading="lazy">
                                </div>
                                <h4 class="title"><?php echo $programme['title']; ?></h4>
                                <p class="period"><?php echo $programme['period']; ?></p>
                                <p class="desc"><?php echo $programme['copy']; ?></p>
                                <a href="<?php echo $programme['link']; ?>" class="rts-btn btn-primary2">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- programmes area end -->

    <!-- about area start -->
    <section class="rts-about-area area-3 rts-section-gap">
        <div class="container">
            <div class="section-inner">
                <div class="content-inner rts-shape-move">
                    <div class="image-area">
                        <img src="assets/images/eminent/about-main.jpg" width="720" height="560" alt="Eminent Kids Montessori learners" loading="lazy">
                        <img class="shape-img" src="assets/images/about/shape-01.png" alt="">
                        <img class="shape-img2" src="assets/images/banner/shape/02.svg" alt="">
                    </div>
                    <div class="right-side-content">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">About EKMS</p>
                        <h2 class="heading-title">Founded to mould the future of learners</h2>
                        <p class="desc">Founded in 2010, Eminent Kids Montessori School is a nursery and primary school located in Mowe, Ogun State. We provide qualitative world-class education sustained through a culture of unequivocal educational standards.</p>
                        <p class="desc">Our carefully blended curriculum draws from international and national educational resources to support children academically, morally, spiritually and socially.</p>
                        <div class="button-area">
                            <a href="about.php" class="rts-btn">Read Our Story <i class="fa-solid fa-arrow-right"></i></a>
                            <a href="admissions.php" class="rts-btn btn-primary2">Admission Enquiry</a>
                        </div>
                    </div>
                </div>
                <div class="shape-image">
                    <div class="shape one" data-speed="0.04" data-revert="true"><img src="assets/images/about/01.svg" alt="shape_image"></div>
                    <div class="shape two" data-speed="0.04"><img src="assets/images/about/02.svg" alt="shape_image"></div>
                    <div class="shape three" data-speed="0.04" data-revert="true"><img src="assets/images/about/03.svg" alt="shape_image"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

    <!-- why study area start -->
    <section class="rts-service-area rts-shape-move rts-section-gapBottom">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Why Study at EKMS</p>
                <h6 class="section-title">A Complete Learning Experience for Every Child</h6>
                <p class="desc ekms-section-note">The EKMS experience blends Montessori methods, a serene environment, competent faculty, modern curriculum and ICT skills development.</p>
            </div>
            <div class="row g-5 mt--10">
                <?php foreach ($features as $index => $feature) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ekms-feature-card <?php echo $index % 2 ? 'alt' : ''; ?>">
                            <div class="icon"><i class="<?php echo $feature['icon']; ?>"></i></div>
                            <h4 class="title"><?php echo $feature['title']; ?></h4>
                            <p class="desc"><?php echo $feature['copy']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- why study area end -->

    <!-- stats area start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-stat-card">
                        <h3 class="title"><span class="counter">2010</span></h3>
                        <p>Founded with a mandate to mould learners.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-stat-card">
                        <h3 class="title"><span class="counter">5</span>+</h3>
                        <p>Core early-years knowledge areas.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-stat-card">
                        <h3 class="title"><span class="counter">2</span>+</h3>
                        <p>Sellable IT skills targeted before graduation.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-stat-card">
                        <h3 class="title">Home</h3>
                        <p>Hostel support for learners' total development.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- stats area end -->

    <!-- events area start -->
    <section class="rts-events-area rts-section-gap">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Events</p>
                <h2 class="section-title">Learning Beyond the Classroom</h2>
                <p class="desc ekms-section-note">EKMS activities give pupils practical leadership, social, creative and real-life learning opportunities.</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-event-image"><img src="assets/images/eminent/event-leadership.jpg" alt="School election and leadership practice" loading="lazy"></div>
                        <h4 class="title">School Election</h4>
                        <p class="desc">Learners practise voting, responsibility, confidence and public leadership through school election activities.</p>
                        <a href="events.php" class="rts-btn">View Events</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-event-image"><img src="assets/images/eminent/event-science-day.jpg" alt="Science and creative art exhibition" loading="lazy"></div>
                        <h4 class="title">Science Exhibition</h4>
                        <p class="desc">Hands-on science and creative projects help learners present ideas with confidence and curiosity.</p>
                        <a href="gallery.php" class="rts-btn">Open Gallery</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-event-image"><img src="assets/images/eminent/event-swimming-day.jpg" alt="Swimming activity" loading="lazy"></div>
                        <h4 class="title">Swimming Activity</h4>
                        <p class="desc">Guided activities help pupils build confidence, discipline, coordination and healthy physical development.</p>
                        <a href="events.php" class="rts-btn">See Activities</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- events area end -->

    <!-- testimonials area start -->
    <section class="rts-testimonials-area rts-section-gap section-bg2">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Testimonials</p>
                <h2 class="section-title">What Our Alumni Say</h2>
                <p class="desc ekms-section-note">Pupils remember EKMS for academics, morals, confidence, friendship and lasting school memories.</p>
            </div>
            <div class="row g-5">
                <?php foreach ($testimonials as $item) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ekms-feature-card">
                            <div class="d-flex align-items-center gap-3 mb--20">
                                <div class="ekms-testimonial-avatar">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" loading="lazy">
                                </div>
                                <div>
                                    <h4 class="title mb--0"><?php echo $item['name']; ?></h4>
                                    <p class="desc mb--0"><?php echo $item['role']; ?></p>
                                </div>
                            </div>
                            <p class="desc">"<?php echo $item['quote']; ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- testimonials area end -->

    <!-- cta area start -->
    <section class="rts-section-gap">
        <div class="container">
            <div class="ekms-cta-band">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <p class="pre-title">Admissions</p>
                            <h2 class="section-title">Ready to begin your child's EKMS journey?</h2>
                            <p>Admission enquiries are welcome for Pre-School, Nursery and Primary classes.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a href="admissions.php" class="rts-btn btn-primary2">Start Admission Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta area end -->

    <?php include 'inc/footer.php'; ?>
