<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/header_top_bar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Invoice</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Order</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Invoice</li>
        </ol>
        <div class="clearfix"></div>
    </div>

<div class="page-content">

	<div id="invoice-page" class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="invoice-title"><h2>Invoice</h2>

                                    <p class="mbn text-left">Invoice# <?php echo $nomorInv ?></p>

                                    <p class="text-left">April 22, 2014</p></div>
                                <div class="pull-left"><h2 class="text-green logo">Sapro</h2>
                                    <address class="mbn">Gedung Manggala Wanabhakti<br>Jalan Gatot Subroto, Senayan, Jakarta Pusat<br><abbr title="Phone">P:</abbr>(021) 150-023<br><br>produk@perhutani.coid</address>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <address><strong>Billed To:</strong><br>John Smith<br>Incorporesano Ltd.<br>(123) 456-7890</address>
                                    </div>
                                    <div class="col-md-3">
                                        <address><strong>Shipped To:</strong><br>John Doe<br>78183 Sweards Bluff Ave<br>(123) 456-7890</address>
                                    </div>
                                    <div class="col-md-3">
                                        <address><strong>Due Date:</strong><br>21 March 2014</address>
                                    </div>
                                    <div class="col-md-3">
                                        <address><strong>Due Balance:</strong><br>

                                            <h2 class="text-green mtn"><strong><?php echo $tiket->ot_total_harga ?></strong></h2></address>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="block-heading">Order summary</h4>

                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <td><strong>Barang</strong></td>
                                            <td class="text-center"><strong>Harga</strong></td>
                                            <td class="text-center"><strong>Jumlah Barang</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($order->result() as $row){ ?>

                                        <tr>
                                        	<td><?php echo $row->pb_nama ?></td>
                                        	<td><?php echo $row->op_harga ?></td>
                                        	<td><?php echo $row->op_jumlah_barang ?></td>
                                        	<td><?php echo $row->op_jumlah_harga ?></td>
                                        </tr>

                                       	<?php } ?>
                                        <!--tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">$670.99</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Ongkos Kirim</strong></td>
                                            <td class="no-line text-right">$15</td>
                                        </tr-->
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right"><?php echo $tiket->ot_total_harga ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="mbm">
                                <p>Thank you for your business. Please remit the total amount due within 30 days.</p></div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <a href="#" class="btn btn-success mrm"><i class="fa fa-print"></i>&nbsp;
                            Print
                        </a>
                        <a href="<?php echo site_url('order/produk/konfirmasiPembayaran') ?>" class="btn btn-white"><i class="fa fa-money"></i>&nbsp;
                            Konfirmasi Pembayaran
                        </a>
                    </div>
                </div>
</div>

<?php $this->load->view('templates/footer') ?>
</body>
</html>