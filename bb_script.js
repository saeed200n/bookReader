
jQuery(document).ready(function(){

  
  function chfB(){
    
    let tab_title_fullBook=document.querySelector('#tab-title-fullBook');
    let dis_dw=document.querySelector('#tab-description p a');
    let dis=document.querySelector('#tab-description');
    if(tab_title_fullBook!=null){
      console.log('has');
      jQuery('#woo_pp_ec_button_product').after('<div class=fullBook><span>مطالعه کتاب</span></div>');
      jQuery('#woo_pp_ec_button_product').remove();
      jQuery('form.cart').remove();
      tab_title_fullBook.remove();
      if(dis_dw!=null){
        dis_dw.remove();
      }
    }else{
      console.log('noting');
    }
  }
  chfB();
  
  
  function myacountS(){
    let myBooksBought=document.querySelector('.myBooksBought');
    let woocommerce_orders_table=document.querySelector('.woocommerce-orders-table');
    if(myBooksBought!=null){
      myBooksBought.addEventListener('click',function(){
        let ss='1363';
        jQuery.ajax({
          url:'https://yaremehraban.eu/wp-content/plugins/bookReader/database_book/rooter.php',
          method:'post',
          data:{'LibBook':ss},
          success:function(r){
            console.log(r);
          }
        })
      });
      
    }
  }
  myacountS();
  
  function removeItems(){
    let boxReader=document.querySelector('#boxReader');
    if(boxReader!=null){
      jQuery('.df-ui-share').remove();
   		boxReader.onload=function(){
          let share=document.querySelector('.df-ui-share');
          console.log(share);
        }
          
       
    }
  }
  removeItems();
  
    jQuery(".Preview_tab").click(function(){
window.location = 'https://yaremehraban.eu/landbprw';
  });
  jQuery(".fullBook").click(function(){
window.location = 'https://yaremehraban.eu/landbfull';
  });
  
  
});

