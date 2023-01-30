<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: register.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
        <title>Investment consultant</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color:  #b3c6ff;
  border: solid 1px #c3c3c3;
}

#panel {
  padding: 50px;
  display: none;
}
</style>
      </head>
    <body>
    <div id="flip">Alone we can do so little  Together we can do so much.</div>
<div id="panel">                      <?php echo "Welcome " . $_SESSION['username'] . "</h1>"; ?> 
</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="Index.html">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="News.html">News <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="invest.html">Invest</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pricing.html">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="Stocks.html">Stocks</a>
                    <a class="dropdown-item" href="Crypto.html">Cryptocurrencies</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.html">About us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="infor.html">Contact us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="shoping cart.html">Shoping Cart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Login</a>
                  </li>
                  <li class="nav-item">
    <a class="nav-link"  href="logout.php">Logout</a></a>
                  </li>
             
              </ul>
            </div>
            </nav>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12" style="background-color:rgba(193, 239, 250, 0.555);">

                   <h1 class="title">Work With The Best</h1>
                   <img class="photos" src="images/workwithus.jpg" alt="asd">
                   <br>
                   <p class="desc">Through business consultation services, we set the stage for online growth of your business whether you are an entirely web-based venture, a brick & mortar business seeking expansion through online mediums, or an aspiring entrepreneur looking for ways to get into the web based business game.
                  <br>  Our  consulting services focus on our clients' most critical issues: strategy, marketing, organization, operations, technology, transformation, digital, advanced analytics, corporate finance, mergers & acquisitions and sustainability across all industries and geographies. We bring deep, functional expertise, but are known for our holistic perspective: we capture value across boundaries and between the silos of any organization. We have proven a multiplier effect from optimizing the sum of the parts, not just the individual pieces.
                  Our main focus is on stocks and cryptocurrencies
                </p>            
                <div class="my-5">
                    <div class="d-none d-lg-block d-xl-none">Check your course about <b>cryptocurrencies</b> and stocks.</div>

                </div>
                      
                     <h1 class="title">What Are Stocks and How Do They Work?</h1>
                   <img class="Dphotos" src="images/sellBuy.jpg" alt="SellBuyStocks">
                   <h2 class="title2">Stock Definition</h2>
                   <p class="desc2">Stocks are an investment in a company and that company's profits. Investors buy stock to earn a return on their investment.
                    <p class="text-lowercase">
                    Simply put,</p> stocks are a way to build wealth. They are an investment that means you own a share in the company that issued the stock.
                    <br>Another definition:<br>
                    A stock  is a security that represents the ownership of a fraction of a corporation. This entitles the owner of the stock to a proportion of the corporation's assets and profits equal to how much stock they own. Units of stock are called "shares." 
                    <br>
                    <p class="text-warning">
                    Stocks are how ordinary people invest</p> in some of the most successful companies in the world. For companies, stocks are a way to raise money to fund growth, products and other initiatives.
                  <a class="link-danger" href="Stocks.html"> Learn more about Stocks <link rel="stylesheet" href=""></a>
                </p>
                   <h1 class="title">What Is Cryptocurrency?</h1>
                   <img class="photos" src="images/bitcoin.jpg" alt="bitcoin">
                   <h2 class="title2">Definition</h2>
                   <p class="desc">Cryptocurrency is a form of payment that can be exchanged online for goods and services. Many companies have issued their own currencies, often called tokens, and these can be traded specifically for the good or service that the company provides. Think of them as you would arcade tokens or casino chips. You’ll need to exchange real currency for the cryptocurrency to access the good or service.
                   <br>
                    Cryptocurrencies work using a technology called blockchain. Blockchain is a decentralized technology spread across many computers that manages and records transactions. Part of the appeal of this technology is its security.<br>
                    <a href="Crypto.html"> Learn more about Cryptocurrencies <link rel="stylesheet" href=""></a></p>
                  <br> <br>
                  <h1 class="explanation">Here are some videos for better explanation:</h1>
                  <div class="section">
                    <iframe class="videos" width="560" height="315" src="https://www.youtube.com/embed/8NgVGnX4KOw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
                    <iframe class="videos" width="560" height="315" src="https://www.youtube.com/embed/A7fZp9dwELo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
                </div>         
                </div>
        </div>
        </div>
        
        <footer class="bg-dark text-center text-lg-start">
            <div class="text-center p-3 text-white"  style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-white">GMB.com</a>
            </div>
          </footer>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    </body>
</html>