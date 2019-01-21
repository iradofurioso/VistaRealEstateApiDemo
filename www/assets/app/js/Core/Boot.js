/**
 * Vista Real Estate API DEMO 
 * This script contains the core components for the application. 
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 */



/**
 * Requests in background the backend module.
 * 
 * @param  {string} moduleAction Module name
 * @param  {int}	id           Container Id
 * @return {void}                Returns nothing.
 */
function triggerRequest(moduleAction, id) 
{
	Pace.restart();

	$.get(appUrl + moduleAction, function(data) {
        $(id).html(data);
    });
}

/**
 * Open a modal window and loads the desired content.
 * 
 * @param {int}     id 
 * @param {string}  moduleUrl 
 */
function vistaTriggerModal(id, moduleUrl)
{
	$('#vista-modal').modal({
		keyboard: true,
		backdrop: true
    });
    
	if(id!='')
        triggerRequest(moduleUrl+'/'+id,'#vista-modal-content');
	else 
        triggerRequest(moduleUrl,'#vista-modal-content');
        
	return false;
}


/**
 * Triggered before submiting a modal form.
 */
function triggerPreSubmit() 
{
    $('#vista-submit').attr('disabled', 'disabled');
}


/**
 * Closes a modal window.
 * 
 * @param {int} delayToClose Time to close the window.
 */
function closeModal(delayToClose) 
{
    setTimeout('$("#vista-modal").modal("toggle")', delayToClose);
}


/**
 * If the data is removed without any error runs this method.
 * 
 * @param {obj} data Returned information from backend. 
 */
function triggerSuccessForModal(data) 
{
    $('#vista-modal-message').removeClass('alert-danger');
    $('#vista-modal-message').addClass('alert-success');
    $('#vista-modal-msg-body').html(data.message);
    $('#vista-modal-message').show('slow');
    $('#vista-submit').removeAttr('disabled');
}


/**
 * In case there is an error, this method is fired.
 * 
 * @param {obj} data 
 */
function triggerErrorForModal(data) 
{
    $('#vista-modal-message').removeClass('alert-success');
    $('#vista-modal-message').addClass('alert-danger');
    $('#vista-modal-msg-body').html(data.message);
    $('#vista-modal-message').show('slow');
    $('#vista-submit').removeAttr('disabled');
}


/**
 * This procedure is fired whatever a city form is called.
 * 
 */
var vistaDeleteCity =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {

		var qtdRegistros = 0;
		var qtdRegistrosTotal = 0;

		if( data.savedstatus == 1 ) 
		{
			// Retorno sucesso 
            triggerSuccessForModal(data);
            
            $('#tr_'+data.id).remove();
            
			// Verifica se está mostrando a quantidade de registros encontrados
			// e substrai.
			if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = qtdRegistros - 1;

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
				}
			}

			closeModal(2000); 
		} 
		else 
            triggerErrorForModal(data);
	}
};


 /**
  * Edit a city. 
  */
var vistaEditCity =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {
		var trTable = '';
		if( data.savedstatus == 1 ) {
			// Retorno sucesso 
			triggerSuccessForModal(data);
			$('#tr_'+data.id).empty();
			trTable = '<td><i class="fas fa-barcode"></i> '+data.id+'</td><td>'+data.name+'</td><td>'+data.state+'</td><td><a href="#" class="btn btn-danger" onclick="vistaTriggerModal('+data.id+', \'city/delete/'+data.id+'\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a> <a href="#" class="btn btn-warning" onclick="vistaTriggerModal('+data.id+', \'city/edit/'+data.id+'\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td>';
			$('#tr_'+data.id).html(trTable);
			closeModal(2000); 
		} else triggerErrorForModal(data);	
	}
};


/**
 * Add new city
 */
var vistaAddCity =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {
		if(data.savedstatus == 1) {
            triggerSuccessForModal(data);
            trTable = '<tr><td><i class="fas fa-barcode"></i> '+data.id+'</td><td>'+data.name+'</td><td>'+data.state+'</td><td><a href="#" class="btn btn-danger" onclick="vistaTriggerModal('+data.id+', \'city/delete/'+data.id+'\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a> <a href="#" class="btn btn-warning" onclick="vistaTriggerModal('+data.id+', \'city/edit/'+data.id+'\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td></tr>';
            $('#vista-grid tbody tr:last').after(trTable);

            // Updates the total results
            if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = eval(qtdRegistros) + eval(1); // Forcing to sum

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
                }
            }
            
			closeModal(1000);
        } 
        else 
        {
			triggerErrorForModal(data);
		}
	}
};


/**
 * This procedure is fired whatever a neighborhood form is called.
 * 
 */
var vistaDeleteNeighborhood =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {

		var qtdRegistros = 0;
		var qtdRegistrosTotal = 0;

		if( data.savedstatus == 1 ) 
		{
			// Retorno sucesso 
            triggerSuccessForModal(data);
            
            $('#tr_'+data.id).remove();
            
			// Verifica se está mostrando a quantidade de registros encontrados
			// e substrai.
			if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = qtdRegistros - 1;

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
				}
			}

			closeModal(2000); 
		} 
		else 
            triggerErrorForModal(data);
	}
};


 /**
  * Edit a neighborhood. 
  */
 var vistaEditNeighborhood =
 {
	 dataType:   'json', 
	 beforeSubmit:  triggerPreSubmit,
	 clearForm:    false,
	 resetForm:    false,
	 success:    function(data) {
		 var trTable = '';
		 if( data.savedstatus == 1 ) {
			 // Retorno sucesso 
			 triggerSuccessForModal(data);
			 $('#tr_'+data.id).empty();
			 trTable = '<td><i class="fas fa-barcode"></i> '+data.id+'</td><td>'+data.name+'</td><td>'+data.city+'</td><td><a href="#" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-search-location"></i></a></td><td><a href="#" class="btn btn-danger" onclick="vistaTriggerModal('+data.id+', \'neighborhood/delete\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a> <a href="#" class="btn btn-warning" onclick="vistaTriggerModal('+data.id+', \'neighborhood/edit\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td>';
			 $('#tr_'+data.id).html(trTable);
			 closeModal(2000); 
		 } else triggerErrorForModal(data);	
	 }
 };


 /**
 * Add new neighborhood
 */
var vistaAddNeighborhood =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {
		if(data.savedstatus == 1) {
            triggerSuccessForModal(data);
            trTable = '<tr><td><i class="fas fa-barcode"></i> '+data.id+'</td><td>'+data.name+'</td><td>'+data.city+'</td><td><a href="#" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-search-location"></i></a></td><td><a href="#" class="btn btn-danger" onclick="vistaTriggerModal('+data.id+', \'neighborhood/delete\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a> <a href="#" class="btn btn-warning" onclick="vistaTriggerModal('+data.id+', \'neighborhood/edit\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td></tr>';
            $('#vista-grid tbody tr:last').after(trTable);

            // Updates the total results
            if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = eval(qtdRegistros) + eval(1); // Forcing to sum

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
                }
            }
            
			closeModal(1000);
        } 
        else 
        {
			triggerErrorForModal(data);
		}
	}
};