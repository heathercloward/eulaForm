<?php
// require './PHPMailer.php';
// require './Exception.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

$toList = array("tenantprovisioning@boaweb.com", "boalegal@boaweb.com");
$subject = "EULA Form";

$showForm = True;
$errorMsg = "";

if ($_POST['name'] && $_POST['email']) {

    $name = preg_replace('/[|&;$%@"<>()+,]/', '', $_POST['name']);
    if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])) $email = $_POST['email'];
    if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email2'])) $email2 = $_POST['email2'];
    $title = preg_replace('/[|&;$%@"<>()+,]/', '', $_POST['title']);

    if ($name && $email && $email2 && ($email == $email2)) {

        // Create a log of user data
        $file = fopen("./log/log.txt", "a");
        fwrite($file, '['.date("m-d-Y H:i")."] Name: $name - Email: $email - Title: $title");
        fclose($file);

        // Send form data to company
        $msg = "Name: $name\nEmail: $email\nTitle: $title"; 
        foreach ($toList as $to) {
            mail($to, $subject, $msg);
        }

        // Send EULA to requester
        // $mail = new PHPMailer(true);
        // try {
        //     $mail->addAddress($email, $name);
        //     $mail->setFrom("noreply@boaweb.com", "Backoffice Associates");
        //     $mail->Subject = "Backoffice Associates EULA";
        //     $mail->Body = "Thank you for your interest in our product. Our EULA is attached for your convenience.";
        //     $mail->addAttachment("./NACSSSTCv1.pdf");
        //     $mail->send();

        //     $showForm = False;
        // } catch(Exception $e) {

        //     //print_r($e);
        //     $errorMsg = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        // }
    }
}

if ($showForm) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>BackOffice Associates Terms and Conditions</title>
        <meta name="author" content="name">
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
body {
    font-family: 'Roboto';
    color: #003744;
}

h1 {
    text-align: center;
    margin-bottom: 1em;
}

.navbar {
    background-color: #003744;
    height: 5em;
}
      
.container {
    background-color: #ffffffa3;
    padding: 4em;
    margin: 0;
    position: absolute;
    top: 56%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.container-fluid {
    background-image: url("Entota_UI_Login-Background.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    -moz-background-size: cover;
    -o-background-size: cover;
    height: 82em; 
}

img.footerLogo {
    position: absolute;
    right: 50%;
    left: 50%;
    width: 10em;
    bottom: auto;
    top: 50%;
    margin: 0;
    transform: translate(-50%, -50%);
}

img.formName {
    width: 22em;
    margin-left: 30%;
    margin-bottom: 1em;
}

.form-group {
    font-size: 1.4em;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 2% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
    height: 50em;
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    text-align: right;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.outline1::before {
    content: "1.";
}

.outline1, .outline2, .outline3, .outline4, .outline5, .outline7, .outline8, .outline9, .outline10, .outline11, .outline12, .outline13, .outline19 {
    text-indent: -30px; 
}

.outline2::before {
    content: "2.";
}

.outline3::before {
    content: "3.";
}

.outline4::before {
    content: "4.";
}

.outline5::before {
    content: "5.";
}

.outline7::before {
    content: "7.";
}

.outline8::before {
    content: "8.";
}

.outline9::before {
    content: "9.";
}

.outline10::before {
    content: "10.";
}

.outline11::before {
    content: "11.";
}

.outline12::before {
    content: "12.";
}

.outline13::before {
    content: "13.";
}

.outline19::before {
    content: "19.";
}

th, td {
    border: 1px solid black;
    padding: 15px;
}

.docLogo {
    width: 13em; 
    margin-bottom: 3em; 
    margin-left: 36%;
}

input:not(:focus):invalid {
    outline: 2px solid red;
}

input:invalid ~ .form-control-feedback::before {
    content: "This is a required field."
}

input:focus:invalid {
    outline: none;
}

#Name:focus:invalid + #nameFeedback::before {
    content: "Enter your name."
}

#Title:focus:valid + #titleFeedback::before {
    content: "Enter your title. "
}

#CompanyName:focus:invalid + #companyFeedback::before {
    content: "Enter your Company Name. "
}

#Email2:focus:invalid + #emailFeedback2::before {
    content: "This must match the above email address."
}

#yesno:focus:invalid ~ #yesnoFeedback::before {
    content: "Check the checkbox to agree to the terms.";
    text-align: right;
}

.form-control-feedback {
    font-size: .7em;
    color: #4d4d4d;
}

#scrollInstructions {
    font-size: 1.5em;
    color: red;
}

#register, #print {
    display: block;
    margin-left: -1.2em;
    margin-top: 1em;
}

#print {
    display: inline;
}


.modalForm {
    margin: 1em;
}

@media only screen and (max-width: 1024px) {
    .container-fluid {
        height: 82em;
    }

    .modal-content {
        width: 86%;
    }
}

@media only screen and (max-width: 768px) {
    img.formName {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;;
    }
    
}

@media only screen and (max-width: 576px) {
    img.formName {
        width: 80%;
    }
    
    .container-fluid {
        height: 80em;
    }

    .container {
        top: 88%;
    }


    .modal-content {
        width: 100%;
        height: 36em;
    }

    .docLogo {
        margin-left: 16%;
    }
}

@media only screen and (max-width: 320px) {
    .container {
        top: 88%;
    }
}

@media print {
    body * {
        visibility: hidden;
    }
    #printpopup, #printpopup * {
        visibility: visible;
    }
    #printpopup {
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        background-color: white;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
         
        </style>
        <script>

window.addEventListener("load", function() {
     // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("trigger");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var nameOK = false, emailOK = false;
    var re = /[|&;$%@"<>()+,]/g;
    var emre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    document.getElementById("Name").addEventListener("change", function() {
        this.value = this.value.replace(re, "");
        if (this.value) nameOK = true;
        verified();
    });
    document.getElementById("Title").addEventListener("change", function() {
        this.value = this.value.replace(re, "");
    });

    var verifyEmail = function() {
        emailOK = emre.test(String(document.getElementById("Email").value).toLowerCase()) 
            && emre.test(String(document.getElementById("Email2").value).toLowerCase()) 
            && (String(document.getElementById("Email").value).toLowerCase() === String(document.getElementById("Email2").value).toLowerCase());
        verified();
        document.getElementById("emailFeedback").innerHTML = "";
        document.getElementById("emailFeedback2").innerHTML = "";
        if (!emailOK) {
            if (!emre.test(String(document.getElementById("Email").value).toLowerCase())) {
                document.getElementById("emailFeedback").innerHTML = "<span style='color: #FF0000;'>Please verify that your email address is in the correct format!</span>";
            } else if (document.getElementById("Email2").value) {
                if (!emre.test(String(document.getElementById("Email2").value).toLowerCase())) {
                    document.getElementById("emailFeedback2").innerHTML = "<span style='color: #FF0000;'>Please verify that your email address is in the correct format!</span>";
                } else if (String(document.getElementById("Email").value).toLowerCase() !== String(document.getElementById("Email2").value).toLowerCase()) {
                    document.getElementById("emailFeedback").innerHTML = "<span style='color: #FF0000;'>Please verify Email and Verify Email match!</span>";
                }
            }
        }
    }
    document.getElementById("Email").addEventListener("change", verifyEmail);
    document.getElementById("Email2").addEventListener("change", verifyEmail);

    var verified = function() {
        if (nameOK && emailOK) {
            btn.removeAttribute("disabled");
        } else {
            btn.setAttribute("disabled", "true");
        }
    }

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }

        $(modal).keyup(function(event){
	        if (event.keyCode == 27){
		        // Close the modal/menu
		        modal.style.display = "none";
                //  Return focus to the element that invoked it 
		        btn.focus();
	        }
        });
    }
});
        </script>

    </head>
    <body>
        <div class="container-fluid">
            <div class="container" >
                <img class="formName" src="Entota_Main.svg">
                <h1>BackOffice Associates Terms and Conditions</h1>
                <?php 
                if ($errorMsg) echo "<div class='error'>$errorMsg</div>"; 
                ?> 
                <form id="eulaform" autocomplete="on" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="CompanyName">Company Name: HP Inc.</label>
            
                    </div>
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="name" name="name" required class="form-control" id="Name" placeholder="Name" autofocus>
                        <span id="nameFeedback" class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" required class="form-control" id="Email" placeholder="Email Address" >
                        <span id="emailFeedback" class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="Email2">Verify Email</label>
                        <input type="email" name="email2" required class="form-control" id="Email2" placeholder="Verify Email Address">
                        <span id="emailFeedback2" class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="title" name="title" class="form-control" id="Title" placeholder="Title">
                        <span id="titleFeedback" class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                    


                </form>
                <button id="trigger" class="btn btn-info" disabled>Agree to Terms</button> 
            </div>
        </div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span id="scrollInstructions">Scroll to the bottom to agree to the terms.</span><span class="close" tabindex="0">&times;</span>
                
                
                <div style="overflow-y:scroll;" id="terms" tabindex="0" autofocus>
                    <img class="docLogo" src="BOA_LogoR-5405-485.png">
                    <h1>CLOUD AND SUBSCRIPTION SOFTWARE SERVICES TERMS AND CONDITIONS</h1>
                    <p>PLEASE READ CAREFULLY THESE TERMS AND CONDITIONS (COLLECTIVELY WITH THE EXHIBITS HERETO, THIS <strong><em>“AGREEMENT”</em></strong>). THIS AGREEMENT APPLIES TO YOUR USE OF THE BACKOFFICE ASSOCIATES CLOUD OR SUBSCRIPTION SOFTWARE SERVICE INDICATED IN AN ORDER (THE <strong><em>“SUBSCRIPTION SERVICE”</em></strong>, AS MORE FULLY DEFINED BELOW). BY (i) USING ALL OR ANY PORTION OF THE SUBSCRIPTION SERVICE OR (ii) COMPLETING AN ORDER FOR THE SUBSCRIPTION SERVICE WHICH INCORPORATES BY REFERENCE THIS AGREEMENT, THE PERSON OR ENTITY YOU REPRESENT, THE CUSTOMER, ACCEPTS AND AGREES TO AND BECOMES A PARTY TO THIS AGREEMENT. YOU REPRESENT AND WARRANT THAT YOU HAVE AUTHORITY TO LEGALLY BIND CUSTOMER. IF YOU DO NOT UNCONDITIONALLY AGREE TO ALL OF THE TERMS OF THIS AGREEMENT, YOU MAY NOT USE THE SUBSCRIPTION SERVICE OR ANY PORTION THEREOF. IF YOU HAVE ENTERED INTO A SEPARATE WRITTEN AGREEMENT WITH BACKOFFICE FOR THE USE OF THE SUBSCRIPTION SERVICE, THEN SUCH AGREEMENT SHALL PREVAIL OVER ANY CONFLICTING TERMS OR CONDITIONS IN THIS AGREEMENT.</p>
                    <p>This Agreement is by and between BackOffice and Customer (as defined below) and is effective as of the date the Subscription Service (as defined below) was first ordered or used (whichever first occurred) by Customer (the <strong><em>“Effective Date”</em></strong>). Each of BackOffice and Customer are sometimes referred to herein as a <strong><em>“Party”</em></strong> and collectively as the <strong><em>“Parties.”</em></strong> In consideration of the mutual promises and upon the terms and conditions set forth below, the Parties agree as follows:</p>
                    <ol type="1">
                        <li><strong>Definitions.</strong>
                            <ul style="list-style-type: none">
                                <li class="outline1">1. <strong><em>"Authorized User(s)”</em></strong> means Customer’s employees, consultants, contractors and managed outsourcers who are permitted to use the Subscription Service solely for the benefit of Customer.</li>
                                <li class="outline1">2. <strong><em>“BackOffice”</em></strong> means the BackOffice Associates legal entity which accepted or agreed to an Order for the Subscription Service. In the absence of an Order, “BackOffice” shall mean (i) BackOffice Associates Canada, Inc., a Canadian corporation, in the case of Subscription Services used within the territory of Canada and (ii) BackOffice Associates, LLC, a Delaware limited liability company in the case of Subscription Services used anywhere else in the world.</li>
                                <li class="outline1">3. <strong><em>“Confidential Information”</em></strong> means this Agreement, all software listings, documentation, information, data, drawings, benchmark tests, specifications, trade secrets, methodology, object code and machine-readable copies of software, source code copies of software, and any other intellectual property or proprietary information supplied to Customer by BackOffice or by Customer to BackOffice which is clearly marked as “confidential” if in tangible form, or identified as “confidential” if orally disclosed.</li>
                                <li class="outline1">4. <strong><em>“Customer”</em></strong> means the single legal entity indicated in an Order as ordering the Subscription Service or if no such entity has been indicated, the legal entity which first accessed or otherwise used the Subscription Service and thereby accepted this Agreement.</li>
                                <li class="outline1">5. <strong><em>“Distribution Date”</em></strong> of the Subscription Service means the date BackOffice made available for use the Subscription Service to Customer.</li>
                                <li class="outline1">6. <strong><em>“Documentation”</em></strong> means the user guides, operation manuals, specifications and other related on-line information and materials approved by BackOffice relating to the use of the Subscription Service.</li>
                                <li class="outline1">7. <strong><em>“Subscription Service”</em></strong> means the object code version of all or any portion of a cloud-based software as a service, delivered software, or combination of cloud-based and delivered software made available to Customer by BackOffice on a subscription basis.</li>
                                <li class="outline1">8. <strong><em>“Intellectual Property Rights”</em></strong> means all trade secrets, patents and patent applications, trade marks (whether registered or unregistered and including any goodwill acquired in such trade marks), service marks, trade names, business names, internet domain names, e-mail address names, copyrights (including rights in computer software), moral rights, database rights, design rights, rights in knowhow, rights in confidential information, rights in inventions (whether patentable or not) and all other intellectual property and proprietary rights (whether registered or unregistered, and any application for the foregoing), and all other equivalent or similar rights which may subsist anywhere in the world.</li>
                                <li class="outline1">9. <strong><em>“Order”</em></strong> means a written document whereby Customer orders a subscription to the Subscription Service, which Order may contain specific terms and conditions with respect to the Subscription Service.</li>
                                <li class="outline1">10. <strong><em>“Subscription Term”</em></strong> means the period of time, as agreed upon in an Order, during which Customer may access the Subscription Service. In the absence of an Order or in the absence of such information set forth in an Order, the Subscription Term shall be deemed to begin on the Distribution Date and end on the first anniversary thereof.</li>
                                <li class="outline1">11. <strong><em>“Use Restrictions”</em></strong> means any use restriction that is set forth herein or in an Order, which may include maximum number of Authorized Users permitted to access the Subscription Service or other restrictions.</li>
                            </ul>
                        </li>
                        <li><strong>Requesting a Subscription to the Subscription Service.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline2">1. <u>Orders.</u> During the Term, the Parties may enter into one or more Orders setting forth the specific terms and conditions applicable to Customer’s order of a Subscription Service. Each Order accepted by BackOffice shall be incorporated into and made part of this Agreement by reference. In the event of any conflict between the provisions of this Agreement and the terms of any Order(s), the conflict shall be resolved in the following order of priority of interpretation: (i) the Order(s) and (ii) this Agreement.</li>
                                <li class="outline2">2. <u>Customer Acceptance of Orders.</u> Customer may manifest its acceptance of an Order by (i) signing an Order, (ii) issuing a purchase order for the amounts set forth in an Order (whether or not such purchase order references such Order by number or other reference), or (iii) accepting or using the Subscription Service.</li>
                            </ul>
                        </li>
                        <li><strong>Access Rights.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline3">1. Subject to the terms and conditions contained in the Agreement and the specific terms and conditions in an Order, BackOffice will during the Subscription Term: (i) provide access to the Subscription Service for up to the maximum number of Authorized Users as set forth in an Order via remote internet access solely for Customer’s internal business operations and solely in accordance with applicable Documentation; (ii) allow Authorized Users to use and access the Subscription Service and the Documentation for the above referenced purposes; and (iii) manage the Subscription Service during the Subscription Term. BackOffice reserves the right to modify its technology underlying the Subscription Service at any time and agrees to use commercially reasonable efforts to notify Customer of any such modifications to the extent that such modifications negatively affect functionality.
                                    <ul style="list-style-type:none">
                                        <li class="outline3">1.1. <u>Connectivity.</u> BackOffice will be responsible for maintaining connectivity from the Subscription Service to the Internet. Customer is responsible for providing connectivity to the Internet for itself and its Authorized Users. Customer shall also be responsible for ensuring that latency and available bandwidth from the user’s desktop to BackOffice’s hosted routers is adequate to meet Customer’s desired level of performance. If Customer requires a VPN or private network connection to the Subscription Service, Customer is responsible for all costs associated with any specialized network connectivity required by Customer.</li>
                                        <li class="outline3">1.2. <u>Authorized Users.</u> Customer is solely responsible for creating individual Authorized User accounts in order to allow access to the Subscription Service and Documentation up to the maximum number of Authorized Users as indicted in an Order. Access to the Subscription Service and Documentation by such Authorized User(s) is solely on behalf of and for the benefit of Customer. Customer shall not authorize access to or permit use of the Subscription Service, or Documentation by persons other than Authorized Users. Customer shall be responsible for all acts and omissions of its Authorized Users and any act or omission by any such Authorized User which, if undertaken by Customer would constitute a breach of the Agreement, shall be deemed a breach of the Agreement. Customer shall make its Authorized Users aware of the provisions of the Agreement and shall cause all Authorized Users to comply with such provisions. Customer is responsible for all activities that occur under its Authorized User accounts, regardless of whether the activities are authorized by Customer or undertaken by Customer, its employees or any third party, and BackOffice and its affiliates are not responsible for unauthorized access to any Customer account.</li>
                                    </ul>
                                </li>
                                <li class="outline3">2. <u>Documentation.</u> BackOffice will deliver to Customer, as soon as is practicable after the Distribution Date, one printed or machine-readable copy of the Documentation or make such Documentation available on its support website. Customer may not reproduce the Documentation without BackOffice’s express written permission.</li>
                            </ul>
                        </li>
                        <li><strong>Customer Responsibilities.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline4">1. <u>Security.</u> In connection with Customer’s use of the Subscription Service, Customer shall: (i) comply with all applicable laws, court orders, rules and regulations; (ii) comply with applicable BackOffice policies for access to and use of the Subscription Service, including but not limited to, its acceptable use and privacy policy; (iii) use reasonable security precautions for providing access to the Subscription Service by its Authorized Users; (iv) cooperate with BackOffice’s investigation of outages, security problems, unauthorized use of the Subscription Service or any suspected breach of the Agreement, the acceptable use or privacy policy, or any applicable law, court order, rule or regulation; and (v) promptly notify BackOffice of any known or suspected unauthorized use of Customer’s account, the Subscription Service or any other breach of security.</li>
                                <li class="outline4">2. <u>Branding.</u> Customer shall not delete, alter, cover, or distort any copyright, trademark, any printed or on-screen proprietary or legal notice, or other proprietary rights notice placed by BackOffice on or in the Subscription Service or Documentation.</li>
                                <li class="outline4">3. <u>Credentials.</u> Customer and its Authorized Users shall be responsible for maintaining the confidentiality and security of all passwords and other access protocols required in order to access the Subscription Service, if applicable.</li>
                            </ul>
                        </li>
                        <li><strong>Use and Access Restrictions.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline5">1. Customer agrees that it will not itself, or through any parent, subsidiary, affiliate, agent or other third party:
                                    <ul style="list-style-type:none">
                                        <li class="outline5">1.1. sell, lease, license, sublicense, or otherwise encumber any portion of the Subscription Service or Documentation;</li>
                                        <li class="outline5">1.2. decompile, disassemble, or reverse engineer any portion of the Subscription Service or attempt to discover any source code or underlying ideas or algorithms of the Subscription Service;</li>
                                        <li class="outline5">1.3. create any derivative work based on the Subscription Service or any BackOffice Confidential Information;</li>
                                        <li class="outline5">1.4. use the Subscription Service to provide processing services to third parties, commercial timesharing, rental or sharing arrangements, or on a ‘service bureau’ basis or otherwise use or allow others to use the Subscription Service for the benefit of any third party;</li>
                                        <li class="outline5">1.5. use the Subscription Service to store or transmit infringing, libelous, obscene, threatening, or otherwise unlawful or tortious material, including without limitation material harmful to children or violating third party intellectual property or privacy rights;</li>
                                        <li class="outline5">1.6. provide, disclose, divulge or make available to, or permit use of the Subscription Service by persons other than Customer’s Authorized Users who have signed a confidentiality agreement consistent with the terms and provisions herein, without BackOffice’s prior written consent;</li>
                                        <li class="outline5">1.7. use the Subscription Service, or allow the transfer, transmission, export, or re-export of the Subscription Service or portion thereof in violation of any export control laws or regulations administered by the U.S. Commerce Department, OFAC, or any other government agency; or</li>
                                        <li class="outline5">1.8. interfere with or disrupt the integrity or performance of the Subscription Service.</li>
                                    </ul>
                                    <p>All the limitations and restrictions on the Subscription Service in this Agreement also apply to the Documentation.</p>
                                </li>
                                <li class="outline5">2. <u>No Implied Licenses.</u> Customer acknowledges that there are no licenses granted by implication under the Agreement. BackOffice and its licensors retain and reserve all right, title and interest in and to the Subscription Service, the Documentation and all Intellectual Property Rights therein, and retains all rights, title and interest (including but not limited to Intellectual Property Rights) in the Subscription Service not specifically granted to Customer. Customer acknowledges that, as between the Parties, BackOffice owns all Intellectual Property Rights and proprietary interests that are embodied in, or practiced by, the Subscription Service and the Documentation. Any license granted by BackOffice pursuant to this Agreement is only for Intellectual Property Rights that are owned by BackOffice or that BackOffice has a right to sublicense.</li>
                                <li class="outline5">3. <u>No Source Code.</u> Customer acknowledges the rights granted under this Agreement with respect to the Subscription Service are intended to apply only to the compiled, object code format of any software provided therein, and are not intended as licenses to obtain or use any source code.</li>
                            </ul>
                        </li>
                        <li><strong>Subscription Fees.</strong> In consideration of the rights granted herein, Customer shall pay BackOffice the subscription fees specified in the applicable Order(s). Unless otherwise set forth in the applicable Order, Customer agrees to pay the applicable subscription fees in accordance with the terms of the Agreement.</li>
                        <li><strong>Fees and Payments.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline7">1. <u>Invoices.</u> Customer shall pay BackOffice for the Subscription Service in accordance with the fees set forth in the applicable Order. BackOffice hereby reserves the right to modify any fees by providing Customer with written notice within ninety (90) days of such notification. All payments for fees and expenses must be made by Customer within thirty (30) days of the date of invoice.</li>
                                <li class="outline7">2. <u>Manner of Payment; Taxes.</u> Unless otherwise set forth in an applicable Order, all amounts due hereunder shall be paid in the U.S. and in U.S. dollars Customer agrees to pay or reimburse BackOffice for all transportation charges, federal, state, dominion, provincial or local sales taxes, use taxes, value-added taxes, fees or duties arising out of this Agreement or the transaction contemplated by this Agreement (other than taxes on the net income of BackOffice).</li>
                                <li class="outline7">3. <u>Late Payments.</u> Customer shall pay BackOffice one and one-half percent (1½%) interest per month or the highest rate permitted by law, whichever is greater, on the outstanding balance of any fees or expenses not paid within thirty (30) days of the date of invoice. Customer shall be responsible for all costs incurred by BackOffice in order to recover payment of Customer’s account, including without limitation, all professional fees and legal costs. Without waving or prejudicing any other rights or remedies, BackOffice shall have the right to suspend or delay access to the Subscription Service on a day-for-day basis equal to the number of days a payment due hereunder is past due.</li>
                                <li class="outline7">4. <u>Subscription Service Access Commencement.</u> BackOffice will grant Customer access to the Subscription Service as soon as practical following BackOffice’s receipt and acceptance of an Order. If Customer’s procedures require that an invoice be submitted against a purchase order before payment can be made, Customer will be responsible for issuing such purchase order at least thirty (30) days before the payment date.</li>
                            </ul>
                        </li>
                        <li><strong>Term and Termination.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline8">1. <u>Term.</u> The term of this Agreement will commence on the Effective Date and will continue for a period of three (3) years thereafter, unless earlier terminated in accordance with this Section 8.1 (the <strong><em>“Initial Term”</em></strong>), and will automatically renew for successive one (1) year terms (each, a <strong><em>“Renewal Term”</em></strong>), unless either Party provides written notice of its desire not to renew at least thirty (30) days prior to the expiration of the then-current term (the Initial Term, together with any Renewal Terms, collectively, the <strong><em>“Term”</em></strong>).</li>
                                <li class="outline8">2. <u>Termination for Breach.</u> Either Party may, at its option, terminate this Agreement in the event of a material breach by the other Party. Such termination may be effected only through a written notice to the breaching Party, specifically identifying the breach or breaches on which such notice of termination is based. The breaching Party will have a right to cure such breach or breaches within thirty (30) days of receipt of such notice, and this Agreement will terminate in the event that such cure is not made within such thirty (30)-day period.</li>
                                <li class="outline8">3. <u>Termination for Non-Payment.</u> Any obligation to provide the Subscription Service pursuant to this Agreement may be terminated by BackOffice if Customer (i) fails to pay any amount due to BackOffice under an Order within thirty (30) days after BackOffice gives written notice of such nonpayment, or (ii) commits a material non-monetary breach of this Agreement, which breach, if capable of being cured, is not cured within thirty (30) days of Customer’s receipt of written notice of such breach by BackOffice.</li>
                                <li class="outline8">4. <u>Termination Upon Bankruptcy or Insolvency.</u> Each Party shall immediately give written notice to the other Party and such Party may, at its option, terminate this Agreement immediately upon written notice to the other Party, in the event (i) that a Party becomes insolvent or unable to pay its debts when due; (ii) such Party discontinues it business; or (iii) a receiver is appointed or there is an assignment for the benefit of such Party’s creditors.</li>
                                <li class="outline8">5. <u>Effect of Termination.</u> Upon any termination of this Agreement, Customer will (i) immediately discontinue all use of the Subscription Service and any BackOffice Confidential Information; (ii) promptly return or destroy any and all BackOffice Confidential Information and (iii) promptly pay to BackOffice all amounts due and payable under this Agreement. There shall be no right of set-off.</li>
                                <li class="outline8">6. <u>Survival.</u> Any provision of this Agreement that expressly or by implication is intended to come into or continue in force on or after termination of the Agreement along with any accrued rights to payment shall remain in full force shall survive the termination of this Agreement, regardless of the reason for termination.</li>
                            </ul>
                        </li>
                        <li><strong>Warranty and Remedies.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline9">1. <u>Subscription Service Warranty.</u> BackOffice warrants that the operation of the Subscription Service will meet or exceed the service levels set forth in <u>Exhibit A</u> of this Agreement.</li>
                                <li class="outline9">2. <u>Remedies.</u> If the Subscription Service does not perform as warranted, BackOffice shall provide the Service Credits described and defined in <u>Exhibit A.</u> EXCEPT AS SET FORTH IN THIS SECTION 9.2, THE FOREGOING ARE CUSTOMER’S SOLE AND EXCLUSIVE REMEDIES FOR BREACH OF WARRANTY.</li>
                                <li class="outline9">3. The warranty set forth above is made to and for the benefit of Customer only and applies only if the Subscription Service has been properly configured, and has been used at all times in accordance with the Documentation and the Agreement. The foregoing warranty in Section 9.1 shall not apply to the extent that the Subscription Service is used or interfaced with other software, data or operating systems which are not functioning properly.</li>
                                <li class="outline9">4. EXCEPT AS SET FORTH IN THIS SECTION 9 BACKOFFICE MAKES NO OTHER WARRANTIES, WHETHER EXPRESS, IMPLIED, OR STATUTORY REGARDING OR RELATING TO ANY SOFTWARE, THE Subscription Service, THE DOCUMENTATION, OR ANY OTHER MATERIALS OR SERVICES FURNISHED OR PROVIDED TO CUSTOMER UNDER THIS AGREEMENT. SPECIFICALLY, BACKOFFICE DOES NOT WARRANT THAT A SUBSCRIPTION SERVICE WILL BE ERROR FREE OR WILL PERFORM IN AN UNINTERRUPTED MANNER. TO THE MAXIMUM EXTENT ALLOWED BY LAW, BACKOFFICE SPECIFICALLY DISCLAIMS ALL IMPLIED WARRANTIES OF MERCHANTABILITY, INFRINGEMENT, AND FITNESS FOR A PARTICULAR PURPOSE (EVEN IF BACKOFFICE HAD BEEN INFORMED OF SUCH PURPOSE).</li>
                            </ul>
                        </li>
                        <li><strong>Customer Data; Security; Privacy/Data Protection.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline10">1. <strong>Rights to Customer Data.</strong> Prior to storing, processing, uploading, distributing or linking to any Customer data using the Subscription Service, Customer shall, at its own expense, obtain all third-party consents and/or permissions that may be necessary or appropriate with respect to such Customer data or as required by this Section 10.1 Customer hereby represents and warrants that it owns or otherwise has sufficient rights to grant BackOffice access to and use of Customer data in accordance with the terms of this Agreement and applicable law. BackOffice will not access or use any Customer data except with Customer’s prior written consent, as necessary to maintain or provide the Subscription Service, or as necessary to comply with the law or a binding order of a governmental body, provided however, that BackOffice will use data related to Customer’s account, such as resource identifiers, metadata tags, security and access roles, rules, usage policies, permissions, usage statistics and analytics in connection with providing the Subscription Service. Customer further agrees to obtain the right to allow BackOffice to copy, store, process, analyze and display such Customer data through the Subscription Service and hereby grants to BackOffice a non-exclusive, non-transferable right and license to use Customer data during the Term for the limited purposes of performing BackOffice’s obligations under this Agreement and to collect and use any such data, in non-user specific and aggregated statistical form, for the development and maintenance of the BackOffice products or services and for BackOffice’s other business purposes.</li>
                                <li class="outline10">2. <strong>Security.</strong> BackOffice uses third-party data centers located in the United States in order to provide the Subscription Service, and Customer hereby consents to the storage of any Customer data provided to the Subscription Service in the United States. BackOffice shall maintain appropriate administrative, physical, and technical safeguards for protection of the security, confidentiality and integrity of the Subscription Service, and agrees to implement reasonable and appropriate measures designed to help Customer secure Customer data against accidental or unlawful loss, access or disclosure.
                                    <ul style="list-style-type:none">
                                        <li class="outline10">2.1. Customer has primary access and control over its dedicate portion of the Subscription Service. Customer is responsible for properly configuring and using the Subscription Service and otherwise taking appropriate action to secure, protect and backup its Authorized User accounts and Customer data in a manner that will provide appropriate security and protection, which might include use of encryption to protect Customer data from unauthorized access and routinely archiving Customer data. Customer shall be solely responsible for, and assumes the risk of, any problems resulting from, the content, accuracy, completeness, consistency integrity, legality, reliability, and appropriateness of all Customer data. BackOffice will conduct backups daily and retain the backups for 7 days to permit recovery of the Subscription Service after a disaster or catastrophic failure. BackOffice does not have the capability to restore prior data values for a specific customer. Customer will ensure that Customer data and its and the Authorized Users’ use of Customer data or the Subscription Service will not violate any of BackOffice acceptable use or privacy policies or any applicable law.</li>
                                    </ul>
                                </li>
                                <li class="outline10">3. Customer shall be the data controller and BackOffice shall be a data processor with respect to any Customer data processed via the Subscription Service. BackOffice shall process Customer data via the Subscription Service on behalf of Customer only in accordance with the terms of the Agreement and any instructions reasonably given by Customer from time to time. In the event any Customer data provided to BackOffice via a Subscription Service is or becomes subject to the European Union’s EU General Data Protection Regulation, and/or any national laws or regulations implementing the same, <u>Exhibit B</u> shall apply to such data.</li>
                            </ul>
                        </li>
                        <li><strong>Confidentiality.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline11">1. Each Party acknowledges that the Confidential Information constitutes valuable trade secrets and each Party agrees that it shall use the Confidential Information of the other Party solely in accordance with the provisions of this Agreement and it will not disclose, or permit to be disclosed, the same directly or indirectly, to any third party without the other Party’s prior written consent. Each Party agrees to exercise due care in protecting the Confidential Information from unauthorized use and disclosure. However, neither Party bears any responsibility for safeguarding any information that it can document in writing (i) is in the public domain through no fault of its own, (ii) was properly known to it, without restriction, prior to disclosure by disclosing Party, (iii) was properly disclosed to it, without restriction, by another person with the legal authority to do so, (iv) is independently developed by receiving Party without use or reference to disclosing Party’s Confidential Information or (v) is required to be disclosed pursuant to a judicial or legislative order or proceeding; provided that, to the extent permitted by and practical under the circumstances, receiving Party provides to disclosing Party prior notice of the intended disclosure and an opportunity to respond or object to the disclosure or if prior notice is not permitted or practical under the circumstances, prompt notice of such disclosure.</li>
                                <li class="outline11">2. In the event of actual or threatened breach of the provisions of Section 11, or the scope and/or restrictions to the access rights granted in Section 3 or Section 14 the non- breaching Party will be entitled to immediate injunctive and other equitable relief, without bond and without the necessity of showing actual damage.</li>
                            </ul>
                        </li>
                        <li><strong>Indemnification for Infringement.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline12">1. BackOffice shall indemnify, defend, and hold Customer, its officers, directors, employees and agents harmless from and against any losses, liabilities, damages and expense (including reasonable attorneys’ fees) (a <strong><em>“Loss”</strong></em>) incurred on account of a claim, action or allegation brought against Customer by a third party (each, a <strong><em>“Claim”</em></strong>) to the extent the Claim alleges that the authorized use of the Cloud Services infringe any issued U.S. patent, copyright, trade secret or other proprietary right of any third party. BackOffice shall pay any final judgment awarded against Customer as a result of any such Claim, provided that: (a) Customer gives prompt written notice to BackOffice of any such Claim; (b) Customer gives BackOffice the sole and exclusive right to defend and/or settle any such Claim; and (c) Customer gives BackOffice such reasonable assistance and information as BackOffice may reasonably require to settle or oppose such claims.</li>
                                <li class="outline12">2. In the event any such infringement, claim, action, or allegation is brought or threatened, BackOffice may, at its sole option and expense: (i) procure for Customer the right to continue use of the Cloud Services or the infringing portion thereof; or (ii) modify, amend or replace the Cloud Services or infringing part thereof with other software having substantially the same or better capabilities;</li>
                                <li class="outline12">3. If neither of the remedies in clause 12.2 of this Agreement are commercially practicable with respect to the any infringing portion of the Subscription Service, then BackOffice may terminate the Agreement (or any part thereof) and Customer’s rights with respect to the Subscription Service and refund to Customer an amount equal to the Subscription Fees paid pursuant to the applicable Order with respect to the infringing portion of the Subscription Service, minus a portion of the fees attributable to the period between the Distribution Date of the Subscription Service and the date BackOffice notifies Customer of its election to terminate the Agreement.</li>
                                <li class="outline12">4. The foregoing obligations shall not apply to the extent the infringement arises as a result of: (i) modifications to the Subscription Service made by any party other than BackOffice or BackOffice’s authorized representative; (ii) the use of the Subscription Service in combination with software, hardware or other products not provided by BackOffice.</li>
                                <li class="outline12">5. This Section 12 states the entire liability of BackOffice, and Customer’s sole and exclusive remedies, with respect to infringement of any patent, copyright, trade secret or other proprietary right.</li>
                            </ul>
                        </li>
                        <li><strong>Limitation of Liability.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline13">1. IN NO EVENT WILL BACKOFFICE OR ITS SUBCONTRACTORS BE LIABLE FOR ANY LOSS OF PROFITS, LOSS OF USE, BUSINESS INTERRUPTION, LOSS OF DATA, COST OF COVER, OR INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY KIND IN CONNECTION WITH OR ARISING OUT OF THE SUBSCRIPTION SERVICE, OR ANY DELAY IN DELIVERY OR FURNISHING A SUBSCRIPTION SERVICE, WHETHER ALLEGED AS A BREACH OF CONTRACT OR TORTIOUS CONDUCT, INCLUDING NEGLIGENCE, EVEN IF BACKOFFICE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. BACKOFFICE’S MAXIMUM AGGREGATE LIABILITY UNDER THIS AGREEMENT, (WHETHER IN CONTRACT, TORT OR ANY OTHER FORM OF LIABILITY) FOR DAMAGES OR LOSS, HOWSOEVER ARISING OR CAUSED, WHETHER OR NOT ARISING FROM BACKOFFICE’S NEGLIGENCE, SHALL IN NO EVENT, EXCEED THE FEES PAID BY CUSTOMER TO BACKOFFICE UNDER THIS AGREEMENT. THE FOREGOING LIMITATIONS OF LIABILITY SHALL NOT APPLY TO ANY LOSS OR LIABILITY ARISING FROM EITHER PARTY’S GROSS NEGLIGENCE OR WILLFUL MISCONDUCT.</li>
                                <li class="outline13">2. The provisions of this Section 13 allocate risks under this Agreement between Customer and BackOffice. BackOffice’s pricing reflects this allocation of risk and limitation of liabilities.</li>
                                <li class="outline13">3. No employee, agent, representative, or affiliate of BackOffice has authority to bind BackOffice to any oral representations or warranty concerning the Subscription Service or any other service. Any written representation or warranty not expressly contained in this Agreement will be void and unenforceable.</li>
                            </ul>
                        </li>
                        <li><strong>Audit Rights.</strong> Customer shall keep and maintain full, accurate and detailed records regarding the access and the number of end users of a Subscription Service. BackOffice or its representatives shall be entitled to review and audit such books and records and/or Customer’s compliance with the provisions of this Agreement at no expense to Customer from once per year either in person or remotely during normal business hours upon prior notice of at least thirty (30) days to Customer.</li>
                        <li><strong>Assignment.</strong> Neither this Agreement nor any rights under this Agreement may  be assigned or otherwise transferred by Customer, in whole or in part, whether voluntary or by operation of law, including by way of sale of assets, merger or consolidation, without the prior written consent of BackOffice. Subject to the foregoing, this Agreement will be binding upon and will inure to the benefit of the parties and their respective successors and assigns. Notwithstanding the foregoing, no transfer or assignment of Customer’s rights hereunder shall be effective unless and until (i) Customer has paid and remains current on all amounts due hereunder, and (ii) the purported assignee agrees in writing to be bound by all of the obligations of Customer hereunder.</li>
                        <li><strong>Notice.</strong> Any notice required or permitted under the terms of this Agreement or required by law must be in writing and must be (i) delivered in person, (ii) sent by registered mail, return receipt requested or (iii) sent by overnight air courier. Either Party may change its address for notice by written notice to the other Party. Notices will be considered to have been given at the time of actual delivery in person, three (3) business days after posting, or one days after delivery to an overnight air courier service. </li>
                        <li><u>Force Majeure.</u> In the event either Party is unable to perform any of its obligations under this Agreement because of terrorist acts, acts of war, acts of God, fire, storms, accidents, actions or decree of government bodies or communication line failure not the fault of the affected Party or any event beyond its reasonable control, the Party who has been so affected immediately shall give notice to the other Party and shall use its best effort to resume performance. Upon receipt of such notice, all obligations under this Agreement shall be immediately suspended. If the period of nonperformance exceeds ninety (90) days from receipt of the notice, the Party whose performance has not been affected may, by written notice, terminates this Agreement without further recourse. Payment for Services performed prior to the date performance is suspended shall not be excused.</li>
                        <li><u>Government Uses.</u> This software program and/or documentation shall be deemed “commercial computer software” and is provided to the U.S. Government Agency subject to the limitations set forth in the Agreement. Notwithstanding, the Subscription Service is provided to the U.S. Government Agency with RESTRICTED RIGHTS and its supporting documentation is provided with LIMITED RIGHTS. Use, duplication, or disclosure by the United States Government is subject to the restrictions as set forth in FAR52.227-14 and DFAR252.227-7013 et seq. or the successor as appropriate. The Manufacturer is BackOffice Associates, LLC, 75 Perseverance Way, Hyannis, MA 02601.</li>
                        <li><strong>Miscellaneous.</strong>
                            <ul style="list-style-type:none">
                                <li class="outline19">1. <u>Waiver.</u> Any waiver of the provisions of this Agreement or of a  Party’s rights or remedies under this Agreement must be in writing to be effective. Failure, neglect or delay by a Party to enforce the provisions of this Agreement or its rights or remedies at any time will not be construed to be deemed a waiver of such Party’s rights under this Agreement and will not in any way affect the validity of the whole or any part of this Agreement or prejudice such Party’s right to take subsequent action.</li>
                                <li class="outline19">2. <u>Severability.</u> If any term, condition or provision in this Agreement is found to be invalid, unlawful or unenforceable to any extent, the Parties shall endeavor in good faith to agree to such amendments that will preserve, as far as possible, the intentions expressed in this Agreement. If the Parties fail to agree on such an amendment, such invalid term, condition or provision will be severed from  the remaining terms, conditions and provisions, which will continue to be valid and enforceable to the fullest extent permitted by law.</li>
                                <li class="outline19">3. <u>Applicable Law/Language.</u> This Agreement will be governed by and interpreted in accordance with the laws of the Commonwealth of Virginia, without regard to conflicts of law principles thereof or to the United Nations Convention on the International Sale of Goods. For purposes of all claims brought under this Agreement, each of the Parties hereby irrevocably submits to the exclusive jurisdiction of the commonwealth district located in Fairfax County, Virginia and/or the United States District Court of the Eastern District Court Eastern District of Virginia (Alexandria Division). To that end, each Party irrevocably consents to the exclusive jurisdiction of, and venue in, such court(s), and waives any, (i) objection it may have to any proceedings brought in any such court, (ii) claim that the proceedings have been brought in an inconvenient forum, and (iii) right to object (with respect to such proceedings) that such court does not have jurisdiction over such Party. Without limiting the generality of the foregoing, Customer consents to the service of process in connection with any such claim or dispute by the mailing thereof by registered or certified mail, postage prepaid to Customer, at the address for notice set forth in, or designated pursuant to, this Agreement. To the fullest extent permitted by law, each Party hereby expressly waives (on behalf of itself and on behalf of any person or entity claiming through such Party) any right to a trial by jury in any action, suit, proceeding, or counterclaim of any kind arising out of or in any manner connected with this Agreement or the subject matter hereof.</li>
                                <li class="outline19">4. <u>Attorney’s Fees.</u> Should BackOffice be required to bring any action to enforce its rights under this Agreement, then  in  addition  to  all  other  remedies  available  to  it, BackOffice is entitled to payment of all costs and attorney’s fees expended in enforcing its rights under this Agreement.</li>
                                <li class="outline19">5. <u>Headings.</u> Headings herein are for convenience of reference only and shall in no way affect the interpretation of the Agreement.</li>
                                <li class="outline19">6. <u>Entire Agreement.</u> This Agreement (including but not limited to the Orders, Annex(es) and any addenda hereto signed by both Parties) contains the entire agreement of the parties with respect to the subject matter of this Agreement and supersedes all previous communications, representations, understandings and agreements, either oral or written, between the parties with respect to said subject matter.</li>
                                <li class="outline19">7. <u>Public Announcements/Publicity.</u> Customer and BackOffice agree to cooperate regarding public relations activities, including public announcements, joint press releases, and other activities to be mutually agreed. Neither Party will perform such activities without the prior written consent of the other Party, which consent shall not be unreasonably withheld. Notwithstanding the foregoing, Customer acknowledges and agrees that BackOffice may state in presentation and sales materials that BackOffice is a service provider to Customer.</li>
                                <li class="outline19">8. <u>Customer Terms.</u> No terms, provisions or conditions of any click-through agreement, purchase order, acknowledgement or other business form that Customer may use in connection with the services provided hereunder or the administration of this Agreement will have any effect on the rights, duties or obligations of the Parties, or otherwise modify this Agreement, regardless of any failure of BackOffice to object to such terms, provisions or conditions.</li>
                            </ul>
                        </li>
                    </ol>
                    
                    <h2>EXHIBIT A</h2>
                
                    <h3>SERVICE LEVELS</h3>
                    <p>This Service Level Exhibit describes the standard cloud-based services and support levels currently offered by BackOffice to its customers who have executed an Order to access a Subscription Service.</p>
                    <ol>
                        <li><strong>Additional Definitions.</strong>
                            <ol type="a">
                                <li><strong>“API”</strong> means the REST API interface.</li>
                                <li><strong>“Downtime”</strong> means the period of time when the Subscription Service is unavailable to the internet so that an authorized user is unable to submit samples and query the database through the Portal or the API. Downtime does not include the period of time when the Network is not available as a result of: (i) Scheduled Downtime or scheduled network, hardware, or service maintenance or upgrades; or (ii) the acts or omissions of Customer or Customer’s employees, agents, contractors, or vendors, or anyone gaining access to BackOffice’s network by means of Customer’s passwords or equipment; (iii) Customer requested changes; (v) any period of unavailability lasting less than five (5) minutes; or (vi) any unavailability caused by circumstances beyond BackOffice’s reasonable control, including without limitation, acts of God, strikes or other labor disturbances, war, whether declared or not, sabotage, and/or any other cause or causes, whether similar or dissimilar to those herein specified, which cannot reasonably be controlled by BackOffice, computer, telecommunications, internet service provider or hosting facility failures or delays involving hardware, software or power systems not within BackOffice’s possession or reasonable control, and including denial of service attacks against internet infrastructure providers.</li>
                                <li><strong>“Monthly Uptime Percentage”</strong> means the difference between the total number of minutes in a calendar month and the total number of minutes of Downtime that is reported by a Customer, divided by the total number of minutes in that calendar month.</li>
                                <li><strong>“Network”</strong> means the Portal and the API.</li>
                                <li><strong>“Portal”</strong> means web-based portal access to the Subscription Service.</li>
                                <li><strong>“Scheduled Downtime”</strong> means: (i) Downtime within pre-established maintenance windows; or (ii) Downtime during a major version upgrade.</li>
                                <li><strong>“Service Credits”</strong> means an extension of the number of days of Service that may be added to Customer’s Service term at no additional charge to Customer. Service Credits may not be exchanged for, or converted to, monetary amounts.</li>
                            </ol>
                        </li>
                        <li><strong>99.5% Monthly Uptime Percentage.</strong>
                            <ol type="a">
                                <li>During the Subscription Term, BackOffice will use commercially reasonable efforts to maintain 99.5% Monthly Uptime Percentage with respect to the Subscription Service. In the event that BackOffice fails to meet the 99.5% Monthly Uptime Percentage, subject to the terms and conditions of this Exhibit, Customer shall be entitled to Service Credits based on the following metrics:
                                    <table style="width:100%; padding:15px; border:solid black 1px;border-collapse: collapse;">
                                        <tr>
                                            <th>Monthly	Uptime Percentage</th>
                                            <th>Monthly Reported Outage (Hours)</th> 
                                            <th>Service Credit</th>
                                        </tr>
                                        <tr>
                                            <td>Between 99.5% and 99.0%</td>
                                            <td>More than 3.6 hours but less than 7.2 hours per month</td> 
                                            <td>1 Service Credit</td>
                                        </tr>
                                        <tr>
                                            <td>Between 98% and 99%</td>
                                            <td>More than 7.2 hours but less than 14.4 hours per month</td> 
                                            <td>2 Service Credit</td>
                                        </tr>
                                        <tr>
                                            <td>Below 98%</td>
                                            <td>More than 14.4 hours per month</td> 
                                            <td>4 Service Credit</td>
                                        </tr>
                                    </table>
                                </li>
                                <li>Should BackOffice fail to make the Subscription Service available as set forth in this Section (“SLA Noncompliance”) in a calendar month, Customer may continue to use the Subscription Service and, subject to the terms and conditions of this Exhibit, receive a single Service Credit for each SLA Noncompliance.</li>
                            </ol>
                        </li>
                        <li><strong>Eligibility Requirements.</strong> BackOffice’s obligation to provide the Service Credits is conditioned upon the following:
                            <ol type="a">
                                <li><strong>Reporting.</strong> Customer must report Downtime to the BackOffice Support Desk within five (5) business days of the event. Any such request should contain a detailed description and account of the reported occurrence. All claims will be verified against BackOffice system records. Should BackOffice dispute any period of unavailability alleged by Customer, BackOffice will provide to Customer a record of the Subscription Service availability for the applicable period. BackOffice will provide such records only in response to claims made by Customer in good faith.</li>
                                <li><strong>Agreement Compliance.</strong>  Customer must not be in material breach of the use restrictions expressly set forth in the Agreement.</li>
                                <li><strong>Payment Obligations.</strong>  Customer shall have paid all valid and undisputed invoices due under the Agreement.</li>
                            </ol>
                        </li>
                        <li><strong>SLA Exclusions.</strong>  This SLA shall not apply to performance or availability issues to the extent:
                            <ol type="a">
                                <li>Caused by Customer’s or a third-party’s hardware, network, or software;</li>
                                <li>Caused by Customer’s use of the Services not in accordance with the Documentation; or</li>
                                <li>Caused by Customer’s use in contradiction with written instructions from BackOffice’s support desk.</li>
                            </ol>
                        </li>
                        <li><strong>Chronic Breach.</strong> Should BackOffice in addition fail to make the Subscription Service available as set forth in Section above for three (3) consecutive calendar months, Customer may terminate the applicable Order by providing notice of termination in accordance with the Agreement, in which case BackOffice will refund to Customer any prepaid fees for the remainder of the Subscription Term following the date of termination. The remedies described in this paragraph shall be the sole remedies available to Customer for SLA Noncompliance.</li>
                    </ol>
        
                    <h2>EXHIBIT B</h2>
                
                    <h3>DATA PROTECTION</h3>
                    <ol type="1">
                        <li>This Data Protection Exhibit (this <strong><em>“Exhibit”</em></strong>) shall only be applicable and be made a part of the Agreement in the event any Customer data provided to BackOffice via the Subscription Service is or becomes subject to the European Union’s EU General Data Protection Regulation (<strong><em>“GDPR”</em></strong>), and/or any national laws or regulations implementing the same which are applicable to Customer. Section references in this Exhibit refer to the indicated sections in this Exhibit.</li>
                        <li><strong><em>“Data Protection Legislation”</strong></em> means: (i) unless and until the GDPR is no longer directly applicable to Customer, the General Data Protection Regulation ((EU) 2016/679) and any national implementing laws, regulations and secondary legislation, as amended or updated from time to time, and then (ii) any successor legislation to the GDPR or the Data Protection Act 1998. <strong><em>“Personal Data”, “Controller”, “Processor”, “Data Subject”</em></strong> and <strong><em>“Process”</em></strong> are as defined in the Data Protection Legislation.
                        <ul style="list-style-type:none">
                                <li class="outline2">1. Both Parties will comply with all applicable requirements of the Data Protection Legislation. This Exhibit is in addition to, and does not relieve, remove or replace, a Party’s obligations under the Data Protection Legislation.</li>
                                <li class="outline2">2. The Parties acknowledge that for the purposes of the Data Protection Legislation, Customer is the data controller and BackOffice is the data processor. The Parties will, prior to beginning any Processing, agree the scope, nature and purpose of processing by BackOffice, the duration of the processing and the types of Personal Data and categories of Data Subject.</li>
                                <li class="outline2">3. Without prejudice to the generality of Section 2.1 of this Exhibit, Customer will ensure that it has all necessary or appropriate consents and notices in place, if any such consents are required, to enable the lawful transfer of the Personal Data to BackOffice for the duration and purposes of this Agreement.</li>
                                <li class="outline2">4. Without prejudice to the generality of section 2.1 of this Exhibit, BackOffice shall, in relation to any Personal Data processed in connection with the performance by BackOffice of its obligations under the Agreement:
                                    <ul style="list-style-type:none">
                                        <li class="outline2">4.1. process that Personal Data only on the written instructions of Customer unless BackOffice is required by the laws of any member of the European Union or by the laws of the European Union applicable to BackOffice to process Personal Data (<strong><em>“Applicable Laws”</em></strong>). Where BackOffice is relying on laws of a member of the European Union or European Union law as the basis for processing Personal Data, BackOffice shall promptly notify Customer of this before performing the processing required by the Applicable Laws unless those Applicable Laws prohibit BackOffice from so notifying Customer;</li>
                                        <li class="outline2">4.2. ensure that it has in place appropriate technical and organizational measures, reviewed and approved by Customer, to protect against unauthorized or unlawful processing of Personal Data and against accidental loss or destruction of, or damage to, Personal Data, appropriate to the harm that might result from the unauthorized or unlawful processing or accidental loss, destruction or damage and the nature of the data to be protected, having regard to the state of technological development and the cost of implementing any measures (those measures may include, where appropriate, pseudonymizing and encrypting Personal Data, ensuring confidentiality, integrity, availability and resilience of its systems and services, ensuring that availability of and access to Personal Data can be restored in a timely manner after an incident, and regularly assessing and evaluating the effectiveness of the technical and organizational measures adopted by it);</li>
                                        <li class="outline2">4.3. ensure that all personnel who have access to and/or process Personal Data are obliged to keep the Personal Data confidential; and</li>
                                        <li class="outline2">4.4. not transfer any Personal Data to another country or territory unless the prior written consent of Customer has been obtained and the following conditions are fulfilled:
                                            <ul style="list-style-type:none">
                                                <li>(i) Customer or BackOffice has provided appropriate safeguards in relation to the transfer;</li>
                                                <li>(ii) the data subject has enforceable rights and effective legal remedies;</li>
                                                <li>(iii) BackOffice complies with its obligations under the Data Protection Legislation by providing an adequate level of protection to any Personal Data that is transferred; and</li>
                                                <li>(iv) BackOffice complies with reasonable instructions notified to it in advance by Customer with respect to the processing of the Personal Data;</li>
                                            </ul>
                                        </li>
                                        <li class="outline2">4.5. assist Customer, at Customer’s cost, in responding to any request from a Data Subject and in ensuring compliance with its obligations under the Data Protection Legislation with respect to security, breach notifications, impact assessments and consultations with supervisory authorities or regulators;</li>
                                        <li class="outline2">4.6. notify Customer without undue delay on becoming aware of a Personal Data breach;</li>
                                        <li class="outline2">4.7. at the written direction of Customer, delete or return Personal Data and copies of it to Customer on termination of this Agreement unless required by applicable laws to store the Personal Data; and</li>
                                        <li class="outline2">4.8. maintain complete and accurate records and information to demonstrate its compliance with this section.</li>
                                    </ul>
                                </li>
                                <li class="outline2">5. BackOffice shall be authorized to provide Personal Data to the following sub-processors, provided that each such sub-processor implements protections for the protection of Personal Data in material conformity with this Exhibit: Salesforce.com Inc. and Kimble Applications Ltd. The Customer’s consent will be required to the appointment by BackOffice of any additional third- party processor of Personal Data under this agreement.</li>
                                <li class="outline2">6. Either Party may, at any time on not less than 30 days’ notice, revise this Exhibit by replacing it with any applicable controller to processor standard clauses or similar terms forming part of an applicable certification scheme (which shall apply when replaced by attachment to this Agreement).</li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <form class="modalForm"> 
                    <div class="form-check form-row align-items-center">
                        
                        <input name="terms" type="checkbox" tabindex="0" required id="yesno" disabled aria-describedby="termsLink" class="form-check-input">
                        
                        <label class="form-check-label" for="yesno">I agree to the terms and conditions</label>
                        <span id="yesnoFeedback" class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="register" disabled class="btn btn-info" onclick="eulaFormSubmit()">Submit Information</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="print" class="btn btn-secondary" onclick="printDiv('terms')" value="print a div!">Print Terms and Conditions</button>
                    </div>
                </form>
            </div>
        </div>
        <nav class="navbar fixed-bottom">
            <a class="navbar-brand" href="#"><img class="footerLogo" src="BOA_White.svg" /></a>
        </nav>
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script>
$(document).ready(function(){
    $('#terms').scroll(function () {

        if ($(this).scrollTop() >= $(this)[0].scrollHeight - Math.floor($(this).height()) - 1) {
            console.log("hit bottom");

            $('#yesno').removeAttr('disabled');
        }
    });

    $('#yesno').change(function () {
        $('#register').prop("disabled", !this.checked);
    }).change()

});

function eulaFormSubmit() {
    document.getElementById('eulaform').submit();
}

function printDiv(terms) {
    var printPopup;

    if (/*@ccon!@*/false || !!document.documentMode) {
        printPopup = window.open("NACSTCv2.0.pdf");
        //printPopup.window.print();
    } else {
        printPopup = document.createElement("div");

        printPopup.id = "printpopup";
        printPopup.innerHTML = document.getElementById('terms').innerHTML;

        document.body.appendChild(printPopup);

        window.print();

        document.body.removeChild(printPopup);
    }
}

        </script>
    </body>
</html>
<?php
} else {
?>

<!-- success page goes here -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>BackOffice Associates Terms and Conditions</title>
        <meta name="author" content="name">
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
body {
    font-family: 'Roboto';
    color: #003744;
}

h1 {
    text-align: center;
}

.successText {
    font-size: 1.5em;
    text-align: center;
    line-height: 2;
}

.navbar {
    background-color: #003744;
    height: 5em;
}
      
.container {
    background-color: #ffffffba;
    padding: 4em;
    margin: 0;
    position: absolute;
    top: 34%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.container-fluid {
    background-image: url("Entota_UI_Login-Background.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    -moz-background-size: cover;
    -o-background-size: cover;
    height: 58em; 
}

img.footerLogo {
    position: absolute;
    right: 50%;
    left: 50%;
    width: 10em;
    bottom: auto;
    top: 50%;
    margin: 0;
    transform: translate(-50%, -50%);
}

img.formName {
    width: 22em;
    margin-left: 33%;
    margin-bottom: 1em;
}


@media only screen and (max-width: 1024px) {
    .container-fluid {
        height: 82em;
    }

}
        
@media only screen and (max-width: 768px) {
    img.formName {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;;
    }
    
}

@media only screen and (max-width: 576px) {
    img.formName {
        width: 80%;
    }
    
    .container-fluid {
        height: 80em;
    }

    .container {
        top: 88%;
    }
}

@media only screen and (max-width: 320px) {
    .container {
        top: 88%;
    }
}

@media print {
    body * {
        visibility: hidden;
    }
}  
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container" >
                <img class="formName" src="Entota_Main.svg">
                
                <p class="successText">Thank you for agreeing to these Terms and Conditions on behalf of HP Inc..</br>
                You will receive an email inviting you to complete the registration of your account that will provide you with access to the subscribed software.</p>
                
            </div>
        </div>
        <nav class="navbar fixed-bottom">
            <img class="footerLogo" src="BOA_White.svg" />
        </nav>
    </body>
</html>
<?php
}
?>