function Rut(rut){
 var rexp = new RegExp(/^([0-9])+\-([kK0-9])+$/);
 if(rut.match(rexp)){
     var RUT = rut.split("-");
     var elRut = RUT[0].split('');
     var factor = 2;
     var suma = 0;
     var dv;
     for(i=(elRut.length-1); i>=0; i--){
         factor = factor > 7 ? 2 : factor;
         suma += parseInt(elRut[i])*parseInt(factor++);
     }
     dv = 11 -(suma % 11);
     if(dv == 11){
         dv = 0;
     }else if (dv == 10){
         dv = "k";
     }

     if(dv == RUT[1].toLowerCase()){
         //alert("El rut es válido!!");
         return true;
     }else{         
         alert("El rut es incorrecto");
         return false;
     }
 }else{     
     alert("Formato incorrecto. Recuerde que el formato correcto es 12345678-9");
     return false;
 }
}