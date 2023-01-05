 var navs = document.getElementById('lines');
    var sidebar = document.getElementById('sidebars');
    var sidebar1 = document.getElementById('sidebars1');
    var sidebar2 = document.getElementById('sidebars2');
    var menu = document.getElementById('menu');
    var contents=document.getElementById('contents');
    var state=false;

    function navss(){
        if (state===false) {
            sidebar1.style.display="none";
            sidebar2.style.display="block";
            sidebar.style.width="50px";
            menu.style.display="none";
            contents.style.width="95%";
            contents.style.position="relative";
            contents.style.left="5%";

            state=true;
        }else if (state===true) {
            sidebar1.style.display="block";
            sidebar1.style.position="absolute";
            sidebar2.style.display="none";
            sidebar.style.width="150px";
            menu.style.display="block";
            contents.style.width="88%";
            contents.style.position="relative";
            contents.style.left="12%";
           
            state=false;
        }
    }

  
