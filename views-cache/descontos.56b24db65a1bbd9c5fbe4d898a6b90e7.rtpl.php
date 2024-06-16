<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="/res/admin/css/products.css">

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Descontos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/products/descontos">Promoções</a></li>
    <li class="active"><a href="/admin/products/descontos/vincular">Vincular Promoções</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/products/descontos/create" class="btn btn-success">Cadastrar Desconto</a>
            </div>

           
            <!-- /.box-body -->
          </div>
          <table class="table table-striped">
            <thead class="cabecalho">
              <tr>
                <th style="width: 10px">Cód.Promo</th>
                <th>Percentual</th>
                <th>Data Início</th>
                <th>Data Fim</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($promocoes) && ( is_array($promocoes) || $promocoes instanceof Traversable ) && sizeof($promocoes) ) foreach( $promocoes as $key1 => $value1 ){ $counter1++; ?>
              <tr>
                <td><?php echo htmlspecialchars( $value1["despromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["percentual"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["datainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["datafim"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>


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