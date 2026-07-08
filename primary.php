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
                            <a class="active" href="primary.php">Primary School</a>
                        </div>
                        <h2 class="title">Primary School</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- primary intro start -->
    <section class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/programme-primary.jpg" alt="Eminent Kids Primary School pupils" loading="lazy"></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Curriculum Overview</p>
                        <h2 class="section-title">Preparing pupils for secondary education and life</h2>
                        <p class="desc">
                            Our Primary School curriculum provides learners with opportunities to acquire literacy, numeracy, creativity and communication skills.
                        </p>
                        <p class="desc">
                            The curriculum is structured to ensure that learners enjoy learning, develop the desire to continue learning and build the ability for critical thinking and logical judgment.
                        </p>
                        <p class="desc">
                            Primary education at EKMS is designed to meet basic learning needs while preparing pupils to benefit from secondary education.
                        </p>
                        <a href="admissions.php" class="rts-btn btn-primary2 mt--20">Admission Enquiry</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- primary intro end -->

    <!-- knowledge base start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Our Knowledge Base</p>
                <h2 class="section-title">A balanced foundation for future leaders</h2>
                <p class="desc ekms-section-note">The EKMS primary curriculum develops essential learning skills and provides balanced learning content.</p>
            </div>
            <div class="row g-5">
                <?php
                $areas = [
                    ['Science', 'fa-light fa-flask'],
                    ['Technology', 'fa-light fa-microchip'],
                    ['Engineering', 'fa-light fa-gears'],
                    ['Creative Arts', 'fa-light fa-palette'],
                    ['Mathematics', 'fa-light fa-calculator'],
                    ['Literacy', 'fa-light fa-book-open-reader'],
                    ['Morals', 'fa-light fa-heart'],
                    ['Spirituality', 'fa-light fa-hands-praying'],
                ];
                foreach ($areas as $area) :
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="ekms-feature-card text-center">
                            <div class="icon"><i class="<?php echo $area[1]; ?>"></i></div>
                            <h4 class="title"><?php echo $area[0]; ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- knowledge base end -->

    <!-- creativity start -->
    <section class="rts-section-gap">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Nurturing Creativity</p>
                        <h2 class="section-title">Helping each child discover and master their special skill</h2>
                        <p class="desc">
                            We know every child is a genius, maybe not at what everyone expects. EKMS looks deeper to identify that special skill in every child and groom it until mastery is achieved.
                        </p>
                        <ul class="ekms-check-list">
                            <li><i class="fa-solid fa-check"></i> Critical thinking and logical judgment.</li>
                            <li><i class="fa-solid fa-check"></i> Communication, creativity and collaboration.</li>
                            <li><i class="fa-solid fa-check"></i> Moral and social development for well-balanced pupils.</li>
                            <li><i class="fa-solid fa-check"></i> Practical ICT exposure and skills development.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/gallery-science-04.jpg" alt="Primary pupils during science and creative learning" loading="lazy"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- creativity end -->

    <!-- cta start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="ekms-cta-band">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="section-title">Give your child a strong primary foundation</h2>
                            <p>Speak with EKMS about class placement, curriculum expectations and the admission process.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a href="admissions.php" class="rts-btn btn-primary2">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta end -->

    <?php include 'inc/footer.php'; ?>
