let body = $('body');

/**
 *  Show _form.php inside Modal
 * */
$("#create-button").on('click',function (event) {
    event.preventDefault();
    let url = $(this).attr('href');
    send(url);
})

/**
 *  send ajax call
 * */
function send(_url,_data = null)
{
    $.ajax({
        url: _url,
        method: "POST",
        data: _data,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success:function (response){
            if(response.status === false)
            {
                $('#modal').modal('show').find('#modal-content').html(response.content);
                $('#saveButton').on('click',function (event) {
                    event.preventDefault()
                    let formData = new FormData($("#saveForm")[0]);
                    send(_url,formData)
                })
            }else{
                $('#modal').modal('hide');
                $.pjax.reload({container: '#pjaxGrid'});
            }
        }
    })
}

/**
 *  Update action via ajax call
 */
body.on('click','.update-button',function (event) {
    event.preventDefault()
    let url = $(this).attr('href')
    send(url);
})

/**
 * View action via ajax call
 */
body.on('click','.view-button',function (event){
    event.preventDefault()
    let url = $(this).attr('href')
    send(url);
})

