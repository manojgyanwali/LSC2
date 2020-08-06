<?php 
include('language.php');
include('includes/dbcon.php');
$qry9="select *from category";
$result9=$conn->prepare($qry9);
$result9->execute();

$eng_select='';
$nep_select='';
$language='';


if((isset($_REQUEST['language']) && $_REQUEST['language']=='eng') || !isset($_REQUEST['language']))
{
  $eng_select='selected';
  $language='eng';
}
  else
  {
$nep_select='selected';
$language='nep';

  }




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="css/header.css">
</head>
<body>

    <!-- header top section  -->

    <section class="headerTop">
        <div class="container">
            <div class="logoContains">
                <img src="images/Logo.png" alt="logo">
                <h5>Lumbini Seed Company</h5>
            </div>
            <div class="RightContains">
                <ul class="socialIcons">
                    <li> <a href=""><i class="fa fa-facebook"></i></a></i></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>


                    <a href="signup.html"><button class="customButtonTop">Sign UP</button></a>
                    <a href="login.html"><button class="customButtonTop">Log in</button></a>
                    
                    <button class="customButtonTop dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <a href="index.php?lang=en"><button class="dropdown-item" type="button">English</button>
                      </a>
                      <a href="index.php?lang=nep"><button class="dropdown-item" type="button">Nepali</button>
                      </a>
                    </div>


                </ul>
                
            </div>
        </div>
    </section>

    <!-- head bottom section  -->

    <!-- Navigation menu  -->

    <div class="navigationMenu">
        
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#" style="color: white;">LSC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon" style="color: white;"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php"style="color:white;"><?php echo $lang['home'] ?> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="profile.php" style="color:white;"><?php echo $lang['company_profile'] ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        
                      <a class="nav-link dropdown-toggle" href="product.php" style="color: white;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['product_portfolio'] ?>
                     
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="product.php">All Produtcs</a>
                        <div class="dropdown-divider"></div>
                       
                        <?php 
                          while($row9=$result9->fetch(PDO::FETCH_ASSOC))
                          {
                        ?>
                        
                        <a class="dropdown-item" href="category.php?category=<?php echo $row9['category_type']; ?>"><?php echo $row9['category_type']; ?></a>
                        
                          <?php } ?>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="distribution.php"style="color:white;"><?php echo $lang['distribution_network'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php"style="color:white;"><?php echo $lang['news_and_events'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="career.php"style="color:white;"><?php echo $lang['carrer_and_opportunities'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Research.php"style="color:white;">Research & Development</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"style="color:white;"><?php echo $lang['contact_us'] ?></a>
                    </li>
                    
                    <!-- <li>
                          select language           
                        <select onchange="set_language()" name="language" id="language">
                             
                              <option value="eng" <?php echo $eng_select ?>>eng</option> 
                              <option value="nep" <?php echo $nep_select ?>>nep</option> 
                          </select> <br><br>
                     </li> -->
                                
                  </ul>
                </div>
            </div>
          </nav>
    </div>
    

    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
    function set_language()
    {
      var language=$('#language').val();
      console.log(language);
      window.location.href='http://localhost/lsc/LSC/header.php?language='+language;
    }
    
    </script>

    </body>
</html>