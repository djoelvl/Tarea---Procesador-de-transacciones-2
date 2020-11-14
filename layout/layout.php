<?php

class Layout{

  private $isPage;
  private $directorio;

  function __construct($page){

    $this->isPage = $page;

    $this->directorio = ($this->isPage) ? "../": "";
  }


  public function printHeader(){    
    $header = <<<EOF

    <html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <title>Registro de estudiantes</title>

<link href="{$this->directorio}assets/css/framework/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"> 
<link href="{$this->directorio}assets/css/style.css" rel="stylesheet">


  </head>
  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="{$this->directorio}index.php" class="navbar-brand d-flex align-items-center">
        
        <strong>Home</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
EOF;

echo $header;  
}

public function printFooter(){
        $footer = <<<EOF


    <footer class="text-muted">
    
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="{$this->directorio}assets\js\libreria\Bootstrap\bootstrap.min.js"></script>
  
  </body></html>
      
EOF;

echo $footer;  
}

}


?>