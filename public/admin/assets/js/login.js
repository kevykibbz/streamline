/*proloader*/
function load()
{
  document.querySelector('.placeholder').style.display="none";
  document.querySelector('.main-display').style.display="block";
}
const cookieContainer=document.querySelector('.cookie-container');
const cookieButton=document.querySelector('.cookieBtn');
cookieButton.addEventListener('click',()=>
{
    cookieContainer.classList.remove('active');
    localStorage.setItem('cookieSet',true);
});
setTimeout(()=>
{
    if(!localStorage.getItem('cookieSet'))
    {
        cookieContainer.classList.add('active');
    }
},5000);



/*Plan form*/
$(document).on('submit','.loginForm',function()
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
      el.find('button span:last').text(' ...');
    },
    success:function(callback)
    {
        el.find('button span:first').html('');
        el.find('button,input').attr('disabled',false);
        el.find('button span:last').text(btn_text);
        console.log(callback);
        if(callback.status === 0)
        {
            $.each(callback.errors,function(prefix,value)
            {
                el.find("input[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
            });
        }
        else if(callback.status === 2)
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Warning');
            $('.small-model').find('.modal-body').html('<div class="text-warning text-center"><i class="fa fa-exclamation-triangle"></i> Wrong login details.</div>');
        }
        else
        {
            el[0].reset();
            window.location='/management/dashboard';
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
