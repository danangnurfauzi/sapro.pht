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

        <?php if(!$this->cart->contents()):
            //echo 'You don\'t have any items yet.';
        else:
        ?>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">DAFTAR BELANJA</div>
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
                        <form action="<?php echo site_url('order/produk/updateCart') ?>" method="post">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Order</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->cart->contents() as $items){ ?>
                                    <tr>
                                        <td><?php echo $items['name'] ?></td>
                                        <td><?php echo $items['price'] ?></td>
                                        <td><input type="text" name="qty[]" value="<?php echo $items['qty'] ?>" /></td>
                                        <td><?php echo $items['price'] * $items['qty'] ?></td>
                                        <td>
                                            <a href="<?php echo site_url('order/produk/hapusCartItem/'.$items['rowid']) ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                        <input type="hidden" name="rowid[]" value="<?php echo $items['rowid'] ?>">
                                        <input type="hidden" name="price[]" value="<?php echo $items['price'] ?>">
                                        <input type="hidden" name="id[]" value="<?php echo $items['id'] ?>">
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="form-actions text-right pal">
                                <input name="updateList" value="PERBAHARUI KERANJANG" type="submit" class="btn btn-warning"/>
                                <a href="<?php echo site_url('order/produk/emptyCart') ?>"><button type="button" class="btn btn-danger btn-square">KOSONGKAN KERANJANG</button></a>
                                <input name="updateList" value="CHECKOUT" type="submit" class="btn btn-success"/>
                            </div>
                        </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <?php endif; ?>

        <div class="row">

            <?php if($produk->num_rows() > 0){

                    foreach($produk->result() as $row){
            ?>

            <div class="col-lg-3">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption"><?php echo $row->pb_nama ?></div>
                    </div>

                    <div class="portlet-body">
                        <form method="post" action="<?php echo site_url('order/produk/addCart') ?>">
                        <img src="<?php echo base_url() ?>assets/images/produk/Picture1.png" class="img-responsive">

                        <h3><p>Rp <?php echo number_format($row->pb_harga); ?></p></h3>
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="id" value="<?php echo $row->pb_id ?>">
                        <input type="hidden" name="price" value="<?php echo $row->pb_harga ?>">
                        <input type="hidden" name="name" value="<?php echo $row->pb_nama ?>">
                        <input type="submit" name="submit" value="TAMBAH KE KERANJANG BELANJA" class="btn btn-orange btn-square">
                        </form>
                    </div> 

                </div>
            </div>

            <?php } } ?>

        </div>

    </div>

<?php $this->load->view('templates/footer') ?>
</body>
</html>