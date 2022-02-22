 <!--
    *** FOOTER ***
    _________________________________________________________
    -->
 <div id="footer">
   <div class="container">
     <div class="row">
       <div class="col-lg-3 col-md-6">
         <h4 class="mb-3">Seções</h4>
         <ul class="list-unstyled">
           <li><a href="./registrar.php">Criar conta</a></li>
           <li><a href="./contato.php">Contato</a></li>
           <!-- <li><a href="text.html">Contato</a></li>
              <li><a href="faq.html">Link 3</a></li> -->
         </ul>
       </div>
       <!-- /.col-lg-3-->
       <div class="col-lg-3 col-md-6">
         <h4 class="mb-3">Categorias</h4>
         <ul class="list-unstyled">
           <?php $categorias = $objProdutos->selectCategorias("id,nome", "", "6", "", "nome");
            if (!empty($categorias)) {
              foreach ($categorias as $itemCat) { ?>
               <li><a href="./produtos.php?categoria_id=<?= $itemCat->id; ?>"><?= $itemCat->nome; ?></a></li>
           <?php }
            } ?>
         </ul>
       </div>

       <!-- /.col-lg-3-->
       <div class="col-lg-3 col-md-6">
         <h4 class="mb-3">Onde nos encontrar</h4>
         <p><strong>NOME.</strong><br>Nome da rua<br>Bairro<br>Sala 13<br>Brasil<br><strong>Santana do Livramento</strong></p>
         <!-- <a href="./contato.php">Entre em contato</a> -->
         <hr class="d-block d-md-none">
       </div>

       <!-- /.col-lg-3-->
       <div class="col-lg-3 col-md-6">
         <h4 class="mb-3">Assine nossa NewsLetter</h4>
         <p class="text-muted">Deixe seu email aqui para receber novidades e promoções.</p>
         <form>
           <div class="input-group">
             <input type="email" name="email_assinar" class="form-control"><span class="input-group-append">
               <button type="button" class="btn btn-outline-secondary">Assinar </button></span>
           </div>
           <!-- /input-group-->
         </form>
         <hr>
         <h4 class="mb-3">Siga nossas redes sociais</h4>
         <p class="social">
           <a href="#" class="facebook external"><i class="fa fa-facebook"></i></a>
           <a href="#" class="twitter external"><i class="fa fa-twitter"></i></a>
           <a href="#" class="instagram external"><i class="fa fa-instagram"></i></a>
           <a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a>
           <a href="#" class="email external"><i class="fa fa-envelope"></i></a>
         </p>
       </div> <!-- /.col-lg-3-->
     </div> <!-- /.row-->
   </div> <!-- /.container-->
 </div> <!-- /#footer-->
 <!-- *** FOOTER END ***-->

 <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
 <!-- <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2019 Your name goes here.</p>
          </div>
          <div class="col-lg-6">
            <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/">Bootstrapious</a>
               If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!
            </p>
          </div>
        </div>
      </div>
    </div> -->
 <!-- *** COPYRIGHT END ***-->
 <!-- JavaScript files-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js" integrity="sha512-Mf4TMPxK1TE3jNpbt6cFIM9Rz+Ezs+mvG6SvEKq2ZYEAix8QNtbseSccunI4efVNtvfzrRmd8vVwRRBgYMtfnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
 <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
 <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
 <script src="js/front.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js"> </script>
 <!-- jQuery Mask Plugin  -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="js/map.js"></script>
 <script src="js/validaCpfCnpj.js"></script>
 <script src="js/recusrsos.js"></script>
 </body>

 </html>