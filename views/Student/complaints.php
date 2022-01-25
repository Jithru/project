<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo URL?>public/css/student/complaints.css">
    <script src="<?php echo URL?>public/js/student/complaints&review.js"></script>
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>

        </div>
        <div class="main">
 
            <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>
            <div class="review">
                <div class="container-review">
                    <div class="row-1">
                        <div class="title">
                            <h1>Review & Complaint</h1>
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="div-name">

                            <div class="title-complaints">
                                <h4>Complaints</h4><hr class="hr-1">
                            </div>

                        <a href="<?php echo URL?>Student/review">                          
                              <div class="title-reviews">
                               <h4>Reviews</h4>
                            </div></a>

                        </div>

                    </div>
                    <div class="row-3">
                        <div class="description">
                            <div class="para">
                                <p>As the staff of the lead driving school, we  are happy to get your complaints and reviews,
to Improve our service as well as to provide a good service to our valuable customers 
including you. We highly encourage you to send your feedback.
</p>
                            </div>
                            <div class="fill">
                                <div class="add">
                                    <div class="comments-1">
                                        <div class="com-row-1">
                                            <h4>Add Your complaint here.</h4>
                                        </div>
                                        <div class="com-row-2">
                                            <textarea id="text-1" style="white-space: pre" class="complaints" ></textarea>
                                        </div>
                                    </div>
                                    <div class="comments-2">
                                        <div class="com-row-1">
                                            <h4>Add your suggestion here.</h4>
                                        </div>
                                        <div class="com-row-2">
                                            <textarea id="text-2" style="white-space: pre" class="complaints"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="clear-submit">
                                        <div class="clear-button">
                                            <button onclick="clearComplaint()" class="clear">Clear</button>
                                        </div>
                                        <div class="submit-button">
                                            <button onclick="submitComplaints()" class="submit">Submit</button>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>