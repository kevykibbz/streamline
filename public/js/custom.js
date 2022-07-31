/*proloader*/
function load()
{
  document.querySelector('.loader-placeholder').style.visibility="hidden";
  document.querySelector('.main-display-window').style.visibility="visible";
}

/*insection observer API */
function observerImages()
{
    var images=document.querySelectorAll('[data-src]'),
    imgOpts={},
    observer=new IntersectionObserver((entries,observer)=>
    {
        entries.forEach((entry)=>
        {
            if(!entry.isIntersecting) return;
            const img=entry.target;
            const newUrl=img.getAttribute('data-src');
            img.src=newUrl;
            observer.unobserve(img);
        });
    },imgOpts);
  
    images.forEach((image)=>
    {
      observer.observe(image)
    });
}

$(document).ready(function()
{
  observerImages();
});

/*submit  form*/
$(document).on('submit','.SubmitForm',function()
{
  var el=$(this),
  btn_text=el.find('button:last').text(),
  form_data=new FormData(this);
  el.find("input,textarea,select").removeClass('is-invalid').parents('.form-group').find('.feedback').removeClass('text-danger').html('');
  el.children().find('.is-invalid').removeClass('is-invalid');
  el.parents('.form-wrapper').find('.load-overlay .loader-container').html(`<div class="overlay-loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>`);
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
        el.parents('.form-wrapper').find('.load-overlay').show();
        el.find('button:last').attr('disabled',true).html('<i class="spinner-border spinner-border-sm" role="status"></i> Please wait...');
        el.parents('.form-wrapper').find('.overlay-close').removeClass('btn-remove');
      },
      success:function(callback)
      {
        el.parents('.form-wrapper').find('.overlay-close').addClass('btn-remove');
        el.parents('.form-wrapper').find('.load-overlay').hide();
        el.find('button:last').attr('disabled',false).text(btn_text);
        if(callback.valid)
        {
          el[0].reset();
          $(document).find('.response').html('<div class="wpcf7-response-output" aria-hidden="true">'+callback.message+'</div>');
        }
        else
        {
            $.each(callback.errors,function(key,value)
            {
              el.find("input[name='"+key+"'],select[name='"+key+"'],textarea[name='"+key+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"><i> '+value);
            });
        }
      },
      error:function(err)
      {
        el.parents('.form-wrapper').find('.overlay-close').addClass('btn-remove');
        el.find('button:last').attr('disabled',false).text(btn_text);
        el.parents('.form-wrapper').find('.load-overlay .loader-container').html('<span class="text-danger font-weight-bold"> <i class="zmdi zmdi-alert-triangle"></i> '+err.status+' :'+err.statusText+'</span>.');
      }
    });
  return false;
});


$(document).on('click','.btn-remove',function()
{
  $(this).parent().find('.loader-container').html(`<div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>`);
  $(this).parent().hide(); 
  return false;                                                
});


$(document).on('click','.reveal',function()
{
    var el=$(this);
    if($('.login-password').attr('type') =='password')
    {
        $('.login-password').attr('type','text');
        el.removeClass('fa-eye-slash').addClass('fa-eye');
    }
    else
    {
        $('.login-password').attr('type','password');
        el.removeClass('fa-eye').addClass('fa-eye-slash');
    }
});

$(function()
{
  $('#submitForm1').on('submit', function(e)
  {
      $('#form-submit1').attr('disabled', true);
      $('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
  });
});

$(".animated-progress span").each(function ()
{
$(this).animate(
  {
        width: $(this).attr("data-progress") + "%",
  },
  1000
    );
        $(this).text($(this).attr("data-progress") + "%");
});
$(document).ready(function()
{
    $(document).on('change','.tenature',function()
    {
        $(this).each(function(key,value)
        {
            var data=$(this).data('value');
            $('.emi').val(data);
        });
    });
});