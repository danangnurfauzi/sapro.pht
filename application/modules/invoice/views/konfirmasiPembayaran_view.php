<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/header_top_bar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Invoice</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Invoice</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Konfirmasi Pembayaran</li>
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
                        <div class="caption">Form Konfirmasi Pembayaran</div>
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
                        
                        <form action="<?php echo site_url('invoice/unpaid/postKonfirmasiPembayaran/'.$id) ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-body pal">
                                <div class="form-group"><label class="col-md-3 control-label">Nomor Invoice</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="checkInvoice" name="nomorInvoice" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Nominal</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input readonly="readonly" id="nominal" name="nominal" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Tanggal Bayar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="tanggal" name="tanggalBayar" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Bank Tujuan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="inputPassword" name="bankTujuan" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Dari Bank</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="inputPassword" name="dariBank" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Nama Rekening</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="inputPassword" name="namaRekening" placeholder="" class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-3 control-label">Bukti Bayar</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><input id="inputIncludeFile" placeholder="Inlcude some file" type="file" name="buktiBayar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions pal">
                                <div class="form-group mbn">
                                    <div class="col-md-offset-3 col-md-6">
                                        <a href="<?php echo site_url('invoice/unpaid') ?>" class="btn btn-default">Kembali</a>&nbsp;&nbsp;
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>	
    			</div>
    		</div>
    	</div>
    </div>

<?php $this->load->view('templates/footer') ?>

<script type="text/javascript">
    $('#tanggal').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>

</body>
</html>