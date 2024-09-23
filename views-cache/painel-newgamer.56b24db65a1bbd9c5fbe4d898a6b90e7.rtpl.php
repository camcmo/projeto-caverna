<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="/res/admin/css/products.css">

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Painel Gamer
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
   

  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/painel/back" class="btn btn-success">Voltar</a>
       
            </div>

           
            <!-- /.box-body -->
          </div>
         <form method="post" action="/admin/newgamer/save">

            <input type="text" placeholder="Nome do Jogador" name="usergamer">
            <input type="text" placeholder="E-mail" name="email">
            <button type="submit">Salvar</button>
         </form>

  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->