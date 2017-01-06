<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/header_top_bar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Order</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Order</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Barang</li>
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
                        <div class="caption">Barang</div>
                        <div class="actions">
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
                        <form action="<?php echo site_url('order/produk/booking') ?>" method="post">
                    	<table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Point</th>
                                    <th>Stock</th>
                                    <th>Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($produk->num_rows() > 0){

                                		foreach($produk->result() as $row){
                                ?>

                                <tr>
                                	<td><?php echo $row->pb_id ?></td>
                                	<td><?php echo $row->pk_nama ?></td>
                                	<td><?php echo $row->pb_nama ?></td>
                                    <td><?php echo $row->pb_keterangan ?></td>
                                    <td><?php echo $row->pb_harga ?></td>
                                    <td><?php echo $row->pb_point ?></td>
                                    <td><?php echo $row->pb_stock ?></td>
                                	<td>
                                		<input name="jumlah[]" placeholder="Jumlah Barang"/>
                                        <input type="hidden" name="id[]" value="<?php echo $row->pb_id ?>" />
                                	</td>
                                </tr>

                                <?php } } ?>
                            </tbody>
                        </table>
                        <div class="form-actions text-right pal">
                            <input name="submit" value="Order" type="submit" class="btn btn-primary"/>
                        </div>
                        </form>
                    </div>	
    			</div>
    		</div>
    	</div>
    </div>


<?php $this->load->view('templates/footer') ?>
</body>
</html>