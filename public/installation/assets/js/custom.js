/*proloader*/
function load()
{
  document.querySelector('.placeholder').style.display="none";
  document.querySelector('.main-display').style.display="block";
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


/*start_installation*/
$(document).on('click','.start_installation',function(e)
{
    e.preventDefault();
    var el=$(this),
    url=el.attr('href');
    $('.content-overlay').find('.loader-container').html(`<div class="innerloader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>`);
    $.ajax(
    {
        url:url,
        context:this,
        dataType:'html',
        beforeSend:function()
        {
            $('.hider').html('');
            $('.content-overlay').show();
        },
        success:function(results)
        {
            $('.content-overlay').hide();
            $('.hider').html(results)
            $(document).prop('title','DevMe | Site Installation | Start');

        },
        error:function(error)
        {
            $('.content-overlay').find('.loader-container').html('<span class="text-danger">'+error.status+':'+error.statusText+'</span> | <a class="text-info start_installation" href="'+url+'">retry</a>')
        }
    })
});

$(document).on('click','.btn-remove',function()
{
  $(this).parent().find('.loader-container').html(`<div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div`);
  $(this).parent().hide(); 
  return false;                                                
});

$(document).on('click','.button1',function()
{
    $('.owl-dot:nth-child(2)').click();
});

$(document).on('click','.button2',function()
{
    $('.owl-dot:last').click();
});

/*start_installation*/
$(document).on('click','.start_installation',function(e)
{
    e.preventDefault();
    var el=$(this),
    url=el.attr('href');
    $.ajax(
    {
        url:url,
        context:this,
        dataType:'html',
        beforeSend:function()
        {
            $('.hider').hide();
            el.parents('.overlay-wrapper').find('.load-overlay').show();
        },
        success:function(results)
        {
            el.parents('.overlay-wrapper').find('.load-overlay').hide();
            $('.hider').show().html(results); 
        },
        error:function(error)
        {
            el.parents('.overlay-wrapper').find('.loader-container').html('<span class="text-danger">'+error.status+':'+error.statusText+'</span> | <a class="text-info start_installation" href="'+url+'">retry</a>')
        }
    });
});

$(document).on('click','.nextBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $(this).parent().parent().parent().hide();
    $(this).parents('.row').next().show();
    $('.progress-process').find('.'+class_name +' .bullet').addClass('finished')
});
$(document).on('click','.prevBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $(this).parent().parent().parent().hide();
    $(this).parents('.row').prev().show();
    $('.progress-process').find('.'+class_name +' .bullet').removeClass('finished')
});
$(document).on('click','.finishBtn',function()
{
    var class_name=$(this).parent().parent().parent().attr('class').split(' ')[1];
    $('.progress-process').find('.'+class_name +' .bullet').addClass('finished')
});

 $(document).on('submit','.installationForm',function()
 {
     var el=$(this),
     form_data=new FormData(this);
     $('.feedback').html('');
     $('.progress-process').find('.bullet').removeClass('error');
     el.children().find('.is-invalid').removeClass('is-invalid');
     el.parent().parent().find('.load-overlay .loader-container').html(`<div class="innerloader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>`);
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
             el.parent().parent().find('.load-overlay').show();
             $('.finishBtn').attr('disabled',true).text('Please wait...');
         },
         success:function(callback)
         {
             el.parent().parent().find('.load-overlay').hide();
             $('.finishBtn').attr('disabled',false).text('finish');
             if(callback.valid)
             {
                 el.parent().parent().find('.load-overlay').show();
                 el.parent().parent().find('.load-overlay .loader-container').html('<h6 class="text-success" style="font-size:16px !important;"><i class="fa fa-check-circle"></i> '+callback.message+'</h6>');
                 el.find('button').attr('disabled',true);
                 window.location='/';
             }
             else
             {
                var class_name=''
                $.each(callback.errors,function(key,value)
                {
                    el.find("input[aria-label='"+key+"']").addClass('is-invalid').parents('.form-group').find('.feedback').addClass('text-danger').html('<i class="fa fa-exclamation-circle"></i> '+value);
                    class_name=$("input[aria-label='"+key+"']").parent().parent().parent().attr('class').split(' ')[1];
                    $('.progress-process').find('.'+class_name +' .bullet').addClass('error');
                });
             }
         },
         error:function(err)
         {
             $('.finishBtn').attr('disabled',false).text('finish');
             el.parent().parent().find('.load-overlay .loader-container').html('<span class="text-danger font-weight-bold"><i class="icon-exclamation-circle"></i> '+err.status+' :'+err.statusText+'</span>.');
         }
     });
     return false;
 });