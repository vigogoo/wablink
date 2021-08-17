// JavaScript Document
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
}

function readURL2(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id)
                        .attr('src', e.target.result)
                        .width(80)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
}


function showNewPrice(discount, first, second){
	var old= document.getElementById(first).value
	var disc= discount.value;
	var disc_val= 0.005*disc*old;
	var newp= old-disc_val;
	document.getElementById(second).innerHTML = ' '+newp;
	}
/*
function AddComma(input) {
  var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
      if(num.indexOf('.') > -1){ 
         num = num.split('.');
         num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
        if(num[1].length > 2){ 
           alert('You may only enter two decimals!');
           num[1] = num[1].substring(0,num[1].length-1);
        }  input.value = num[0]+'.'+num[1];        
      } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    }
    else{ alert('You may enter only numbers in this field!');
          input.value = input.value.substring(0,input.value.length-1);
    }
}
*/
/*
$(document).ready(function () {
  $('.save_item').on('click',function(e, data){
    if(!data){
      handleDelete(e, 1);
    }else{
      $("#form").submit();
    }
  });
});

function handleDelete(e, stop){
  if(stop){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover the delaer again!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete!",
      closeOnConfirm: false
    },
    function (isConfirm) {
      if (isConfirm) {
        $('.delete').trigger('click', {});
      }
    });
  }
};



*/
function confirmAddingItem(){

	var category, name, oldprice,newprice, description, expiry, discount;
	oldprice= document.getElementById('item_price2').value;
	newprice= document.getElementById('new_price').textContent;
	category= document.getElementById('new_category').value;
	name= document.getElementById('item_name').value;
	description= document.getElementById('item_description').value;
	expiry= document.getElementById('expiry').value;
	discount= document.getElementById('item_discount').value;
	
	var business_id = document.getElementById("business_id").value;
	var typesel = document.getElementById("item_type");
	var typeval = typesel.options[typesel.selectedIndex].value;
	
	var discount_val= discount/2;
	var categorysel = document.getElementById("category");
	var catval = categorysel.options[categorysel.selectedIndex].value;
	
	var catbool;
	var catupload;
	var arequal= catval.toUpperCase()==='NONE';
	if(catval!='' && !arequal){
		catbool= true;
		catupload= catval;
		}else if(category!=''){
			catbool= true;
			catupload= category;
		
		}else{
			catbool= false;
			}
	
	if(oldprice=='' || name=='' || description=='' || expiry=='' || !catbool){
		//alert("Please enter all required fields!");
		swal({
  title: "Empty fields",
  text: "Please enter all required fields!",
  //imageUrl: "images/thumbs-up.jpg"
});
		return false;
		
		}else{
		var retVal2=confirm("Confirm item details to be seen by customers!\n\n"+
							"Category: "+catupload+"\n"
					   +"Name: "+name+"\n"
					   +"Old price: "+oldprice+"\n"
					   +"New price: "+newprice+"\n"
					   +"Discount: "+discount_val+"\n"
					   +"Description: "+description+"\n"
					   +"Expires on: "+expiry);
  if( retVal2 == true ){
	  
      return true;
	  
   }else{
      alert("Adding item has been cancelled!");
	  return false;
   } 
   
   
/*   
		swal({
  title: "Confirm item details to be seen by customers!",
  text: "Category: "+catupload+"\n"
					   +"Name: "+name+"\n"
					   +"Old price: "+oldprice+"\n"
					   +"New price: "+newprice+"\n"
					   +"Discount: "+discount_val+"\n"
					   +"Description: "+description+"\n"
					   +"Expires on: "+expiry+"\n",
  imageUrl: "images/itempics/USSD1434849505.jpg",
  //type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, add item!",
  closeOnConfirm: false
  
},
function(isConfirm){
 if (isConfirm) {
       posting= true;
	   }else{
		   posting= true;
		   }
}); //end of swal;

  	return posting;
*/	

}//end if else for empty
	
}
	
function addItem(category, name, price, expiry, description, expiry){
	alert("adding item, please wait...");
	return false;
	}