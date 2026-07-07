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
                            <a class="active" href="preschool.php">Pre-School</a>
                        </div>
                        <h2 class="title">Pre-School</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- programme intro start -->
    <section class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/programme-preschool.jpg" alt="Eminent Kids Pre-School" loading="lazy"></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Curriculum Overview</p>
                        <h2 class="section-title">A joyful foundation for early learners</h2>
                        <p class="desc">
                            Our Pre-School curriculum recognises the learning patterns and demands of children at the early stage. It creates social awareness while strengthening literacy and numeracy skills.
                        </p>
                        <p class="desc">
                            Creating social relationships and a sense of social responsiveness are enshrined in the preschool curriculum, helping learners build basic social skills that support healthy coexistence.
                        </p>
                        <a href="admissions.php" class="rts-btn btn-primary2 mt--20">Admission Enquiry</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- programme intro end -->

    <!-- creativity start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Nurturing Creativity</p>
                        <h2 class="section-title">Every child is a genius in the making</h2>
                        <p class="desc">
                            We know every child is a genius, though not always in the way everyone expects. EKMS looks deeper to identify each child's special skill and groom it towards mastery.
                        </p>
                        <div class="row g-4 mt--10">
                            <div class="col-sm-6"><div class="ekms-contact-card"><h4>Creativity</h4><p class="desc">Expression through play, art and guided discovery.</p></div></div>
                            <div class="col-sm-6"><div class="ekms-contact-card"><h4>Morals</h4><p class="desc">Early habits rooted in care, respect and responsibility.</p></div></div>
                            <div class="col-sm-6"><div class="ekms-contact-card"><h4>Literacy</h4><p class="desc">Language, sound recognition and early reading readiness.</p></div></div>
                            <div class="col-sm-6"><div class="ekms-contact-card"><h4>Numeracy</h4><p class="desc">Counting, comparison, patterns and practical number sense.</p></div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/programme-preschool-alt.jpg" alt="Pre-school learners at EKMS" loading="lazy"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- creativity end -->

    <!-- knowledge base start -->
    <section class="rts-section-gap">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Our Knowledge Base</p>
                <h2 class="section-title">What your child will gain</h2>
            </div>
            <div class="row g-5">
                <?php
                $areas = ['Literacy', 'Numeracy', 'Creative Arts', 'Moral Education', 'Social Habit', 'Health Habit'];
                foreach ($areas as $area) :
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ekms-feature-card">
                            <div class="icon"><i class="fa-light fa-check"></i></div>
                            <h4 class="title"><?php echo $area; ?></h4>
                            <p class="desc">Age-appropriate activities that build confidence and readiness for the next stage of learning.</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- knowledge base end -->

    <!-- cta start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="ekms-cta-band">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="section-title">Start your child's early learning journey at EKMS</h2>
                            <p>Speak with the school about Pre-School placement, resumption guidance and class readiness.</p>
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
