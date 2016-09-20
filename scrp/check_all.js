function check_all(obj, cName)
{
var checkboxs = document.getElementsByName(cName); 
for ( var i = 0; i < checkboxs.length; i+=1)
{  
checkboxs[i].checked = obj.checked;  
}  
}  
