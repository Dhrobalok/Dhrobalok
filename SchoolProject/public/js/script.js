function load_modal_particles(){
   
}

function trigger_ajax_swal_msg(data){
    message = data.responseJSON.message;
    error = data.responseJSON.error;
    response = data.responseJSON;
    if(message != '' || data.statusText !=''){
      if(response.status == 'warning'){
        icon = 'warning';
        title = 'Warning*';
      }

      if(response.status == 'info'){
        icon = 'info';
        title = 'Info*';
      }

      if(response.status == 'error'){
        icon = 'error';
        title = 'Oppps...';
      }

      if(response.status == 'success' && data.status===200){
        icon = 'success';
        title = 'Success*';
      }

      if(data.status === 500){
        icon = 'error';
        title = 'Oppps...';

      }

      if(data.status === 400){
        //HTTP_BAD_REQUEST
        icon = 'error';
        title = 'Oppps...';
        message = error;
      }

      if(data.status == 404){
        //HTTP_NOT_FOUND
        icon = 'error';
        title = 'Oppps...';
        message = data.statusText;
      }

      if(data.status === 406 && response.status === 'error'){
        //HTTP_NOT_ACCEPTABLE
        icon = 'error';
        title = 'Oppps...';
        message = error;
      }else if(data.status === 406){
        icon = 'warning';
        title = 'Warning*';
        message = error;
      }

      Swal.fire({
        icon: icon,
        title: title,
        timer: 3000,
        html: `<b>${message}</b>`,
        width: '25em'
      });

    }

  }
