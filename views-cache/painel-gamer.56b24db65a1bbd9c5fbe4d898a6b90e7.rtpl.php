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
              <a href="/admin/painel/newgamer" class="btn btn-success">Cadastrar Jogador</a>
              <a href="/admin/painel/newpoint" class="btn btn-success">Efetuar Lançamento</a>
              <a href="/admin/painel/benefit" class="btn btn-success">Benefícios</a>
            </div>

           
            <!-- /.box-body -->
          </div>
          <table class="table table-striped">
            <thead class="cabecalho">
              <tr>
                <th style="width: 10px">Jogador</th>
                <th>Score</th>
                <th>Data Cadastro</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($painel) && ( is_array($painel) || $painel instanceof Traversable ) && sizeof($painel) ) foreach( $painel as $key1 => $value1 ){ $counter1++; ?>
              <tr>
                <td><?php echo htmlspecialchars( $value1["usergamer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["score"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                


              </tr>
              <?php } ?>
            </tbody>
          </table>

  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->