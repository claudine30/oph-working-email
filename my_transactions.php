<script src='https://www.paypalobjects.com/api/checkout.js'></script>
<div class='container py-4'>
    <div class='card card-outline card-primary'>
        <div class='card-header'>
            <h3 class='card-title'>List of My Transaction</h3>
            <div class='card-tools'>
                <a href='javascript:void(0)' id='create_new' class='btn btn-flat btn-primary'><span class='fas fa-plus'></span>  New Payment</a>
            </div>
        </div>
        <div class='card-body'>
            <div class='container-fluid'>
            <div class='container-fluid'>
                <table class='table table-bordered table-stripped'>
                    <colgroup>
                        <col width='5%'>
                        <col width='15%'>
                        <col width='20%'>
                        <col width='35%'>
                        <col width='10%'>
                        <col width='10%'>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Transaction Code</th>
                            <th>Information</th>
                            <th>Paid Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $qry = $conn->query("SELECT t.* from `transaction_list` t where t.user_id = '{$_settings->userdata('id')}' order by unix_timestamp(t.`date_created`) desc ");
                        while($row = $qry->fetch_assoc()):
                        ?>
                            <tr>
                                <td class='text-center'><?php echo $i++; ?></td>
                                <td><?php echo date('Y-m-d H:i',strtotime($row['date_created'])) ?></td>
                                <td><?php echo $row['tracking_code'] ?></td>
                                <td>
                                    <dl class='lh-1'>
                                        <dt class='text-info'>Payment for:</dt>
                                        <dd class='pl-3'><?php echo $row['payment_for'] ?></dd>
                                        <dt class='text-info'>School Year & Sem:</dt>
                                        <dd class='pl-3'><?php echo $row['school_year'] ?></dd>
                                        <dd class='pl-3'><?php echo $row['semester'] ?></dd>
                                    </dl>
                                </td>
                                <td class='text-right'><?php echo number_format($row['amount_to_pay'],2) ?></td>
                                <td align='center'>
                                    <button type='button' class='btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon' data-toggle='dropdown'>
                                            Action
                                        <span class='sr-only'>Toggle Dropdown</span>
                                    </button>
                                    <div class='dropdown-menu' role='menu'>
                                        <a class='dropdown-item view_details' href='javascript:void(0)' data-id='<?php echo $row['id'] ?>'><span class='fa fa-eye text-light'></span> View</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$('#create_new').click(function(){
			uni_modal('New Payment','manage_payment.php','mid-large')
		})
        $('.view_details').click(function(){
			uni_modal('Payment Details','view_payment.php?id='+$(this).attr('data-id'),'mid-large')
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_transaction($id){
		start_loader();
		$.ajax({
			url:_base_url_+'classes/Master.php?f=delete_transaction',
			method:'POST',
			data:{id: $id},
			dataType:'json',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast('An error occured.','error');
					end_loader();
				}
			}
		})
	}
</script>