
     var sidebar = document.getElementById('sidebars');
     var sidebar1 = document.getElementById('sidebars1');
     var sidebar2 = document.getElementById('sidebars2');
     var menu = document.getElementById('menu');
     var contents=document.getElementById('contents');
     var mobile_view=window.matchMedia("(max-width: 768px)");
     var mobile_view2=window.matchMedia("(max-width: 1190px)");
     var buton_add = document.getElementById('buton_add');
     var buton_close = document.getElementById('buton_close');
     var form_prodct = document.getElementById('form_prodct');
     var batles_pro_blocks = document.getElementById('batles_pro_blocks');
     var type_comment = document.getElementById('type_comment');
     var amount = document.getElementById('amount');
   
     
    
    var state=false;

    function navss(){

        if (state===false) {
            
            if (mobile_view.matches) {
            sidebar1.style.display="none";
            sidebar2.style.display="block";
            sidebar.style.width="50px";
            menu.style.display="none";
            contents.style.width="80%";
            contents.style.position="relative";
            contents.style.left="15%";
            contents.style.top="7vh";
        }else if(mobile_view2.matches){
            sidebar1.style.display="none";
            sidebar2.style.display="block";
            sidebar.style.width="50px";
            menu.style.display="none";
            contents.style.width="90%";
            contents.style.position="relative";
            contents.style.left="10%";
            contents.style.top="7vh";
          }else{
            sidebar1.style.display="none";
            sidebar2.style.display="block";
            sidebar.style.width="50px";
            menu.style.display="none";
            contents.style.width="95%";
            contents.style.position="relative";
            contents.style.left="5%";
            contents.style.top="7vh";
               }

            state=true;
        }else if (state===true) {
            
            if (mobile_view.matches) {
            sidebar1.style.display="block";
            sidebar1.style.position="absolute";
            sidebar2.style.display="none";
            sidebar.style.width="150px";
            menu.style.display="block";
            contents.style.width="80%";
            contents.style.position="relative";
            contents.style.left="15%";
            contents.style.top="7vh";
            }else if(mobile_view2.matches){
            sidebar1.style.display="block";
            sidebar1.style.position="absolute";
            sidebar2.style.display="none";
            sidebar.style.width="150px";
            menu.style.display="block";
            contents.style.width="90%";
            contents.style.position="relative";
            contents.style.left="10%";
            contents.style.top="7vh";

            }else{
            sidebar1.style.display="block";
            sidebar1.style.position="absolute";
            sidebar2.style.display="none";
            sidebar.style.width="150px";
            menu.style.display="block";
            contents.style.width="88%";
            contents.style.position="relative";
            contents.style.left="12%";
            contents.style.top="7vh";
            }
           
            state=false;
        }
      }



       function add_prodct(){ 
        buton_add.style.display="none";
        form_prodct.style.display="block";
        buton_close.style.display="block";
        }       
    function close_prodct(){
        buton_add.style.display="block";
        form_prodct.style.display="none";
        buton_close.style.display="none";
        }
    
    
     function add_prodction(){ 
        buton_add.style.display="none";
        batles_pro_blocks.style.display="block";
        buton_close.style.display="block";
         }       
    function close_prodction(){
        buton_add.style.display="block";
        batles_pro_blocks.style.display="none";
        buton_close.style.display="none";
    }
    var state_comment=false;
    function dsy_input(){
        if (state_comment===false) {
            type_comment.style.display="block";
            state_comment=true;

        }else if (state_comment===true) {
            type_comment.style.display="none";
            state_comment=false;

        }
        
    }
 


