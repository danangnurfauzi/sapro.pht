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
                        <div class="caption">Barang Order</div>
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
                        <form action="<?php echo site_url('order/produk/checkout') ?>" method="post">
                    	<table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Order</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $jumlahHarga = 0;
                                    $jumlahPoint = 0;
                                    $totalHarga = 0;
                                    $totalPoint = 0;

                                    foreach($barang['jumlah'] as $key => $value){

                                        if( ( $value != '' ) || ( $value != 0 ) ){

                                            $query = $this->db->query('SELECT * FROM produk_barang WHERE pb_id = '.$barang['id'][$key])->row();

                                            $jumlahHarga = $query->pb_harga * $value;
                                            $jumlahPoint = $query->pb_point * $value;
                                            $totalHarga = $totalHarga + $jumlahHarga;
                                            $totalPoint = $totalPoint + $jumlahPoint;
                                ?>

                                <tr>
                                    <td><?php echo $query->pb_nama ?></td><input type="hidden" name="barangId[]" value="<?php echo $barang['id'][$key] ?>" />
                                    <td><?php echo $query->pb_harga ?></td><input type="hidden" name="harga[]" value="<?php echo $query->pb_harga ?>" /><input type="hidden" name="point[]" value="<?php echo $query->pb_point ?>">
                                    <td><?php echo $value ?></td><input type="hidden" name="order[]" value="<?php echo $value ?>">
                                    <td><?php echo $jumlahHarga ?></td><input type="hidden" name="jumlah[]" value="<?php echo $jumlahHarga ?>" />
                                </tr>

                                <?php } } ?>
                                <tr>
                                    <td colspan="3">Jumlah Total</td>
                                    <td><?php echo $totalHarga ?></td>
                                    <input type="hidden" name="totalHarga" value="<?php echo $totalHarga ?>" />
                                    <input type="hidden" name="totalPoint" value="<?php echo $totalPoint ?>">
                                </tr>
                            </tbody>
                        </table>

                        <hr/>

                        <div class="form-group"><textarea rows="5" placeholder="Alamat Pengiriman" class="form-control" name="alamat"></textarea></div>

                        <div class="form-actions text-right pal">
                            <input name="submit" value="Checkout" type="submit" class="btn btn-primary"/>
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