<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/inc/form-token.php';

$admissionFlash = $_SESSION['admission_flash'] ?? null;
$admissionOld = $_SESSION['admission_old'] ?? [];
unset($_SESSION['admission_flash'], $_SESSION['admission_old']);
$admissionStatus = $_GET['admission_status'] ?? '';
$admissionStatusMessages = [
    'received' => ['type' => 'success', 'message' => 'Thank you. Your admission enquiry has been received.'],
    'sent' => ['type' => 'success', 'message' => 'Thank you. Your admission enquiry has been sent, and a confirmation email has been sent to you.'],
    'partial' => ['type' => 'success', 'message' => 'Your enquiry was sent to Admissions, but the confirmation email could not be delivered. The school will still contact you.'],
    'not-configured' => ['type' => 'error', 'message' => 'The admission enquiry mailbox is not configured yet. Please call the school directly for now.'],
    'missing' => ['type' => 'error', 'message' => 'Please complete all required fields before sending your admission enquiry.'],
    'invalid-email' => ['type' => 'error', 'message' => 'Please enter a valid email address so we can send your confirmation.'],
    'invalid-programme' => ['type' => 'error', 'message' => 'Please select a valid enrollment class or enquiry type.'],
    'expired' => ['type' => 'error', 'message' => 'Your form session has expired. Please try again.'],
    'send-error' => ['type' => 'error', 'message' => 'We could not send your enquiry at the moment. Please call the school directly or try again later.'],
    'use-form' => ['type' => 'error', 'message' => 'Please use the admission enquiry form to send your request.'],
];

if (!$admissionFlash && isset($admissionStatusMessages[$admissionStatus])) {
    $admissionFlash = $admissionStatusMessages[$admissionStatus];
}

$admissionToken = ekms_form_token_create('admission');

function ekms_old($key, $default = '')
{
    global $admissionOld;
    return htmlspecialchars($admissionOld[$key] ?? $default, ENT_QUOTES, 'UTF-8');
}

function ekms_selected($key, $value)
{
    global $admissionOld;
    return (($admissionOld[$key] ?? '') === $value) ? ' selected' : '';
}

include 'inc/head.php';
?>

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
                            <a class="active" href="admissions.php">Admissions</a>
                        </div>
                        <h2 class="title">Admissions</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- admissions intro start -->
    <section class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Apply Now</p>
                        <h2 class="section-title">Admission enquiries are welcome for Pre-School and Primary classes</h2>
                        <p class="desc">
                            Eminent Kids Montessori School welcomes families seeking a warm, structured and value-driven nursery and primary education in Mowe, Ogun State.
                        </p>
                        <p class="desc">
                            Our admissions process helps parents choose the right class pathway, understand the school environment and begin a smooth learning journey for each child.
                        </p>
                        <ul class="ekms-check-list">
                            <li><i class="fa-solid fa-check"></i> Pre-School and nursery foundation for learners from early childhood.</li>
                            <li><i class="fa-solid fa-check"></i> Primary school curriculum for literacy, numeracy, science, morals, creativity and leadership.</li>
                            <li><i class="fa-solid fa-check"></i> Hostel support for learners who need a safe home environment while schooling.</li>
                        </ul>
                        <div class="button-area mt--20">
                            <a href="tel:+2348069025521" class="rts-btn btn-primary2">Call Admissions</a>
                            <a href="contact.php" class="rts-btn">Visit Contact Page</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ekms-contact-image"><img src="assets/images/eminent/admissions.jpg" alt="Eminent Kids Montessori School pupils" loading="lazy"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- admissions intro end -->

    <!-- admissions steps start -->
    <section class="rts-section-gap section-bg2">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">How to Apply</p>
                <h2 class="section-title">A simple, parent-friendly process</h2>
                <p class="desc ekms-section-note">The old site invites parents to select an enrollment class. This page keeps that same flow while making the steps clearer for new families.</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-admission-step">
                        <span class="step-number">1</span>
                        <h4 class="title">Choose a Class</h4>
                        <p class="desc">Select Pre-School, Nursery or Primary School based on your child's age and current learning stage.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-admission-step">
                        <span class="step-number">2</span>
                        <h4 class="title">Contact EKMS</h4>
                        <p class="desc">Call, email or send an enquiry so the school can guide you through requirements and available openings.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-admission-step">
                        <span class="step-number">3</span>
                        <h4 class="title">Visit the School</h4>
                        <p class="desc">Meet the team, review the environment and discuss your child's academic, social and moral development needs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ekms-admission-step">
                        <span class="step-number">4</span>
                        <h4 class="title">Complete Enrollment</h4>
                        <p class="desc">Submit the required details and receive guidance for resumption, class placement and orientation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- admissions steps end -->

    <!-- programmes start -->
    <section class="rts-section-gap">
        <div class="container">
            <div class="section-title-area text-center">
                <p class="pre-title justify-content-center"><img src="assets/images/banner/title-img.svg" alt="">Enrollment Classes</p>
                <h2 class="section-title">Choose the right EKMS pathway</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-programme-image"><img src="assets/images/eminent/programme-preschool.jpg" alt="Pre-School class" loading="lazy"></div>
                        <h4 class="title">Pre-School</h4>
                        <p class="desc">Infant and nursery learners build literacy, numeracy, creativity, morals and social awareness.</p>
                        <a href="preschool.php" class="rts-btn">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-programme-image"><img src="assets/images/eminent/programme-nursery.jpg" alt="Nursery learners" loading="lazy"></div>
                        <h4 class="title">Nursery School</h4>
                        <p class="desc">A safe foundation for children to grow in confidence, social relationships and early academic habits.</p>
                        <a href="nursery.php" class="rts-btn">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ekms-feature-card">
                        <div class="ekms-programme-image"><img src="assets/images/eminent/programme-primary.jpg" alt="Primary school pupils" loading="lazy"></div>
                        <h4 class="title">Primary School</h4>
                        <p class="desc">Pupils develop science, technology, engineering, creative arts, mathematics, literacy, morals and spirituality.</p>
                        <a href="primary.php" class="rts-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- programmes end -->

    <!-- enquiry form start -->
    <section class="rts-contact-form-area rts-section-gap section-bg2">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="section-title-area">
                        <p class="pre-title"><img src="assets/images/banner/title-img.svg" alt="">Admission Enquiry</p>
                        <h2 class="section-title">Send us your details</h2>
                        <p class="desc">
                            Use the form to tell us the class you are interested in. The school can also be reached directly by phone or email.
                        </p>
                        <div class="ekms-contact-card mt--30">
                            <h4 class="title">Admissions Desk</h4>
                            <p class="desc mb--5"><a href="tel:+2348069025521">+234 8069 025 521</a></p>
                            <p class="desc mb--5"><a href="tel:+2348098008854">+234 809 800 8854</a></p>
                            <p class="desc"><a href="mailto:info@eminentkidsschool.com">info@eminentkidsschool.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <?php if ($admissionFlash): ?>
                        <div class="ekms-form-alert <?php echo htmlspecialchars($admissionFlash['type'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($admissionFlash['message'], ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    <?php endif; ?>
                    <form id="enquiry-form" class="contact-form ekms-form-shell" action="admission-enquiry.php" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($admissionToken, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="ekms-honeypot" aria-hidden="true">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="ekms-form-header">
                            <span class="ekms-form-icon"><i class="fa-solid fa-clipboard-list"></i></span>
                            <div>
                                <h3>Admission Details</h3>
                                <p>Tell us about the child and the class pathway you are interested in.</p>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Parent/Guardian Name <em>*</em></span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-user"></i>
                                        <input type="text" name="parent_name" placeholder="Parent or guardian name" value="<?php echo ekms_old('parent_name'); ?>" autocomplete="name" required>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Phone Number <em>*</em></span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-phone"></i>
                                        <input type="tel" name="phone" placeholder="+234 800 000 0000" value="<?php echo ekms_old('phone'); ?>" autocomplete="tel" inputmode="tel" required>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Email Address <em>*</em></span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-envelope"></i>
                                        <input type="email" name="email" placeholder="name@example.com" value="<?php echo ekms_old('email'); ?>" autocomplete="email" required>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Child's Name <em>*</em></span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-child"></i>
                                        <input type="text" name="child_name" placeholder="Child's full name" value="<?php echo ekms_old('child_name'); ?>" required>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Child's Age / Current Class</span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <input type="text" name="child_age" placeholder="e.g. 5 years / Nursery 2" value="<?php echo ekms_old('child_age'); ?>">
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Enrollment Interest <em>*</em></span>
                                    <span class="ekms-field-control ekms-select-control">
                                        <i class="fa-solid fa-school"></i>
                                        <select name="programme" required>
                                            <option value="">Choose a class or enquiry</option>
                                            <option value="pre-school"<?php echo ekms_selected('programme', 'pre-school'); ?>>Pre-School</option>
                                            <option value="nursery"<?php echo ekms_selected('programme', 'nursery'); ?>>Nursery School</option>
                                            <option value="primary"<?php echo ekms_selected('programme', 'primary'); ?>>Primary School</option>
                                            <option value="hostel"<?php echo ekms_selected('programme', 'hostel'); ?>>Hostel Enquiry</option>
                                            <option value="school-visit"<?php echo ekms_selected('programme', 'school-visit'); ?>>School Visit</option>
                                        </select>
                                    </span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="ekms-field">
                                    <span class="ekms-field-label">Preferred Term / Start Date</span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-calendar-check"></i>
                                        <input type="text" name="preferred_start" placeholder="e.g. Next term or September" value="<?php echo ekms_old('preferred_start'); ?>">
                                    </span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="ekms-field ekms-message-field">
                                    <span class="ekms-field-label">Admission Message <em>*</em></span>
                                    <span class="ekms-field-control">
                                        <i class="fa-solid fa-message"></i>
                                        <textarea name="message" placeholder="Share any questions, class placement details, or visit preferences" required><?php echo ekms_old('message'); ?></textarea>
                                    </span>
                                </label>
                            </div>
                            <div class="col-12">
                                <div class="ekms-form-footer">
                                    <button type="submit" class="rts-btn btn-primary2"><i class="fa-solid fa-paper-plane"></i> Send Admission Enquiry</button>
                                    <span class="ekms-form-note">Admissions desk: <a href="tel:+2348069025521">+234 8069 025 521</a></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- enquiry form end -->

    <?php include 'inc/footer.php'; ?>
