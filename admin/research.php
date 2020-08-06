<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research & Development</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    
<div class="sidebar">
<?php include('sidebarNav.html') ?>
</div>
    <div class="home">
        <div class="homeContent">
            <div class="container" style="padding-left:140px;">
                    <div class="topSections">
                        <h1>Research & Develoopment</h1>
                        <p class="text-muted">Admin/research</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topR" role="tab" aria-controls="home" aria-selected="true">Top Research</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ongoingR" role="tab" aria-controls="profile" aria-selected="false">Ongoing Research</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#completeR" role="tab" aria-controls="profile" aria-selected="false">Complete Research</a>
                        </li>
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- top research  -->
                            <div class="tab-pane fade show active" id="topR" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Top Research</h4>
                                <div class="contents" style="padding:20px;">
                                   

                                    <label for="">Add Research title</label>
                                    <input type="text" class="form-control col-md-6"><br>
                                    <label><b>Upload Research Highlight Image (250*250)</b></label> <br>
                                        <input type="file" placeholder="Choose File"><br><br>

                                        <p><b><i>Sub Images</i></b></p>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                        </div> <br>

                                    <label for="">Add description</label>
                                        <textarea class="form-control" name="" id="" cols="20" rows="10"></textarea>

                                   

                                    <button class="btn btn-info">Publish Top Research</button>
                                </div>
                            </div>

                            <!-- ongoing research -->
                            <div class="tab-pane fade" id="ongoingR" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add ongoing research</h4>
                                <div class="container">
                                <label for="">Add Research title</label>
                                    <input type="text" class="form-control col-md-6"><br>
                                    <label><b>Upload Research Highlight Image (250*250)</b></label> <br>
                                        <input type="file" placeholder="Choose File"><br><br>

                                        <p><b><i>Sub Images</i></b></p>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" placeholder="Choose File">
                                            </div>
                                        </div> <br>

                                    <label for="">Add description</label>
                                        <textarea class="form-control" name="" id="" cols="20" rows="10"></textarea>

                                   

                                    <button class="btn btn-info">Publish ongoing research</button>
                                </div>
                                    
                            </div>

                            <!-- complete research  -->
                            <div class="tab-pane fade" id="completeR" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px;">Add complete research report</h4>

                                <div class="container">
                                <label for="">Add Research title</label>
                                    <input type="text" class="form-control col-md-6"><br>
                                    <label><b>Upload Research Report PDF file</b></label> <br>
                                        <input type="file" placeholder="Choose File"><br><br>
                                    <button class="btn btn-info">Publish complete research report</button>
                                </div>

                               

                            </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
</body>
</html>