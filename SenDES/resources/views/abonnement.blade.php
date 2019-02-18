<!DOCTYPE html>

<!--
Template Name: Cytocean
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Cytocean</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul>
        <li><i class="fa fa-phone"></i>77 774 25 19</li>
        <li><i class="fa fa-envelope-o"></i> senelec@info.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="#">Deconnexion</a></li>
        <!--<li><a href="#">Register</a></li>-->
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo"> 
      <!-- ################################################################################################ -->
      <h1><a href="index.html">SENELEC</a></h1>
      <p>L'energie de tous</p>
      <p> </p>
      <p>Les possibles</p>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="welcome">Accueil</a></li>
        <li><a class="active" href="abonnement">Gestion Abonnements</a></li>
        <li><a class="active" href="facture">Gestion Factures</a></li>
        <li><a href="compteur">Gestion Compteurs</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<div id="contenu">
    <div class="row" style="max-height: 50rem;"> 
        <div class="col-sm-7">
            <div class="card" >
                <div class="card-header bg-transparent border-success">Liste des abonnements</div>
                    <div class="card-body">
                        <table class= "table table-responsive table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Contrat</th>
                                <th>Date</th>
                                <th>Ancien Cumul</th>
                                <th>Nouveau Cumul</th>
                                <th>Numero Compteur</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach($abonnements as $abonne)
                            <tr>
                                <td>{{$abonne->id}}</td>
                                <td>{{$abonne->contrat}}</td>
                                <td>{{$abonne->date}}</td>
                                <td>{{$abonne->cumulAnc}}</td>
                                <td>{{$abonne->cumulNouv}}</td>
                                <td>{{$abonne->compteur_id}}</td>
                                <td><a href='/edit/{{$abonne->id}}'>Editer</a></td>
                                <td><a href='/destroy/{{$abonne->id}}'>Supprimer</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-sm-5">
            <div class="card" style="max-height: 100rem;">
                <div class="card-header bg-transparent border-success">Formulaire d'abonnement</div>
                    <div class="card-body">
                        <form action="/store" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="contrat">Contrat</label>
                                <input type="text" require type="text" name="contrat" class="form-control" id="contrat" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="date">Date</label>
                                <input type="date" require  name="date" class="form-control" id="date" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="cumulNouv">Nouveau Cumul </label>
                                <input type="number" require  name="cumulNouv"  class="form-control" id="cumulNouv">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="numerocompteur">Numero Compteur</label>
                                <input type="text" require  name="numerocompteur"  class="form-control" id="numerocompteur">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" name="ajouter" id="ajouter" value="Ajouter"/>
                                <input type="reset" class="btn btn-danger" name="annuler" id="annuler" value="Annuler"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">SENELEC</h6>
      <nav>
        <ul class="nospace">
          <li><a href="index.html"><i class="fa fa-lg fa-home"></i></a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Cookies</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Online Shop</a></li>
          <li><a href="#">Sitemap</a></li>
        </ul>
      </nav>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Contacts</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Dakar, Sénégal <!--&amp; Number, Town, Postcode/Zip-->
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (221) 33 839 30 30</li>
        <li><i class="fa fa-envelope-o"></i> senelec@info.com</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">Senelec</a></p>
    <p class="fl_right"><a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates"></a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>