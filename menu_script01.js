

function writeBook(){
  let boxM=document.querySelector('.boxM');
  let productB=document.querySelector('#productB');
  let codeProductB=document.querySelector('#codeProductB');
  let codeDflipProductB=document.querySelector('#codeDflipProductB');
  let codeDflipPBPrw=document.querySelector('#codeDflipPBPrw');
  let alarm=document.querySelector('#alarm');
  let btnMenu=document.querySelector('#btnMenu');
  if(boxM!=null){
    btnMenu.addEventListener('click',function(){
    
      let productB_v=productB.value;
      let codeProductB_v=codeProductB.value;
      let codeDflipProductB_v=codeDflipProductB.value;
      let codeDflipPBPrw_v=codeDflipPBPrw.value;
      if(productB_v!=='' && codeProductB_v!='' && codeDflipProductB_v!=''&& codeDflipPBPrw_v!=''){
          jQuery.ajax({
          url:'https://yaremehraban.eu/wp-content/plugins/bookReader/database_book/write_books.php',
          method:'post',
          type:'json',
          data:{'productB_v':productB_v,'codeProductB_v':codeProductB_v,'codeDflipProductB_v':codeDflipProductB_v,'codeDflipPBPrw_v':codeDflipPBPrw_v},
          success:function(r){
           console.log(r);
            if(r='200'){
              productB.value='';
              codeProductB.value='';
              codeDflipProductB.value='';
              codeDflipPBPrw.value='';
              alarm.innerText='کتاب با موفقیت ذخیره شد';
              alarm.style.color='green';
            }else{
              productB.value='';
              codeProductB.value='';
              codeDflipProductB.value='';
              alarm.innerText='کتاب ذخیره نشد';
              alarm.style.color='red';
            }
             
          }
        });
      }else{
        alarm.style.color='red';
        alarm.innerText='لطفا قسمتهای خالی را پر کنید!';
      }
    });
  }
}
writeBook();

function readBooks(){
  let btnDBooks=document.querySelector('#btnDBooks');
  let tableBookst=document.querySelector('#tableBooks tbody');
  /*console.log(btnDBooks);*/
  if(btnDBooks!=null){
    btnDBooks.addEventListener('click',function(){
       jQuery.ajax({
         url:'https://yaremehraban.eu/wp-content/plugins/bookReader/database_book/read_books.php',
         method:'post',
         success:function(r){
           let rs=JSON.parse(r);
           /*console.log(rs);*/
           let txt='';
             for( i in rs){
               txt += '<tr>\n' +
                      ' <td class="cols id_product">'+rs[i].id_product+'</td>\n' +
                      ' <td>'+rs[i].date+'</td>\n' +
                      ' <td class="cols name_product">'+rs[i].name_product+'</td>\n' +
                      ' <td class="cols id_dflip">'+rs[i].id_dflip+'</td>\n' +
                      ' <td class="cols id_dflipPrw">'+rs[i].id_dflipPrw+'</td>\n' +
                      ' <td class="tdBtns">\n' +
                      ' <input type="button" value="ویرایش" class="btns edit" id="'+rs[i].id+'" >\n' +
                      ' </td>\n' +
                      ' <td class="tdBtns">\n' +
                      ' <input type="button" value="حذف" class="btns delete" id="'+rs[i].id+'">\n' +
                      ' </td>\n' +
                      '</tr>';
             }
           jQuery('#tableBooks tbody').html("").append(txt)
         	}
    	});
    });
  }
 
}
readBooks();

function editBooks(){
  jQuery("#tableBooks").on('click','.edit',function(){
    
    if(!jQuery(this).hasClass('activeItems')){
      jQuery(this).parent().siblings('.cols').each(function(){
      let val=jQuery(this).html();
      jQuery(this).html('<input type="text" value="'+val+'" >');
    	});
      jQuery(this).addClass('activeItems');
    }else{
      let id=jQuery(this).attr('id');
      let id_product_v=jQuery(this).parent().siblings('.id_product').children('input').val();
      let name_product_v=jQuery(this).parent().siblings('.name_product').children('input').val();
      let id_dflip_v=jQuery(this).parent().siblings('.id_dflip').children('input').val();
      let id_dflipPrw_v=jQuery(this).parent().siblings('.id_dflipPrw').children('input').val();
      console.log(id,id_product_v,name_product_v,id_dflip_v,id_dflipPrw_v)
      if(id_product_v!='' && name_product_v!='' && id_dflip_v!='' && id_dflipPrw_v!=''){
        jQuery.ajax({
          url:'https://yaremehraban.eu/wp-content/plugins/bookReader/database_book/edit_books.php',
          method:'post',
          data:{
            'id':id,
            'id_product_ve':id_product_v,
            'name_product_ve':name_product_v,
            'id_dflip_ve':id_dflip_v,
            'id_dflipPrw_ve':id_dflipPrw_v
          },
          success:function(r){
            console.log(r);
            if(r='200'){
             jQuery('#btnDBooks').click();
              
            }else{
              console.log(r)
            }
          }
        })
      }
    }
    
  });
}
editBooks();

function deleteBooks(){
 jQuery('#tableBooks').on('click','.delete',function(){
   
   let id=jQuery(this).attr('id');
   console.log(id);
  if(id!=null){
             jQuery.ajax({
               url:'https://yaremehraban.eu/wp-content/plugins/bookReader/database_book/delete_books.php',
               method:'post',
               data:{
                 'id':id
               },
               success:function(r){
                 if(r='200'){
                    jQuery('#btnDBooks').click();
                 }else{
                   console.log(r);
                 }
               }
             })
           }else{
             console.log('id null');
           }
 })
}
deleteBooks();



function Display_page_menu() {
        jQuery('.menu_plugin ul li').click(function () {
            var name_box = jQuery(this).attr('name');
        
            if (name_box === 'd1') {
                jQuery('.des1').removeClass('hide');
            } else {
                jQuery('.des1').addClass('hide');
            }
            if (name_box === 'd2') {
                jQuery('.des2').removeClass('hide');
            } else {
                jQuery('.des2').addClass('hide');
            }
            if (name_box === 'd3') {
                jQuery('.des3').removeClass('hide');
            } else {
                jQuery('.des3').addClass('hide');
            }
            if (name_box === 'd4') {
                jQuery('.des4').removeClass('hide');
            } else {
                jQuery('.des4').addClass('hide');
            }
        });

    }

    Display_page_menu();

    function only_number_input() {

        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
                textbox.forEach(function (itm) {
                    itm.addEventListener(event, function(e) {
                        if (inputFilter(this.value)) {
                            // Accepted value
                            if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                                this.classList.remove("input-error");
                                this.setCustomValidity("");
                            }
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            // Rejected value - restore the previous one
                            this.classList.add("input-error");
                            this.setCustomValidity(errMsg);
                            this.reportValidity();
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            // Rejected value - nothing to restore
                            this.value = "";
                        }
                    });
                })

            });
        }
        setInputFilter(document.querySelectorAll('.inpts'), function(value) {
            return /^[0-9]*$/.test(value); // Allow digits and '.' only, using a RegExp
        }, "لطفاٌ فقط عدد وارد کنید");
    }
    only_number_input();