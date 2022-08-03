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


$(document).ready(function ()
{  
    observerImages();
});




$(document).on('submit','.loginForm',function()
{
  var el=$(this),
  btn_text=el.find('button span:last').text(),
  urlparams=new URLSearchParams(window.location.search),
  next=urlparams.get('next'),
  form_data=new FormData(this);
  el.children().find('.is-invalid').removeClass('is-invalid');
  $('.small-model').find('.modal-title').removeClass('text-warning').text('');
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
      el.find('button').attr('disabled',true);
      el.find('button span:last').text(' Please wait...');
    },
    success:function(callback)
    {
      el.find('button span:first').html('');
      el.find('button').attr('disabled',false);
      el.find('button span:last').text('SIGN IN');
      if(callback.valid && callback.login)
      {
        el[0].reset();
        $('.small-model').modal({show:true});
        $('.small-model').find('.modal-title').addClass('text-success').text('Success');
        $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> '+callback.message+'</div>');
        window.location='/management/dashboard';
      }
      else(!callback.valid && !callback.login)
      {
        $('.small-model').modal({show:true});
        $('.small-model').find('.modal-title').addClass('text-warning').text('Warning');
        $('.small-model').find('.modal-body').html('<div class="text-warning text-center"><i class="fa fa-exclamation-triangle"></i> '+callback.message+'</div>');
        if(callback.errors)
        {
          $.each(callback.errors,function(prefix,value)
          {
            el.find("input[name='"+prefix+"'],textarea[name='"+prefix+"'],select[name='"+prefix+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value[0]);
          });
        }
      }
    },
    error:function(err)
    {
      el.find('button span:first').html('');
      el.find('button').attr('disabled',false);
      el.find('button span:last').text('SIGN IN');
    }
  });
  return false;
});


$(document).on('change','input[type=file]',function()
{
  $(this).removeClass('is-invalid').addClass('is-valid').parent().find('label').removeClass('invalid-feedback').addClass('valid-feedback').html('Filename: '+this.files[0].name);
});

/*spreadsheetForm*/
$(document).on('submit','.EditForm',function()
{
  var el=$(this),
  form_data=new FormData(this);
  $('.feedback').html('');
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
        el.find('button:last').html('<i class="spinner-border spinner-border-sm" role="status"></i> Please wait...');
        el.find('button').attr('disabled',true);
      },
      success:function(callback)
      {
        el.find('button:last').text('Submit');
        el.find('button').attr('disabled',false);
        if(callback.valid)
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> '+callback.message+'.</div>');
          }
        else
        {
            $.each(callback.form_errors,function(key,value)
            {
              el.find("input[name='"+key+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value);
            });
        }
      },
      error:function(err)
      {
        el.find('button:last').text('submit');
        el.find('button').attr('disabled',false);
      }
    });
  return false;
});


/*spreadsheetForm*/
$(document).on('submit','.SubmitForm',function()
{
  var el=$(this),
  form_data=new FormData(this);
  $('.feedback').html('');
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
        el.find('button:last').html('<i class="spinner-border spinner-border-sm" role="status"></i> Please wait...');
        el.find('button').attr('disabled',true);
      },
      success:function(callback)
      {
        el.find('button:last').text('Submit');
        el.find('button').attr('disabled',false);
        if(callback.valid)
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Success');
            $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> '+callback.message+'.</div>');
            el[0].reset();
            if(callback.path)
            {
              $(document).find('.user-imager').attr('src',callback.path);
            } 
          }
        else
        {
            $.each(callback.errors,function(key,value)
            {
              el.find("input[name='"+key+"'],textarea[name='"+key+"'],select[name='"+key+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('invalid-feedback').html('<i class="fa fa-exclamation-circle"></i> '+value);
            });
        }
        if(callback.error)
        {
            $('.small-model').modal({show:true});
            $('.small-model').find('.modal-title').text('Info');
            $('.small-model').find('.modal-body').html('<div class="text-info text-center"><i class="fa fa-exclamation-triangle"></i> No changes made.</div>');
        }
      },
      error:function(err)
      {
        el.find('button:last').text('submit');
        el.find('button').attr('disabled',false);
      }
    });
  return false;
});


$(document).on('click','.del-data',function(e)
{
  e.preventDefault();
  var el=$(this);
  $('.delete-model').modal({show:true});
  $('.delete-model').find('.modal-title').text('Confirm');
  $('.delete-model').find('.modal-body').html('<div class="mb-3 text-warning text-info text-center"><i class="zmdi zmdi-alert-triangle"></i> Confirm deleting item .</div> <div class="text-center"><button class="btn btn-secondary cancelBtn mr-2" >cancel</button><button data-host="'+el.data('host')+'" data-url="'+el.attr('href')+'" class="btn btn-danger confirmBtn ml-2">confirm</button></div>');

});

$(document).on('click','.cancelBtn',function()
{
  $(this).parents('.modal').find('.close').click();
});

$(document).on('click','.confirmBtn',function()
{
  var el=$(this),
  url=el.data('url');
  $.ajax(
      {
        url:url,
        dataType:'json',
        beforeSend:function()
        {
          el.html('<i class="spinner-border spinner-border-sm" role="status"></i> Please wait...');
        },
        success:function(callback)
        {
          el.html('confirm');
          refreshPage(el,el.data('host'),'table-results');
          $('.delete-model').modal('hide');
          $('.small-model').modal('show');
          $('.small-model').find('.modal-title').text('Success');
          $('.small-model').find('.modal-body').html('<div class="text-success text-center"><i class="fa fa-check-circle"></i> '+callback.message+'.</div>');
        },
        error(err)
        {
          el.html('confirm');
          console.log(err.status+':'+err.statusText);
        }
      });
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
        observerImages();
      },
      error:function(err)
      {
        console.log(err.status+':'+err.statusText);
      }
    });
}


$(document).on('change','.profile',function()
{
    var el=$(this),
    file=el.get(0).files[0],
    ext=el.val().substring(el.val().lastIndexOf('.')+1).toLowerCase();
    if(file && (ext=='jpg' || ext=='png' || ext=='jpeg' || ext=='gif'))
    {
        var reader=new FileReader();
        reader.onload=function(e)
        {
            $('.imagecard').find('img').attr('src',reader.result);
            $('.showthis').show();
        }
        reader.readAsDataURL(file);
    }
    else
    {
      $('.small-model').modal({show:true});
      $('.small-model').find('.modal-title').text('Warning');
      $('.small-model').find('.modal-body').html('<div class="text-warning text-center"><i class="zmdi zmdi-alert-triangle"></i> Invalid image format</div>');
    }
});

/*profile pic*/
$(document).on('submit','.profileForm',function()
{
    var el=$(this),
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
          el.find('button').html('<i class="fa fa-spinner fa-spin" role="status"></i>');
          el.find('button').attr('disabled',true);
        },
        xhr:function()
        {
          const xhr=new window.XMLHttpRequest();
          xhr.upload.addEventListener('progress',function(e)
          {
            if(e.lengthComputable)
            {
              const percent=Math.round((e.loaded/e.total)*100);
              el.find('button').html(percent+'% ...');
            }
          });
          return xhr
        },
        success:function(callback)
        {
            el.parents('.card').find('.load-overlay').hide();
            el.find('button').html('<i class="fe fe-check" data-toggle="tooltip" data-placement="top" title="Upload profile picture" data-original-title="Edit"></i>');
            el.find('button').attr('disabled',false);
            el.find('button').hide();
            if(callback.valid)
            {
              //window.location=window.location;
            }
        },
        error:function(err)
        {
          el.find('button').html('<i class="fe fe-check" data-toggle="tooltip" data-placement="top" title="Upload profile picture" data-original-title="Edit"></i>');
          el.find('button').attr('disabled',false);
        }
    }
    );
return false;
});

$(document).on('click','.view',function()
{
  var text=$(this).text();
  $('.large-model').modal({show:true});
  $('.large-model').find('.modal-title').text($(this).data('tip'));
  $('.large-model').find('.modal-body').html('<i class="text-info dripicons dripicons-information"></i> '+text);
});

$(document).on('change','input[name="datefilter"]',function()
{
    console.log('changed');
});