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
    $.get(appUrl + moduleAction, function(data) {
        $(id).html(data);
    });
}
