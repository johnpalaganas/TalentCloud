<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor .
-->
<?php
require_once __DIR__ . '/../tc/config/php.config.inc';

?>

<?php include '../inc/common/authentication.php'; ?>

<html lang="en">
    <head>
        <title>GC Talent Cloud</title>
        
        <?php
        // Include for metadata / scripts
        include '../inc/common/head.php';
        include '../inc/manager/head-admin.php';
        include '../inc/common/script-session-user.php';
        ?>

        <?php // Include for Federal Identity Program (black banner) ?>
        <?php include '../inc/manager/header-fip.php'; ?>
        <?php // Include for main navigation  ?>
        <?php include '../inc/common/header-nav.php'; ?>

        <?php // BEGIN - Overlays (all should be children of this div) ?>
    <div id="overlays">
        <?php // BEGIN - Includes for modal dialogs ?>
        <?php
        include '../inc/manager/modal-upload-photo.php';
        include '../inc/manager/modal-yes-no.php';
        include '../inc/manager/modal-update.php';
        ?>
    <?php //  END - Modal dialogs ?>
    </div>
    <?php //  END - Overlays ?>

        <?php //  BEGIN - Page Content?>
        <main>
            <?php //  BEGIN - Includes for pages ?>
            <?php
            include "../inc/manager/page-home-content.php";
            include "../inc/manager/page-job-seeker.php";
            include "../inc/manager/page-create-job-poster.php";
            include "../inc/manager/page-profile.php";
            include "../inc/manager/page-dashboard.php";
            include "../inc/common/page-applicant-profile.php";
            include "../inc/common/page-application-preview.php";
            include "../inc/common/faq.php";
            include "../inc/common/terms-and-conditions.php";
            include "../inc/common/privacy.php";
            ?>
            <?php //  END - Includes for pages ?>
        </main>
        <?php //  END - Page Content ?>

<?php //  Include for footer  ?>
<?php include '../inc/manager/footer.php'; ?>
</body>
</html>
