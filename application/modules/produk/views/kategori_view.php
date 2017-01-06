<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/header_top_bar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Produk</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Produk</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Kategori</li>
        </ol>
        <div class="clearfix"></div>
    </div>

    <div class="page-content">

    	<?php $err = $this->session->flashdata('error'); if(isset($err)){ ?>
        <div class="alert alert-danger"><strong><?php echo $err ?></strong></div>
        <?php } ?>

        <?php $suc = $this->session->flashdata('success'); if(isset($suc)){ ?>
        <div class="alert alert-success"><strong><?php echo $suc ?></strong></div>
        <?php } ?>

	    <div class="row">
	    	<div class="col-lg-12">
	    		<div class="portlet box">
	    			<div class="portlet-header">
	    				<div class="caption">Tambah Kategori</div>
	    			</div>
	    			<div class="portlet-body">
	    				<form action="<?php echo site_url('produk/kategori/insert') ?>" method="post">
	    					<div class="form-body pal">
			    				<div class="row">
		                            <div class="col-md-12">
		                                <div class="form-group">
		                                    <input id="inputFirstName" placeholder="Nama Kategori" name="nama" class="form-control" type="text">
		                                </div>
		                            </div>
		                            <div class="col-md-12">
		                                <div class="form-group">
		                                    <textarea rows="5" name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
		                                </div>
		                            </div>

		                        </div>
	                        </div>
	                        <div class="form-actions text-left pal">
                                <input name="submit" value="Add" type="submit" class="btn btn-primary"/>
                            </div>
	                    </form>
	    			</div>
	    		</div>
	    	</div>
	    </div>

    	<div class="row">
    		<div class="col-lg-12">
    			<div class="portlet box">
    				<div class="portlet-header">
                        <div class="caption">Produk Kategori</div>
                        <div class="actions"><!--a href="<?php echo site_url('produk/kategori/__add') ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;
                            Tambah Kategori</a-->&nbsp;
                            <!--div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-warning btn-xs dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;
                                Tools</a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Export to Excel</a></li>
                                    <li><a href="#">Export to CSV</a></li>
                                    <li><a href="#">Export to XML</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Print Invoices</a></li>
                                </ul>
                            </div-->
                        </div>
                    </div>

                    <div class="portlet-body">

                    	<table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($kategori->num_rows() > 0){

                                		foreach($kategori->result() as $row){
                                ?>

                                <tr>
                                	<td><?php echo $row->pk_id ?></td>
                                	<td><?php echo $row->pk_nama ?></td>
                                	<td><?php echo $row->pk_keterangan ?></td>
                                	<td>
                                		<a href="<?php echo site_url('produk/kategori/pageEdit/'.$row->pk_id) ?>" class="btn btn-green btn-xs"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                		<a href="<?php echo site_url('produk/kategori/delete/'.$row->pk_id) ?>" class="btn btn-red btn-xs"><i class="fa fa-edit"></i>&nbsp;Hapus</a>
                                	</td>
                                </tr>

                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>	
    			</div>
    		</div>
    	</div>
    </div>


<?php $this->load->view('templates/footer') ?>
</body>
</html>