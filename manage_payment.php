<?php require_once('./config.php'); ?>
<?php
$query = $conn->query("SELECT * FROM users where id = '{$_settings->userdata('id')}'");
if($query->num_rows > 0){
    foreach($query->fetch_array() as $k=> $v){
        $$k = $v;
    }
    /*$query_meta = $conn->query('SELECT * FROM `user_meta` where user_id = '{$id}'');
    while($row = $query_meta->fetch_assoc()){
        $meta[$row['meta_field']] = $row['meta_value'];
    }*/
}
?>

<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>

<div class='container-fluid'>
    <form action="" id='transaction_form'>
        <fieldset id='information'>
            <legend class='text-info'>Payment Information</legend>
            <div class='row'>
                <div class= col-md-6>
                    <div class='form-group'>
                        <label for='studID' class='control-label'>Student ID No.</label>
                        <input type='text' autofocus class='form-control form-control-border' id='studID' name='studID' value='<?php echo isset($studID) ? $studID : '' ?>' disabled>
                    </div>
                    <div class='form-group'>
                        <label for='studID' class='control-label'>Email</label>
                        <input type='text' autofocus class='form-control form-control-border' id='email' name='email' value='<?php echo isset($username) ? $username : '' ?>' disabled>
                    </div>
                    <div class='form-group'>
                        <label for='firstname' class='control-label'>First Name</label>
                        <input type='text' class='form-control form-control-border' id='firstname' name='firstname' value='<?php echo isset($firstname) ? $firstname : '' ?>' disabled>
                    </div>
                    <div class='form-group'>
                        <label for='lastname' class='control-label'>Last Name</label>
                        <input type='text' class='form-control form-control-border' id='lastname' name='lastname' value='<?php echo isset($lastname) ? $lastname : '' ?>' disabled>
                    </div>
                    <div class='form-group'>
                        <label for='school_year' class='control-label'>School Year</label>
                        <select name='school_year' id='school_year' class='form-control form-control-border' required/>
                            <option value='2021-2022'> 2021-2022 </option>
                            <option value='2022-2023'> 2022-2023 </option>
                            <option value='2023-2024'> 2023-2024 </option>
                            <option value='2024-2025'> 2024-2025 </option>
                            <option value='2025-2026'> 2025-2026 </option>
                        </select>
                    </div>
                </div>
                
                <div class= col-md-6>
                    <div class='form-group'>
                        <label for='semester' class='control-label'>Semester</label>
                        <select name='semester' id='semester' class='form-control form-control-border' required/>
                            <option value='1st Semester'> 1st Semester </option>
                            <option value='2nd Semester'> 2nd Semester </option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='payment_for' class='control-label'>Payment For</label>
                        <select name='payment_for' id='payment_for' class='form-control form-control-border' required/>
                            <option value='Enrollment Fee DP'> Enrollment Fee DP </option>
                            <option value='Tuition Fee BAL'> Tuition Fee BAL </option>
                            <option value='Miscellanous Fee'> Miscellanous Fee </option>
                            <option value='Graduation Fee'> Graduation Fee </option>
                            <option value='Colloqium Fee'> Colloqium Fee </option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='amount_to_pay' class='control-label'>Amount to Pay</label>
                        <input name='amount_to_pay' type='number' id='amount_to_pay' class='form-control form-control-border text-right' required/>
                    </div>
                </div>
            </div>
        </fieldset>

    <!-- REVIEW PAYMENT DETAILS -->

        <fieldset id='pay-field' class='d-none'>
        <legend class='text-info'>Review Payment Details</legend>
            <div class='row'>
                <div class= col-md-6>
                    <dl>
                        <dt class='control-label'>Student ID No.</dt>
                        <dd class='pl-3'><?php echo isset($studID) ? $studID : '' ?></dd>
                        
                        <dt class='control-label'>First Name</dt>
                        <dd class='pl-3'><?php echo isset($firstname) ? $firstname : '' ?> </dd>

                        <dt class='control-label'>Last Name</dt>
                        <dd class='pl-3'><?php echo isset($lastname) ? $lastname : '' ?></dd>
                    </dl>
                </div>

                 <div class= 'col-md-6'>
                        <dt class='control-label'>School Year</dt>
                        <input type='text' autofocus class='form-control form-control-border' id='school_year_display' name='school_year_display' disabled>
                        <dt class='control-label'>Semester</dt>
                        <input type='text' autofocus class='form-control form-control-border' id='semester_display' name='semester_display' disabled>
                        <dt class='control-label'>Payment For</dt>
                        <input type='text' autofocus class='form-control form-control-border' id='payment_for_display' name='payment_for_display' disabled>
                </div>
            </div>
            
            <h1 class='text-center text-info'>Amount to Pay</h1> 
            <!--<h1 class='text-center text-info' id='pay_amount'>0.00</h1>-->
            <input type='text' autofocus class='form-control form-control-border' id='pay_amount' name='pay_amount' disabled>
                
            <hr class='border-light'>
            <div class='form-group'>
                <dl class='row'>
                <!-- <dt class='text-info col-4'>Amount to Pay</dt>-->
                    <dd class='col-8 text-right' id='pay_amount'></dd>
                    <!-- <dt class='text-info col-4'>Service Fee</dt>
                    <dd class='col-8 text-right'id='fee'></dd> 
                    <input type='hidden' name='fee' value='0'>-->
                    <input type='hidden' name='payment_code' value=''>
                </dl>
            </div>
            
            <div class='form-group text-center'>
                <span id='paypal-button' ></span>
            </div>
        </fieldset>

        <div class='form-group'>
            <div class='col-12'>
                <div class='d-flex justify-content-end align-items-center'>
                    <button class='btn btn-primary btn-flat mr-2 d-none' type='button' id='back'>Back</button>
                    <button class='btn btn-primary btn-flat mr-2' type='button' id='next'>Next</button>
                    <button class='btn btn-light btn-flat' type='button' id='cancel' data-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    paypal.Button.render({
    env: 'sandbox', // change for production if app is live,
 
        //app's client id's
	  client: {
        // for test only
        //clientId: 'sb-ufl47b15257911_api1.business.example.com',
        sandbox:    'AUbDDAbymAECCwyDY4idC5caNPFe09Y1sGDcPibJwYg2781VGpSqWPfLNY7ZZw-W_8HBbrIIsvrqCqgA',
        // for live only
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },
 
    commit: true, // Show a 'Pay Now' button
 
    style: {
      layout:  'vertical',
      color:   'blue',
      shape:   'rect',
      label:   'paypal'
    },
 
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: $('fieldset#pay-field').find('[name="pay_amount"]').val(), 
                        	currency: 'PHP' 
                        }
                    }
                ]
            }
        });
    },
 
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
    		// //sweetalert for successful transaction
    		// swal('Thank you!', 'Paypal purchase successful.', 'success');
            //send email confirmation

        /*
        success : function(resp){
       // var form = $('#transaction_form').val();
       
        $.ajax({
        url : 'mail.php',
        type : 'POST',
        data: $('form').serialize(),
        success: function (data) {
			  $('#data').php(data);
        }
       */
        var email = $('#email').val();
        var firstname = $('#firstname').val();
        var studID = $('#studID').val();
        /*var = $('#school_year').val();
        var semester = $('#semester').val();
        var amount_to_pay = $('#amount_to_pay').val();
        var payment_for_display = $('#payment_for_display').val();*/
        var tracking_code = $('#payment_code').val();

        $.ajax({
        url : 'mail.php',
        type : 'POST',
        data: { email_value: email, firstname_value: firstname, studID_value: studID
        },
        error:err=>{
                console.log(err)
                alert_toast('An error occured in mail.php','error');
                end_loader();
            },
        success : function(resp){
        if(typeof resp =='object' && resp.status == 'success'){
            console.log('success email');
        }
        else{
            console.log('failed email'); 
        } 
     }
     
   });
        
           var tracking_code = data.paymentID;
           $('fieldset#pay-field').find('[name="payment_code"]').val(tracking_code)
           $('#transaction_form').submit();
        });
    },
    onError: (err) => {
    console.error('error from the onError callback', err);
    alert('Payment Error.')
  }
 
}, '#paypal-button');
$(function(){
    $('#uni_modal .select2').select2({
        placeholder:'Please Select Here',
        dropdownParent: $('#uni_modal')
    })
    $('#next').click(function(){
        var check = new Promise((resolve,reject)=>{
            $('fieldset#information').find('input,select').each(function(){
                if($(this).val() == ''){
                    alert_toast(' All fields are required.','warning')
                    reject();
                }
            })
            resolve()
        })
        check.then(function(){

            $('#next').addClass('d-none')
            $('#back').removeClass('d-none')
            $('fieldset#information').addClass('d-none')
            $('fieldset#pay-field').removeClass('d-none')
            $('#school_year_display').val(document.getElementById('school_year').value)
            $('#semester_display').val(document.getElementById('semester').value)
            $('#payment_for_display').val(document.getElementById('payment_for').value)
            $('#pay_amount').val(document.getElementById('amount_to_pay').value)
        })

    })
    $('#back').click(function(){
        $(this).addClass('d-none')
        $('#next').removeClass('d-none')
        $('fieldset#information').removeClass('d-none')
        $('fieldset#pay-field').addClass('d-none')
    })

    $('#transaction_form').submit(function(e){
        e.preventDefault();
        var _this = $(this)
        $('.err-msg').remove();
        start_loader();
        $.ajax({
            url:_base_url_+'classes/Master.php?f=save_transaction',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error:err=>{
                console.log(err)
                alert_toast('An error occured in save transaction','error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp =='object' && resp.status == 'success'){
                    location.reload();
                    //var url = '/mail.php';

                }else if(resp.status == 'failed' && !!resp.msg){
                    var el = $('<div>')
                        el.addClass('alert alert-danger err-msg').text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $('html, body,.modal').animate({ scrollTop: 0 }, 'fast');
                        end_loader()
                }else{
                    alert_toast('An error occured','error');
                    end_loader();
                    console.log(resp)
                }
            }
        })
    })
})
</script>