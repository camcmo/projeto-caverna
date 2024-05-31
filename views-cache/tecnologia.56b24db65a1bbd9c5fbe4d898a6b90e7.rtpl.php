<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <link rel="stylesheet" href="/res/admin/css/category.css">
    <link rel="stylesheet" href="/res/admin/css/category-edit.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tecnologia
      </h1>
     
    </section>
  
    <!-- Main content -->
    <section class="content">
  
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
  
           
  
            <div class="box-body no-padding category-create">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <!-- <th>Nome da Categoria</th> -->
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($tecnologia) && ( is_array($tecnologia) || $tecnologia instanceof Traversable ) && sizeof($tecnologia) ) foreach( $tecnologia as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <!-- <td><?php echo htmlspecialchars( $value1["idref"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> -->
                    <td><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desref"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    
                  </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->