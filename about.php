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
                            <a class="active" href="about.php">About Us</a>
                        </div>
                        <h2 class="title">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- about area start -->
    <section class="rts-about-area rts-shape-move rts-section-gap">
        <div class="container">
            <div class="section-inner">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="assets/images/eminent/about-mission.jpg" alt="Eminent Kids Montessori School pupils" loading="lazy">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title-area">
                                <p class="pre-title">
                                    <img src="assets/images/banner/title-img.svg" alt="">
                                    Welcome to EKMS
                                </p>
                                <h2 class="section-title">A world-class learning institution committed to moulding the future</h2>
                                <p class="desc">
                                    Founded in 2010, Eminent Kids Montessori School was established with a mandate to mould the future of learners through qualitative world-class education sustained by unequivocal educational standards.
                                </p>
                                <p class="desc">
                                    EKMS is a nursery and primary school located in Mowe, Ogun State, with pupils from different parts of the country. Our hostel facility provides a home where learners develop not only academically, but also morally, spiritually and socially.
                                </p>
                                <p class="desc">
                                    Our success stories are tied to a well-researched and carefully blended curriculum, with content drawn from international and national educational resources to create a balanced knowledge base.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-image">
            <div class="shape one" data-speed="0.04" data-revert="true"><img src="assets/images/banner/shape/08.svg" alt="shape_image"></div>
            <div class="shape two" data-speed="0.04" data-revert="true"><img src="assets/images/banner/shape/09.svg" alt="shape_image"></div>
            <div class="shape three" data-speed="0.04"><img src="assets/images/banner/shape/10.svg" alt="shape_image"></div>
        </div>
    </section>
    <!-- about area end -->

    <!-- vision mission area start -->
    <section class="rts-about-area area-2 rts-shape-move rts-section-gap section-bg2" id="vision">
        <div class="container">
            <div class="section-inner">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="about-content area-2">
                            <div class="section-title-area">
                                <p class="pre-title">
                                    <img src="assets/images/banner/title-img.svg" alt="">
                                    Vision &amp; Mission
                                </p>
                                <h2 class="section-title">Building children who stand out</h2>
                                <p class="desc">
                                    Our team is committed to moulding the future of learners through strong foundations, high moral values and educational excellence.
                                </p>
                            </div>

                            <ul class="about-wrapper">
                                <li class="wrapper-list">
                                    <div class="list-inner">
                                        <div class="icon"><img src="assets/images/icon/01.svg" alt=""></div>
                                        <div class="content">
                                            <h4 class="title">Our Vision</h4>
                                            <p class="desc">
                                                To build a vibrant and world-class school where children receive the solid educational foundation they need while high moral values and confidence are inculcated in them to make them outstanding.
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li class="wrapper-list">
                                    <div class="list-inner">
                                        <div class="icon"><img src="assets/images/icon/02.svg" alt=""></div>
                                        <div class="content">
                                            <h4 class="title">Our Mission</h4>
                                            <p class="desc">
                                                To be in the frontline of the education sector, a pacesetter with unequivocal education standards that produce well-balanced children in every sphere of life.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 order-change">
                        <div class="about-image2">
                            <img src="assets/images/eminent/about-values.jpg" alt="Eminent Kids Montessori School branding" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-image">
            <div class="shape one" data-speed="0.04" data-revert="true"><img src="assets/images/banner/shape/25.svg" alt="shape_image"></div>
            <div class="shape two" data-speed="0.04" data-revert="true"><img src="assets/images/banner/shape/26.svg" alt="shape_image"></div>
            <div class="shape three" data-speed="0.04"><img src="assets/images/banner/shape/27.svg" alt="shape_image"></div>
            <div class="shape four" data-speed="0.04"><img src="assets/images/banner/shape/28.svg" alt="shape_image"></div>
        </div>
    </section>
    <!-- vision mission area end -->

    <!-- values area start -->
    <section class="rts-section-gap" id="values">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Our Values</p>
                <h2 class="section-title">The principles shaping EKMS learners</h2>
                <p class="desc ekms-section-note">These values guide how we teach, lead, partner with parents and build confident pupils.</p>
            </div>
            <div class="row g-5 mt--10">
                <?php
                $values = ['Team Work', 'Simplicity', 'Get Things Done', 'Go Beyond', 'Creativity', 'Parents', 'Trust & Integrity', 'Possibilities'];
                foreach ($values as $value) :
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="ekms-value-card ekms-feature-card text-center">
                            <div class="icon"><i class="fa-light fa-star"></i></div>
                            <h4 class="title"><?php echo $value; ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- values area end -->

    <!-- leadership area start -->
    <section class="rts-team-area rts-section-gap section-bg2">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">EKMS Leadership</p>
                <h2 class="section-title">Our Management Team</h2>
                <p class="desc ekms-section-note">A dedicated team committed to the continuous development of learners and staff.</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-leader-image"><img src="assets/images/eminent/ezekiel-salako.jpg" alt="EKMS academic leadership" loading="lazy"></div>
                        <h4 class="title">Mr Ezekiel Kolawole Salako</h4>
                        <p class="desc">Director, Eminent Kids Montessori School</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-leader-image"><img src="assets/images/eminent/leader-blessing.jpg" alt="Mrs Blessing Salako" loading="lazy"></div>
                        <h4 class="title">Mrs Blessing Salako</h4>
                        <p class="desc">Proprietress, Eminent Kids Montessori School</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-leader-image"><img src="assets/images/eminent/team-group.jpg" alt="Eminent Kids Montessori School staff" loading="lazy"></div>
                        <h4 class="title">EKMS Faculty</h4>
                        <p class="desc">Competent educators committed to academic excellence, morals, creativity and learner confidence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- leadership area end -->

    <!-- work culture area start -->
    <section class="rts-section-gap">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/contact.jpg" alt="Eminent Kids Montessori School team" loading="lazy"></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Working at EKMS</p>
                        <h2 class="section-title">A safe, rewarding and developing workplace</h2>
                        <p class="desc">
                            EKMS provides a safe and rewarding work environment for its workforce, with continuous professional development, useful tools and training to enhance productivity.
                        </p>
                        <ul class="ekms-check-list">
                            <li><i class="fa-solid fa-check"></i> Supportive and professional school culture.</li>
                            <li><i class="fa-solid fa-check"></i> Continuous learning and staff development.</li>
                            <li><i class="fa-solid fa-check"></i> A shared commitment to moulding future leaders.</li>
                        </ul>
                        <a href="contact.php" class="rts-btn btn-primary2 mt--20">Contact the School</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- work culture area end -->

    <?php include 'inc/footer.php'; ?>
