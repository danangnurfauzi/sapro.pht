<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/header_top_bar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Produk</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo site_url('produk/kategori') ?>">Produk</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active"></i>&nbsp;<a href="<?php echo site_url('produk/kategori') ?>">Kategori</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="">Add</li>
        </ol>
        <div class="clearfix"></div>
    </div>

    <div class="page-content">
    	<div class="row">
    		<div class="col-lg-12">
    			<div class="portlet box">
    				<div class="portlet-header">
                        <div class="caption">Produk Kategori</div>
                        <div class="actions"><!--a href="<?php echo site_url('produk/kategori/edit/') ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;
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

                        <div class="portlet-body pan">
                        	
                            <form action="<?php echo site_url('produk/kategori/edit/'.$edit->pk_id) ?>" method="post">
                                <div class="form-body pal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input value="<?php echo $edit->pk_nama ?>" id="inputFirstName" placeholder="Nama Kategori" name="nama" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea rows="5" name="keterangan" placeholder="Keterangan" class="form-control"><?php echo $edit->pk_keterangan ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-actions text-left pal">
                                    <input name="submit" value="Edit" type="submit" class="btn btn-primary"/>
                                </div>
                            </form>
                            
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>


<?php $this->load->view('templates/footer') ?>
</body>
</html>