window.onload = function() {
    console.log('INICIANDO');
    // Detectar cuando la página se abre
    sendEmailNotification();

    //
    async function sendEmailNotification(){
      let dataContact = new FormData();
      dataContact.append('nombre', 'Diana');
      dataContact.append('property', 'value');
        const response = await fetch(
            'controller/envioMail.php',
            {
                method : 'POST',
                body : dataContact
            }
        );
        const data = await response.json();
        console.log('datas',data);
        if(data === "success"){
          console.log("El mensaje fue enviado correctamente");
        }else{
          console.log('Ocurrio un error');
        }
    }
};
