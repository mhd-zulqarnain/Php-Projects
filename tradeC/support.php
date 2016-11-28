<?php
include "function/function.php";
headder();

if(isset($_SESSION['vid'])!=""){
    $vid=$_SESSION['vid'];

    UpdateStatus($vid);
}

?>
<!-- main -->
<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>

            </ol><!-- breadcrumb -->
            <h2 class="title">Contact us</h2>
        </div>



        <div class="section  container">
            <!-- carousel -->
            <div class="">
                <div class="row">
                    <div class="article-body markdown">
                        <p><span class="wysiwyg-color-black"><strong>OSS.com.pk</strong>&nbsp;has certain Ad posting&nbsp;rules/policies to be followed: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
                        <ol>
                            <li><span class="wysiwyg-color-black"><strong>Duplicate Ad listings</strong> - Any ad posted more than once with the same content or Title in the same city and category would be considered as a Duplicate Ad. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></li>
                            <li><span class="wysiwyg-color-black"><strong>Ad duration:</strong> OSS does not allow posting of the same ad upon deletion until 30 days after the date of posting. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></li>
                            <li><span class="wysiwyg-color-black"><strong>Sexually oriented material:</strong>&nbsp;Ads&nbsp;relating to products intended for use in sexual activity are not&nbsp;permitted. Also, refrain&nbsp;from using&nbsp;title with graphic adult language, regardless of the item contained in the listing itself.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></li>
                            <li><span class="wysiwyg-color-black"><strong>Inaccurate&nbsp;content: </strong>Do not use&nbsp;irrelevant/gibberish titles <span class="wysiwyg-color-black">or description. Also,&nbsp;phone number(s) or special character(s) are not permitted.</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></li>
                            <li>
                                <p><span class="wysiwyg-color-black"><strong>Inappropriate picture:&nbsp;</strong>Do not include obscene, fake or&nbsp;human images.&nbsp;Kindly note, an&nbsp;account can also be blocked depending upon&nbsp;the severity of case.</span></p>
                            </li>
                            <li>
                                <p><span class="wysiwyg-color-black"><strong>Misleading&nbsp;item/service location:</strong> Misrepresentation of Ad offer/content is not permitted.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></p>
                            </li>
                            <li>
                                <p><span class="wysiwyg-color-black"><strong>Unrealistic Price: </strong>Ads with incorrect pricing will be rejected.&nbsp; &nbsp; &nbsp;<strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></p>
                            </li>
                            <li>
                                <p><span class="wysiwyg-color-black"><strong>Stock/Internet Images</strong> – Ads having fake/generic&nbsp;images are not permitted. We advise you to post real images of the item for sale. &nbsp; &nbsp;</span></p>
                            </li>
                            <li>
                                <p><span class="wysiwyg-color-black"><strong>Online Jobs</strong> – Such Ads&nbsp;should have a proper job&nbsp;description with roles and tasks defined. Ads without proper Job summaries are not allowed.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
                            </li>
                            <li><span class="wysiwyg-color-black"><strong>Local posting:&nbsp;</strong>All offerings&nbsp;to be located in Pakistan. Ads posted using foreign IP(s) or containing foreign number(s) are not permitted. <span class="wysiwyg-underline">Importantly, an account should only correspond to one&nbsp;phone number</span>. Multiple phone numbers are strictly prohibited.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></li>
                            <li><span class="wysiwyg-color-black"><span class="wysiwyg-color-red90">Always make sure</span> that your item or service is adhering to&nbsp;<a href="# target="_blank">Terms of Use</a>.</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- recommended-info -->
        </div><!-- container -->
</section><!-- main -->

<!-- chat portion -->
<?php footer();?>


