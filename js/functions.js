/**
 * Created by Miqael on 7/26/14.
 */
$(function sss(){


    function incomingCall(){
        $('#button').trigger('click');
    }

    $('#start_call').on('click',function(){
        $('#inc_call').trigger('click');
    });
    $('#black_list').on('click',function(){
        alert('Black Call');
    });
    $('#end_call').on('click',function(){
        window.close();
    });
});