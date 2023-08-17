<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        table th {
            border: 1px solid #000;
            padding: 3px;
            font-weight: bold;
            text-align: center;
        }

        table td {
            border: 1px solid #000;
            padding: 3px;
            vertical-align: top;
        }
    </style>
</head><body>
    <h1 style="text-align: center;font-size: 30px;font-weight: bold"> Item List Out</h1>
    <table class="table table-bordered table-striped" id="example1">
        <tr>
            <th>#</th>
            <th>ITEM NAME</th>
            <th>CUSTOMER</th>
            <th>TOTAL</th>
            <th>TRANSACTION DATE</th>

        </tr>
        <?php 
        $i = 1;
        $where_transaksi['status_pergerakan'] 	= 2;
        if ($jml_data > 0){
        foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', 1000, '', $where_transaksi, '') as $row){ ?>
        <tr>
            <td align="center">
                <?php echo $i;?>
        </td>
        <td>
            <?php 
            $where_item['id_item'] 	= $row->id_item;
            foreach ($this->ADM->grid_all_item('', 'id_item', 'DESC', 100, '', $where_item, '') as $row2){ ?>
            <?php echo $row2->nama_item;?>
            <?php } ?>
        </td>

        <td>
            <?php 
            $where_customer['id_customer'] 	= $row->id_customer;
            foreach ($this->ADM->grid_all_customer('', 'id_customer', 'DESC', 100, '', $where_customer, '') as $row3){ ?>
            <?php echo $row3->nama_customer;?>
            <?php } ?>
        </td>
        <td>
            <?php echo $row->jumlah;?>
        </td>
        <td>
            <?php echo $row->tanggal_transaksi;?>
        </td>
        </tr>
        <?php 
        $i++; 
        } 
        } else { 
        ?>
        <tr>
            <td colspan="5">No data yet!</td>
        </tr>
        <?php } ?>
        <tr>
            <th colspan="5" align="left">TOTAL :
                <?php echo $jml_data;?>
            </th>
        </tr>
        <tr>
            <th colspan="5" align="left">
                <div class="right" style="text-align:right !important;bottom: 0 !important;">
                    <?php 
                    $date	= date("Y-m-d H:i:s");
                    ?>
                    <?php echo dateIndo($date);?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo $admin->admin_nama; ?>
                </div>
            </th>
        </tr>
    </table>

</body></html>