<?php if(!class_exists('Rain\Tpl')){exit;}?><link rel="stylesheet" href="/res/admin/css/products-edit.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Descontos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/products/descontos">Descontos</a></li>
    <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
    <li class="active"><a href="/admin/products/descontos/vincular">Vincular Produtos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Desconto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/products/descontos/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="duracao_inicio">Início</label>
              <input type="date" class="form-control" id="duracao_inicio" name="duracao_inicio">
              <label for="duracao_fim">Final</label>
              <input type="date" class="form-control" id="duracao_fim" name="duracao_fim">
              <input type="number" step="10.00" placeholder="Digite um percentual de desconto"/>
            </div>
            
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->