"use strict";
var mzazi='';
$(document).on('click','.finishBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $('.progress-process').find('.'+class_name +' .bullet').addClass('finished')
});

$(document).on('click','.nextBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $('.progress-process').find('.'+class_name).addClass('finished');
    $(this).parent().parent().parent().hide();
    $(this).parents('.row').next().show();
});

$(document).on('click','.prevBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $(this).parent().parent().parent().hide();
    $(this).parents('.row').prev().show();
    $('.progress-process').find('.'+class_name).removeClass('finished');
});


/*New user form*/
$(document).on('submit','.newadmin',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  el.parents('.modal-body').find('.column').removeClass('error');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
                p_name=$("input[name='"+prefix+"']").parent().parent().parent().parent().attr('class').split(' ')[1];
                $('.progress-process').find('.'+p_name).addClass('error');
            });
            if(typeof(callback.errors.ref_no[0]) !==undefined && callback.errors.ref_no[0].length >0)
            {
              $('.small-model').modal({show:true});
              $('.small-model').find('.modal-title').text('Warning');
              $('.small-model').find('.modal-body').html('<div class="text-warning text-center"><i class="fa fa-exclamation-circle"></i> user records found..</div>');
            }
        }
        else
        {
            el[0].reset();
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});

/*refreshPage*/
function refreshPage(wrapper,url, target)
{
    $.ajax(
    {
      url:url,
      context:this,
      dataType:'html',
      success:function(callback)
      {
        $(document).find('.'+target).html($(callback).find('.'+target).html());
        $('#table-1').DataTable().draw();
        mzazi='';
      },
      error:function(err)
      {
        console.log(err.status+':'+err.statusText);
      }
    });
}


/*New user form*/
$(document).on('submit','.loanForm',function()
{  
  var el=$(this),
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("textarea[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
            });
        }
        else
        {
            el[0].reset();
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});


/*New borrower form*/
$(document).on('submit','.newborrower',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  el.parents('.modal-body').find('.column').removeClass('error');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
            el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
            p_name=$("input[name='"+prefix+"']").parent().parent().parent().parent().attr('class').split(' ')[1];
            $('.progress-process').find('.'+p_name).addClass('error');
            });
        }
        else
        {
            el[0].reset();
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});

/*Plan form*/
$(document).on('submit','.planForm',function()
{  
  var el=$(this),
  btn_text=el.find('button').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
            });
        }
        else
        {
            el[0].reset();
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});

$(document).on('click','.get-data',function(e)
{
  e.preventDefault();
  var el=$(this),form_data=new FormData();
  form_data.append('_token',$('meta[name="csrf-token"]').attr('content'));
  $.ajax(
    {
      url:el.attr('href'),
      method:'post',
      dataType:'json',
      data:form_data,
      processData:false,
      cache:false,
      contentType:false,
      beforeSend:function()
      {
        $('#editModal').find('.is-invalid').removeClass('is-invalid');
        $('#editModal').find('.column').removeClass('error');
        el.find('i').replaceWith('<i class="spinner-border spinner-border-sm" role="status"></i>');
      },
      success:function(callback)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        if(jQuery.type(callback.borrowers) !==undefined)
        {
            $.each(callback.borrowers[0],function(key,value)
            {
              $('#editModal').find('input[name="'+key+'"],textarea[name="'+key+'"]').val(value);
            });
        }
        $(document).find('#editModal').modal({show:true});
        mzazi=el;
      },
      error(err)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        console.log(err.status+':'+err.statusText);
      }
    });
});

$(document).on('click','.get-pending',function(e)
{
  e.preventDefault();
  var el=$(this),form_data=new FormData();
  form_data.append('_token',$('meta[name="csrf-token"]').attr('content'));
  $.ajax(
    {
      url:el.attr('href'),
      method:'post',
      dataType:'json',
      data:form_data,
      processData:false,
      cache:false,
      contentType:false,
      beforeSend:function()
      {
        $('#editModalTwo').find('.is-invalid').removeClass('is-invalid');
        $('#editModalTwo').find('.column').removeClass('error');
        el.find('i').replaceWith('<i class="spinner-border spinner-border-sm" role="status"></i>');
      },
      success:function(callback)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        if(jQuery.type(callback.borrowers) !==undefined)
        {
            $.each(callback.borrowers[0],function(key,value)
            {
              $('#editModalTwo').find('input[name="'+key+'"],textarea[name="'+key+'"]').val(value);
            });
        }
        $(document).find('#editModalTwo').modal({show:true});
        mzazi=el;
      },
      error(err)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        console.log(err.status+':'+err.statusText);
      }
    });
});

function calclate(el,amount,plan)
{
  console.log(plan);
  var vals=plan.split(" "),
  output='',
  months=vals[0],
  interest=parseInt(vals[2].replace(/[^0-9.]/g,"")),
  penalty=parseInt(vals[4].replace(/[^0-9.]/g,"")),
  total_amount=parseInt(amount)+parseInt((interest/100)*amount),
  monthly_payment=(interest/100)*parseInt(amount),
  penalty_payment=monthly_payment*(penalty/100);
  output='<table class="table table-hover table-striped">\
             <tr>\
                 <th>Total payable amount</th>\
                 <th>Monthly payable amount</th>\
                 <th>Penalty</th>\
             </tr>\
             <tbody>\
             <tr>\
                 <td id="total_amount">'+total_amount.toLocaleString()+'</td>\
                 <td id="monthly_payment">'+monthly_payment.toFixed(2)+'</td>\
                 <td id="penalty_payment">'+penalty_payment.toFixed(2)+'</td>\
             </tr>\
             </tbody>\
         </table>';
  el.parents('form').find('.calcresults').val(interest);
  el.parents('form').find('.total_amount').val(total_amount.toLocaleString())
  el.parents('form').find('.monthly_payment').val(monthly_payment.toFixed(2))
  el.parents('form').find('.penalty_payment').val(penalty_payment.toFixed(2))
  el.parents('form').find('.calc-results').show().html(output);
}
$(document).on('click','.calcBtn',function()
{
  var el=$(this),
  plan=el.parents('form').find('.id_plan').val(),
  amount=el.parents('form').find('.loanamt').val();
  calclate(el,amount,plan);
});

$(document).on('keyup','.loanamt',function()
{
  var el=$(this);
  if(el.val() > 0)
  {
    var plan=el.parents('form').find('.id_plan').val(),
    amount=el.parents('form').find('.loanamt').val();
    calclate(el,amount,plan);
  }
});

/*New user form*/
$(document).on('submit','.newapplication',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  el.parents('.modal-body').find('.column').removeClass('error');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"'],textarea[name='"+prefix+"'],select[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
                p_name=$("select[name='"+prefix+"']").parent().parent().parent().attr('class').split(' ')[1];
                $('.progress-process').find('.'+p_name).addClass('error');
            });
            if(callback.errors.calcresults.length)
            {
                $('.small-model').modal({show:true});
                $('.small-model').find('.modal-title').text('Warning');
                $('.small-model').find('.modal-body').html('<div class="alert alert-warning text-center"><i class="fa fa-exclamation-circle"></i> Please calculate the next payment details of the borrower.</div>');
            }
        }
        else
        {
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');

        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});


$(document).on('click','.del-data',function(e)
{
  e.preventDefault();
  if (confirm('Are you sure ?'))
  {
    var el=$(this);
    $.ajax(
    {
      url:el.attr('href'),
      dataType:'json',
      beforeSend:function()
      {
        el.find('i').replaceWith('<i class="spinner-border spinner-border-sm" role="status"></i>');
      },
      success:function(callback)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        var table=$('#table-1').DataTable();
        table.row(el.closest('tr')).remove().draw();
        $('.small-model').modal({show:true});
        $('.small-model').find('.modal-title').text('Success');
        $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data deleted successfully.</div>');
        
      },
      error(err)
      {
        el.find('i').replaceWith('<i class="fa fa-edit"></i>');
        console.log(err.status+':'+err.statusText);
      }
    });
  }
});

/*profile form*/
$(document).on('submit','.profileform',function()
{  
  var el=$(this),
  btn_text=el.find('button span:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text('saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
            });
        }
        else
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});
  
$(document).on('click','.get-btn',function()
{
  var el=$(this),
  ref_no=$('.payee').val(),
  btn_text=el.text(),
  url='/management/loans/payments/fetch/'+ref_no;
  el.parent().parent().find('select').removeClass('is-invalid');
  $('.user-name').val($('.payee').text());
  if(ref_no !=='')
  {
    $.ajax(
    {
      url:url,
      dataType:'json',
      beforeSend:function()
      {
        el.attr('disabled',true).text('...');
      },
      success:function(callback)
      {
        el.attr('disabled',false).text(btn_text);
        $.each(callback.payee[0],function(key,value)
        {
          el.parents('form').find("input[name='"+key+"']").val(value);
        });
      },
      error:function(err)
      {
        el.attr('disabled',false).text(btn_text);
        console.log(err.status+':'+err.statusText);
      }
    });
  }
  else
  {
    el.parent().parent().find('select').addClass('is-invalid');
  }
});

/*New user form*/
$(document).on('submit','.settings',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  el.parents('.modal-body').find('.column').removeClass('error');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text(' saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
                p_name=$("input[name='"+prefix+"']").parent().parent().parent().attr('class').split(' ')[1];
                $('.progress-process').find('.'+p_name).addClass('error');
            });
            if(callback.errors.calcresults !==undefined && callback.errors.calcresults.length)
            {
                $('.small-model').modal({show:true});
                $('.small-model').find('.modal-title').text('Warning');
                $('.small-model').find('.modal-body').html('<div class="alert alert-warning text-center"><i class="fa fa-exclamation-circle"></i> Please calculate the next payment details of the borrower.</div>');
            }
            if(callback.errors.settings_error !==undefined && callback.errors.settings_error.length > 0)
            {
                $('.small-model').modal({show:true});
                $('.small-model').find('.modal-title').text('Warning');
                $('.small-model').find('.modal-body').html('<div class="alert alert-warning text-center"><i class="fa fa-exclamation-circle"></i> Admin settings already exists.</div>');
            }
        }
        else
        {
            refreshPage(el,el.data('host'),'table-results');
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> data saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});


/*profile form*/
$(document).on('submit','.pdfForm',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button span:last').text(),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      $(document).find('.feedback').html('');
      el.find('button span:first').html('<i class="spinner-border spinner-border-sm" role="status"></i>');
      el.find('button,input').attr('disabled',true);
      el.find('button span:last').text(' saving...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
                p_name=$("input[name='"+prefix+"']").parent().parent().parent().attr('class').split(' ')[1];

            });
        }
        else
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> file saved successfully.</div>');
        }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button,input').attr('disabled',false);
      el.find('button span:last').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});

/*icon-field*/
$(document).on('change','input[type=file]',function()
{
    $(this).removeClass('is-invalid').addClass('is-valid').parent().find('.feedback').removeClass('invalid-feedback').addClass('valid-feedback').html('Looks ok').parent().find('.custom-file-label').text(this.files[0].name);
});

$(document).on('mouseenter','.user-profile-pic',function()
{
  $(this).find('.toppers').show();
});
$(document).on('mouseleave','.user-profile-pic',function()
{
  $(this).find('.toppers').hide();
});

$(document).on('click','.user-profile-pic',function()
{
  $('.profilepicker').click();
});

$(document).on('change','.profilepicker',function()
{
    var el=$(this),
    file=el.get(0).files[0],
    ext=el.val().substring(el.val().lastIndexOf('.')+1).toLowerCase();
    if(file && (ext=='jpg' || ext=='png' || ext=='jpeg' || ext=='gif'))
    {
        var reader=new FileReader();
        reader.onload=function(e)
        {
            $('.author-box-center').find('img').attr('src',reader.result);
            $('.profilebtner').show();
        }
        reader.readAsDataURL(file);
    }
    else
    {
      $('.small-model').modal({show:true});
      $('.small-model').find('.modal-title').text('Warning');
      $('.small-model').find('.modal-body').html('<div class="text-warning text-center"><i class="fa fa-exclamation-triangle"></i> Invalid image format</div>');
    }
});


/*New user form*/
$(document).on('submit','.profilepicform',function()
{  
  var el=$(this),
  p_name='',
  btn_text=el.find('button').text(),
  form_data=new FormData(this);
  $.ajax(
  {
    url:el.attr('action'),
    method:el.attr('method'),
    dataType:'json',
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      el.find('button,input').attr('disabled',true);
      el.find('button').text('uploading...');
    },
    xhr:function()
    {
      const xhr=new window.XMLHttpRequest();
      xhr.upload.addEventListener('progress',function(e)
      {
         if(e.lengthComputable)
         {
            const percent=Math.round((e.loaded/e.total)*100);
            el.find('button').text('uploading... '+percent+'%');
         }
      });
      return xhr
    },
    success:function(callback)
    {
        el.find('button,input').attr('disabled',false);
        el.find('button').text(btn_text);
        if(callback.status === 1)
        {
            console.log(callback);
            el[0].reset();
            $('.profilebtner').hide();
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> Profie saved successfully.</div>');
            if(callback.profile !==undefined && callback.profile.length)
            {
              $('.user_navbar_image').attr('src',callback.profile);
            }
        }
    },
    error:function(err)
    {
      el.find('button,input').attr('disabled',false);
      el.find('button').text(btn_text);
      console.log(err.status+':'+err.statusText);
    }
  });
  return false;
});